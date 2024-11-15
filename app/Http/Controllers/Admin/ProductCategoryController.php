<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Trait
use App\Traits\UploadImageTrait;
// Controllers

//models
use App\Models\ProductCategory;

// others
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class ProductCategoryController extends Controller
{
    use UploadImageTrait;
    public function index()
    {
        $data['product_categories'] = ProductCategory::paginate(10);
        return view('admin.product_category.list',$data);
    }
   
    public function create()
    {
        return view('admin.product_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_category' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'product_category.required' => 'The product category name is required.',
            'image.max' => 'The image size may not be greater than 2 MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.image' => 'The image must be an image.'
        ]);

        $slug = Str::slug($request->product_category);
        $product_category = ProductCategory::where('slug', $slug)->exists();
        if ($product_category) {
            Toastr::error('Product Category already exists.');
            return redirect()->back()->withInput();
        }
        
        DB::beginTransaction();
        try {
            $filePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filePath = $this->uploadImage($image, 'product_category');
            }
            $product_categorySave = ProductCategory::create([
                'name' => $request->product_category,
                'description' => $request->description,
                'image' => $filePath
            ]);
            if ($product_categorySave) {
                DB::commit();
                Toastr::success('Product Category created successfully.');
                return redirect()->route('admin.product-category.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("ProductCategoryController::store");
            Log::error($e);
            Toastr::error('Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product_category'] = ProductCategory::findorfail($id);
        return view('admin.product_category.create',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_category' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'product_category.required' => 'The product category name is required.',
            'image.max' => 'The image size may not be greater than 2 MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.image' => 'The image must be an image.'
        ]);
        $slug = Str::slug($request->product_category);
        $productCategory = ProductCategory::where('slug', $slug)->where('id', '!=', $id)->exists();
        if ($productCategory) {
            Toastr::error('Product Category already exists.');
            return redirect()->back()->withInput();
        }

        DB::beginTransaction();
        try {

            $productCategory = ProductCategory::findorfail($id);
            $productCategory->name = $request->product_category;
            $productCategory->description = $request->description;
            $productCategory->is_active = (int) $request->is_active;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filePath = $this->uploadImage($image, 'product_category');
                $productCategory->image = $filePath;
            }

            $productCategorySave = $productCategory->save();          
           
            if ($productCategorySave) {
                DB::commit();
                Toastr::success('Product Category updated successfully.');
                return redirect()->route('admin.product-category.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("ProductCategoryController::update");
            Log::error($e);
            Toastr::error('Something went wrong.');
            return redirect()->back()->withInput();
        }     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $productCategory = ProductCategory::findorfail($id);
            // $isBlogExists = Blog::where('blog_category_id', $id)->exists();
            // if ($isBlogExists) {
            //     return 2;
            // }
            $deleteOldImage = $this->deleteImage($productCategory->image);
            $productCategory->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("ProductCategoryController::destroy");
            Log::error($e);
            return 0;
        }
    }  
}