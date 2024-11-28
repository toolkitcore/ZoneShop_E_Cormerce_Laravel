<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AdminControllers;
use App\Http\Controllers\AttributesProductController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PosterHomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImagesController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SliderHomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Mail\ContactMail;
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

Route::get('/address-user', [AddressController::class, 'Show_address']);
Route::post('/save-address', [AddressController::class, 'Save_address'])->name('add.user');
Route::get('/edit-address-user', [AddressController::class, 'Edit_address']);
Route::post('/update-address', [AddressController::class, 'Update_address']);

//CHECKOUT
Route::get('/show-checkout', [OrderController::class, 'Show_checkout'])->name('show_checkout');
Route::post('/process-checkout', [OrderController::class, 'Process_checkout'])->name('process_checkout');
Route::post('/shipping/calculate', [OrderController::class, 'calculateFee'])->name('calculate_shipping');
Route::get('/checkout-success', [OrderController::class, 'Checkout_Success'])->name('checkout_success');
Route::get('/checkout-confirm-page', [OrderController::class, 'Checkout_Confirm'])->name('checkout_confirm');
Route::get('/checkout-confirm', [CheckoutController::class, 'vnpay_confirm']);
Route::get('/checkout-pay', [OrderController::class, 'Checkout_Pay'])->name('checkout_pay');
Route::post('/pay-online', [CheckoutController::class, 'vnpay_payment'])->name('pay-online');
Route::get('/pay-online-retry/{transaction_id}', [CheckoutController::class, 'vnpay_payment_retry'])->name('pay-online-retry');

//Order detail
Route::get('/view-order-detail/{transaction_id}', [OrderController::class, 'Show_Order_Detail_fe']);


Route::get('/checkout-success', function () {
    return view('pages.checkout.checkout_success');
})->name('checkout.success');

Route::get('/checkout-failed', function () {
    return view('pages.checkout.checkout_failed');
})->name('checkout.failed');



// BLOG
Route::get('/blog', [PostController::class, 'Show_Blog']);
Route::get('/blog-detail/{id}', [PostController::class, 'Show_Blog_Detail']);

// COMMENT
Route::post('/send-message', [CommentController::class, 'Send_Comment'])->name('send_comment');

// CONTACT
Route::post('/contact', function (Illuminate\Http\Request $request) {
    $details = [
        'name' => $request->input('name'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'message' => $request->input('message')
    ];

    Mail::to('hoangductrinh2k5@gmail.com')->send(new ContactMail($details));

    return response()->json([
        'success' => 'Email sent successfully!',
    ]);
})->name('contact');

// REVIEWS PRODUCT
Route::get('/show-review/{transaction_id}', [ReviewsController::class, 'Show_review']);
Route::post('/submit-review', [ReviewsController::class, 'Store_Review'])->name('product.review.store');






// Route::get('/', function () {
//     return view('trang-chu');
// });

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

// Route admin
Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    //BACKEND
    // Route::get('/admin', [AdminControllers::class, 'index']);
    Route::get('/dashboard', [AdminControllers::class, 'index'])->name('admin.dashboard');
    // Route::get('/dashboard', [AdminControllers::class, 'index']);
    Route::post('/admin-dashboard', [AdminControllers::class, 'Dashboard']);
    Route::get('/log-out', [AdminControllers::class, 'Logout']);
    Route::get('/profile-admin', [AdminControllers::class, 'Show_profile']);

    //CATEGORY PRODUCTS
    Route::get('/all-category-product', [CategoryController::class, 'Show_Category'])->middleware('permission:publish category');
    Route::group(['middleware' => ['permission:add category']], function () {
        Route::get('/add-category-product', [CategoryController::class, 'Add_Category']);
        Route::post('/add-category-action', [CategoryController::class, 'Add_Category_Action']);
    });
    Route::get('/delete-category-product/{category_id}', [CategoryController::class, 'Delete_Category_product'])->middleware('permission:delete category');
    Route::group(['middleware' => ['permission:edit category']], function () {
        Route::get('/edit-category-product/{caterory_id}', [CategoryController::class, 'Edit_Category_product']);
        Route::post('/update-category-action/{caterory_id}', [CategoryController::class, 'Update_Category_product']);
        Route::get('/active-category-product/{caterory_id}', [CategoryController::class, 'Set_Active_category_product']);
        Route::get('/unactive-category-product/{caterory_id}', [CategoryController::class, 'Set_UnActive_category_product']);
        Route::get('/filter-category-root', [CategoryController::class, 'Filter_Category_Root']);
    });

    //BRAND PRODUCTS
    Route::get('/all-brand-product', [BrandController::class, 'Show_Brand'])->middleware('permission:publish brand');

    Route::group(['middleware' => ['permission:add brand']], function () {
        Route::get('/add-brand-product', [BrandController::class, 'Add_Brand']);
        Route::post('/add-brand-action', [BrandController::class, 'Add_Brand_Action']);
    });
    Route::get('/delete-brand-product/{brand_id}', [BrandController::class, 'Delete_Brand_product'])->middleware('permission:delete brand');
    Route::group(['middleware' => ['permission:edit brand']], function () {
        Route::get('/edit-brand-product/{brand_id}', [BrandController::class, 'Edit_Brand_product']);
        Route::post('/update-brand-action/{brand_id}', [BrandController::class, 'Update_Brand_product']);
        Route::get('/active-brand-product/{brand_id}', [BrandController::class, 'Set_Active_Brand_product']);
        Route::get('/unactive-brand-product/{brand_id}', [BrandController::class, 'Set_UnActive_Brand_product']);
    });

    // PRODUCTS
    Route::get('/all-product', [ProductController::class, 'Show_Product'])->middleware('permission:publish product');
    Route::group(['middleware' => ['permission:add product']], function () {
        Route::get('/add-product', [ProductController::class, 'Add_Product']);
        Route::post('/add-product-action', [ProductController::class, 'Add_Product_Action']);
    });
    Route::group(['middleware' => ['permission:edit product']], function () {
        Route::get('/edit-product/{product_id}', [ProductController::class, 'Edit_Product']);
        Route::get('/active-product/{product_id}', [ProductController::class, 'Set_Active_product']);
        Route::get('/unactive-product/{product_id}', [ProductController::class, 'Set_UnActive_product']);
        Route::post('/update-product-action/{product_id}', [ProductController::class, 'Update_Product']);
    });
    Route::get('/delete-product/{product_id}', [ProductController::class, 'Delete_Product'])->middleware('permission:delete product');

    // ATTRIBUTES PRODUCTS
    Route::get('/all-attribute-product', [AttributesProductController::class, 'Show_Attribute_Product'])->middleware('permission:publish product attribute');
    Route::group(['middleware' => ['permission:add product']], function () {
        Route::get('/add-attribute-product', [AttributesProductController::class, 'Add_Attribute_Product']);
        Route::get('/add-attribute-choice/{category_id}', [AttributesProductController::class, 'Add_Attribute_Choice']);
        Route::post('/add-attribute-action', [AttributesProductController::class, 'Add_attribute_action']);
        Route::post('/add-attribute-choice-action/{category_id}', [AttributesProductController::class, 'Add_attribute_choice_action']);
        Route::post('/add-attribute-action-detail', [AttributesProductController::class, 'Add_attribute_action_detail']);
    });
    Route::group(['middleware' => ['permission:edit product attribute']], function () {
        Route::get('/edit-attribute-product/{category_id}', [AttributesProductController::class, 'Edit_Attribute_Product']);
        Route::post('/update-attribute-action', [AttributesProductController::class, 'Update_Attribute_Action']);
    });
    Route::group(['middleware' => ['permission:delete product attribute']], function () {
        Route::post('/delete-attribute-action', [AttributesProductController::class, 'Delete_attribute_action']);
        Route::get('/delete-list-attribute-action/{category_id}', [AttributesProductController::class, 'Delete_list_attribute_action']);
    });

    // PRODUCTS DETAIL
    Route::group(['middleware' => ['permission:publish product detail']], function () {
        Route::get('/all-detail-product', [DetailProductController::class, 'Show_Detail_Product'])->middleware('permission:publish product detail');
        Route::get('/product-details/{product_id}', [DetailProductController::class, 'Product_Details']);
        Route::get('/search', [DetailProductController::class, 'search']);
        Route::post('/get-data', [DetailProductController::class, 'getData'])->name('get_data');
    });
    Route::group(['middleware' => ['permission:add product attribute']], function () {
        Route::get('/add-detail-product/{product_id}', [DetailProductController::class, 'Add_Detail_Product']);
        Route::get('/add-detail-product-page', [DetailProductController::class, 'Show_add_detail_product']);
        Route::post('/add-detail-action/{product_id}', [DetailProductController::class, 'Add_Detail_action']);
    });
    Route::group(['middleware' => ['permission:edit product attribute']], function () {
        Route::get('/edit-detail-product/{product_id}', [DetailProductController::class, 'Edit_Detail_Product']);
        Route::post('/update-detail-action/{product_id}', [DetailProductController::class, 'Update_Detail_action']);
    });

    //PRODUCT IMAGES

    Route::get('/product-images', [ProductImagesController::class, 'Show_Images'])->middleware('permission:publish product image');
    Route::group(['middleware' => ['permission:add product image']], function () {
        Route::get('/add-product-images/{product_id}', [ProductImagesController::class, 'Add_Images']);
        Route::post('/upload-product-images/{product_id}', [ProductImagesController::class, 'Upload_Image_Product']);
    });
    Route::group(['middleware' => ['permission:delete product image']], function () {
        Route::get('/delete-product-images/{product_id}', [ProductImagesController::class, 'Delete_images']);
        Route::post('/delete-product-images-choice', [ProductImagesController::class, 'Delete_choice']);
    });



    //ADDRESS PICKUP
    Route::get('/address-pickup', [AddressController::class, 'Show_Address_Pickup'])->name('show_address_pickup')->middleware('permission:publish order address');
    Route::post('/add-address-pickup', [AddressController::class, 'addAddress'])->name('add_address_pickup')->middleware('permission:edit order address');
    Route::post('/delete-address', [AddressController::class, 'DeleteAddress'])->name('delete_address')->middleware('permission:edit order address');


    //ORDERS
    // Route::get('/show-order', [OrderController::class, 'Show_Order'])->name('show_order');
    Route::group(['middleware' => ['permission:publish order list']], function () {
        Route::get('/all-order', [OrderController::class, 'Show_All_Order'])->name('all_order');
        Route::get('/order-confirm', [OrderController::class, 'Order_Confirm'])->name('order_confirm');
        Route::get('/order-detail/{transaction_id}', [OrderController::class, 'Order_Detail'])->name('order_detail');
    });

    Route::group(['middleware' => ['permission:edit order list']], function () {
        Route::get('/confirm-order/{transaction_id}', [TransactionController::class, 'Confirm_Order']);
        Route::get('/confirm-package/{transaction_id}', [TransactionController::class, 'Confirm_Package']);
        Route::get('/confirm-ship/{transaction_id}', [TransactionController::class, 'Confirm_Ship']);
        Route::get('/confirm-completed/{transaction_id}', [TransactionController::class, 'Confirm_Completed']);
        Route::get('/cancel-order/{transaction_id}', [TransactionController::class, 'Cancel_Order']);
        // ORDERS->INVOICES
        Route::get('/order/invoice/{transaction_id}', [OrderController::class, 'View_Invoice']);
        Route::get('/order/invoice/{transaction_id}/generate', [OrderController::class, 'Download_Invoice']);
        Route::get('/order/invoice/{transaction_id}/mail', [OrderController::class, 'Send_Invoice']);
    });


    // POST
    Route::group(['middleware' => ['permission:publish blog']], function () {
        Route::get('/list-post', [PostController::class, 'Show_List_Post'])->name('posts');
        Route::get('/post-details/{id}', [PostController::class, 'Detail_Post']);
    });
    Route::group(['middleware' => ['permission:add blog']], function () {
        Route::get('/add-post', [PostController::class, 'Add_Post']);
        Route::post('/action-add-post', [PostController::class, 'Add_Post_Action'])->name('posts.store');
    });
    Route::get('/edit-post', [PostController::class, 'Edit_Post'])->middleware('permission:edit blog');
    Route::get('/delete-post/{id}', [PostController::class, 'Delete_Post'])->middleware('permission:delete blog');


    //SLIDER HOME

    Route::get('/all-sliders', [SliderHomeController::class, 'All_Slider'])->middleware('permission:publish slider');
    Route::group(['middleware' => ['permission:add slider']], function () {
        Route::get('/add-sliders', [SliderHomeController::class, 'Add_Slider']);
        Route::post('/add-slider-action', [SliderHomeController::class, 'Add_Slider_Action']);
    });
    Route::get('/delete-slider/{id}', [SliderHomeController::class, 'Delete_Slider'])->middleware('permission:delete slider');

    // POSTER HOME 
    Route::group(['middleware' => ['permission:publish poster']], function () {
        Route::get('/active-poster/{id}', [PosterHomeController::class, 'Set_Active_Poster']);
        Route::get('/unactive-poster/{id}', [PosterHomeController::class, 'Set_UnActive_Poster']);
        Route::get('/all-poster', [PosterHomeController::class, 'All_Poster']);
    });
    Route::group(['middleware' => ['permission:add poster']], function () {
        Route::get('/add-poster', [PosterHomeController::class, 'Add_Poster']);
        Route::post('/add-poster-action', [PosterHomeController::class, 'Add_Poster_Action']);
    });
    Route::get('/delete-poster/{id}', [PosterHomeController::class, 'Delete_Poster'])->middleware('permission:delete poster');


    // REVIEW PRODUCT
    Route::group(['middleware' => ['permission:publish review']], function () {
        Route::get('/review-product', [ReviewsController::class, 'Show_Review_Product']);
        Route::get('/active-review/{id}', [ReviewsController::class, 'Set_Active_Review']);
        Route::get('/unactive-review/{id}', [ReviewsController::class, 'Set_UnActive_Review']);
    });
    Route::get('/delete-review/{id}', [ReviewsController::class, 'Delete_Review'])->middleware('permission:delete review');

    // FEEDBACK
    Route::group(['middleware' => ['permission:publish feedback']], function () {
        Route::get('/all-feedback', [ReviewsController::class, 'Show_FeedBack']);
        Route::get('/set-active-feedback/{id}', [ReviewsController::class, 'Set_Active_Feedback']);
        Route::get('/set-unactive-feedback/{id}', [ReviewsController::class, 'Set_UnActive_Feedback']);
    });
    Route::get('/add-feedback', [ReviewsController::class, 'Add_FeedBack'])->middleware('permission:add feedback');
    Route::get('/delete-feedback/{id}', [ReviewsController::class, 'Delete_Feedback'])->middleware('permission:delete feedback');

    // CUSTOMERS
    Route::group(['middleware' => ['permission:publish order list']], function () {
        Route::get('/show-customer', [CustomerController::class, 'Show_Customer']);
        Route::get('/detail-customer/{id}', [CustomerController::class, 'Show_Customer_Detail']);
    });

    // AUTHORIZATION
    Route::group(['middleware' => ['role:admin']], function () {
        // ACCOUNT
        Route::get('/all-account', [AdminControllers::class, 'Show_Account']);
        Route::get('/add-account', [AdminControllers::class, 'Add_Account']);
        Route::post('/add-account-action', [AdminControllers::class, 'Add_Account_Action']);
        Route::get('/roles-to-account/{id}', [AdminControllers::class, 'Add_Role_Account']);
        Route::post('/role-account-action/{id}', [AdminControllers::class, 'Add_Role_Account_Action']);
        Route::get('/delete-account/{id}', [AdminControllers::class, 'Delete_Account_Action']);
        Route::get('/active-account/{id}', [AdminControllers::class, 'Set_Active_Account']);
        Route::get('/unactive-account/{id}', [AdminControllers::class, 'Set_UnActive_Account']);


        // ROLE
        Route::get('/all-roles', [AuthorizationController::class, 'Show_All_Roles']);
        Route::get('/detail-roles/{id}', [AuthorizationController::class, 'Detail_Roles']);
        Route::get('/add-roles', [AuthorizationController::class, 'Add_Roles']);
        Route::post('/add-roles-action', [AuthorizationController::class, 'Add_Roles_Action']);
        Route::get('/delete-roles-action/{id}', [AuthorizationController::class, 'Delete_Roles']);
        Route::get('/edit-roles-action/{id}', [AuthorizationController::class, 'Update_Roles']);
        Route::post('/update-roles-action/{id}', [AuthorizationController::class, 'Update_Roles_Action']);

        // PERMISSION
        Route::get('/all-permission', [AuthorizationController::class, 'Show_Permissions']);
    });
});
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('account.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
require __DIR__ . '/adminauth.php';
Route::get('/home', [UserController::class, 'index']);

Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('login-google');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback']);
