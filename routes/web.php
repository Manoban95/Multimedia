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

Route::get('/books/{book}','BookController@show');

Route::POST('/books','BookController@store');

Route::put('/books', 'BookController@update');

Route::delete('/books/{books}','BookController@destroy');


//CATEGORY
Route::get('/categories','CategoryController@index');

Route::post('/categories','CategoryController@store');

Route::put('/categories', 'CategoryController@update');

Route::delete('/categories/{category}','CategoryController@destroy');

//LOANS
Route::get('/loans','LoanController@index');

Route::get('/loans/{user}','LoanController@show');

Route::post('/loans','LoanController@store');

Route::put('/loans', 'LoanController@update');



/*Route::delete('/loans/{loan}','LoanController@destroy');*/


Route::get('/user','CategoryController@index');


    
 });

