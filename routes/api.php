<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DisabilityController;
use App\Http\Controllers\PresidentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\AssistancesController;
use App\Http\Controllers\CharityController;

// --------------------------------------------
// ✅ ANNOUNCEMENTS
// --------------------------------------------
Route::get('/announcements', [AnnouncementController::class, 'index']);   // GET all
Route::post('/announcements', [AnnouncementController::class, 'store']); // CREATE
Route::put('/announcements/{id}', [AnnouncementController::class, 'update']); // UPDATE
Route::delete('/announcements/{id}', [AnnouncementController::class, 'destroy']); // DELETE
Route::patch('/announcements/{id}/attend', [AnnouncementController::class, 'markAsAttended']); // Mark attended

// --------------------------------------------
// ✅ REPORTS
// --------------------------------------------
Route::get('/reports', [ReportController::class, 'index']);     // GET all reports
Route::post('/reports', [ReportController::class, 'store']);    // UPLOAD report
Route::delete('/reports/{id}', [ReportController::class, 'destroy']); // DELETE
Route::get('/reports/download/{id}', [ReportController::class, 'download']); // DOWNLOAD

// --------------------------------------------
// ✅ ATTENDANCE
// --------------------------------------------
Route::get('/attendance', [AttendanceController::class, 'index']);   // GET all attendance
Route::post('/attendance', [AttendanceController::class, 'store']); // CREATE attendance
Route::get('/attendance/history/{announcement}', [AttendanceController::class, 'history']); // Attendance history

// --------------------------------------------
// ✅ CLASSIFICATIONS
// --------------------------------------------
Route::get('/classifications', [ClassificationController::class, 'index']);   // GET all
Route::post('/classifications/store', [ClassificationController::class, 'store']); // ADD classification

// --------------------------------------------
// ✅ DISABILITY STATS
// --------------------------------------------
Route::get('/disability_statistics', [DisabilityController::class, 'index']);
Route::post('/disability_statistics', [DisabilityController::class, 'store']);
Route::delete('/disability_statistics/barangay/{barangayName}', [DisabilityController::class, 'deleteBarangay']);

// --------------------------------------------
// ✅ ASSISTANCES (Benefits/Privileges)
// --------------------------------------------
Route::get('/assistances', [AssistancesController::class, 'index']);
Route::post('/assistances', [AssistancesController::class, 'store']);
Route::get('/assistances/{id}', [AssistancesController::class, 'show']);
Route::put('/assistances/{id}', [AssistancesController::class, 'update']);
Route::delete('/assistances/{id}', [AssistancesController::class, 'destroy']);
Route::post('/assistances/{id}/toggle-status', [AssistancesController::class, 'toggleStatus']);

// --------------------------------------------
// ✅ POLICIES
// --------------------------------------------
Route::get('/policies', [PoliciesController::class, 'index']);

// --------------------------------------------
// ✅ PRESIDENTS / USERS
// --------------------------------------------
Route::post('/presidents', [PresidentController::class, 'store']); // create president
Route::post('/users', [UserController::class, 'store']);           // create user (PWD)

// --------------------------------------------
// ✅ CHARITY
// --------------------------------------------
Route::get('/charity', [CharityController::class, 'index']);
Route::post('/charity/{id}/approve', [CharityController::class, 'approve']);
Route::post('/charity/{id}/reject', [CharityController::class, 'reject']);
