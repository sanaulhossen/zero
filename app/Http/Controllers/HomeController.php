<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //ALL COMMENT HERE
    public function allcomment(){
        return view('admin.comment',[
            'comments'      => Comment::latest()->paginate(8),
        ]);
    }

    //DELATE COMMENT
    public function deletecomment($id){
        Comment::find($id)->forceDelete();
        return back()->with('success_status', 'Your category permanently deleted!!');
    }

    //USER PROFILE
    public function userprofile(){
        return view('admin.user.profile',[
            'comments'      => Comment::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    //ACCOUNT SETTING
    public function accountsetting(){
        return view('admin.user.account_setting');
    }

    //IMAGE UPDATTE IN USER TABLE
    public function profilephoto(Request $request){
        $request->validate([
            'image'  => 'required|image|mimes:jpeg,png,jpg|max:1024:users,image,',
        ]);
        if ($request->hasFile('image')) {
            if (Auth::user()->image =! 'default.png') {
                $old_photo_location = 'public/dashbord/image/user_image/' . Auth::user()->image;
                (base_path($old_photo_location));
            }

            $uploaded_photo = $request->file('image');
            $new_photo_name = Auth::id() . "." . $uploaded_photo->getClientOriginalExtension();

            $new_photo_location = 'public/dashbord/image/user_image/' . $new_photo_name;
            Image::make($uploaded_photo)->resize(100, 100)->save(base_path($new_photo_location));

            User::find(Auth::id())->update([
                'image' => $new_photo_name
            ]);
            return back()->with('profile_image', 'Profile Photo Update Successfully!!');
        } else {
            return back()->with('profile_image', 'Profile Photo Does Not Found!!');
        }
    }

    //INFORMATION UPDATTE IN USER TABLE
    public function profileinfo(Request $request){

        User::find(Auth::id())->update([
            'username'          => $request->username,
            'phone'             => $request->phone,
            'dateOfBirth'       => $request->dateOfBirth,
            'gender'            => $request->gender,
            'phone'             => $request->phone,
            'profession'        => $request->profession,
        ]);
        return back()->with('profile_info', 'Information Updated Successfully!');
    }

    //PROFILE PASSWORD CHANGE
    function changepasswordpost(Request $request){
        $request->validate([
            'password'    => 'confirmed|min:8'
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            if ($request->old_password == $request->password) {
                return back()->with('password_same_error', 'Old password and New password is same!!');
            } else {
                User::find(Auth::id())->update([
                    'password'    => Hash::make($request->password)
                ]);
                return back()->with('password_success', 'Password changed successfully!!');;
            }
        } else {
            return back()->with('password_old_error', 'Your old password does not match!!');
        }
    }

    //CHANGE / UPDATE ADDRESS
    public function changeaddress(Request $request){
        User::find(Auth::id())->update([
            'address'          => $request->address,
        ]);
        return back()->with('address_update', 'Information Updated Successfully!');
    }
}
