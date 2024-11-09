<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\BlogComment;


use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? null;
        $data['blogs'] = Blog::with('blogCategory')
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        return view('user.blogs.list',$data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $id = Blog::where(['slug' => $slug, 'is_active' => 1])->first()->id ?? 0;
        // $data['blog'] = Blog::with('blogCategory','blogComment')->findorfail($id);
        $data['blog'] = Blog::with('blogCategory')->findOrFail($id);
        $data['blogComments'] = $data['blog']->blogComment()->orderBy('id', 'desc')->paginate(10);
        // return   $data['blog'];
        $data['prev_blog'] = Blog::where('id', '<', $id)->where('is_active', 1)->orderBy('id', 'desc')->first();
        $data['next_blog'] = Blog::where('id', '>', $id)->where('is_active', 1)->orderBy('id', 'asc')->first();
        return view('user.blogs.show_blogs',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function blogCommentStore(Request $request, string $encryptId)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'comment' => 'required|max:1000',
        ],
        [
            'name.required' => 'The name is required.',
            'name.max' => 'The name must not be greater than 255 characters.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'comment.required' => 'The comment is required.',
            'comment.max' => 'The comment must not be greater than 1000 characters.',
        ]);

        DB::beginTransaction();
        try {
            $id = Crypt::decrypt($encryptId);
            $blog = Blog::where(['id' => $id,'is_active' => 1])->first();
            if(!$blog){
                Toastr::error('Blog not found.');
                return redirect()->back();
            }
            $blogComment = new BlogComment;
            $blogComment->blog_id = $blog->id;
            $blogComment->blog_comment_id = $request->blog_comment_id;
            $blogComment->name = $request->name;
            $blogComment->email = $request->email;
            $blogComment->comment = $request->comment;
            $blogComment->save();
            DB::commit();
            Toastr::success('Comment added successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("BlogController::blogCommentStore");
            Log::error($e);
            return redirect()->back();
        }
    }
}
