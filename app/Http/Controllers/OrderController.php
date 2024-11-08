<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Orders;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function Show_checkout()
    {
        if (!auth()->check()) {
            return redirect(route('login')); // Sửa 'ridirect' thành 'redirect'
        }
        $address_pickup = Address::where('address_type', 'pickup')->get();
        return view('pages.checkout.show_checkout', compact('address_pickup'));
    }
    public function Show_Order()
    {
        return view('admin.order.all_order');
    }
    // public function Process_checkout(Request $request)
    // {
    //     $user_id = Auth::user()->id;

    //     $address_delivery = new Address([
    //         'user_id' => $user_id,
    //         'address_type' => 'delivery',
    //         'province' => $request->checkout_province,
    //         'district' => $request->checkout_district,
    //         'ward' => $request->checkout_ward,
    //         'address' => $request->checkout_detail_address
    //     ]);
    //     // $address_delivery->save();
    //     dd($address_delivery);




    //     $transaction = new Transaction();
    //     $transaction->user_id = $user_id;
    //     $transaction->transaction_name = $request->checkout_fullname;
    //     $transaction->transaction_email = $request->checkout_email;
    //     $transaction->transaction_phone = $request->checkout_phone;
    //     $transaction->pickup_address_id = $request->checkout_fullname;
    //     $transaction->delivery_address_id = $request->checkout_fullname;
    //     $transaction->transaction_amount = $request->checkout_fullname;
    //     $transaction->transaction_payment = $request->checkout_fullname;
    //     $transaction->transaction_message = $request->checkout_fullname;
    //     $transaction->transaction_status = $request->checkout_fullname;
    //     dd($transaction);


    //     $order_item = new Orders();
    //     $order_item->transaction_id = $request->checkout_fullname;
    //     $order_item->product_id = $request->checkout_fullname;
    //     $order_item->order_qty = $request->checkout_fullname;
    //     $order_item->order_product_name = $request->checkout_fullname;
    //     $order_item->order_price = $request->checkout_fullname;
    //     $order_item->order_amount = $request->checkout_fullname;
    //     dd($order_item);
    // }
    public function Process_checkout(Request $request)
    {


        $user_id = Auth::user()->id;
        $username = Auth::user()->name;

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
        $order_products = $request->input('order_products');
        $paymentMethod = $request->input('payment');

        $address = new Address([
            'user_id' => $user_id,
            'address_type' => 'delivery',
            'province' => $checkoutProvince,
            'district' =>  $checkoutDistrict,
            'ward' => $checkoutWard,
            'address' => $checkoutDetailAddress
        ]);
        $address->save();

        $transaction = new Transaction([
            'user_id' => $user_id,
            'transaction_name' => 'Order by ' . $checkoutFullName,
            'transaction_email' => $checkoutEmail,
            'transaction_phone' => $checkoutPhone,
            'pickup_address_id' => $address_pickup->address_id,
            'delivery_address_id' => $address->address_id,
            'transaction_amount' => $transaction_amount,
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
        // Trả về phản hồi JSON
        return response()->json([
            'message' => 'Checkout successful!'
        ]);
    }



    public function calculateFee(Request $request)
    {
        $data = [
            "pick_province" => $request->input('pick_province'),
            "pick_district" => $request->input('pick_district'),
            "province" => $request->input('province'),
            "district" => $request->input('district'),
            "weight" => $request->input('weight'),
            "value" => $request->input('value'),
            "deliver_option" => $request->input('deliver_option'),
        ];

        $client = new Client();
        $response = $client->request('GET', 'https://services.giaohangtietkiem.vn/services/shipment/fee', [
            'query' => $data,
            'headers' => [
                'Token' => '3OdB8GoXo5Ggu96WR29j1XV6ZITT5ePRPvrW7T',
                'X-Client-Source' => 'S22765576',
            ],
        ]);

        $responseData = json_decode($response->getBody()->getContents());
        $fee = isset($responseData->fee) ? $responseData->fee : null;
        return response()->json(['fee' => $fee]);
    }
}
