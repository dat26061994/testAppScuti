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
    return view('user.pages.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::group(['prefix'=>'admin'],function(){
	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');

	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('dashboard',['as'=>'admin.dashboard','uses'=>'AdminController@index']);
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('logout',['as'=>'admin.logout','uses'=>'AdminLoginController@logout']);


		Route::get('list',['as'=>'admin.getList','uses'=>'AdminUserController@getList']);
		Route::get('add',['as'=>'admin.getAdd','uses'=>'AdminUserController@getAdd']);
		Route::post('add',['as'=>'admin.postAdd','uses'=>'AdminUserController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.getEdit','uses'=>'AdminUserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.postEdit','uses'=>'AdminUserController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.getDelete','uses'=>'AdminUserController@getDelete']);
		Route::post('delete/{id}',['as'=>'admin.postDelete','uses'=>'AdminUserController@postDelete']);


	Route::group(['prefix'=>'product'],function(){
		Route::get('list',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
		Route::post('delete/{id}',['as'=>'admin.product.postDelete','uses'=>'ProductController@postDelete']);
	});

	Route::group(['prefix'=>'user'],function(){
		Route::get('list',['as'=>'admin.user.getList','uses'=>'UserController@getList']);
		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
			
	});
});


Route::get('product/{id}/{name}',['as'=>'product','uses'=>'HomeController@thisProduct']);


