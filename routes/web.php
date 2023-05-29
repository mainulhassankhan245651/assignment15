<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
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


Route::get('/signup',function(){
    return view('page.signup');
});

Route::get('/register',[FormController::class,'registerValidation']);

// Route::get('/home', [FormController::class, 'RedirectsReq']);

Route::get('/home', function () {
    return redirect('/dashboard', 302);
});
Route::get('/dashboard', function () {
    return view('page.dashboard');
});



Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/profile', function () {
        // Profile route logic here
    });

    Route::get('/settings', function () {
        // Settings route logic here
    });

    // Add more authenticated routes within this group if needed
});

Route::get('/contact',function(){
    return view('page.contact');
   });

Route::post('/sendmail', ContactController::class);

Route::resource('products', ProductController::class);

Route::get('/',function(){
    return view('page.welcome');
});
