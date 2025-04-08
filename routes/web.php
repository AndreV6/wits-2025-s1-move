<?php

<<<<<<< HEAD
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClusterController;
=======
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UnitController;
>>>>>>> ady/main
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\CourseController;

require __DIR__.'/auth.php';

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('users', UserController::class);
Route::resource('clusters', \App\Http\Controllers\ClusterController::class);

Route::get('/clusters', [\App\Http\Controllers\ClusterController::class, 'index'])->name('clusters.index');
Route::get('/clusters/{id}', [\App\Http\Controllers\ClusterController::class, 'show'])->name('clusters.show');
Route::get('/clusters/{id}/edit', [\App\Http\Controllers\ClusterController::class, 'edit'])->name('clusters.edit');
Route::delete('/clusters/{id}', [UserController::class, 'destroy'])->name('clusters.destroy');


//Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

Route::middleware('auth')->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class)->except(['index', 'show', 'edit', 'update', 'create', 'destroy']);
});
=======
// Static routes
Route::get('/', [StaticController::class, 'home'])->name('welcome');
Route::get('/about', [StaticController::class, 'about'])->name('about');
Route::get('/contact', [StaticController::class, 'contact'])->name('contact');
>>>>>>> ady/main

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('units', UnitController::class);

Route::resource('users', UserController::class);
Route::resource('clusters', ClusterController::class);

Route::get('/clusters', [ClusterController::class, 'index'])->name('clusters.index');
Route::get('/clusters/{id}', [ClusterController::class, 'show'])->name('clusters.show');
Route::get('/clusters/{id}/edit', [ClusterController::class, 'edit'])->name('clusters.edit');
Route::delete('/clusters/{id}', [UserController::class, 'destroy'])->name('clusters.destroy');

// Course routes for browse, show
Route::get('courses', [CourseController::class, 'index'])
    ->name('courses.index');
// Wild card {id} is constrained in AppServiceProvider.boot()
Route::get('courses/{id}', [CourseController::class, 'show'])
    ->name('courses.show');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)->except(['index', 'show', 'edit', 'update', 'create', 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::resource('courses', CourseController::class)
        ->except(['index', 'show']);
});

Route::resource('packages', PackageController::class)
    ->only(['index', 'edit', 'update', 'destroy', 'show']);
Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
Route::get('/packages/search', [PackageController::class, 'search'])->name('packages.search');
Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/packages/{package}', [PackageController::class, 'show'])->name('packages.show');
Route::get('/packages/edit', [PackageController::class, 'edit'])->name('packages.edit');
