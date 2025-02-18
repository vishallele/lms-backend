<?php

use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index']);

  //User route
  Route::get('/users', [UserController::class, 'index']);
  Route::get('/users/type', [UserController::class, 'selectUserType']);
  Route::get('/user/create', [UserController::class, 'create']);
  Route::post('/user/store', [UserController::class, 'store']);
  Route::get('/user/edit/{id}', [UserController::class, 'edit']);
  Route::post('/user/update/{id}', [UserController::class, 'update']);
  Route::post('/user/bulkaction', [UserController::class, 'bulkAction']);

  //Course route
  Route::get('/courses', [CourseController::class, 'index']);
  Route::get('/course/create', [CourseController::class, 'create']);
  Route::post('/course/store', [CourseController::class, 'store']);
  Route::get('/course/edit/{id}', [CourseController::class, 'edit']);
  Route::post('/course/update/{id}', [CourseController::class, 'update']);

  //Module routes
  Route::get('/course/{course_id}/modules', [ModuleController::class, 'index']);
  Route::get('/course/{course_id}/module/create', [ModuleController::class, 'create']);
  Route::post('/course/{course_id}/module/store', [ModuleController::class, 'store']);
  Route::get('/course/{course_id}/module/edit/{module_id}', [ModuleController::class, 'edit']);
  Route::post('/course/{course_id}/module/update/{module_id}', [ModuleController::class, 'update']);

  //Lessons routes
  Route::get('/course/{course_id}/module/{module_id}/lessons', [LessonController::class, 'index']);
  Route::get('/course/{course_id}/module/{module_id}/lesson/create', [LessonController::class, 'create']);
  Route::post('/course/{course_id}/module/{module_id}/lesson/store', [LessonController::class, 'store']);
  Route::get(
    '/course/{course_id}/module/{module_id}/lesson/edit/{lesson_id}',
    [LessonController::class, 'edit']
  );
  Route::post(
    '/course/{course_id}/module/{module_id}/lesson/update/{lesson_id}',
    [LessonController::class, 'update']
  );

  //Questions routes
  Route::get(
    '/course/{course_id}/module/{module_id}/lesson/{lesson_id}/questions',
    [QuestionController::class, 'index']
  );

  Route::get(
    '/course/{course_id}/module/{module_id}/lesson/{lesson_id}/question/create',
    [QuestionController::class, 'create']
  );

  Route::post(
    '/course/{course_id}/module/{module_id}/lesson/{lesson_id}/question/store',
    [QuestionController::class, 'store']
  );

  Route::get(
    '/course/{course_id}/module/{module_id}/lesson/{lesson_id}/question/edit/{question_id}',
    [QuestionController::class, 'edit']
  );
  Route::post(
    '/course/{course_id}/module/{module_id}/lesson/{lesson_id}/question/update/{question_id}',
    [QuestionController::class, 'update']
  );


  Route::get('/payments', [PaymentController::class, 'index']);
  Route::get('/configuration', [ConfigurationController::class, 'index']);
  Route::get('/reports', [ReportController::class, 'index']);
});
