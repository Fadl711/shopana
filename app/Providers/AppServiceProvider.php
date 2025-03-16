<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\OrderMaster;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->booted(
            function () {
        if (Schema::hasTable('cart')) {

            $countcart = Cart::where('user_id', Auth::id())->count();
            View::share('countcart', $countcart);
        }
        if (Schema::hasTable('order_master')) {

            $countorder = OrderMaster::where('user_id', Auth::id())->count();
            View::share('countorder', $countorder);
        }


            // Share categories with all views
            $categories = Category::all();
            View::share('categories', $categories);
        Schema::defaultStringLength(191);
    });
    }
}
