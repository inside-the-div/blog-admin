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





Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

	// post controller
	Route::get('/posts','postsController@index')->name('all-post');
	Route::get('/post/{id}','postsController@edit')->name('edit-post');
	Route::post('/posts','postsController@update')->name('update-post');
	Route::post('/delete-post','postsController@delete')->name('delete-post');

	// category 
	Route::get('/categorys','categorysController@index')->name('all-categorys');
	Route::get('/category/{id}','categorysController@edit')->name('edit-categorys');
	Route::post('/categorys-add','categorysController@add')->name('add-category');
	Route::post('/category','categorysController@update')->name('update-categorys');
	Route::post('/delete-category','categorysController@delete')->name('delete-categorys');

	// comment
	Route::get('/comment','commentController@index')->name('all-comments');
	Route::get('/comment/{id}','commentController@edit')->name('edit-comment');
	Route::post('/comment','commentController@update')->name('update-comment');
	Route::post('/delete-comment','commentController@delete')->name('delete-comment');

	// subscriber
	Route::get('/subscriber','subscribeController@index')->name('all-subscribe');
	Route::get('/subscriber/{id}','subscribeController@edit')->name('edit-subscribe');
	Route::post('/subscriber','subscribeController@update')->name('update-subscribe');
	Route::post('/delete-subscriber','subscribeController@delete')->name('delete-subscribe');

	// user 
	Route::get('/users','userController@index')->name('all-user');
	Route::get('/user/{id}','userController@edit')->name('edit-user');
	Route::post('/uers','userController@update')->name('update-user');
	Route::post('/delete-uers','userController@delete')->name('delete-user');

	// profile
	Route::get('/my-prfile','profileController@index')->name('my-prfile');
	Route::get('/edit-profile','profileController@edit')->name('edit-profile');
	Route::post('/edit-profile','profileController@update')->name('update-profile');
	Route::post('/change-passgord','profileController@changePassword')->name('change-password');

});