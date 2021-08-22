<?php

namespace App\Http\Controllers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //AUTH MIDDLEWARE HERE
    public function __construct()
    {
        $this->middleware('auth');
    }

    //CATEGORY DATA SHOW TABLE
    public function indexCategory()
    {
        return view('admin.category.index_category', [
            'categories'       => Category::latest()->paginate(5)
        ]);
    }

    //CATEGORY ADD METHOD
    public function addCategory()
    {
        return view('admin.category.add_category');
    }

    //CATEGORY DATA STORE METHOD
    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name'             => 'required:categories,category_name,',
            'category_description'      => 'required:categories,category_description,',
        ]);

        Category::insert($request->except('_token',) + [
            'created_at'    => Carbon::now(),
            'user_id'       => Auth::id(),
        ]);

        return back()->with('success_status', 'Your slider added successfully!');
    }

    //CATEGORY EDIT DATA
    public function editcategory($id)
    {
        return view('admin.category.edit_category', [
            'category'       => Category::find($id)
        ]);
    }

    //CATEGORY SLIDER DATA
    public function updatecategory(Request $request, $id)
    {

        $request->validate([
            'category_name'             => 'required:categories,category_name,',
            'category_description'      => 'required:categories,category_description,',
        ]);

        Category::find($id)->update([
            'category_name'              => $request->category_name,
            'category_description'        => $request->category_description
        ]);
        return back()->with('success_status', 'slider updated Successfully!');
    }

    //CATEGORY SLIDER FROM DB
    public function deletecategory($id)
    {
        Category::find($id)->forceDelete();
        return back()->with('success_status', 'Your category permanently deleted!!');
    }
}
