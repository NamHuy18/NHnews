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

Route::get('admin/login', 'userController@getloginAdmin');
Route::post('admin/login', 'userController@postloginAdmin');
Route::get('admin/logout','userController@LogoutAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function(){
	Route::group(['prefix'=>'theloai'], function(){

		Route::get('list','theloaiController@getList');

		Route::get('add','theloaiController@getAdd');
		Route::post('add','theloaiController@postAdd');

		Route::get('edit/{id}','theloaiController@getEdit');
		Route::post('edit/{id}','theloaiController@postEdit');

		Route::get('delete/{id}','theloaiController@getDelete');
	});

	Route::group(['prefix'=>'loaitin'], function(){

		Route::get('list','loaitinController@getList');

		Route::get('add','loaitinController@getAdd');
		Route::post('add','loaitinController@postAdd');

		Route::get('edit/{id}','loaitinController@getEdit');
		Route::post('edit/{id}','loaitinController@postEdit');

		Route::get('delete/{id}','loaitinController@getDelete');
	});

	Route::group(['prefix'=>'tintuc'], function(){

		Route::get('list','tintucController@getList');

		Route::get('add','tintucController@getAdd');
		Route::post('add','tintucController@postAdd');

		Route::get('edit/{id}','tintucController@getEdit');
		Route::post('edit/{id}','tintucController@postEdit');

		Route::get('delete/{id}','tintucController@getDelete');
	});

	Route::group(['prefix'=>'comment'], function(){

		Route::get('/{id}','commentController@getList');

		Route::get('delete/{id}/{id_tintuc}','commentController@getDelete');

	});

	Route::group(['prefix'=>'banner'], function(){

		Route::get('list','bannerController@getList');

		Route::get('add','bannerController@getAdd');
		Route::post('add','bannerController@postAdd');

		Route::get('edit/{id}','bannerController@getEdit');
		Route::post('edit/{id}','bannerController@postEdit');

		Route::get('delete/{id}','bannerController@getDelete');

	});

	Route::group(['prefix'=>'user'], function(){

		Route::get('list','userController@getList');

		Route::get('add','userController@getAdd');
		Route::post('add','userController@postAdd');

		Route::get('edit/{id}','userController@getEdit');
		Route::post('edit/{id}','userController@postEdit');

		Route::get('delete/{id}','userController@getDelete');

	});

	Route::get('contact','contactController@Contact');

	Route::group(['prefix'=>'ajax'], function(){
		Route::get('loaitin/{id_theloai}', 'ajaxController@getLoaitin');
	});
});


Route::get('home','pageController@home')->name('home');
Route::get('loaitin/{id}/{tenkhongdau}.html','pageController@loaitin');
Route::get('tintuc/{id}/{tieudekhongdau}.html','pageController@tintuc');

Route::get('login','pageController@getLogin');
Route::post('login','pageController@postLogin')->name('login');
Route::get('logout','pageController@Logout')->name('logout');

Route::post('comment/{id}','commentController@postComment');

Route::get('user','pageController@getUser');
Route::post('user','pageController@postUser')->name('user');

Route::get('signup','pageController@getSignup');
Route::post('signup','pageController@postSignup')->name('signup');

Route::get('search','pageController@Search')->name('search');

Route::get('contact','pageController@getContact');
Route::post('contact','pageController@postContact')->name('contact');

Route::get('about','pageController@About')->name('about');
