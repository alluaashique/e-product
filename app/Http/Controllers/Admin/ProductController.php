<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Trait
use App\Traits\UploadImageTrait;
// Controllers

//models
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductCategory;


// others
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    use UploadImageTrait;
    public function index()
    {
        $data['products'] = Product::paginate(10);
        return view('admin.products.list',$data);
    }
   
    public function create()
    {
        $data['brands'] = Brand::get();
        $data['categories'] = ProductCategory::get();
        $data['project_units'] = config('projectConfig.project_units');        
        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'required|exists:brands,id',  
            'name' => 'required|max:255',
            'unit' => 'required|integer',
            'price' => 'required',
            // 'quantity' => 'required',           
            // 'description' => 'required',
            // 'packaging' => 'required',
            // 'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'name.required' => 'The product name is required.',
            'category_id.required' => 'The category is required.',
            'category_id.integer' => 'The category must be integer.',
            'category_id.exists' => 'The category must be exist.',           
            'brand_id.required' => 'The brand is required.',
            'brand_id.integer' => 'The brand must be integer.',
            'brand_id.exists' => 'The brand must be exist.',
            'unit.required' => 'The unit is required.',
            'unit.integer' => 'The unit must be integer.',
            'quantity.required' => 'The product name is required.',
            'price.required' => 'The price is required.',
            'image.max' => 'The image size may not be greater than 2 MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.image' => 'The image must be an image.'
        ]);
       
        DB::beginTransaction();
        try {
            $filePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filePath = $this->uploadImage($image, 'product');
            }
            $productSave = Product::create([
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'name' => $request->name,
                'unit' => $request->unit,
                'quantity' => $request->quantity,
                'packaging' => $request->packaging,
                'stock' => $request->stock ?? 0,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $filePath,
                'is_active' => 1
            ]);
            if ($productSave) {
                DB::commit();
                Toastr::success('Product created successfully.');
                return redirect()->route('admin.product.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("ProductController::store");
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
        $data['product'] = Product::findorfail($id);
        $data['brands'] = Brand::get();
        $data['categories'] = ProductCategory::get();
        $data['project_units'] = config('projectConfig.project_units');
        return view('admin.products.create',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'required|exists:brands,id',  
            'name' => 'required|max:255',
            'unit' => 'required|integer',
            'price' => 'required',
            // 'quantity' => 'required',           
            // 'description' => 'required',
            // 'packaging' => 'required',
            // 'stock' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'name.required' => 'The product name is required.',
            'category_id.required' => 'The category is required.',
            'category_id.integer' => 'The category must be integer.',
            'category_id.exists' => 'The category must be exist.',           
            'brand_id.required' => 'The brand is required.',
            'brand_id.integer' => 'The brand must be integer.',
            'brand_id.exists' => 'The brand must be exist.',
            'unit.required' => 'The unit is required.',
            'unit.integer' => 'The unit must be integer.',
            'quantity.required' => 'The product name is required.',
            'price.required' => 'The price is required.',
            'image.max' => 'The image size may not be greater than 2 MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.image' => 'The image must be an image.'
        ]);
       
        DB::beginTransaction();
        try {
            
            $product = Product::findorfail($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filePath = $this->uploadImage($image, 'product');
                
                $product->image = $filePath;
            }
         
            
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->name = $request->name;
            $product->unit = $request->unit;
            $product->quantity = $request->quantity;
            $product->packaging = $request->packaging;
            $product->stock = $request->stock ?? 0;
            $product->price = $request->price;
            $product->description = $request->description;           
            $product->is_active = (int) $request->is_active;
            $productSave = $product->save();
            if ($productSave) {
                DB::commit();
                Toastr::success('Product updated successfully.');
                return redirect()->route('admin.product.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("ProductController::update");
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
            $product = Product::findorfail($id);
            // $isBlogExists = Blog::where('blog_category_id', $id)->exists();
            // if ($isBlogExists) {
            //     return 2;
            // }
            $deleteOldImage = $this->deleteImage($product->image);
            $product->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("ProductController::destroy");
            Log::error($e);
            return 0;
        }
    }  
}