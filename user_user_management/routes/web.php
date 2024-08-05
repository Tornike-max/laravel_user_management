<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentsController::class, 'index'])->name('students.index')->middleware('auth');
Route::get('/students/show/{student}', [StudentsController::class, 'show'])->middleware('auth');

Route::get('/students/create', [StudentsController::class, 'create'])->middleware('auth');
Route::post('/students/create', [StudentsController::class, 'store'])->middleware('auth');
Route::get('/students/edit/{student}', [StudentsController::class, 'edit'])->middleware('auth');
Route::put('/students/update/{student}', [StudentsController::class, 'update'])->middleware('auth');
Route::delete('/students/{student}/delete', [StudentsController::class, 'destroy'])->middleware('auth');


Route::get('/users/register', [UserController::class, 'register'])->name('registerForm');
Route::post('/users/register', [UserController::class, 'registerUser'])->name('register');

Route::get('/users/login', [UserController::class, 'login'])->name('loginForm');
Route::post('/users/login', [UserController::class, 'loginUser'])->name('login');
Route::post('/users/logout', [UserController::class, 'logout'])->name('logout');
