<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['middleware' => 'api', 'prefix' => 'v1', 'as' => 'api.'], function () {

    // Blog api
    Route::group(['prefix' => 'Blog', 'as' => 'Blog.', 'namespace' => 'Blog'], function () {
        Route::group(['prefix' => 'Lists', 'as' => 'Lists.', 'namespace' => 'Lists'], function () {
            Route::get('/list-blog', 'ListsBlog@list')->name('list-all-blog');
        });

        Route::group(['prefix' => 'Creates', 'as' => 'Creates.', 'namespace' => 'Creates'], function () {
            Route::post('/create-blog', 'CreateBlog@create')->name('create-blog');
        });

        Route::group(['prefix' => 'Updates', 'as' => 'Updates.', 'namespace' => 'Updates'], function () {
            Route::post('{blog_id}/update-blog', 'UpdateBlog@update')->name('update-blog');
        });

        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.', 'namespace' => 'Deletes'], function () {
            Route::post('{blog_id}/delete-blog', 'DeleteBlog@delete')->name('delete-blog');
        });
    });

    // Book api
    Route::group(['prefix'=>'Book','as'=>'Book.','namespace'=>'Book'],function(){
        Route::group(['prefix'=>'Lists','as'=>'Lists.','namespace'=>'Lists'],function(){
            Route::get('/list-book', 'ListsBook@list')->name('list-all-book');
        });
        Route::group(['prefix'=>'Creates','as'=>'Creates.','namespace'=>'Creates'],function(){
            Route::post('/create-book', 'CreateBook@create')->name('create-book');
        });
        Route::group(['prefix'=>'Updates','as'=>'Updates.','namespace'=>'Updates'],function(){
            Route::post('{book_id}/update-book', 'UpdateBook@update')->name('update-book');
        });
        Route::group(['prefix'=>'Deletes','as'=>'Deletes.','namespace'=>'Deletes'],function(){
            Route::post('{book_id}/delete-book', 'DeleteBook@delete')->name('delete-book');
        });
    });
});
