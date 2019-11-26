<?php

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

/*
// Default routing that is creating when Laravel is created
// You almost never want to use just the return a view from 
// your route. What you would want to do is create a controller
// and then set a route to go to a certain controller function
// and then return a view
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    // Slash can be used instead of a dot as well if we add additional folders in the view folder
    return view('pages.about');
});

// Creating dynamic routing which will replace the id variable with whatever text follows the /users/ link
// Multiple dynamic values / variables can be used, e.g. /users/{id}/{name}
Route::get('/users/{id}', function ($id) {
    // For example, if we input /users/brad, view will return'This is user brad' 
    return 'This is user ' .$id;
});
*/

// Using controllers with routes to return a view
// In PagesContoller get the index function
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

// Will automatically create all the routes we need for our PostsController
Route::resource('posts', 'PostsController');



