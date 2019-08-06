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

/* EXAMPLE
Route::get('/', function () {
    return view('welcome1');
    //return 'Hello World'; 
});


// Daynamic routing
Route::get('/users/{id}', function($id) {
    return '<h1>User ID: '. $id.'</h1>'; 
});

Route::get('/users/{id}/{name}', function($id, $name){
    return '<h1>Name: '.$name. '<br>ID: '.$id. '</h1>'; 
}); 

*/

// Route Application/welcome
// Route::get('/', function () {
//     return view('welcome');
//     //return 'Hello World'; 
// });


// pages folder 
// ROUTE INDEX
//Route::get('/index', function(){
//  return view('pages.index')
//}); 
Route::get('/', 'PagesController@index');

// ROUTE ABOUT US
// Route::get('/about', function(){
//     return view('pages.about'); 
// }); 
Route::get('/about', 'PagesController@about'); 

// ROUTE SERVICES
// Route::get('/services', function(){
//     return view('pages.services');
// }); 
Route::get('/services', 'PagesController@services'); 

// ROUTE CONTACT US
// Route::get('/contactus', function(){
//     return view('pages.contactus');
// }); 
Route::get('/contactus', 'PagesController@contactus'); 




