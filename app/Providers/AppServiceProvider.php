<?php

namespace App\Providers;

use App\Models\Category_Product;
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
    }
}
