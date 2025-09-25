<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =======================
// 🔹 Public Routes
// =======================
Route::get('/', [HomeSectionController::class, 'frontend'])->name('home');

// Contact
Route::get('/contact', [ContactPageController::class, 'index'])->name('contact');
Route::post('/contact', [ContactPageController::class, 'store'])->name('contact.store');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

// Portfolio
Route::get('/portfolio', [ProjectController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [ProjectController::class, 'show'])->name('singleportfolio');

// Blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

// About
Route::get('/about', [AboutSectionController::class, 'frontend'])->name('about');


// =======================
// 🔹 Dashboard (Admin + Editor)
// =======================
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'role:admin|editor'])->name('dashboard');


// =======================
// 🔹 Profile (Authenticated)
// =======================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// =======================
// 🔹 Admin Only
// =======================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // User Management
    Route::get('/users', [UserManagementController::class, 'index'])->name('admin.users.index');
    Route::post('/users/{id}/assign-role', [UserManagementController::class, 'assignRole'])->name('admin.users.assignRole');
    Route::delete('/users/{id}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy');

    // Contact Info
    Route::get('/contact-info', [ContactInfoController::class, 'edit'])->name('admin.contact-info.edit');
    Route::put('/contact-info', [ContactInfoController::class, 'update'])->name('admin.contact-info.update');

    // Roles
    Route::get('/roles', [RoleController::class, 'index'])->name('admin.roles.index');
    Route::post('/roles', [RoleController::class, 'store'])->name('admin.roles.store');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy');
});


// =======================
// 🔹 Admin + Editor
// =======================
Route::middleware(['auth', 'role:admin|editor'])->prefix('admin')->group(function () {
    // Services
    Route::get('/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
    Route::get('/services/trash', [ServiceController::class, 'trash'])->name('admin.services.trash');
    Route::put('/services/{id}/restore', [ServiceController::class, 'restore'])->name('admin.services.restore');
    Route::delete('/services/{id}/force-delete', [ServiceController::class, 'forceDelete'])->name('admin.services.forceDelete');

    // Projects
    Route::get('/projects', [ProjectController::class, 'adminIndex'])->name('admin.projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
    Route::get('/projects/trash', [ProjectController::class, 'trash'])->name('admin.projects.trash');
    Route::put('/projects/{id}/restore', [ProjectController::class, 'restore'])->name('admin.projects.restore');
    Route::delete('/projects/{id}/force-delete', [ProjectController::class, 'forceDelete'])->name('admin.projects.forceDelete');

    // Blogs
    Route::get('/blogs', [BlogController::class, 'adminIndex'])->name('admin.blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
    Route::get('/blogs/trash', [BlogController::class, 'trash'])->name('admin.blogs.trash');
    Route::put('/blogs/{id}/restore', [BlogController::class, 'restore'])->name('admin.blogs.restore');
    Route::delete('/blogs/{id}/force-delete', [BlogController::class, 'forceDelete'])->name('admin.blogs.forceDelete');

    // Home Sections
    Route::get('/home-sections', [HomeSectionController::class, 'index'])->name('admin.home.index');
    Route::get('/home-sections/{homeSection}/edit', [HomeSectionController::class, 'edit'])->name('admin.home.edit');
    Route::put('/home-sections/{homeSection}', [HomeSectionController::class, 'update'])->name('admin.home.update');

    // About Sections
    Route::get('/about-sections', [AboutSectionController::class, 'index'])->name('admin.about.index');
    Route::get('/about-sections/{aboutSection}/edit', [AboutSectionController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about-sections/{aboutSection}', [AboutSectionController::class, 'update'])->name('admin.about.update');

    // Teams
    Route::get('/teams', [TeamController::class, 'index'])->name('admin.teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('admin.teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('admin.teams.store');
    Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('admin.teams.edit');
    Route::put('/teams/{id}', [TeamController::class, 'update'])->name('admin.teams.update');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('admin.teams.destroy');
});


// =======================
// 🔹 Auth Routes
// =======================
require __DIR__ . '/auth.php';


// =======================
// 🔹 Fallback (404)
// =======================
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
use App\Http\Controllers\Admin\ContactMessageController;

Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function () {
    Route::resource('messages', ContactMessageController::class)->only(['index','show','destroy']);
    
    Route::post('messages/{id}/mark-read', [ContactMessageController::class, 'markRead'])
         ->name('messages.markRead');
});

// ========================================================================
// ROLE PERMISSIONS
// ========================================================================
// 🔑 Admin:
// - Full access to everything (users, roles, contact info, all CRUD).
// - Can manage Users & Roles (assign/delete), Contact Info, Services,
//   Projects, Blogs, Teams, Home Sections, About Sections.
// - Can restore and permanently delete items from trash.
// - Unlimited control.
//
// ✏️ Editor:
// - Can access dashboard and manage content only.
// - Can manage Services, Projects, Blogs, Teams, Home Sections, About Sections.
// - Can create, edit, delete (soft delete), restore content.
// - Cannot manage Users, Roles/Permissions, or Contact Info.
//
// 👀 Viewer:
// - Public visitor only.
// - Can see frontend pages (Home, Services, Portfolio, Blogs, About, Contact).
// - Cannot access dashboard or any admin routes.
// ========================================================================
