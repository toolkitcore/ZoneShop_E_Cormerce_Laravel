<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminControllers;
use App\Http\Controllers\AttributesProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImagesController;
use App\Http\Controllers\WishlistController;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Mail;

// FRONTEND

Route::get('/', [ClientController::class, 'Show_Page_Home']);
Route::get('/trang-chu', [ClientController::class, 'Show_Page_Home'])->name('home');
Route::get('/thong-tin', [ClientController::class, 'Show_About']);
Route::get('/lien-he', [ClientController::class, 'Show_Contact']);
Route::get('/gio-hang', [ClientController::class, 'Show_Cart']);

// HOME PAGE
Route::get('/san-pham-{product_id}', [ClientController::class, 'Show_Single_Product']);
Route::get('/danh-sach-san-pham', [ClientController::class, 'Show_List_Product']);
Route::get('/danh-muc-san-pham-{category_id}', [ClientController::class, 'Show_Category_Product']);

// Cart Routes
Route::post('/them-san-pham', [CartController::class, 'Add_to_cart'])->name('add_to_cart');
Route::post('/add-cart-item', [CartController::class, 'Add_to_cart_item'])->name('add_cart_item');
Route::delete('/xoa-gio-hang/{rowId}', [CartController::class, 'Delete_to_cart']);
Route::get('/xoa-gio-hang', [CartController::class, 'ClearCart'])->name('clear_cart');
Route::post('/update-quantity-product', [CartController::class, 'Update_Quantity_Product'])->name('update_quantity');
Route::get('/gio-hang', [ClientController::class, 'Show_Cart'])->name('gio_hang'); // Add this route to show cart

// ALL PRODUCT
Route::post('/get-data-product', [DetailProductController::class, 'get_all_product'])->name('get_list_product');

// WISHLIST
Route::get('/show-wishlist', [WishlistController::class, 'Show_Wishlist'])->name('wishlist');
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('addToWishlist');
Route::post('/wishlist/back', [WishlistController::class, 'backToCart'])->name('backToCart');
Route::delete('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('removeFromWishlist');

// ROUTE AJAX
Route::get('product-detail/{product_id}', [ProductController::class, 'Product_detail'])->name('product_detail');
Route::get('/search-navbar', [DetailProductController::class, 'search_Navbar']);

//ACCOUNT
Route::get('/account', [ClientController::class, 'Show_Account'])->name('profile_account');

//MAILER
// Route::get('/mailer', function () {
//     Mail::to('hoangductrinh2k5@gmail.com')
//         ->send(new HelloMail);
// });

//CHECKOUT
Route::get('/show-checkout', [OrderController::class, 'Show_checkout'])->name('show_checkout');




//BACKEND

Route::get('/admin', [AdminControllers::class, 'index']);
Route::get('/dashboard', [AdminControllers::class, 'Show_Dashboard']);
Route::post('/admin-dashboard', [AdminControllers::class, 'Dashboard']);
Route::get('/log-out', [AdminControllers::class, 'Logout']);
Route::get('/profile-admin', [AdminControllers::class, 'Show_profile']);

//CATEGORY PRODUCTS
Route::get('/all-category-product', [CategoryController::class, 'Show_Category']);
Route::get('/add-category-product', [CategoryController::class, 'Add_Category']);
Route::post('/add-category-action', [CategoryController::class, 'Add_Category_Action']);
Route::get('/delete-category-product/{category_id}', [CategoryController::class, 'Delete_Category_product']);

Route::get('/edit-category-product/{caterory_id}', [CategoryController::class, 'Edit_Category_product']);
Route::post('/update-category-action/{caterory_id}', [CategoryController::class, 'Update_Category_product']);

Route::get('/active-category-product/{caterory_id}', [CategoryController::class, 'Set_Active_category_product']);
Route::get('/unactive-category-product/{caterory_id}', [CategoryController::class, 'Set_UnActive_category_product']);
Route::get('/filter-category-root', [CategoryController::class, 'Filter_Category_Root']);

//BRAND PRODUCTS
Route::get('/all-brand-product', [BrandController::class, 'Show_Brand']);
Route::get('/add-brand-product', [BrandController::class, 'Add_Brand']);
Route::post('/add-brand-action', [BrandController::class, 'Add_Brand_Action']);
Route::get('/delete-brand-product/{brand_id}', [BrandController::class, 'Delete_Brand_product']);

Route::get('/edit-brand-product/{brand_id}', [BrandController::class, 'Edit_Brand_product']);
Route::post('/update-brand-action/{brand_id}', [BrandController::class, 'Update_Brand_product']);

Route::get('/active-brand-product/{brand_id}', [BrandController::class, 'Set_Active_Brand_product']);
Route::get('/unactive-brand-product/{brand_id}', [BrandController::class, 'Set_UnActive_Brand_product']);

// PRODUCTS
Route::get('/all-product', [ProductController::class, 'Show_Product']);
Route::get('/add-product', [ProductController::class, 'Add_Product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'Edit_Product']);
Route::post('/add-product-action', [ProductController::class, 'Add_Product_Action']);
Route::get('/active-product/{product_id}', [ProductController::class, 'Set_Active_product']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'Set_UnActive_product']);
Route::post('/update-product-action/{product_id}', [ProductController::class, 'Update_Product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'Delete_Product']);

// ATTRIBUTES PRODUCTS
Route::get('/all-attribute-product', [AttributesProductController::class, 'Show_Attribute_Product']);
Route::get('/add-attribute-product', [AttributesProductController::class, 'Add_Attribute_Product']);
Route::get('/add-attribute-choice/{category_id}', [AttributesProductController::class, 'Add_Attribute_Choice']);
Route::get('/edit-attribute-product/{category_id}', [AttributesProductController::class, 'Edit_Attribute_Product']);
Route::post('/add-attribute-action', [AttributesProductController::class, 'Add_attribute_action']);
Route::post('/add-attribute-choice-action/{category_id}', [AttributesProductController::class, 'Add_attribute_choice_action']);
Route::post('/add-attribute-action-detail', [AttributesProductController::class, 'Add_attribute_action_detail']);
Route::post('/delete-attribute-action', [AttributesProductController::class, 'Delete_attribute_action']);
Route::get('/delete-list-attribute-action/{category_id}', [AttributesProductController::class, 'Delete_list_attribute_action']);
Route::post('/update-attribute-action', [AttributesProductController::class, 'Update_Attribute_Action']);

// PRODUCTS DETAIL
Route::get('/all-detail-product', [DetailProductController::class, 'Show_Detail_Product']);
Route::get('/add-detail-product/{product_idv}', [DetailProductController::class, 'Add_Detail_Product']);
Route::get('/edit-detail-product/{product_id}', [DetailProductController::class, 'Edit_Detail_Product']);
Route::get('/add-detail-product-page', [DetailProductController::class, 'Show_add_detail_product']);
Route::post('/add-detail-action/{product_id}', [DetailProductController::class, 'Add_Detail_action']);
Route::post('/update-detail-action/{product_id}', [DetailProductController::class, 'Update_Detail_action']);
Route::get('/product-details/{product_id}', [DetailProductController::class, 'Product_Details']);
Route::get('/search', [DetailProductController::class, 'search']);
Route::post('/get-data', [DetailProductController::class, 'getData'])->name('get_data');

//PRODUCT IMAGES 
Route::get('/product-images', [ProductImagesController::class, 'Show_Images']);
Route::get('/add-product-images/{product_id}', [ProductImagesController::class, 'Add_Images']);
Route::post('/upload-product-images/{product_id}', [ProductImagesController::class, 'Upload_Image_Product']);
Route::get('/delete-product-images/{product_id}', [ProductImagesController::class, 'Delete_images']);
Route::post('/delete-product-images-choice', [ProductImagesController::class, 'Delete_choice']);

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('account.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
// Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);


require __DIR__ . '/auth.php';
