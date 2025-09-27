<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisabilityController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes for Flutter Mobile App
|--------------------------------------------------------------------------
| These routes return JSON responses and are intended for mobile integration.
| Authentication is handled using Sanctum.
*/

// ✅ PUBLIC AUTH ROUTES (accessible without auth)
Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'register']);

// ✅ PROTECTED ROUTES (accessible only with valid token)
Route::middleware('auth:sanctum')->group(function () {

    // ✅ DISABILITY MODULE
    Route::get('/disability', [DisabilityController::class, 'index']);                       // Get all disability stats
    Route::post('/disability', [DisabilityController::class, 'store']);                      // Add new disability record
    Route::delete('/disability/barangay/{barangayName}', [DisabilityController::class, 'deleteBarangay']); // Delete by barangay

    // ✅ ANNOUNCEMENTS
    Route::get('/announcements', [AnnouncementController::class, 'index']);                  // Get all announcements
    Route::post('/announcements', [AnnouncementController::class, 'store']);                 // Create new announcement

    // ✅ ATTENDANCE
    Route::post('/attendance', [AttendanceController::class, 'store']);                      // Submit attendance

    // ✅ REPORTS
    Route::get('/reports', [ReportController::class, 'index']);                              // List reports
    Route::post('/reports', [ReportController::class, 'store']);                             // Add new report

    // ✅ LOGOUT (optional)
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/signup', [AuthController::class, 'register']);  // with role
Route::post('/login', [AuthController::class, 'login']);      // checks admin or president
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// API route for mobile (Flutter or similar) to add account
Route::post('/addacc', [AuthController::class, 'addAccount'])->name('addacc');


Route::middleware('auth:sanctum')->post('/addacc', [AuthController::class, 'addAccount'])->name('addacc');

Route::get('/api/announcements', [AnnouncementController::class, 'index']);

Route::get('/announcements', [AnnouncementController::class, 'index']);
Route::post('/announcements', [AnnouncementController::class, 'store']); // if you want mobile to post too



