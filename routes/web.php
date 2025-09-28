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
use App\Http\Controllers\Admin\ContactMessageController;

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
Route::get('/AtoZdashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


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
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // User Management
        Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
        Route::post('/users/{id}/assign-role', [UserManagementController::class, 'assignRole'])->name('users.assignRole');
        Route::delete('/users/{id}', [UserManagementController::class, 'destroy'])->name('users.destroy');

        // Roles
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
        Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });


// =======================
// 🔹 Admin + Editor (Permissions enforced)
// =======================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Home Sections
    Route::get('/home-sections', [HomeSectionController::class, 'index'])
        ->middleware('permission: edit home')
        ->name('home.index');
    Route::get('/home-sections/{homeSection}/edit', [HomeSectionController::class, 'edit'])
        ->middleware('permission:edit home')->name('home.edit');
    Route::put('/home-sections/{homeSection}', [HomeSectionController::class, 'update'])
        ->middleware('permission:edit home')->name('home.update');

    // About Sections
    Route::get('/about-sections', [AboutSectionController::class, 'index'])
        ->middleware('permission:edit about')
        ->name('about.index');
    Route::get('/about-sections/{aboutSection}/edit', [AboutSectionController::class, 'edit'])
        ->middleware('permission:edit about')->name('about.edit');
    Route::put('/about-sections/{aboutSection}', [AboutSectionController::class, 'update'])
        ->middleware('permission:edit about')->name('about.update');

    // Services
    Route::get('/services', [ServiceController::class, 'adminIndex'])
        ->middleware('permission:view services|create services|edit services|delete services')
        ->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])
        ->middleware('permission:create services')->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])
        ->middleware('permission:create services')->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])
        ->middleware('permission:edit services')->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])
        ->middleware('permission:edit services')->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])
        ->middleware('permission:delete services')->name('services.destroy');
    Route::get('/services/trash', [ServiceController::class, 'trash'])
        ->middleware('permission:delete services|edit services')->name('services.trash');
    Route::put('/services/{id}/restore', [ServiceController::class, 'restore'])
        ->middleware('permission:delete services|edit services')->name('services.restore');
    Route::delete('/services/{id}/force-delete', [ServiceController::class, 'forceDelete'])
        ->middleware('permission:delete services')->name('services.forceDelete');

    // Projects
    Route::get('/projects', [ProjectController::class, 'adminIndex'])
        ->middleware('permission:view projects|create projects|edit projects|delete projects')
        ->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])
        ->middleware('permission:create projects')->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])
        ->middleware('permission:create projects')->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])
        ->middleware('permission:edit projects')->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])
        ->middleware('permission:edit projects')->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])
        ->middleware('permission:delete projects')->name('projects.destroy');
    Route::get('/projects/trash', [ProjectController::class, 'trash'])
        ->middleware('permission:delete projects|edit projects')->name('projects.trash');
    Route::put('/projects/{id}/restore', [ProjectController::class, 'restore'])
        ->middleware('permission:delete projects|edit projects')->name('projects.restore');
    Route::delete('/projects/{id}/force-delete', [ProjectController::class, 'forceDelete'])
        ->middleware('permission:delete projects')->name('projects.forceDelete');

    // Blogs
    Route::get('/blogs', [BlogController::class, 'adminIndex'])
        ->middleware('permission:view blogs|create blogs|edit blogs|delete blogs')
        ->name('blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])
        ->middleware('permission:create blogs')->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])
        ->middleware('permission:create blogs')->name('blogs.store');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])
        ->middleware('permission:edit blogs')->name('blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])
        ->middleware('permission:edit blogs')->name('blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])
        ->middleware('permission:delete blogs')->name('blogs.destroy');
    Route::get('/blogs/trash', [BlogController::class, 'trash'])
        ->middleware('permission:delete blogs|edit blogs')->name('blogs.trash');
    Route::put('/blogs/{id}/restore', [BlogController::class, 'restore'])
        ->middleware('permission:delete blogs|edit blogs')->name('blogs.restore');
    Route::delete('/blogs/{id}/force-delete', [BlogController::class, 'forceDelete'])
        ->middleware('permission:delete blogs')->name('blogs.forceDelete');

    // Teams
    Route::get('/teams', [TeamController::class, 'index'])
        ->middleware('permission:view teams|create teams|edit teams|delete teams')
        ->name('teams.index');
    Route::get('/teams/create', [TeamController::class, 'create'])
        ->middleware('permission:create teams')->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])
        ->middleware('permission:create teams')->name('teams.store');
    Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])
        ->middleware('permission:edit teams')->name('teams.edit');
    Route::put('/teams/{id}', [TeamController::class, 'update'])
        ->middleware('permission:edit teams')->name('teams.update');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])
        ->middleware('permission:delete teams')->name('teams.destroy');

    // Contact Info
    Route::get('/contact-info', [ContactInfoController::class, 'edit'])
        ->middleware('permission:edit contact info')->name('contact-info.edit');
    Route::put('/contact-info', [ContactInfoController::class, 'update'])
        ->middleware('permission:edit contact info')->name('contact-info.update');

    // Contact Messages
    Route::resource('messages', ContactMessageController::class)
        ->only(['index','show','destroy'])
        ->middleware('permission:view messages|delete messages');
    Route::post('messages/{id}/mark-read', [ContactMessageController::class, 'markRead'])
        ->middleware('permission:view messages')->name('messages.markRead');
});

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
        Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
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
