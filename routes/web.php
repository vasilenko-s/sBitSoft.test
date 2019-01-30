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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@profile')->name('profile');

//handling profiles
Route::get('/profile/teacher', 'ProfileController@profileTeacher')->name('teacher');
Route::post('/profile/teacher', 'ProfileController@profileTeacherHandling');

Route::get('/profile/pupil', 'ProfileController@profilePupil')->name('pupil');
Route::post('/profile/pupil', 'ProfileController@profilePupilHandling');
