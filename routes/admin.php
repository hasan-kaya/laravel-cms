<?php

Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

Route::resource('posts', 'Admin\PostController');
Route::post('posts/store-media', 'Admin\PostController@store_media')->name('posts.store-media');
Route::resource('categories', 'Admin\CategoryController');

Route::resource('products', 'Admin\ProductController');
Route::resource('product-categories', 'Admin\ProductCategoryController');

Route::resource('admins', 'Admin\AdminController');
Route::resource('roles', 'Admin\RoleController');
Route::resource('permissions', 'Admin\PermissionController');

Route::get('set-language/{alias}', 'Admin\ChangeLanguageController@index')->name('language.change');
Route::resource('language-values', 'Admin\LanguageValueController');
Route::post('language-values/update-all', 'Admin\LanguageValueController@update_all')->name('language-values.update-all');

Route::post('/clear-cache', 'Admin\DashboardController@clear_cache')->name('clear-cache');
Route::post('/change-status', 'Admin\DashboardController@change_status')->name('change-status');
Route::post('/change-rank', 'Admin\DashboardController@change_rank')->name('change-rank');
Route::post('/get-model-rows', 'Admin\DashboardController@get_model_rows')->name('get-model-rows');

Route::get('/settings', 'Admin\SettingController@index')->name('settings');
Route::post('/settings', 'Admin\SettingController@store')->name('settings.store');

Route::get('/change-password', 'Admin\ChangePasswordController@index')->name('change-password');
Route::post('/change-password', 'Admin\ChangePasswordController@update')->name('change-password.update');

Route::get('menus', 'Admin\MenuController@render')->name('menus');

Route::post('menus/create-new-menu', 'Admin\MenuController@create_new_menu')->name('menus.create');
Route::post('menus/delete-menu', 'Admin\MenuController@delete_menu')->name('menus.delete');

Route::post('menus/add-item', 'Admin\MenuController@add_menu_item')->name('menus.item.create');
Route::post('menus/delete-item', 'Admin\MenuController@delete_item')->name('menus.item.delete');
Route::post('menus/update-item', 'Admin\MenuController@update_item')->name('menus.item.update');

Route::post('menus/generate-menu-control', 'Admin\MenuController@generate_menu_control')->name('menus.generate-menu-control');

Route::resource('blocks', 'Admin\BlockController');

Route::get('/form-data', 'Admin\FormDataController@index')->name('form-data');