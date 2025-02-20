<?php

use Illuminate\Support\Facades\Route;
// Login and register routes
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
// Program User routes
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\UserAccountController;
// Admin routes
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;


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
Route::get('/user_type/job_seeker', [RegisterController::class, 'jobSeekerRegistration'])->name('job_seeker');
Route::post('/user_type/job_seeker', [RegisterController::class, 'jobSeekerRegistrationSubmit']);

Route::get('/user_type/employer', [RegisterController::class, 'employerRegistration'])->name('employer');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Trang danh sách việc làm
Route::get('/jobs', [JobPostController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobPostController::class, 'show'])->name('jobs.show');

// Trang hồ sơ cá nhân
Route::get('/profile/{user_id}', [UserAccountController::class, 'show'])->name('profile.show');
Route::get('/profile/edit/{user_id}', [UserAccountController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update/{user_id}', [UserAccountController::class, 'update'])->name('profile.update');

// Đăng xuất
Route::get('/logout', function() {
    // Logic đăng xuất
    return redirect()->route('jobs.index');
})->name('logout');

Route::resource('jobs', JobController::class);
Route::resource('candidates', CandidateController::class);
