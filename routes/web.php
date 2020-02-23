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
	Route::get('/post-add','postsController@add')->name('add-post');
	Route::get('/post/{id}','postsController@edit')->name('edit-post');
	Route::get('/post-show/{id}','postsController@show')->name('show-post');
	Route::post('/posts-update','postsController@update')->name('update-post');
	Route::post('/posts-store','postsController@store')->name('store-post');
	Route::post('/delete-post','postsController@delete')->name('delete-post');

	// category 
	Route::get('/categorys','categorysController@index')->name('all-categorys');
	Route::get('/category/{id}','categorysController@edit')->name('edit-category');
	Route::get('/category-show/{id}','categorysController@show')->name('show-category');
	Route::post('/categorys-add','categorysController@add')->name('add-category');
	Route::post('/category','categorysController@update')->name('update-category');
	Route::post('/delete-category','categorysController@delete')->name('delete-category');

	// comment
	Route::get('/comment','commentsController@index')->name('all-comments');
	Route::get('/comment/{id}','commentsController@details')->name('details-comment');
	Route::post('/delete-comment','commentsController@delete')->name('delete-comment');
	Route::post('/show-comment','commentsController@show')->name('show-comment');
	Route::post('/hide-comment','commentsController@hide')->name('hide-comment');

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
	Route::get('/my-prfile','profilesController@index')->name('my-profile');
	Route::post('/update-profile','profilesController@update')->name('update-profile');
	Route::post('/change-passgord','profilesController@changePassword')->name('change-password');


	Route::get('/settings','settingsController@index')->name('settings');
	Route::post('/settings','settingsController@update')->name('update-settings');

});