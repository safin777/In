<?php

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

//login route are here

Route::get('/','loginController@index')->name('/');

Route::get('logout','logoutController@logout')->name('logout');
Route::get('/login/blogpage/hasAccount','loginController@login')->name('login.login');

//Route::get('','');
Route::group(['middleware'=>['sess']], function(){



Route::get('/admin/index','adminController@home')->name('admin.index');
Route::get('/admin/post','adminController@post')->name('admin.post');
Route::get('/admin/catagoryAction','adminController@catagory')->name('admin.catagoryAction');
Route::get('/admin/tagAction','adminController@tag')->name('admin.tagAction');

//crud for catagory

Route::post('/create/catagory','adminController@createCatagory')->name('create.catagory');
Route::post('/create/tag','adminController@createTag')->name('create.tag');

Route::get('/all/tag','adminController@allTag')->name('all.tag');
Route::get('/all/catagory','adminController@allCatagory')->name('allCatagory');
Route::get('/view/catagory/{cid}','adminController@viewCatagory');
Route::get('/view/tag/{tid}','adminController@viewTag');
Route::get('/delete/catagory/{cid}','adminController@deleteCatagory');
Route::get('/delete/tag/{tid}','adminController@deleteTag');
Route::get('/edit/catagory/{cid}','adminController@editCatagory');
Route::post('/update/catagory/{cid}','adminController@updateCatagory');
Route::get('/edit/tag/{tid}','adminController@editTag');
Route::post('/update/tag/{tid}','adminController@updateTag');
Route::post('/write/post','adminController@writePost');
Route::get('/admin/allPost','adminController@allPost')->name('admin.all.post');

//search

Route::get('/search','searchController@searchTag');
Route::get('/searchCatagory','searchController@searchCatagory');


//login operation


//administrative user
Route::get('/catagoryAction','administrativeController@catagory')->name('administrative.catagoryAction');

Route::post('/create/catagory','administrativeController@createCatagory')->name('create.catagory');
Route::get('/edit/catagory/{cid}','administrativeController@editCatagory');
Route::post('/update/catagory/{cid}','administrativeController@updateCatagory');
Route::get('/view/catagory/{cid}','administrativeController@viewCatagory');
Route::get('/delete/catagory/{cid}','administrativeController@deleteCatagory');

//tag

Route::get('/edit/tag/{tid}','administrativeController@editTag');
Route::post('/update/tag/{tid}','administrativeController@updateTag');
Route::get('/view/tag/{tid}','administrativeController@viewTag');
Route::get('/delete/tag/{tid}','administrativeController@deleteTag');
Route::post('/create/tag','administrativeController@createTag')->name('create.tag');
Route::get('/administrative/tagAction','administrativeController@tag')->name('administrative.tagAction');
});

Route::post('/login/validation','loginController@validateInfo')->name('login.validate');












