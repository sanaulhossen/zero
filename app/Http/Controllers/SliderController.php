<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    //AUTH MIDDLEWARE HERE
    public function __construct()
    {
        $this->middleware('auth');
    }

    //SLIDER DATA SHOW TABLE
    public function indexSlider()
    {
        return view('admin.slider.index_slider', [
            'sliders'       => Slider::latest()->paginate(5)
        ]);
    }

    //SLIDER ADD METHOD
    public function addSlider()
    {
        return view('admin.slider.add_slider',[
            'categories'        => Category::all(),
        ]);
    }

    //SLIDER DATA STORE METHOD
    public function storeSlider(Request $request)
    {
        $request->validate([
            'slider_title'          => 'required:sliders,slider_title,',
            'slider_description'    => 'required:sliders,slider_description,',
            'slider_photo'          => 'required|image|mimes:jpeg,png,jpg|max:2048:sliders,slider_photo,',
        ]);

        $slider_id = Slider::insertGetId($request->except('_token', 'slider_photo') + [
            'created_at'    => Carbon::now(),
            'user_id'       => Auth::id(),
            'category_id'   => $request->category_id
        ]);

        if ($request->hasFile('slider_photo')) {
            $uploaded_photo = $request->file('slider_photo');
            $new_photo_name = $slider_id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_photo_location = 'public/dashbord/image/slider_image/' . $new_photo_name;

            Image::make($uploaded_photo)->resize(1920, 1080)->save(base_path($new_photo_location));
            Slider::find($slider_id)->update([
                'slider_photo'   => $new_photo_name
            ]);
        }
        return back()->with('success_status', 'Your slider added successfully!');
    }

    //EDIT SLIDER DATA
    public function editSlider($id)
    {
        return view('admin.slider.edit_slider', [
            'slider'            => Slider::find($id),
            'categories'        => Category::all(),
        ]);
    }

    //UPDATE SLIDER DATA
    public function updateSlider (Request $request, $id)
    {

        Slider::find($id)->update([
            'slider_title'              => $request->slider_title,
            'slider_description'        => $request->slider_description,
            'category_id'               => $request->category_id
        ]);

        if ($request->hasFile('slider_photo')) {

            if (Slider::findOrFail($id)->slider_photo != 'default.png') {
                unlink(base_path('public/dashbord/image/slider_image/') . Slider::findOrFail($id)->slider_photo);
            }

            $file_name = $id . '.' . $request->file('slider_photo')->getClientOriginalExtension();
            Image::make($request->file('slider_photo'))->resize(1920, 1080)->save(base_path('public/dashbord/image/slider_image/' . $file_name));
            Slider::find($id)->update([
                'slider_photo'   => $file_name
            ]);
        }
        return back()->with('success_status', 'slider updated Successfully!');
    }

    //DELETE SLIDER FROM DB
    public function deleteSlider($id)
    {
        $getslider = Slider::find($id)->first();
        unlink(public_path('dashbord/image/slider_image/' . $getslider->slider_photo));
        Slider::find($id)->forceDelete();

        return back()->with('success_status', 'Your category permanently deleted!!');
    }
}
