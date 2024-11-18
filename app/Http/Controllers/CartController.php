<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }
    public function Add_to_cart(Request $request)
    {
        $product_id = $request->product_id_hidden;
        $quantity = $request->quantity;

        $data = Product::where('product_id', $product_id)->first();

        if ($data) {
            Cart::add([
                'id' => $data->product_id,
                'name' => $data->product_name,
                'qty' => $quantity,
                'price' => $data->product_price_selling,
                'weight' => 0,
                'options' => [
                    'image' => $data->product_image,
                ],
            ]);
            Cart::setGlobalTax(0);
            Session::flash('success', 'Add cart Successfully !');
            return redirect('gio-hang')->with('success', 'Added to Cart successfully!');
        }

        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm.');
    }
    public function Add_to_cart_item(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        // log($product_id . $quantity);

        $data = Product::where('product_id', $product_id)->first();

        if ($data) {
            Cart::add([
                'id' => $data->product_id,
                'name' => $data->product_name,
                'qty' => $quantity,
                'price' => $data->product_price_selling,
                'weight' => 0,
                'options' => [
                    'image' => $data->product_image,
                ],
            ]);
            Cart::setGlobalTax(0);
        }
        Session::flash('success', 'Added to Cart successfully');
        return response()->json(['redirect' => route('gio_hang')]);
    }
    public function Delete_to_cart($rowId)
    {
        Cart::remove($rowId);
        $new_total = Cart::subtotal(0);
        $count = Cart::content()->unique('id')->count();

        Session::flash('success', 'Deleted Item successfully');
        return response()->json([
            'success' => true,
            'newTotal' => $new_total,
            'count' => $count
        ]);
    }

    public function ClearCart()
    {
        Cart::destroy();
        // Session::flash('success', 'Delete all successfully');
        return response()->json(['success' => true, 'message' => 'Cart cleared successfully']);
    }

    public function Update_Quantity_Product(Request $request)
    {
        $rowId = $request->input('rowid');
        $quantity = $request->input('quantity');

        Cart::update($rowId, $quantity);

        $total = Cart::subtotal(0);

        return response()->json([
            'success' => true,
            'total' => $total,
            'subtotal' => Cart::get($rowId)->subtotal,
        ]);
    }
}
