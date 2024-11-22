<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccess;
use App\Models\Address;
use App\Models\Orders;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{

    public function show_pay()
    {
        return view('pages.checkout.checkout_pay');
    }
    public function vnpay_payment(Request $request)
    {

        $user_id = Auth::user()->id;

        $address_pickup = Address::where('address_type', 'pickup')->first();

        // Lấy dữ liệu từ request
        $checkoutFullName = $request->input('checkout_fullname');
        $checkoutEmail = $request->input('checkout_email');
        $checkoutPhone = $request->input('checkout_phone');
        $checkoutProvince = $request->input('checkout_province');
        $checkoutDistrict = $request->input('checkout_district');
        $checkoutWard = $request->input('checkout_ward');
        $checkoutDetailAddress = $request->input('checkout_detail_address');
        $transaction_amount = $request->input('transaction_amount');
        $total = $request->input('total');
        $order_products = $request->input('order_products');
        $paymentMethod = $request->input('payment');

        $address = new Address([
            'user_id' => $user_id,
            'address_type' => 'delivery',
            'province' => $checkoutProvince,
            'district' =>  $checkoutDistrict,
            'ward' => $checkoutWard,
            'address' => $checkoutDetailAddress,
            'fullname' =>  $checkoutFullName,
            'email' => $checkoutEmail,
            'phone' => $checkoutPhone
        ]);
        $address->save();

        $transaction = new Transaction([
            'user_id' => $user_id,
            'transaction_name' =>  $checkoutFullName,
            'transaction_email' => $checkoutEmail,
            'transaction_phone' => $checkoutPhone,
            'pickup_address_id' => $address_pickup->address_id,
            'delivery_address_id' => $address->address_id,
            'transaction_amount' => $total,
            'transaction_payment' => $paymentMethod,
            'transaction_message' => 'NOT MESSAGE',
            'transaction_status' => 0
        ]);
        $transaction->save();
        foreach ($order_products as $product) {
            $productId = $product['product_id'];
            $productName = $product['name'];
            $productQuantity = $product['quantity'];
            $productPrice = $product['price'];
            $productAmount = $product['amount'];
            Orders::create([
                'transaction_id' => $transaction->transaction_id,
                'product_id' => $productId,
                'order_qty' => $productQuantity,
                'order_product_name' => $productName,
                'order_price' => $productPrice,
                'order_amount' => $productAmount,
            ]);
        }

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8080/Project_Laravel/zone_shop/checkout-confirm";
        $vnp_TmnCode = "P5IRR70A";
        $vnp_HashSecret = "ICD0UHJJ3OA9N1JRUBL1DQIHE0RZUKVT";

        $vnp_TxnRef = $transaction->transaction_id;
        $vnp_OrderInfo = 'Payment Order';
        $vnp_OrderType = 'Zone Shop';
        $vnp_Amount =  $total * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return response()->json([
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        ]);
    }
    public function generateVnPayUrl($transaction_id, $total)
    {
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8080/Project_Laravel/zone_shop/checkout-confirm";
        $vnp_TmnCode = "P5IRR70A";
        $vnp_HashSecret = "ICD0UHJJ3OA9N1JRUBL1DQIHE0RZUKVT";

        $vnp_TxnRef = $transaction_id;
        $vnp_OrderInfo = 'Payment Order';
        $vnp_OrderType = 'Zone Shop';
        $vnp_Amount = $total * 100; // Số tiền thanh toán (VNPay yêu cầu số tiền nhân với 100)
        $vnp_Locale = 'vn';
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        // Thêm mã ngân hàng nếu có
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }
    public function vnpay_payment_retry($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        $user = Auth::user();

        if (!$transaction) {
            return response()->json([
                'code' => '01',
                'message' => 'Transaction not found'
            ]);
        }

        // Tiến hành xử lý thanh toán như lúc đầu, sử dụng thông tin đã lưu
        return $this->generateVnPayUrl($transaction_id, $transaction->transaction_amount);
    }


    public function vnpay_confirm(Request $request)
    {
        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $vnp_TxnRef = $request->input('vnp_TxnRef'); // Mã giao dịch
        $vnp_TransactionNo = $request->input('vnp_TransactionNo');
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');

        $transaction = Transaction::where('transaction_id', $vnp_TxnRef)->with([
            'pickupAddress',
            'deliveryAddress',
            'orders',
            'orders.product'
        ])->first();

        if ($transaction) {
            if ($vnp_ResponseCode == '00') {
                $transaction->transaction_status = 1;
                $transaction->save();
                try {
                    Mail::to($transaction->deliveryAddress->email)->send(new PaymentSuccess());
                } catch (\Throwable $th) {
                }

                return redirect()->route('checkout.success');
            } else {
                $transaction->transaction_status = 7;
                $transaction->save();

                return redirect()->route('checkout.failed');
            }
        } else {
            return redirect()->route('checkout.failed');
        }
    }
}
