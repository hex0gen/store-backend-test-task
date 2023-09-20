<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;

class ProductController extends Controller
{
    public function list()
    {
        return response()->json(Product::all());
    }
}
