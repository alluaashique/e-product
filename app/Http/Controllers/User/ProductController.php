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
    public function index(Request $request)
    {
        $data['products'] = Product::with('category', 'brand')
                ->when($request->has('search'), function ($query) use ($request) {
                    $search = $request->get('search');
                    $query->where(function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                    });
                })
                ->when($request->has('sort_by'), function ($query) use ($request) {
                    $sort_by = $request->get('sort_by');
                    if($sort_by == "name_asc")
                        $query->orderBy("name","asc");
                    if($sort_by == "name_desc")
                        $query->orderBy("name","desc");
                    if($sort_by == "price_asc")
                        $query->orderBy("price","asc");
                    if($sort_by == "price_desc")
                        $query->orderBy("price","desc");
                })
                ->when($request->has('category'), function ($query) use ($request) {
                    $category = ProductCategory::where(["slug" => $request->category, "is_active" => 1  ])->first();
                    if($category)
                        $query->where('category_id', $category->id);                   
                })
                ->where('is_active', 1)
                ->latest()
                ->paginate(12)
                ->appends($request->query());
        $data['categories'] = ProductCategory::where('is_active', 1)
                ->orderBy('name')
                ->get();
        $data['project_units'] = config('projectConfig.project_units');
        
        $data['featured_products'] = Product::with('category')
                // ->where('category_id', $data['product']->category_id)
                ->where('is_active', 1)
                ->limit(8)
                ->latest()
                ->get();                        
        return view('user.product.product', $data);
        $data['related_products'] = Product::with('category')
                ->where('category_id', $data['product']->category_id)
                ->where('is_active', 1)
                ->limit(8)
                ->latest()
                ->get();
        $data['project_units'] = config('projectConfig.project_units'); 
                
        return view('user.product.show', $data);

    }
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
    public function getBestSellerProducts(Request $request){
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
