<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminControllers;




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
