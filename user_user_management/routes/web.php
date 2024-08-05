<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentsController::class, 'index'])->name('students.index');
Route::get('/students/show/{student}', [StudentsController::class, 'show']);

Route::get('/students/create', [StudentsController::class, 'create']);
Route::post('/students/create', [StudentsController::class, 'store']);
Route::get('/students/edit/{student}', [StudentsController::class, 'edit']);
Route::put('/students/update/{student}', [StudentsController::class, 'update']);
Route::delete('/students/{student}/delete', [StudentsController::class, 'destroy']);
