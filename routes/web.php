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

Auth::routes();





Route::middleware(['auth'])->group(function () {

    Route::get('/', 'HomeController@index');
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
	Route::get('/users/add','userController@add')->name('add-user');
	Route::get('/user/{id}','userController@edit')->name('edit-user');
	Route::get('/user/show/{id}','userController@show')->name('show-user');
	Route::post('/user/store','userController@store')->name('store-user');
	Route::post('/user','userController@update')->name('update-user');
	Route::post('/user/delete','userController@delete')->name('delete-user');

	// profile
	Route::get('/my-prfile','profilesController@index')->name('my-profile');
	Route::post('/update-profile','profilesController@update')->name('update-profile');
	Route::post('/change-passgord','profilesController@changePassword')->name('change-password');


	// emails URL
	Route::get('/emails','emailsController@index')->name('all-email');
	Route::get('/email/{id}','emailsController@details')->name('show-email');
	Route::post('/email-seen','emailsController@seen')->name('seen-email');
	Route::post('/email-not-seen','emailsController@notSeen')->name('not-seen-email');
	Route::post('/email-delete','emailsController@delete')->name('delete-email');
	Route::post('/email-send','emailsController@sendEMail')->name('send-email');
	Route::get('/email-send-page','emailsController@emailSendPage')->name('send-page-email');


	Route::get('/settings','settingsController@index')->name('settings');
	Route::post('/settings','settingsController@update')->name('update-settings');
	Route::get('/error-page','settingsController@error')->name('error-page');


	Route::get('other/about-me','otherController@aboutme')->name('about');
	Route::post('other/update-about-me','otherController@update_aboutme')->name('update-about');

	Route::get('other/privacy','otherController@privacy')->name('privacy');
	Route::post('other/update-privacy','otherController@update_privacy')->name('update-privacy');



});