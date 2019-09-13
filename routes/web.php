<?php

Route::get('/', 'HomeController@index');
Route::get('/menu/{slug}', 'HomeController@menu')->name('menu.slug');
Route::get('/category/{slug}', 'HomeController@category')->name('category.slug');
Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.slug');
// Page Show
Route::get('/page/{slug}', 'PageController@show')->name('page.show');
// Post Show
Route::get('/post/{slug}', 'PostController@show')->name('post.show');
// Message Store
Route::post('/message/store', 'MessageController@store')->name('message.store');
// User Show
Route::get('/user/{slug}', 'MemberController@show')->name('user.show');

//Verify Email
Route::get('/verify/{token}/{id}', 'Auth\RegisterController@verify_email');

Auth::routes();
// Verification email user
// Auth::routes(['verify' => true]);

Route::middleware(['admin'])->group(function () {
	// Admin Dashboard
	Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
	// Admin Page
	Route::resource('/admin/page', 'PageController', ['except' => ['show']]);
	// Admin Post
	Route::resource('/admin/post', 'PostController', ['except' => ['show']]);
	// Post dataTable
	// Route::get('/admin/post/dataTable', 'PostController@DataTables')->name('post.dataTable');
	// Admin Picture
	Route::get('/admin/picture/{pict_id}/destroy', 'PictureController@destroy')->name('picture.destroy');
	// Admin Menu
	Route::get('/admin/menu', 'MenuController@index')->name('menu.index');
	Route::post('/admin/menu/store', 'MenuController@store')->name('menu.store');
	Route::put('/admin/menu/{menu_id}/update', 'MenuController@update')->name('menu.update');
	Route::delete('/admin/menu/{menu_id}/destroy', 'MenuController@destroy')->name('menu.destroy');
	// Admin Category
	Route::get('/admin/category', 'CategoryController@index')->name('category.index');
	Route::post('/admin/category/store', 'CategoryController@store')->name('category.store');
	Route::put('/admin/category/{category_id}/update', 'CategoryController@update')->name('category.update');
	Route::delete('/admin/category/{category_id}/destroy', 'CategoryController@destroy')->name('category.destroy');
	// Admin Tag
	Route::get('/admin/tag', 'TagController@index')->name('tag.index');
	Route::post('/admin/tag/store', 'TagController@store')->name('tag.store');
	Route::put('/admin/tag/{tag_id}/update', 'TagController@update')->name('tag.update');
	Route::delete('/admin/tag/{tag_id}/destroy', 'TagController@destroy')->name('tag.destroy');
	// Admin User
	Route::get('/admin/user', 'UserController@index')->name('user.index');
	Route::put('/admin/user/{user_id}/banned', 'UserController@banned')->name('user.banned');
	// Admin Application
	Route::get('/admin/app', 'AppController@index')->name('app.index');
	Route::post('/admin/app/store', 'AppController@store')->name('app.store');
	Route::post('/admin/app/{app_id}/update', 'AppController@update')->name('app.update');
	// Admin Follow
	Route::get('/admin/follow', 'FollowController@index')->name('follow.index');
	Route::post('/admin/follow/store', 'FollowController@store')->name('follow.store');
	Route::post('/admin/follow/{follow_id}/update', 'FollowController@update')->name('follow.update');
	Route::get('/admin/follow/{follow_id}/destroy', 'FollowController@destroy')->name('follow.destroy');
	// Admin Share
	Route::get('/admin/share', 'ShareController@index')->name('share.index');
	Route::post('/admin/share/store', 'ShareController@store')->name('share.store');
	Route::delete('/admin/share/{share_id}/destroy', 'ShareController@destroy')->name('share.destroy');
	// Admin Message
	Route::get('/admin/message', 'MessageController@index')->name('message.index');
	Route::get('/admin/message/{message_id}/show', 'MessageController@show')->name('message.show');
	Route::delete('/admin/message/{message_id}/destroy', 'MessageController@destroy')->name('message.destroy');
	// Admin Banner
	Route::get('/admin/banner', 'BannerController@index')->name('banner.index');
	Route::post('/admin/banner/store', 'BannerController@store')->name('banner.store');
	Route::delete('/admin/banner/{banner_id}/destroy', 'BannerController@destroy')->name('banner.destroy');
	// MCE
	Route::get('/admin/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/admin/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
	
});

Route::middleware(['auth'])->group(function () {
	// Comment Store
	Route::post('/comment/{post_id}/store', 'CommentController@store')->name('comment.store');
	Route::post('/comment/{comment_id}/store_parent', 'CommentController@store_parent')->name('comment.store_parent');
	// Comment Update
	Route::post('/comment/{comment_id}/update', 'CommentController@update')->name('comment.update');
	// User
	Route::post('/user/{slug}/edit-name', 'MemberController@edit_name')->name('user.edit');
	Route::post('/user/{slug}/edit-img', 'MemberController@edit_img')->name('user.img');

});