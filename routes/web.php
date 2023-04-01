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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/dashboard',function(){

    return view("admin.dashboard");
});
Route::get('/admin/add',function(){

    return view("admin.add");
});

// Route::get("todo/create",'TodoController@create');
// Route::get("todo",'TodoController@index');
// Route::post("todo",'TodoController@store');
// Route::get("todo/{todo}/edit","TodoController@edit");
// Route::patch("todo/{todo}","TodoController@update");
// Route::delete("todo/{todo}","TodoController@destroy");
Route::resource("todo","TodoController");

Auth::routes();  

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('admin', 'HomeController@admin')->middleware("admin");
Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('admin', 'HomeController@admin');
}); 
Route::group(['middleware'=>['auth','customer']],function(){
    Route::get('customer', 'HomeController@customer');
}); 