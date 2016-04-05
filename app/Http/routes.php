<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Category;
use App\Post;
use App\Comment;




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get("", ["uses" => "BlogController@blog", "as" => "home"]);

    Route::get("shranjeno", ["uses" => "BlogController@shranjeno"]);


    Route::get("objava", ["uses" => "BlogController@objava", "as" => "objava"]);

    Route::get("about", ["uses" => "BlogController@about", "as" => "about"]);

    Route::get("form", ["uses" => "BlogController@form", "as" => "form"]);
    Route::post("form", ["uses" => "BlogController@store"]);

    Route::get("/objava/{id}", ["uses" => "BlogController@show"]);

    Route::post("/objava/{id}/comments", ["uses" => "BlogController@storeComment", "as" => "save.comment" ]);

    Route::get("roles", ["uses" => "BlogController@roles"]);
    Route::post("roles", ["uses" => "BlogController@storeRole", "as" => "save.role"]);

    Route::get("categories", ["uses" => "BlogController@categories"]);
    Route::post("categories", ["uses" => "BlogController@storeCategory", "as" => "save.category"]);

    Route::get("/profile/{id}", ["uses" => "BlogController@profile"]);

});
