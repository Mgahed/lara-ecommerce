<?php

namespace App\Http\Controllers;

use App\Models\Category;

class ProductController extends Controller
{
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        return view('admin.product.product_add', compact('categories'));
    }
}
