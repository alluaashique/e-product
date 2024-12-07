<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\Product;



use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //getProductWithCategory
    public function getProductWithCategory(Request $request){
        $data['product'] = $request->product;
        $data['category'] = $request->category;
        return view('user.product.index', $data);
    }

    public function getProduct(Request $request){
        $product = Product::with('category', 'brand')       
                            ->when($request->has('category') && $request->category > 0, function ($query) use ($request) {
                                Log::info("fhfg");
                                return $query->where('category_id', $request->category);
                            })
                            ->where('is_active', 1)
                            ->limit(8)
                            ->latest()
                            ->get();
        return response()->json($product);
    }
    public function getFreshOrganicProducts(Request $request){
        $product = Product::with('category', 'brand')       
                            ->when($request->has('category') && $request->category > 0, function ($query) use ($request) {
                                Log::info("fhfg");
                                return $query->where('category_id', $request->category);
                            })
                            ->where('is_active', 1)
                            ->limit(8)
                            ->latest()
                            ->get();
        return response()->json($product);
    }

    
}
