<?php

use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index']);
  Route::get('/users', [UserController::class, 'index']);
  Route::get('/users/type', [UserController::class, 'selectUserType']);
  Route::get('/user/create', [UserController::class, 'create']);
  Route::post('/user/store', [UserController::class, 'store']);
  Route::get('/user/edit/{id}', [UserController::class, 'edit']);
  Route::post('/user/update/{id}', [UserController::class, 'update']);
  Route::get('/courses', [CourseController::class, 'index']);
  Route::get('/payments', [PaymentController::class, 'index']);
  Route::get('/configuration', [ConfigurationController::class, 'index']);
  Route::get('/reports', [ReportController::class, 'index']);
});
