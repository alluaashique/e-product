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

    public function show(string $id)
    { 
        $data['product'] = Product::with('category', 'brand','specification', 'specification.values')
                ->where('is_active', 1)
                ->where('uuid', $id)
                ->firstOrfail();
        $data['related_products'] = Product::with('category')
                ->where('category_id', $data['product']->category_id)
                ->where('is_active', 1)
                ->limit(8)
                ->latest()
                ->get();
        $data['featured_products'] = Product::with('category')
                ->where('category_id', $data['product']->category_id)
                ->where('is_active', 1)
                ->limit(8)
                ->latest()
                ->get();
        $data['categories'] = ProductCategory::where('is_active', 1)
                ->orderBy('name')
                ->get();
        $data['project_units'] = config('projectConfig.project_units'); 
                
        return view('user.product.show', $data);

    }

    
}
