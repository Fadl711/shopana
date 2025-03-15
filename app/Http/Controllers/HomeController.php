<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderMaster;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Share cart and order counts
            if (Auth::check()) {
                $countcart = Cart::where('user_id', Auth::id())->count();
                $countorder = OrderMaster::where('user_id', Auth::id())->count();
                View::share('countcart', $countcart);
                View::share('countorder', $countorder);
            }

            // Share categories with all views
            $categories = Category::all();
            View::share('categories', $categories);

            return $next($request);
        });
    }

    public function index()
    {
        // Fetch products based on the selected category (default is "All")
        $selectedCategory = request()->query('category', 'All');
        
        $product = Products::paginate(12);
        if ($selectedCategory !== 'All') {
            $category = Category::where('name', $selectedCategory)->firstOrFail();
            $product = Products::where('category_id', $category->id)->paginate(12);
        }

        return view('home.userpage', compact('product', 'selectedCategory'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('admin.home');
        } else {
            return $this->index();
        }
    }
}
