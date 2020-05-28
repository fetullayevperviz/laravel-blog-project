<?php

use Illuminate\Support\Facades\Route;


/*
  Backend Route
*/

Route::get('site-offline',function()
{
   return view('front.offline');
});

Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function(){
   Route::get('login','Back\AuthController@login')->name('login');
   Route::post('login','Back\AuthController@loginPost')->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
   Route::get('panel','Back\Dashboard@index')->name('dashboard');
   //Article route
   Route::get('/articles/deleted','Back\ArticleController@deleted')->name('articles/deleted');
   Route::resource('articles','Back\ArticleController');
   Route::get('/delete/article/{id}','Back\ArticleController@delete')->name('delete/article'); 
   Route::get('/hard/delete/article/{id}','Back\ArticleController@hardDelete')->name('hard/delete/article'); 
   Route::get('/recover/article/{id}','Back\ArticleController@recover')->name('recover/article');
   //Category route
   Route::get('/categories','Back\CategoryController@index')->name('categories.index');
   Route::post('/categories/create','Back\CategoryController@create')->name('category.create');
   Route::post('/categories/update','Back\CategoryController@update')->name('category.update');
   Route::post('/categories/delete','Back\CategoryController@delete')->name('category.delete');
   Route::get('/categories/getCategory','Back\CategoryController@getCategory')->name('category.getCategory');
   //Page route
   Route::get('/pages/create','Back\PageController@create')->name('page.create');
   Route::post('/pages/create','Back\PageController@post')->name('page.create.post');
   Route::get('/pages/update/{id}','Back\PageController@update')->name('page.edit');
   Route::post('/pages/update/{id}','Back\PageController@updatePost')->name('page.edit.post');
   Route::get('/pages/delete/{id}','Back\PageController@delete')->name('page.delete');
   Route::get('/pages/orders','Back\PageController@orders')->name('page.orders');
   Route::get('/pages','Back\PageController@index')->name('page.index');
   //Settings route
   Route::get('/settings','Back\SettingsController@index')->name('settings.index');
   Route::post('settings/update','Back\SettingsController@update')->name('settings.update');
   //Logout route
   Route::get('logout','Back\AuthController@logout')->name('logout');
});



/*
  Front Route
*/

Route::get("/","Front\Homepage@index")->name("homepage");
//Route::get("/sehife","Front\Homepage@index"); //paginate de linki deyismek istedikde yazilacaq route
Route::get('/blog/{slug}','Front\Homepage@single')->name('single');
Route::get('/elaqe','Front\Homepage@contact')->name('contact');
Route::post('/elaqe','Front\Homepage@contactPost')->name('contact.post');
Route::get('/kateqoriya/{category}','Front\Homepage@category')->name('category');
Route::get('/{sehife}','Front\Homepage@page')->name('page');

