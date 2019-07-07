<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController;

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

///////////////////////////////////////////////////////////////
Route::get('/', 'PostsController@allPosts')->name('posts'); //->middleware('verified')
Route::get('/posts/{id}', 'PostsController@view')->name('posts.view');
Route::get('/search', 'PostsController@show')->name('posts.search');
Route::get('/about', function () {
    return view('posts.about');
})->name('about');
Route::get('/contact', 'PostsController@contact')->name('contact');
Route::get('/services', 'PostsController@services')->name('services');
Route::get('/tag/{id}', 'PostsController@tagPosts')->name('tagposts');
Route::get('categories/{id}', 'PostsController@publicposts')->name('categoryposts');
Route::post('/comment/{id}', 'PostsController@store')->name('addcomment');

///////////////////////////////////////////////////////////////
//Route::namespace('Admin')->prefix('admin/posts')->middleware('auth')->name('admin.posts')->group(function () {
//Route::namespace('Admin')->prefix('admin/posts')->middleware('checkage')->name('admin.posts')->group(function () {
//Route::namespace('Admin')->prefix('admin/posts')->middleware(['checkage:18,40'])->name('admin.posts')->group(function () {
Route::namespace('Admin')->prefix('admin/posts')->middleware('auth')->name('admin.posts')->group(function () {
    // Route::namespace('Admin')->prefix('admin/posts')->middleware(['auth:admin'])->name('admin.posts')->group(function () {

    Route::get('/', 'PostsController@index')->name('');
    Route::get('/trashed', 'PostsController@trashed')->name('.trashed');
    Route::put('/trashed/{id}/restore', 'PostsController@restore')->name('.restore');
    Route::delete('/trashed/{id}/delete', 'PostsController@forceDelete')->name('.forceDelete');
    Route::get('/create', 'PostsController@create')->name('.create');
    Route::post('/', 'PostsController@store')->name('.store');
    Route::get('/{id}', 'PostsController@edit')->name('.edit');
    Route::put('/{id}', 'PostsController@update')->name('.update'); // post also 
    Route::delete('/{id}', 'PostsController@destroy')->name('.delete');
});
/* Route::get('admin/posts','Admin\PostsController@index');
Route::get('admin/posts/create','Admin\PostsController@create');
Route::post('admin/posts','Admin\PostsController@store');
Route::get('admin/posts/{id}','Admin\PostsController@edit');
Route::put('admin/posts/{id}','Admin\PostsController@update'); // post also 
Route::delete('admin/posts/{id}','Admin\PostsController@destroy'); */



Route::namespace('Admin')->prefix('admin/categories')->middleware('auth')->name('admin.categories')->group(function () {
    Route::get('categories/{id}/posts', 'CategoriesController@posts')->name('.posts');
    Route::get('/', 'CategoriesController@index')->name('');
    Route::get('/create', 'CategoriesController@create')->name('.create');
    Route::post('/', 'CategoriesController@store')->name('.store');;
    Route::get('/{id}', 'CategoriesController@edit')->name('.edit');
    Route::put('/{id}', 'CategoriesController@update')->name('.update');
    Route::delete('/{id}', 'CategoriesController@destroy')->name('.delete');
});

Route::namespace('Admin')->prefix('admin/tags')->middleware('auth')->name('admin.tags')->group(function () {
    Route::get('/', 'TagsController@index')->name('');
    Route::get('/create', 'TagsController@create')->name('.create');
    Route::post('/', 'TagsController@store')->name('.store');;
    Route::get('/{id}', 'TagsController@edit')->name('.edit');
    Route::put('/{id}', 'TagsController@update')->name('.update');
    Route::delete('/{id}', 'TagsController@destroy')->name('.delete');
});

/////////////////////////////////////////
Route::namespace('Admin')->prefix('admin/profiles')->middleware('auth')->name('admin.profiles')->group(function () {
    Route::get('/', 'ProfilesController@index')->name('');
    Route::delete('/{id}', 'ProfilesController@destroy')->name('.delete');
});

/* Route::resource('/categories', 'CategoriesController');
 */

Auth::routes(
    [
        'verify' => true
    ]
);
Auth::routes();

Route::get('/homee', 'HomeController@index')->name('home');


Route::get('admin/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('admin.logout');



////////////////////////////////////////////////
//Route::get('/admin/profile', 'profilesController@destroy');
Route::get('/admin/profile', function () {
    return view('admin.profile.profile');
})->name('admin.profile')->middleware('auth');

Route::get('/admin/dash', function () {
    return view('admin.profile.dash');
})->name('admin.dash')->middleware('auth');
