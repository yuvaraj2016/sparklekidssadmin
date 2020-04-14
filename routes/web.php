<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});


// Auth::routes();

//AUthentication routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
Route::post('login', 'Web\UserController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

// Registration Routes...
// if (config('register'))
// {
    Route::get('register', 'Web\UserController@registerform')->name('register');

    Route::post('register', 'Web\UserController@register')->name('register');;
// }
// Password Reset Routes...
// if (config('reset'))
// {
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
// }
// Email Verification Routes...
// if (config('verify'))
// {
    Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
// }









Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Route::get('/users', 'Web\UserController@index');
// Route::get('/myaccount', 'Web\UserController@myaccount')->middleware('auth');

// Route::get('/users/{id}','Web\UserController@show');
// Route::delete('/users/{id}','Web\UserController@delete')->middleware('auth');
// Route::get('/users/{id}/edit','Web\UserController@edituser')->middleware('auth');
// Route::put('/users/{id}','Web\UserController@edit')->middleware('auth');

Route::get('/gallery', function()
{
     return redirect()->route('albums');
})->middleware('auth');
Route::get('/albums', 'Web\AlbumController@index')->name('albums');

Route::get('/albums/create', 'Web\AlbumController@createAlbum')->name('albums.create')->middleware('auth');

Route::get('/albums/{id}/edit', 'Web\AlbumController@editalb')->name('albums.edit')->middleware('auth');

Route::get('/photos','Web\PhotoController@index')->name('photos')->middleware('auth');

Route::get('/photos/create','Web\PhotoController@createphoto')->name('photos/create')->middleware('auth');

Route::post('/albums/create','Web\AlbumController@create')->name('albums.create')->middleware('auth');

Route::post('/albums','Web\AlbumController@create')->middleware('auth');

Route::get('/albums/{id}','Web\AlbumController@showalbum');

// Route::get('/albums/{id}','Web\AlbumController@show');

// Route::get('/albums/{id}/edit','Web\AlbumController@editalbum')->middleware('auth');
Route::put('/albums/{id}','Web\AlbumController@edit')->name('albums.edit')->middleware('auth');



Route::delete('/albums/{id}','Web\AlbumController@delete')->middleware('auth');

Route::get('/photos/upload/{id}','Web\PhotoController@upload')->middleware('auth');
// Route::post('/photos','Web\PhotoController@create')->middleware('auth');
Route::get('/photos/{id}/edit','Web\PhotoController@editphotonew')->middleware('auth');

Route::put('/photos/{id}','Web\PhotoController@edit')->middleware('auth');
Route::get('/photos/{id}','Web\PhotoController@showphoto');

// Route::get('/photos/{id}','Web\PhotoController@show');
Route::delete('/photos/{id}','Web\PhotoController@delete')->middleware('auth');

Route::get('/testimonials', 'Web\TestimonialController@index')->name('testimonials')->middleware('auth');

Route::get('/testimonials/create', 'Web\TestimonialController@create')->name('testimonials/create')->middleware('auth');
Route::get('/testimonials/{id}/edit', 'Web\TestimonialController@edit')->name('testimonials/edit')->middleware('auth');
Route::get('/testimonials/{id}', 'Web\TestimonialController@show')->name('testimonials.show')->middleware('auth');
//Likes
Route::put('/albums/{id}/like','Web\AlbumController@like')->middleware('auth');
Route::put('/albums/{id}/unlike','Web\AlbumController@unlike')->middleware('auth');

Route::put('/photos/{id}/like','Web\PhotoController@like')->middleware('auth');
Route::put('/photos/{id}/unlike','Web\PhotoController@unlike')->middleware('auth');
