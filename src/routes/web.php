<?php

use Illuminate\Support\Facades\Route;

// Route::get('cmsblog', function(){
//     return view('cmsblog::cmsblog');
// })

Route::group(['namespace' => 'Cms\Cmsblog\Http\Controllers', 'prefix' => 'cms-blog-admin'], function () {
    // dd(app());
    Route::get('/', 'AdminController@index')->name('home');
});
// Route::group(['namespace'=>'Cms\Cmsblog\Http\Controllers'], function () {
//     Route::get('admin', 'AdminController@index')->name('home');
// });
Route::group(['namespace' => 'Cms\Cmsblog\Http\Controllers', 'prefix' => 'cms-blog-admin'], function () {

    Route::get('/basic-info', 'BaseInfoController@basic_info')->name('basic_info');
    Route::get('/theme-info', 'BaseInfoController@theme_info')->name('theme_info');
    Route::get('/social-info', 'BaseInfoController@social_info')->name('social_info');
    Route::get('/menu', 'BaseInfoController@menu')->name('menu');
    Route::get('/sub-menu', 'BaseInfoController@sub_menu')->name('sub_menu');
});
Route::group(['namespace' => 'Cms\Cmsblog\Http\Controllers', 'prefix' => 'admin'], function () {

    Route::get('/add-blog-post', 'BlogController@blog_post')->name('blog_post');
    Route::post('/add-blog-post', 'BlogController@add_blog_post')->name('add_blog_post');
    Route::get('/all-blog-post', 'BlogController@all_blog_post')->name('all_blog_post');
    Route::get('/view-blog-post/{id}', 'BlogController@view_blog_post')->name('view_blog_post');
    Route::get('/edit-blog-post/{id}', 'BlogController@edit_blog_post')->name('edit_blog_post');
    Route::post('/update-blog-post', 'BlogController@update_blog_post')->name('update_blog_post');
    Route::get('/edit-blog-delete/{id}', 'BlogController@delete_blog_post')->name('delete_blog_post');
});



// Route::get('/cms-old', 'BaseInfoController@cms')->name('cms_old');
// Route::get('/cms-two', 'BaseInfoController@cms_two')->name('cms_two');


// Route::group(['namespace' => 'Cms\Cmsblog\Http\Controllers'], function () {
//     Route::get('/', 'WebsiteController@index');
// });

Route::group(['namespace' => 'Cms\Cmsblog\Http\Controllers'], function () {
    Route::get('/cms', 'BaseInfoController@cms_three')->name('cms_three');

    Route::post('/cms=save', 'BaseController@cms_save')->name('cms_save');

    Route::post('/all-basic', 'BaseInfoController@add_allbasic')->name('add_allbasic');
    Route::get('/show-all-basic', 'BaseController@show_all_basic')->name('show_all_basic');

    Route::post('/add-alltheme', 'BaseInfoController@add_alltheme')->name('add_alltheme');
    Route::get('/show-all-theme', 'BaseController@show_all_theme')->name('show_all_theme');

    Route::post('/add-allsocial', 'BaseInfoController@add_allsocial')->name('add_allsocial');
    Route::get('/show-all-social', 'BaseController@show_all_social')->name('show_all_social');

    Route::post('/add-allmenu', 'BaseInfoController@add_allmenu')->name('add_allmenu');
    Route::get('/show-all-menu', 'BaseController@show_all_menu')->name('show_all_menu');

    Route::post('/add-submenu', 'BaseInfoController@add_submenu')->name('add_submenu');
    Route::get('/show-all-menu', 'BaseController@show_all_menu')->name('show_all_menu');


    Route::get('/show-blog-post', 'BaseController@show_blog_post')->name('show_blog_post');

    // for ajax
    Route::get('/blog-post-key/{key}', 'BaseInfoController@blog_post_key')->name('blog_post_key');

    Route::get('/get-inner-field/{section}/{innersection}/{count}', 'BaseController@cms_make_form_field')->name('make_inner_section_form_body');
});
