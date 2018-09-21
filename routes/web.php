<?php

use App\Mail\ContactMessageCreated;

// page d'accueil
Route::get('/', 'FrontController@index')->name('accueil');
// route pour afficher un post, route sécuriée
Route::get('post/{id}', 'FrontController@show')->where(['id' => '[0-9]+'])->name('show');

Route::get('formation', 'FrontController@showFormation')->name('formation');
Route::get('stage', 'FrontController@showStage')->name('stage');
Route::get('contact', 'ContactController@create')->name('contact');
Route::post('contact', 'ContactController@store')->name('postContact');
Route::get('search', 'FrontController@showSearch')->name('search');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/test-email', function(){
    return new ContactMessageCreated('rozasguydavid@gmail', 'mon premier message réussi');
});

Route::get('admin/post/unArchiveSingle/{id}', 'PostController@unArchiveSingle')->where(['id' => '[0-9]+'])->name('unArchiveSingle');
Route::get('admin/post/archiveSingle/{id}', 'PostController@archiveSingle')->where(['id' => '[0-9]+'])->name('archiveSingle');
Route::get('admin/post/deleteSingle/{id}', 'PostController@deleteSingle')->where(['id' => '[0-9]+'])->name('deleteSingle');
Route::post('admin/post/archiveMultiple', 'PostController@archiveMultiple')->name('archiveMultiple');
Route::post('admin/post/deleteMultiple', 'PostController@deleteMultiple')->name('deleteMultiple');
Route::get('admin/post/archives', 'PostController@showArchive')->name('post.archiveList');

Route::resource('admin/post', 'PostController')->middleware('auth');