<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Trait
use App\Traits\UploadImageTrait;
// Controllers

//models
use App\Models\Brand;

// others
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class BrandController extends Controller
{
    use UploadImageTrait;
    public function index()
    {
        $data['brands'] = Brand::paginate(10);
        return view('admin.brand.list',$data);
    }
   
    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'brand.required' => 'The brand name is required.',
            'image.max' => 'The image size may not be greater than 2 MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.image' => 'The image must be an image.'
        ]);

        $slug = Str::slug($request->brand);
        $brand = Brand::where('slug', $slug)->exists();
        if ($brand) {
            Toastr::error('Brand already exists.');
            return redirect()->back()->withInput();
        }
        
        DB::beginTransaction();
        try {
            $filePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filePath = $this->uploadImage($image, 'brand');
            }
            $brandSave = Brand::create([
                'name' => $request->brand,
                'description' => $request->description,
                'image' => $filePath
            ]);
            if ($brandSave) {
                DB::commit();
                Toastr::success('Brand created successfully.');
                return redirect()->route('admin.brand.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("BrandController::store");
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
        $data['brand'] = Brand::findorfail($id);
        return view('admin.brand.create',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brand' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'brand.required' => 'The brand name is required.',
            'image.max' => 'The image size may not be greater than 2 MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.image' => 'The image must be an image.'
        ]);
        $slug = Str::slug($request->brand);
        $brand = Brand::where('slug', $slug)->where('id', '!=', $id)->exists();
        if ($brand) {
            Toastr::error('Brand already exists.');
            return redirect()->back()->withInput();
        }

        DB::beginTransaction();
        try {

            $brand = Brand::findorfail($id);
            $brand->name = $request->brand;
            $brand->description = $request->description;
            $brand->is_active = (int) $request->is_active;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filePath = $this->uploadImage($image, 'brand');
                $brand->image = $filePath;
            }

            $brandSave = $brand->save();          
           
            if ($brandSave) {
                DB::commit();
                Toastr::success('Brand updated successfully.');
                return redirect()->route('admin.brand.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("BrandController::update");
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
            $brand = Brand::findorfail($id);
            $brand->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("BrandController::destroy");
            Log::error($e);
            return 0;
        }
    }    
}