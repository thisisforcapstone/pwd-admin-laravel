<?php

use App\Http\Controllers\AssistancesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DisabilityController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PresidentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\Ass;
use App\Http\Controllers\CharityController;

// ✅ Public Routes
Route::get('/', [HomeController::class, 'index'])->name('getstarted');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/signup', [AuthController::class, 'showSignUpForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup.submit');
Route::get('/logupchoose', [AuthController::class, 'logupchoose'])->name('logupchoose');

// ✅ Forgot Password Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// ✅ Logout Route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// ✅ Protected Routes (Requires Login)
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DisabilityController::class, 'dashboard'])->name('dashboard');
    Route::get('/policies', [PoliciesController::class, 'index'])->name('policies');
Route::get('/benefits', [AssistancesController::class, 'index'])->name('assistances.index');

// Store new assistance (benefit, privilege, discount)
Route::post('/benefits', [AssistancesController::class, 'store'])->name('assistances.store');

// Show a single assistance
Route::get('/benefits/{id}', [AssistancesController::class, 'show'])->name('assistances.show');

// Edit assistance
Route::get('/benefits/{id}/edit', [AssistancesController::class, 'edit'])->name('assistances.edit');

// Update assistance
Route::put('/benefits/{id}', [AssistancesController::class, 'update'])->name('assistances.update');

// Delete assistance
Route::delete('/benefits/{id}', [AssistancesController::class, 'destroy'])->name('assistances.destroy');

// Toggle status (active/inactive)
Route::post('/benefits/{id}/toggle-status', [AssistancesController::class, 'toggleStatus'])->name('assistances.toggleStatus');
    Route::get('/charity', [CharityController::class, 'index'])->name('charity.index');


    // Announcements CRUD
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');

    Route::resource('announcements', AnnouncementController::class);
    Route::patch('/announcements/{id}/attend', [AnnouncementController::class, 'markAsAttended'])->name('announcements.attend');
    Route::get('/announcements/{id}/history', [AnnouncementController::class, 'history'])->name('announcements.history');


    // Attendance
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/attendance/history/{announcement}', [AttendanceController::class, 'history'])->name('attendance.history');

    // Reports
    Route::resource('reports', ReportController::class);
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');
    Route::get('/reports/download/{id}', [ReportController::class, 'download'])->name('reports.download');
    Route::get('/reports/{id}/download', [ReportController::class, 'download'])->name('reports.download');


    // Classifications
   Route::get('/classifications', [ClassificationController::class, 'index'])->name('classifications');
Route::post('/classifications/store', [ClassificationController::class, 'store'])->name('classifications.store');
    // Settings
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

    // Disability data
    Route::get('/disability_statistics', [DisabilityController::class, 'index'])->name('disability.index');
    Route::post('/disability_statistics', [DisabilityController::class, 'store'])->name('disability.store');
    Route::delete('/disability_statistics/barangay/{barangayName}', [DisabilityController::class, 'deleteBarangay'])->name('disability.delete.barangay');

    // General data store
    Route::post('/save-data', [DisabilityController::class, 'store'])->name('save.data');
    Route::post('/store', [DisabilityController::class, 'store'])->name('general.store');
    Route::delete('/delete-barangay/{barangayName}', [DisabilityController::class, 'deleteBarangay'])->name('delete.barangay');
});

Route::middleware('auth')->get('/dashboard', [DisabilityController::class, 'dashboard'])->name('dashboard');

Route::get('/addacc', [AuthController::class, 'addAccountForm'])->name('addacc');

Route::get('/addacc', [AuthController::class, 'addAccountForm'])->name('addacc');
Route::post('/addacc', [AuthController::class, 'submitAccount'])->name('submitAccount');

Route::post('/save-account', [PresidentController::class, 'saveAccount'])->name('save-account');

Route::post('/save-president', [PresidentController::class, 'store'])->name('president.store');

Route::get('/admin/dashboard', fn() => view('admin.dashboard'))->middleware('auth');
Route::get('/president/dashboard', fn() => view('president.dashboard'))->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Handle the form submission (POST request)
Route::post('/register', [AuthController::class, 'register']);



Route::get('/addacc', function () {
    return view('addacc');
})->name('addacc');
Route::post('/presidents', [UserController::class, 'store'])->name('users.store');

Route::middleware('auth')->group(function () {
    // Charity admin routes
    Route::get('/admin/charity', [CharityController::class, 'index'])->name('charity.admin');
    Route::post('/admin/charity/{id}/approve', [CharityController::class, 'approve'])->name('charity.approve');
    Route::post('/admin/charity/{id}/reject', [CharityController::class, 'reject'])->name('charity.reject');
});



