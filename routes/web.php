<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ContactInfoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔹 Public pages
Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/blogs', 'blogs')->name('blogs');
Route::view('/portfolio', 'portfolio')->name('portfolio');
Route::view('/single-portfolio', 'singleportfolio')->name('singleportfolio');

// 🔹 Contact page
Route::get('/contact', [ContactPageController::class, 'index'])->name('contact');
Route::post('/contact', [ContactPageController::class, 'store'])->name('contact.store');

// 🔹 Public services
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

// 🔹 Dashboard (admin + editor only)
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'role:admin|editor'])
  ->name('dashboard');

// 🔹 Profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔹 Admin-only routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    // User management
    Route::get('/admin/users', [UserManagementController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/{id}/assign-role', [UserManagementController::class, 'assignRole'])->name('admin.users.assignRole');
    Route::delete('/admin/users/{id}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy');

    // Contact info
    Route::get('/admin/contact-info', [ContactInfoController::class, 'edit'])->name('admin.contact-info.edit');
    Route::put('/admin/contact-info', [ContactInfoController::class, 'update'])->name('admin.contact-info.update');
});

// 🔹 Admin/Editor: Service CRUD
Route::middleware(['auth', 'role:admin|editor'])->group(function () {
    Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/admin/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
});

// 🔹 Auth routes (login, register, etc.)
require __DIR__ . '/auth.php';
