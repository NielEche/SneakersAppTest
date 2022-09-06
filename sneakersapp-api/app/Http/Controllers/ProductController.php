<?php

namespace App\Http\Controllers;
use App\Models\Products;

use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function products() {
        $products =  Products::latest('created_at')->get();
        return response()->json(
            [
                'products' => $products,
                'message' => 'Products',
                'code' => 200
            ]
        );
   }


    public function saveProduct(Request $request) {
        $product = new Products();
        $product->name = $request->name;
        $product->details = $request->details;
        $product->product_attribute = $request->product_attribute;

        $product->save();
        return response()->json(
            [
                'message' => 'Product Created Successfully',
                'code' => 200
            ]
        );
    }


    public function getProduct($id) {
        $product =  Products::find($id);
        return response()->json($product);
    }



    public function deleteProduct($id) {
        $product =  Products::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                'message' => 'Contact Deleted Successfully',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => "Contact with id:$id does not exist"
            ]);
        }
   }


    public function updateProduct($id, Request $request) {
        $product =  Products::where('id', $id)->first();
        $product->name = $request->name;
        $product->details = $request->details;
        $product->product_attribute = $request->product_attribute;

        $product->save();
        return response()->json(
            [
                'message' => 'Product Updated Successfully',
                'code' => 200
            ]
        );
        return response()->json($product);
    }


}
