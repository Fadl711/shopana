<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Enums\CategoryType;

class CategoryTypeController extends Controller
{
    public function show($type)
    {
        $categoryType = CategoryType::tryFrom($type);
        if (!$categoryType) {
            abort(404);
        }

        $categories = Category::where('category_type', $type)->get();


        return view('home.category-type', [

            'categories1' => $categories
        ]);
    }
}
