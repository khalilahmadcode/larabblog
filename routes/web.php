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
EXAMPLE --------------------------------
    Route::get('/', function () {
        return view('welcome1');
        //return 'Hello World'; 
    });

pages folder ----------------------------
    Route::get('/index', function(){
    return view('pages.index')
    })

Daynamic routing -----------------------
    Route::get('/users/{id}', function($id) {
        return '<h1>User ID: '. $id.'</h1>'; 
    });
    Route::get('/users/{id}/{name}', function($id, $name){
        return '<h1>Name: '.$name. '<br>ID: '.$id. '</h1>'; 
    }); 

*/

// Route views
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about'); 
Route::get('/services', 'PagesController@services');  
Route::get('/contactus', 'PagesController@contactus'); 

// Route all Post function 
Route::resource('posts', 'PostsController'); 