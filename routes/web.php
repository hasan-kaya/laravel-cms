<?php

Route::get('/', 'Front\IndexController@index')->name('index');
Route::get('/page/{slug}', 'Front\PostController@detail')->name('page');
Route::get('/product/{slug}', 'Front\PostController@detail')->name('product');
Route::get('/category/{slug}', 'Front\CategoryController@detail')->name('category');
Route::get('/contact', 'Front\ContactController@index')->name('contact');
Route::post('/contact', 'Front\ContactController@store')->name('contact.store');

Route::group(['prefix' => config('auth.admin_panel'), 'middleware' => 'doNotCacheResponse'], function () {
  Route::get('/', 'Admin\LoginController@showLoginForm');

  Route::get('/login', 'Admin\LoginController@showLoginForm');
  Route::post('/login', 'Admin\LoginController@login')->name('admin.login');

  Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
});

Route::group([
  'prefix' => config('auth.admin_panel') . '/filemanager',
  'middleware' => ['web', 'admin', 'auth:admin', 'doNotCacheResponse']
], function () {
  \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/test', function () {

  return \App\Models\FormData::get();
  
  return \App\Libs\Block::print();


  return Hash::make('1');
  return Sitemap::generate();
});
