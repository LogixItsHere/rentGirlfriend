<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/single/{id}', [App\Http\Controllers\HomeController::class, 'single']);
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    // Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::controller(App\Http\Controllers\Admin\GirlfriendController::class)->group(function () {
        Route::get('/girlfriend', 'index');
        Route::get('/girlfriend/create', 'create');
        Route::post('/girlfriend', 'store');
        Route::delete('/girlfriend/delete/{id}', 'destroy');
        Route::get('/girlfriend/edit/{id}', 'edit');
        Route::put('/girlfriend/update/{id}', 'update');
        Route::delete('/girlfriend/deleteimage/{id}', 'deleteimage');
    });
   
});
