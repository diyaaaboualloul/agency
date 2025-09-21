<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🔹 Public pages
use App\Http\Controllers\Admin\HomeSectionController;

Route::get('/', [HomeSectionController::class, 'frontend'])->name('home');


Route::view('/about', 'about')->name('about');

// 🔹 Contact page (public)
Route::get('/contact', [ContactPageController::class, 'index'])->name('contact');
Route::post('/contact', [ContactPageController::class, 'store'])->name('contact.store');

// 🔹 Public services (frontend)
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

// 🔹 Public Portfolio
Route::get('/portfolio', [ProjectController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [ProjectController::class, 'show'])->name('singleportfolio');

// 🔹 Public Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

// 🔹 Dashboard (restricted: admin + editor)
Route::get('/dashboard', function () {
    return view('admin.dashboard2');
})->middleware(['auth', 'verified', 'role:admin|editor'])
  ->name('dashboard');

// 🔹 Profile management (authenticated users only)
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

// 🔹 Admin + Editor: Services CRUD + Soft Delete
Route::middleware(['auth', 'role:admin|editor'])->prefix('admin')->group(function () {
    Route::get('/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
    Route::get('/services/trash', [ServiceController::class, 'trash'])->name('admin.services.trash');
    Route::put('/services/{id}/restore', [ServiceController::class, 'restore'])->name('admin.services.restore');
    Route::delete('/services/{id}/force-delete', [ServiceController::class, 'forceDelete'])->name('admin.services.forceDelete');
});

// 🔹 Admin + Editor: Projects CRUD + Soft Delete
Route::middleware(['auth', 'role:admin|editor'])->prefix('admin')->group(function () {
    Route::get('/projects', [ProjectController::class, 'adminIndex'])->name('admin.projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
    Route::get('/projects/trash', [ProjectController::class, 'trash'])->name('admin.projects.trash');
    Route::put('/projects/{id}/restore', [ProjectController::class, 'restore'])->name('admin.projects.restore');
    Route::delete('/projects/{id}/force-delete', [ProjectController::class, 'forceDelete'])->name('admin.projects.forceDelete');
});

// 🔹 Admin + Editor: Blogs CRUD + Soft Delete
Route::middleware(['auth', 'role:admin|editor'])->prefix('admin')->group(function () {
    Route::get('/blogs', [BlogController::class, 'adminIndex'])->name('admin.blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
    Route::get('/blogs/trash', [BlogController::class, 'trash'])->name('admin.blogs.trash');
    Route::put('/blogs/{id}/restore', [BlogController::class, 'restore'])->name('admin.blogs.restore');
    Route::delete('/blogs/{id}/force-delete', [BlogController::class, 'forceDelete'])->name('admin.blogs.forceDelete');
});



Route::middleware(['auth', 'role:admin|editor'])->prefix('admin')->group(function () {
    Route::get('/home-sections', [HomeSectionController::class, 'index'])->name('admin.home.index');
    Route::get('/home-sections/{homeSection}/edit', [HomeSectionController::class, 'edit'])->name('admin.home.edit');
    Route::put('/home-sections/{homeSection}', [HomeSectionController::class, 'update'])->name('admin.home.update');

    // About
    Route::get('/about-sections', [\App\Http\Controllers\Admin\AboutSectionController::class, 'index'])->name('admin.about.index');
    Route::get('/about-sections/{aboutSection}/edit', [\App\Http\Controllers\Admin\AboutSectionController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about-sections/{aboutSection}', [\App\Http\Controllers\Admin\AboutSectionController::class, 'update'])->name('admin.about.update');
});




// 🔹 Auth routes
require __DIR__ . '/auth.php';
