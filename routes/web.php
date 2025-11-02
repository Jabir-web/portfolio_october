<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProjectController;

Route::get('/', [PageController::class, 'home'])->name('homepage');

// =========== Auth Controller ===========
Route::get('/auth/login', [PageController::class, 'login'])->name('loginpage');
Route::post('/auth/login', [AuthController::class, 'loginprocess'])->name('loginprocess');
Route::get('/auth/signup', [PageController::class, 'signup'])->name('signuppage');
Route::post('/auth/signup', [AuthController::class, 'register'])->name('signup.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// =========== Auth Controller ===========

// =========== Google Controller ===========
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// =========== Google Controller ===========

// =========== For User ===========
Route::get('/all-users', [UserController::class, 'show'])->name('all.users');
// =========== For User ===========
// =========== For Banner ===========
Route::get('/add-banners', [BannerController::class, 'add'])->name('add.banners');
Route::get('/all-banners', [BannerController::class, 'show'])->name('all.banners');
Route::post('/admin/banner/store', [BannerController::class, 'store'])->name('banner.store');
// =========== For Banner ===========
// =========== For Contact ===========
Route::get('/all-messages', [ContactController::class, 'show'])->name('all.messages');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
// =========== For Contact  ===========
// =========== For Project   ===========
Route::get('/all-projects', [ProjectController::class, 'show'])->name('all.projects');
Route::get('/add-projects', [ProjectController::class, 'view'])->name('add.projects');
Route::post('/admin/projects/store', [ProjectController::class, 'store'])->name('projects.store');
Route::get('projects/{id}/view', [ProjectController::class, 'viewAndRedirect'])->name('project.view');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::delete('/projects/update/{id}', [ProjectController::class, 'update'])->name('projects.update');

// =========== For Project   ===========

