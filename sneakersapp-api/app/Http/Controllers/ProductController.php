<?php

namespace App\Http\Controllers;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function products() {
        $products =  Products::all();
        return response()->json(
            [
                'products' => $products,
                'message' => 'Products',
                'code' => 200
            ]
        );
   }
}
