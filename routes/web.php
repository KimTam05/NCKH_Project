<?php

use Illuminate\Support\Facades\Route;
// Login and register routes
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
// Program User routes
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\UserAccountController;


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
Route::get('/user_type', [RegisterController::class, 'chooseUserType'])->name('user_type');
Route::post('/user_type', [RegisterController::class, 'submitUserType']);
Route::get('register/{user_type_id}', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register/{user_type_id}', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

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
<<<<<<< HEAD

// Admin routes
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;

Route::resource('jobs', JobController::class);
Route::resource('candidates', CandidateController::class);
=======
>>>>>>> 9b9cfc613200c267f96190f095dec99e208a5b3e
