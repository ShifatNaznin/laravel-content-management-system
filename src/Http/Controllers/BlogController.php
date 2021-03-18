<?php

namespace Cms\Cmsblog\Http\Controllers;

use Cms\Cmsblog\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Cms\Cmsblog\Models\Base;
use Cms\Cmsblog\Models\Blog;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function all_blog_post()
    {
        $b=Blog::orderBy('id', 'DESC')->get();
        return view('cmsblog::admin.blog.blog-post', compact('b'));
    }
    public function blog_post()
    {
        return view('cmsblog::admin.blog.blog-post-add');
    }

    public function add_blog_post(Request $request)
    {
        $post = new Blog;
        $post->category = $request->category;
        $post->subcategory = $request->subcategory;
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->author = $request->author;
        $post->description = $request->description;
        $post->post_color = $request->post_color;
        $post->post_status = $request->post_status;
        $post->post_tag = $request->post_tag;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = Storage::put('images/', $file);
            $post->photo = $path;
        }
     
        $post->save();

        if ($post) {
            return redirect()->route('all_blog_post')->with('success', 'value');
        } else {
            return back()->with('error', 'value');
        }
    }


    public function view_blog_post(Request $request, $id)
    {
        $data = Blog::find($id);

        return view('cmsblog::admin.blog.blog-post-view',compact('data'));
    }
    public function edit_blog_post(Request $request, $id)
    {
        $data = Blog::find($id);

        return view('cmsblog::admin.blog.blog-post-edit',compact('data'));
    }
    
    public function update_blog_post(Request $request)
    {
     
        $post = Blog::find($request->id);
        $post->category = $request->category;
        $post->subcategory = $request->subcategory;
        $post->title = $request->title;
        $post->sub_title = $request->sub_title;
        $post->author = $request->author;
        $post->description = $request->description;
        $post->post_color = $request->post_color;
        $post->post_status = $request->post_status;
        $post->post_tag = $request->post_tag;
        
        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('images/'.$post->photo)) Storage::disk('public')->delete('images/'.$post->photo);
            $file = $request->file('photo');
            $path = Storage::put('images/', $file);
            $post->photo = $path;
        }
        
        // dd( $post->save());
        $post->save();
        if ($post) {
            return back()->with('success', 'value');
        } else {
            return back()->with('error', 'value');
        }
    }
    public function delete_blog_post(Request $request, $id)
    {
        $data = Blog::findOrFail($id);

        $data->delete();
        // $data->save();
        if ($data) {
            return back()->with('success-two', 'value');
        } else {
            return back()->with('error', 'value');
        }
    }

}
