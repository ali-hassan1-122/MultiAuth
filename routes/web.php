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
    return view('welcome');
});




// admin forgot password routes
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::get('password/email', 'ForgotPasswordController@sentResetLinktEmail')->name('admin.password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::get('password/reset', 'ResetPasswordController@reset')->name('admin.password.update');

// admin route
Auth::routes(['verify' => true]);
Route::namespace('Admin')->prefix('admin')->as('admin.')->group(function() {
   Auth::routes(['register'=>true]);
   Route::get('/home', 'AdminController@index')->name('home');
});
Route::get('/home', 'HomeController@index')->name('home');

// users Route

Route::get('/teacher', 'TeacherController@index')->name('teacher');
Route::get('/student', 'StudentController@index')->name('student');