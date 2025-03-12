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

Route::get('/temp', function () {
    return view('welcome');
})->name('home');
// Route d'accueil
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

// Routes pour le blog public
Route::get('/blog', [App\Http\Controllers\PostController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{slug}', [App\Http\Controllers\PostController::class, 'blogShow'])->name('blog.show');


// Routes d'administration
Route::prefix('admin')->name('admin.')->group(function () {
    // Routes d'authentification
    Route::match(['get', 'post'], '/login', [App\Http\Controllers\AdminDashboardController::class, 'login'])->name('login');
    Route::get('/logout', [App\Http\Controllers\AdminDashboardController::class, 'logout'])->name('logout');

    // Routes protégées par le middleware admin.access
    Route::middleware(['admin.access'])->group(function () {
        // Dashboard
        Route::get('/', [App\Http\Controllers\AdminDashboardController::class, 'dashboard'])->name('dashboard');

        // Routes de ressources
        Route::resource('categories', App\Http\Controllers\CategoryController::class);
        Route::resource('posts', App\Http\Controllers\PostController::class);
        Route::resource('projects', App\Http\Controllers\ProjectController::class);
        Route::resource('skills', App\Http\Controllers\SkillController::class);
        Route::resource('experiences', App\Http\Controllers\ExperienceController::class);

        // Paramètres du site
        Route::get('settings/{group?}', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings/{group}', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
        Route::get('settings/clear-cache', [App\Http\Controllers\SettingsController::class, 'clearCache'])->name('settings.clear-cache');

        // Profil
        Route::get('profile', [App\Http\Controllers\SettingsController::class, 'profile'])->name('settings.profile');
        Route::put('profile', [App\Http\Controllers\SettingsController::class, 'updateProfile'])->name('settings.update-profile');

        // Analytiques
        Route::get('analytics', [App\Http\Controllers\AnalyticsController::class, 'index'])->name('analytics');
    });
});
