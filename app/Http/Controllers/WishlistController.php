<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function Show_Wishlist()
    {
        $wishlistItems = Cart::instance('wishlist')->content();
        return view('pages.wishlist.show_wishlist', compact('wishlistItems'));
    }
    public function addToWishlist(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        Cart::instance('wishlist')->add([
            'id' => $productId,
            'name' => $product->product_name,
            'price' => $product->product_price_selling,
            'qty' => 1,
            'weight' => 0,
            'options' => [
                'image' => $product->product_image,
            ],
            'attributes' => [],
        ]);

        return response()->json([
            'message' => 'Product added to wishlist successfully',
            'redirect' => route('wishlist')
        ]);
    }
    public function removeFromWishlist(Request $request)
    {
        $rowid = $request->input('rowid');
        if ($rowid) {
            Cart::instance('wishlist')->remove($rowid);
            return response()->json(['status' => 'success', 'message' => 'Đã xóa sản phẩm khỏi wishlist']);
        }
        return response()->json(['status' => 'error', 'message' => 'Lỗi xóa sản phẩm khỏi wishlist']);
    }
}
