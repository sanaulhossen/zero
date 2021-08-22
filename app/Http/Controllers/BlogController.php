<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Blog;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    //AUTH MIDDLEWARE HERE
    public function __construct()
    {
        $this->middleware('auth');
    }

    //BLOG DATA SHOW TABLE
    public function indexBlog()
    {
        return view('admin.blog.index_blog',[
            'blogs'         => Blog::latest()->paginate(5)
        ]);
    }

    //BLOG ADD METHOD
    public function addBlog()
    {
        return view('admin.blog.add_blog', [
            'categories'        => Category::all(),
        ]);
    }

    //BLOG DATA STORE METHOD
    public function storeBlog(Request $request)
    {
        $request->validate([
            'category_id'           => 'required:blogs,category_id,',
            'blog_title'            => 'required:blogs,blog_title,',
            'blog_description'      => 'required:blogs,blog_description,',
            'tags'                  => 'required:blogs,tags,',
            'blog_photo'            => 'required|image|mimes:jpeg,png,jpg|max:2048:blogs,blog_photo,',
        ]);

        $slug_link = Str::slug($request->blog_title . "-" . Str::random(5));

        $blog_id = Blog::insertGetId($request->except('_token', 'blog_photo', 'tags') + [
            'created_at'    => Carbon::now(),
            'user_id'       => Auth::id(),
            'slug'          => $slug_link,
            'category_id'   => $request->category_id
        ]);

        if ($request->hasFile('blog_photo')) {
            $uploaded_photo = $request->file('blog_photo');
            $new_photo_name = $blog_id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = 'public/dashbord/image/blog_image/' . $new_photo_name;

            Image::make($uploaded_photo)->resize(770, 350)->save(base_path($new_photo_location));
            Blog::find($blog_id)->update([
                'blog_photo'   => $new_photo_name
            ]);
        }

        $stringTags = explode(',', $request->tags);
        foreach ($stringTags as $tag) {
            Tag::insert([
                'name'          => $tag,
                'blog_id'       => $blog_id,
                'created_at'    => Carbon::now(),
            ]);
        }

        return back()->with('success_status', 'Your slider added successfully!');
    }

    //BLOG EDIT DATA
    public function editBlog($id)
    {
        return view('admin.blog.edit_blog', [
            'blog'              => Blog::find($id),
            'categories'        => Category::all(),
        ]);
    }

    //UPDATE BLOG DATA
    public function updateBlog(Request $request, $id)
    {
        $request->validate([
            'category_id'           => 'required',
            'blog_title'            => 'required',
            'blog_description'      => 'required',
        ]);

        Blog::find($id)->update([
            'category_id'           => $request->category_id,
            'blog_title'            => $request->blog_title,
            'blog_description'      => $request->blog_description
        ]);

        if ($request->hasFile('blog_photo')) {

            if (Blog::findOrFail($id)->blog_photo != 'default.png') {
                unlink(base_path('public/dashbord/image/blog_image/') . Blog::findOrFail($id)->blog_photo);
            }

            $file_name = $id . '.' . $request->file('blog_photo')->getClientOriginalExtension();
            Image::make($request->file('blog_photo'))->resize(770, 350)->save(base_path('public/dashbord/image/blog_image/' . $file_name));
            Blog::find($id)->update([
                'blog_photo'   => $file_name
            ]);
        }
        return back()->with('success_status', 'slider updated Successfully!');
    }

    //DELETE BLOG FROM DB
    public function deleteBlog($id)
    {
        $getblog = Blog::find($id)->first();
        unlink(public_path('dashbord/image/blog_image/' . $getblog->blog_photo));
        Blog::find($id)->forceDelete();
        return back()->with('success_status', 'Your category permanently deleted!!');
    }

    //BLOG FEATURE ACTIVE
    public function activeblog($id){
        Blog::find($id)->update([
            'status'   => 2
        ]);
        return back()->with('activeblog', 'slider updated Successfully!');
    }

    //BLOG FEATURE ACTIVE
    public function deactiveblog($id){
        Blog::find($id)->update([
            'status'   => 1
        ]);
        return back()->with('deactiveblog', 'slider updated Successfully!');
    }
}
