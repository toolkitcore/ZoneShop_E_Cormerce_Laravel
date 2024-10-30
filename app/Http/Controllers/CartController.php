<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
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

            return redirect('gio-hang')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng thành công!');
        }

        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm.');
    }
    public function Delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect('gio-hang');
    }

    public function ClearCart()
    {
        Cart::destroy();
        return Redirect('gio-hang');
    }
    public function Update_Quantity_Product(Request $request)
    {
        ///dd($request->all());
        $rowId = $request->input('rowid');
        $quantity = $request->input('quantity');

        Cart::update($rowId, $quantity);

        $total = Cart::total();

        return response()->json([
            'success' => true,
            'total' => $total,
            'subtotal' => Cart::get($rowId)->subtotal,
        ]);
    }
}
