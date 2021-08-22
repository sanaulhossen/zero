<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use App\Slider;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    //FRONT PAGE
    public function index(){

        $feature = Blog::where('status', 2)->limit(3)->get();
        $top_views = Blog::where('view', '>', 1)->orderBy('view', 'DESC')->limit(3)->get();

        return view('frontend.index',[
            'sliders'       => Slider::all(),
            'latest_blogs'  => Blog::latest()->paginate(5),
            'feature_blogs' => $feature,
            'top_views'     => $top_views,
            'categories'    => Category::all(),
            'admin'         => User::where('role', 1)->get()
        ]);
    }


    //BLOG DETAILS FROM SLUG
    function blogdetails($slug)
    {

        $blog_info = Blog::where('slug', $slug)->firstOrFail();
        $related_blogs = Blog::where('category_id', $blog_info->category_id)->where('id', '!=', $blog_info->id)->limit(4)->get();
        $top_views = Blog::where('view', '>', 1)->orderBy('view', 'DESC')->limit(5)->get();
        $recent = Blog::latest()->limit(5)->get();
        $comments = Comment::all();

        $view = $blog_info->view;
        $view++;

        Blog::find($blog_info->id)->update([
            'view'         => $view,
        ]);

        return view('frontend.blog_details', [
            'blog_info'         => $blog_info,
            'related_blogs'     => $related_blogs,
            'top_views'         => $top_views,
            'recent'            => $recent,
            'comments'          => $comments,
            'categories'        => Category::all(),
            'admin'             => User::where('role', 1)->get()
        ]);
    }

    //NEXT BLOG DETAILS
    public function blognextdetails($id){
        $comments = Comment::all();
        $recent = Blog::latest()->limit(5)->get();
        $top_views = Blog::where('view', '>', 1)->orderBy('view', 'DESC')->limit(3)->get();
        $blog_info = Blog::where('id', $id)->firstOrFail();
        $related_blogs = Blog::where('category_id', $blog_info->category_id)->where('id', '!=', $blog_info->id)->limit(4)->get();
        return view('frontend.blog_details', [
            'blog_info'         => $blog_info,
            'related_blogs'     => $related_blogs,
            'categories'        => Category::all(),
            'top_views'         => $top_views,
            'recent'            => $recent,
            'comments'          => $comments,
            'admin'             => User::where('role', 1)->get()
        ]);
    }

    //USER DASHBORD
    public function userdashbord(){
        return view('frontend.user_dashbord',[
            'comments'      => Comment::where('user_id', Auth::id())->latest()->get(),
            'categories'    => Category::all(),
        ]);
    }

    //USER COMMENT DELETE
    public function deleteusercomment($id){
        Comment::find($id)->forceDelete();

        return back()->with('success_status', 'Your category permanently deleted!!');
    }

    //CATEGORY DETAILS HERE
    public function categorydetails($category_name){
        $top_views = Blog::where('view', '>', 1)->orderBy('view', 'DESC')->limit(3)->get();
        $category_info = Category::where('category_name', $category_name)->firstOrFail();
        $blog_slider = Blog::where('category_id', $category_info->id)->limit(3)->get();
        $blog = Blog::where('category_id', $category_info->id)->limit(5)->get();
        $feature = Blog::where('status', 2)->limit(3)->get();
        return view('frontend.categorydetails', [
            'blogs'             => $blog,
            'categories'        => Category::all(),
            'feature_blogs'     => $feature,
            'top_views'         => $top_views,
            'blog_sliders'      => $blog_slider,
            'category_name'     => $category_name,
            'admin'             => User::where('role', 1)->get()

        ]);
    }

    //CONTACT PAGE
    public function contact(){
        return view('frontend.contact',[
            'categories'        => Category::all(),
        ]);
    }

}
