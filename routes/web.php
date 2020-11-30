<?php

use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return redirect('/dashboard');;
})->name('home');

Route::get('/suma/{num1}/{num2}','WebController@suma');	


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

 Route::group(['middleware' => ['auth']], function(){

//BOOK

Route::get('/books','BookController@index');

Route::POST('/books','BookController@store');

Route::put('/books', 'BookController@update');

Route::delete('/books/{books}','BookController@destroy');


//CATEGORY
Route::get('/categories','CategoryController@index');

Route::post('/categories','CategoryController@store');

Route::put('/categories', 'CategoryController@update');

Route::delete('/categories/{category}','CategoryController@destroy');


Route::get('/user','CategoryController@index');


    
 });

