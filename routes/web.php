<?php

use App\Http\Controllers\Contact;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

Route::post('/contact', [Contact::class, 'index'])->name('contact');
Route::get('post/decouverte-laravel-10', function(){
    return view('post');
})->name('blog-decouverte-laravel-10');

Route::get('post/blog-laravel-10-api', function(){
    return view('post');
})->name('blog-laravel-10-api');

Route::get('post/blog-laravel-10-api-react', function(){
    return view('post');
})->name('blog-laravel-10-api-react');
