<?php

namespace App\Providers;

use App\Models\Category_Product;
use App\Models\Reviews;
use App\Models\Transaction;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layout'], function ($view) {
            $view->with('categories', Category_Product::whereNotNull('category_parent_id')->get());
        });
        View::composer(['admin_layout'], function ($view) {
            $view
                ->with('oder_confirm', Transaction::where('transaction_status', '=', 0)
                    ->where('transaction_payment', 'pay_offline')
                    ->count())
                ->with('oder_success', Transaction::where('transaction_status', '=', 1)
                    ->where('transaction_payment', 'pay_online')
                    ->count())
                ->with('review_product_count', Reviews::where('rating', '<=', 3)
                    ->whereDate('created_at', '=', now()->toDateString()) // Lọc theo ngày hiện tại
                    ->with(['user', 'product'])
                    ->count())
                ->with('review_product', Reviews::where('rating', '<=', 3)
                    ->whereDate('created_at', '=', now()->toDateString()) // Lọc theo ngày hiện tại
                    ->with(['user', 'product'])
                    ->get());
        });
    }
}
