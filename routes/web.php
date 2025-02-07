<?php

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
});

// Login and register routes
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Program User routes
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\UserAccountController;

// Trang danh sách việc làm
Route::get('/jobs', [JobPostController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobPostController::class, 'show'])->name('jobs.show');

// Trang hồ sơ cá nhân
Route::get('/profile', [UserAccountController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [UserAccountController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [UserAccountController::class, 'update'])->name('profile.update');

// Đăng xuất
Route::get('/logout', function() {
    // Logic đăng xuất
    return redirect()->route('jobs.index');
})->name('logout');