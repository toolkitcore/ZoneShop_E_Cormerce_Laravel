<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminControllers;
use App\Http\Controllers\AttributesProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImagesController;

// FRONTEND
Route::get('/', [HomeController::class, 'Show_Page_Home']);
Route::get('/trang-chu', [HomeController::class, 'Show_Page_Home']);
Route::get('/thong-tin', [HomeController::class, 'Show_About']);

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
Route::get('//active-product/{product_id}', [ProductController::class, 'Set_Active_product']);
Route::get('//unactive-product/{product_id}', [ProductController::class, 'Set_UnActive_product']);
Route::post('/update-product-action/{product_id}', [ProductController::class, 'Update_Product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'Delete_Product']);

// ATTRIBUTES PRODUCTS
Route::get('/all-attribute-product', [AttributesProductController::class, 'Show_Attribute_Product']);
Route::get('/add-attribute-product', [AttributesProductController::class, 'Add_Attribute_Product']);
Route::get('/edit-attribute-product/{category_id}', [AttributesProductController::class, 'Edit_Attribute_Product']);
Route::post('/add-attribute-action', [AttributesProductController::class, 'Add_attribute_action']);

Route::get('/delete-attribute-action/{category_id}', [AttributesProductController::class, 'Delete_attribute_action']); // chưa làm
Route::post('/update-attribute-action/{category_id}', [AttributesProductController::class, 'Update_attribute_action']); // chưa làm

// PRODUCTS DETAIL
Route::get('/all-detail-product', [DetailProductController::class, 'Show_Detail_Product']);
Route::get('/add-detail-product/{category_id}', [DetailProductController::class, 'Add_Detail_Product']);
Route::get('/edit-detail-product/{category_id}', [DetailProductController::class, 'Edit_Detail_Product']);
Route::post('/add-detail-action', [DetailProductController::class, 'Add_Detail_action']);
Route::get('/product-details/{product_id}', [DetailProductController::class, 'Product_Details']);
Route::get('/search', [DetailProductController::class, 'search']);
Route::post('/get-data', [DetailProductController::class, 'getData'])->name('get_data');

//PRODUCT IMAGES 
Route::get('/product-images', [ProductImagesController::class, 'Show_Images']);
Route::get('/add-product-images/{product_id}', [ProductImagesController::class, 'Add_Images']);
Route::post('/upload-product-images/{product_id}', [ProductImagesController::class, 'Upload_Image_Product']);
Route::get('/edit-product-images', [ProductImagesController::class, 'Edit_Images']);
Route::get('/delete-product-images', [ProductImagesController::class, 'Delete_images']);
