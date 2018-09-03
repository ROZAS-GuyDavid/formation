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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('posts', function(){
//     return App\Post::all();
// });

// Route::get('post/{id}', function($id){
//     return App\Post::find($id);
// });

// page d'accueil
Route::get('/', 'FrontController@index');
// route pour afficher un post, route sécuriée
Route::get('post/{id}', 'FrontController@show')->where(['id' => '[0-9]+'])->name('show');

Route::get('formation', 'FrontController@showFormation')->name('formation');
Route::get('stage', 'FrontController@showStage')->name('stage');
Route::get('contact', 'FrontController@showContact')->name('contact');
Route::get('search', 'FrontController@showSearch')->name('search');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/post', 'PostController')->middleware('auth');
