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

Route::get('/user_type', [RegisterController::class, 'chooseUserType'])->name('user_type');
Route::get('/user_type/job_seeker', [RegisterController::class, 'jobSeekerRegistration'])->name('job_seeker');
Route::post('/user_type/job_seeker', [RegisterController::class, 'jobSeekerRegistrationSubmit'])->name('job_seeker_submit');

Route::get('/user_type/employer', [RegisterController::class, 'employerRegistration'])->name('employer');
Route::post('/user_type/employer', [RegisterController::class, 'employerRegistrationSubmit'])->name('employer_submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Trang danh sách việc làm
Route::get('/', [JobPostController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobPostController::class, 'show'])->name('jobs.show');

// Trang hồ sơ cá nhân
Route::get('/profile/{profile_url}', [UserAccountController::class, 'show'])->name('profile.show');
Route::get('/profile/edit/{profile_url}', [UserAccountController::class, 'edit'])->name('profile.edit');
Route::post('/profile/edit/{profile_url}', [UserAccountController::class, 'updateJobSeeker'])->name('profile.update');
Route::get('profile/experience/{profile_url}', [UserAccountController::class, 'experienceForm'])->name('profile.experience');
Route::post('profile/experience/{profile_url}', [UserAccountController::class, 'experienceSubmit'])->name('profile.experienceSubmit');
Route::get('profile/education/{profile_url}', [UserAccountController::class, 'educationForm'])->name('profile.education');
Route::post('profile/education/{profile_url}', [UserAccountController::class, 'educationSubmit'])->name('profile.educationSubmit');

Route::get('/profile/company/{profile_url}', [UserAccountController::class, 'showCompany'])->name('profile.company');
Route::get('/profile/company/edit/{profile_url}', [UserAccountController::class, 'editCompany'])->name('profile.company.edit');
Route::post('/profile/company/edit/{profile_url}', [UserAccountController::class, 'updateCompany'])->name('profile.company.update');
Route::get('/profile/company/image/{profile_url}', [UserAccountController::class, 'companyImage'])->name('profile.company.image');
Route::post('/profile/company/image/{profile_url}', [UserAccountController::class, 'companyImageSubmit'])->name('profile.company.image.submit');

Route::get('/jobs/dashboard/{profile_url}', [JobPostController::class, 'dashboard'])->name('employer.dashboard');

// Đăng xuất
Route::get('/logout', function() {
    // API đăng xuất
    return redirect()->route('jobs.index');
})->name('logout');

Route::resource('jobs', JobController::class);
Route::resource('candidates', CandidateController::class);


use App\Http\Controllers\CVController;

Route::get('cv/add', [CVController::class, 'create'])->name('cv.create');
Route::post('cv/store', [CVController::class, 'store'])->name('cv.store');
