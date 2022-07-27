<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LiveSearch;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

/*

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});


Route::get('role', 'App\Http\Controllers\UserController@ShowUserList')->name('userList');

Route::get('/role/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('admin.edit');
Route::put('/role/edit/{id}', 'App\Http\Controllers\UserController@update')->name('admin.update');

//Route::post('/role/edit/{id}', 'App\Http\Controllers\UserController@destroy')->name('admin.destroy');


Route::get('/search/', 'App\Http\Controllers\UserController@search')->name('search');

Route::resource('post', PostController::class);

Route::resource('blog', BlogController::class);
Route::get('/searchpost/', 'App\Http\Controllers\BlogController@searchpost')->name('searchpost');

Route::get('about', 'App\Http\Controllers\BlogController@about')->name('about');

Route::get('last5', 'App\Http\Controllers\BlogController@last5')->name('last5');

//Route::get('blog', 'PostController@blog')->name('blog');
Route::get('userpost', 'App\Http\Controllers\PostController@userposts')->name('userpost');


Route::resource('comment', CommentController::class);
//Route::post('comment.add','CommentController@store');
//Route::post('/comment.add', [CommentController::class, 'store']);
Route::post('/comment/store', 'App\Http\Controllers\CommentController@store')->name('comment.add');
Route::post('/reply/store', 'App\Http\Controllers\CommentController@replyStore')->name('reply.add');

Route::get('display', 'App\Http\Controllers\CommentController@index')->name('display');

Route::get('myComment', 'App\Http\Controllers\CommentController@myComment')->name('myComment');

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/post/create', 'App\Http\Controllers\PostController@create')->name('post.create');
Route::post('/post/store', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('posts');
Route::get('/post/show/{id}', 'App\Http\Controllers\PostController@show')->name('post.show');

Route::get('/post/edit/{id}', 'App\Http\Controllers\PostController@edit')->name('post.edit');
Route::put('/post/edit/{id}', 'App\Http\Controllers\PostController@update')->name('post.update');




Route::get('mypost', 'App\Http\Controllers\PostController@myPost')->name('mypost');
//Route::get('/post/show/{id}', 'App\Http\Controllers\PostController@myPost')->name('mypost');


Route::get('live_serach', 'App\Http\Controllers\LiveSearch@index')->name('live_search');
Route::get('live_serach/action', 'App\Http\Controllers\LiveSearch@action')->name('live_search.action');
//Route::get('live_search', 'LiveSearch@index');
//Route::get('live_search/action', 'LiveSearch@action')->name('live_search.action');



Route::resource('category', CategoryController::class);
Route::get('/category', 'App\Http\Controllers\CategoryController@index')->name('category');
Route::get('/category/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
Route::post('/category/store', 'App\Http\Controllers\CategoryController@store')->name('category.store');
Route::get('/category/show/{id}', 'App\Http\Controllers\CategoryController@show')->name('category.show');

Route::get('/category/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
Route::put('/category/edit/{id}', 'App\Http\Controllers\CategoryController@update')->name('category.update');

Route::get('/categoryShow', 'App\Http\Controllers\CategoryController@showCategory')->name('categoryShow');



Route::get('searchcategory', 'App\Http\Controllers\CategoryController@searchCategory')->name('searchcategory');