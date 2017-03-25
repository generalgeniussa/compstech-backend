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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/internet-categories', 'InternetCategoryController@index')->name('internet-categories:list');
Route::get('/internet-categories/create', 'InternetCategoryController@create')->name('internet-categories:create');
Route::post('/internet-categories/create', 'InternetCategoryController@store')->name('internet-categories:store');
Route::get('/internet-categories/{internetCategoryId}', 'InternetCategoryController@edit')->name('internet-categories:edit');
Route::put('/internet-categories/{internetCategoryId}', 'InternetCategoryController@update')->name('internet-categories:update');
Route::delete('/internet-categories/{internetCategoryId}', 'InternetCategoryController@delete')->name('internet-categories:delete');

Route::get('/internet-categories/{internetCategoryId}/subcategories', 'InternetSubcategoryController@index')->name('internet-subcategories:list');
Route::get('/internet-categories/{internetCategoryId}/subcategories/create', 'InternetSubcategoryController@create')->name('internet-subcategories:create');
Route::post('/internet-categories/{internetCategoryId}/subcategories/create', 'InternetSubcategoryController@store')->name('internet-subcategories:store');
Route::get('/internet-categories/{internetCategoryId}/subcategories/{internetSubcategoryId}', 'InternetSubcategoryController@edit')->name('internet-subcategories:edit');
Route::put('/internet-categories/{internetCategoryId}/subcategories/{internetSubcategoryId}', 'InternetSubcategoryController@update')->name('internet-subcategories:update');
Route::delete('/internet-categories/{internetCategoryId}/subcategories/{internetSubcategoryId}', 'InternetSubcategoryController@delete')->name('internet-subcategories:delete');


