<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔹 Home page (public)
Route::get('/', function () {
    return view('home');
})->name('home');

// 🔹 Dashboard (restricted to admin + editor only)
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'role:admin|editor'])
  ->name('dashboard');

// 🔹 Profile management (only for authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔹 Authentication routes (login, register, etc.)
require __DIR__ . '/auth.php';

// 🔹 Admin-only routes (Role-based protection using Spatie)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/users', [UserManagementController::class, 'index'])
        ->name('admin.users.index');
    Route::post('/admin/users/{id}/assign-role', [UserManagementController::class, 'assignRole'])
        ->name('admin.users.assignRole');
});
Route::get('/about', function () {
    return view('about');
})->name('about');


// 🔹 Public pages
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/blogs', 'blogs')->name('blogs');
Route::view('/portfolio', 'portfolio')->name('portfolio');
Route::view('/services', 'services')->name('services');
Route::view('/single-service', 'singleservice')->name('singleservice');
Route::view('/single-portfolio', 'singleportfolio')->name('singleportfolio');
