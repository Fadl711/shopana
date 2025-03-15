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
        $countcart = Cart::where('user_id', Auth::id())->count();
        $countorder = OrderMaster::where('user_id', Auth::id())->count();
        View::share('countcart', $countcart);
        View::share('countorder', $countorder);


            // Share categories with all views
            $categories = Category::all();
            View::share('categories', $categories);
        Schema::defaultStringLength(191);
    }
}
