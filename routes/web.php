<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']) ->name('home.index');

// student routes
Route::get('/student', [App\Http\Controllers\StudentController::class, 'index']) -> name('student.index');
Route::get('/student/create', [App\Http\Controllers\StudentController::class, 'create']) -> name('student.create');
Route::get('/student/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit']) -> name('student.edit');
Route::get('/student/show/{id}', [App\Http\Controllers\StudentController::class, 'show']) -> name('student.show');
Route::get('/student/destroy/{id}', [App\Http\Controllers\StudentController::class, 'destroy']) -> name('student.destroy');
Route::get('/student/trash', [App\Http\Controllers\StudentController::class, 'trash'])->name('student.trash');
Route::get('/student/restoreAll', [App\Http\Controllers\StudentController::class, 'restoreAll'])->name('student.restoreAll');
Route::get('/student/deleteAll', [App\Http\Controllers\StudentController::class, 'deleteAll'])->name('student.deleteAll');
Route::get('/student/restore/{id}', [App\Http\Controllers\StudentController::class, 'restore']) -> name('student.restore');
Route::get('/student/deleteFromTrash/{id}', [App\Http\Controllers\StudentController::class, 'deleteFromTrash']) -> name('student.deleteFromTrash');


Route::post('/student/store', [App\Http\Controllers\StudentController::class, 'store']) -> name('student.store');
Route::post('/student/update/{id}', [App\Http\Controllers\StudentController::class, 'update']) -> name('student.update');


// teacher routes
Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index']) -> name('teacher.index');
Route::get('/teacher/create', [App\Http\Controllers\TeacherController::class, 'create']) -> name('teacher.create');
Route::get('/teacher/show/{id}', [App\Http\Controllers\TeacherController::class, 'show']) -> name('teacher.show');
Route::get('/teacher/edit/{id}', [App\Http\Controllers\TeacherController::class, 'edit']) -> name('teacher.edit');
Route::get('/teacher/destroy/{id}', [App\Http\Controllers\TeacherController::class, 'destroy']) -> name('teacher.destroy');
Route::get('/teacher/trash', [App\Http\Controllers\TeacherController::class, 'trash'])->name('teacher.trash');
Route::get('/teacher/restoreAll', [App\Http\Controllers\TeacherController::class, 'restoreAll'])->name('teacher.restoreAll');
Route::get('/teacher/deleteAll', [App\Http\Controllers\TeacherController::class, 'deleteAll'])->name('teacher.deleteAll');
Route::get('/teacher/restore/{id}', [App\Http\Controllers\TeacherController::class, 'restore']) -> name('teacher.restore');
Route::get('/teacher/deleteFromTrash/{id}', [App\Http\Controllers\TeacherController::class, 'deleteFromTrash']) -> name('teacher.deleteFromTrash');


Route::post('/teacher/store', [App\Http\Controllers\TeacherController::class, 'store']) -> name('teacher.store');
Route::post('/teacher/update/{id}', [App\Http\Controllers\TeacherController::class, 'update']) -> name('teacher.update');


// staff routes
Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index']) -> name('staff.index');
Route::get('/staff/create', [App\Http\Controllers\StaffController::class, 'create']) -> name('staff.create');
Route::get('/staff/show/{id}', [App\Http\Controllers\StaffController::class, 'show']) -> name('staff.show');
Route::get('/staff/edit/{id}', [App\Http\Controllers\StaffController::class, 'edit']) -> name('staff.edit');
Route::get('/staff/destroy/{id}', [App\Http\Controllers\StaffController::class, 'destroy']) -> name('staff.destroy');
Route::get('/staff/trash', [App\Http\Controllers\StaffController::class, 'trash'])->name('staff.trash');
Route::get('/staff/restoreAll', [App\Http\Controllers\StaffController::class, 'restoreAll'])->name('staff.restoreAll');
Route::get('/staff/deleteAll', [App\Http\Controllers\StaffController::class, 'deleteAll'])->name('staff.deleteAll');
Route::get('/staff/restore/{id}', [App\Http\Controllers\StaffController::class, 'restore']) -> name('staff.restore');
Route::get('/staff/deleteFromTrash/{id}', [App\Http\Controllers\StaffController::class, 'deleteFromTrash']) -> name('staff.deleteFromTrash');

Route::post('/staff/store', [App\Http\Controllers\StaffController::class, 'store']) -> name('staff.store');
Route::post('/staff/update/{id}', [App\Http\Controllers\StaffController::class, 'update']) -> name('staff.update');
