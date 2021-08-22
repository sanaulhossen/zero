<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontendController@index');
Route::get('blog/details/{slug}', 'FrontendController@blogdetails');
Route::get('blog/next/details/{id}', 'FrontendController@blognextdetails');
Route::get('user/dashbord/', 'FrontendController@userdashbord')->name('user.dashbord');
Route::get('delete/user/comment/{id}', 'FrontendController@deleteusercomment')->name('delete.user.comment');

//CATEGORY DETAILS
Route::get('category/details/{category_name}', 'FrontendController@categorydetails');
//CONTACT PAGE
Route::get('contact', 'FrontendController@contact')->name('contact');


Auth::routes();


/*
|--------------------------------------------------------------------------
| Home Controller
|--------------------------------------------------------------------------
*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/profile', 'HomeController@userprofile')->name('user.profile');
Route::get('account/setting', 'HomeController@accountsetting')->name('account.setting');
Route::post('profile/photo', 'HomeController@profilephoto')->name('profile.photo');
Route::post('profile/info', 'HomeController@profileinfo')->name('profile.info');
Route::post('change/password/post', 'HomeController@changepasswordpost');
Route::post('change/address', 'HomeController@changeaddress');


/*
|--------------------------------------------------------------------------
| Slider controller
|--------------------------------------------------------------------------
*/
Route::get('add/slider', 'SliderController@addSlider')->name('add.slider');
Route::get('index/slider', 'SliderController@indexSlider')->name('index.slider');
Route::post('store/slider', 'SliderController@storeSlider')->name('store.slider');
Route::get('edit/slider/{id}', 'SliderController@editSlider')->name('edit.slider');
Route::post('update/slider/{id}', 'SliderController@updateSlider')->name('update.slider');
Route::get('delete/slider/{id}', 'SliderController@deleteSlider')->name('delete.slider');


/*
|--------------------------------------------------------------------------
| Category controller
|--------------------------------------------------------------------------
*/
Route::get('add/category', 'CategoryController@addCategory')->name('add.category');
Route::get('index/category', 'CategoryController@indexCategory')->name('index.category');
Route::post('store/category', 'CategoryController@storeCategory')->name('store.category');
Route::get('edit/category/{id}', 'CategoryController@editcategory')->name('edit.category');
Route::post('update/category/{id}', 'CategoryController@updatecategory')->name('update.category');
Route::get('delete/category/{id}', 'CategoryController@deletecategory')->name('delete.category');


/*
|--------------------------------------------------------------------------
| Blog controller
|--------------------------------------------------------------------------
*/
Route::get('add/blog', 'BlogController@addBlog')->name('add.blog');
Route::get('index/blog', 'BlogController@indexBlog')->name('index.blog');
Route::post('store/blog', 'BlogController@storeBlog')->name('store.blog');
Route::get('edit/blog/{id}', 'BlogController@editBlog')->name('edit.blog');
Route::post('update/blog/{id}', 'BlogController@updateBlog')->name('update.blog');
Route::get('delete/blog/{id}', 'BlogController@deleteBlog')->name('delete.blog');
Route::get('active/blog/{id}', 'BlogController@activeblog')->name('active.blog');
Route::get('deactive/blog/{id}', 'BlogController@deactiveblog')->name('deactive.blog');


/*
|--------------------------------------------------------------------------
| Comment controller
|--------------------------------------------------------------------------
*/
Route::post('store/comment/{blog_id}', 'CommentController@store')->name('store.comment');
Route::get('all/comment', 'HomeController@allcomment')->name('all.comment');
Route::get('delete/comment/{id}', 'HomeController@deletecomment')->name('delete.comment');
