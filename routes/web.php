<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard/{id}', 'dashboard')->name('dashboard');
    Route::get('/dashboards', 'dashboards')->name('dashboards');
    Route::post('/logout', 'logout')->name('logout');

    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
});

Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');

Route::get('/send-mail', [SendEmailController::class, 'index'])->name('kirim-email');
Route::resource('posts', PostController::class);
Route::resource('gallery', GalleryController::class);
Route::get('/dashboard2', [PostController::class, 'dashboard2'])-> name('dashboard2');