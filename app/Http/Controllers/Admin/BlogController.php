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
use App\Models\BlogComment;


// others
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class BlogController extends Controller
{
    use UploadImageTrait;
    public function index()
    {
        $data['blogs'] = Blog::paginate(10);
        return view('admin.blog.list',$data);
    }
   
    public function create()
    {
        $data['blogCategories'] = BlogCategory::where('is_active', 1)->get();
        return view('admin.blog.create',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'blog_category' => 'required|integer|exists:blog_categories,id'
        ],
        [
            'blog.required' => 'The blog name is required.',
            'image.max' => 'The image size may not be greater than 2 MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.image' => 'The image must be an image.',
            'blog_category.required' => 'The blog category is required.',
            'blog_category.exists' => 'The selected blog category is invalid.',
            'blog_category.integer' => 'The blog category must be an integer.'
        ]);

        $slug = Str::slug($request->blog);
        $blog = Blog::where('slug', $slug)->exists();
        if ($blog) {
            Toastr::error('Blog already exists.');
            return redirect()->back()->withInput();
        }
        
        DB::beginTransaction();
        try {
            $filePath = null;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filePath = $this->uploadImage($image, 'blog');
            }
            $blogSave = Blog::create([
                'name' => $request->blog,
                'blog_category_id' => $request->blog_category,
                'short_description' => trim($this->substring_without_breaking_word($request->description)),
                'description' => $request->description,
                'image' => $filePath
            ]);
            if ($blogSave) {
                DB::commit();
                Toastr::success('Blog created successfully.');
                return redirect()->route('admin.blog.index');
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
        $data['blog'] = Blog::findorfail($id);
        $data['blogCategories'] = BlogCategory::where('is_active', 1)->get();
        return view('admin.blog.create',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'blog' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'blog_category' => 'required|integer|exists:blog_categories,id'
        ],
        [
            'blog.required' => 'The blog name is required.',
            'image.max' => 'The image size may not be greater than 2 MB.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.image' => 'The image must be an image.',
            'blog_category.required' => 'The blog category is required.',
            'blog_category.exists' => 'The selected blog category is invalid.',
            'blog_category.integer' => 'The blog category must be an integer.'
        ]);
        $slug = Str::slug($request->blog);
        $blog = Blog::where('slug', $slug)->where('id', '!=', $id)->exists();
        if ($blog) {
            Toastr::error('Blog already exists.');
            return redirect()->back()->withInput();
        }


        DB::beginTransaction();
        try {

            $blog = Blog::findorfail($id);

            $blog->name = $request->blog;
            $blog->blog_category_id = $request->blog_category;
            // $blog->slug = Str::slug($request->blog);
            // $blog->short_description = trim($this->substring_without_breaking_word($request->description));
            $blog->description = $request->description;

            $blog->is_active = (int) $request->is_active;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filePath = $this->uploadImage($image, 'blog');
                $blog->image = $filePath;
            }

            $blogSave = $blog->save();          
           
            if ($blogSave) {
                DB::commit();
                Toastr::success('Blog updated successfully.');
                return redirect()->route('admin.blog.index');
            }
            else {
                DB::rollBack();
                Toastr::error('Something went wrong.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("BlogController::update");
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
            $blog = Blog::findorfail($id);
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

    function substring_without_breaking_word($text, $max_length = 500) {
        $text = strip_tags($text);
        if (strlen($text) <= $max_length) {
            return $text;
        }
        $trimmed = substr($text, 0, $max_length);
        $last_space = strrpos($trimmed, ' ');
        if ($last_space !== false) {
            $trimmed = substr($trimmed, 0, $last_space);
        }
        return $trimmed . '...';
    }
}
