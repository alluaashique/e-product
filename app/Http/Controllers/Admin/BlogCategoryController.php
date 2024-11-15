<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Trait
use App\Traits\UploadImageTrait;
// Controllers


//models
use App\Models\Blog;
use App\Models\BlogCategory;


// others
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class BlogCategoryController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $data['blogCategories'] = BlogCategory::paginate(10);
        return view('admin.blog_category.list',$data);
    }
   
    public function create()
    {
        return view('admin.blog_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'blogcategory' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ],
        [
            'blogcategory.required' => 'The blog category name is required.',
            'image.max' => 'The image size may not be greater than 2 MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.image' => 'The image must be an image.'
        ]);

        $slug = Str::slug($request->blogcategory);
        $blog = BlogCategory::where('slug', $slug)->exists();
        if ($blog) {
            Toastr::error('Blog already exists.');
            return redirect()->back()->withInput();
        }
        
        DB::beginTransaction();
        try {
            $filePath = null;           
            $filePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filePath = $this->uploadImage($image, 'blog_category');
            }
            $blogCategorySave = BlogCategory::create([
                'name' => $request->blogcategory,
                'description' => $request->description,
                'image' => $filePath
            ]);
            if ($blogCategorySave) {
                DB::commit();
                Toastr::success('Blog created successfully.');
                return redirect()->route('admin.blog.category.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("BlogCategoryController::store");
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
        $data['blogCategory'] = BlogCategory::findorfail($id);
        return view('admin.blog_category.create',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'blogcategory' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ],
        [
            'blogcategory.required' => 'The blog category name is required.',
            'image.max' => 'The image size may not be greater than 2 MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.image' => 'The image must be an image.'
        ]);
        $slug = Str::slug($request->blog);
        $blog = BlogCategory::where('slug', $slug)->where('id', '!=', $id)->exists();
        if ($blog) {
            Toastr::error('Blog Category already exists.');
            return redirect()->back()->withInput();
        }


        DB::beginTransaction();
        try {

            $blog = BlogCategory::findorfail($id);

            $blog->name = $request->blogcategory;
            // $blog->slug = Str::slug($request->blog);
            // $blog->short_description = trim($this->substring_without_breaking_word($request->description));
            $blog->description = $request->description;

            $blog->is_active = (int) $request->is_active;

            if ($request->hasFile('image')) {
                $deleteOldImage = $this->deleteImage($blog->image);
                $image = $request->file('image');
                $filePath = $this->uploadImage($image, 'blog_category');                
                $blog->image = $filePath;
            }

            $blogSave = $blog->save();          
           
            if ($blogSave) {
                DB::commit();
                Toastr::success('Blog updated successfully.');
                return redirect()->route('admin.blog.category.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("BlogCategoryController::update");
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
            $blog = BlogCategory::findorfail($id);
            $isBlogExists = Blog::where('blog_category_id', $id)->exists();
            if ($isBlogExists) {
                return 2;
            }
            $deleteOldImage = $this->deleteImage($blog->image);
            $blog->delete();
            DB::commit();
            return 1;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("BlogController::destroy");
            Log::error($e);
            return 0;
        }
    }
}
