<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewMessage;

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

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes(['verify' => true]);

    Route::get('/admin/posts',[App\Http\Controllers\TestController::class, 'index'])->name('test');

});


Route::get('/deny/{id}',[App\Http\Controllers\DossiersController::class, 'deny'])->name('deny');
Route::get('/accept/{id}',[App\Http\Controllers\DossiersController::class, 'accept'])->name('accept');
Route::get('/delete/{id}',[App\Http\Controllers\DossiersController::class, 'delete'])->name('delete');

Route::get('/test-mail', function (){
    Notification::route('mail', '207c95347f-7444ef+1@inbox.mailtrap.io')->notify(new NewMessage());
    return 'Sent';
});

// Route qui permet de connaître la langue active
Route::get('locale', 'LocalizationController@getLang')->name('getlang');

// Route qui permet de modifier la langue
Route::get('locale/{lang}', 'LocalizationController@setLang')->name('setlang');