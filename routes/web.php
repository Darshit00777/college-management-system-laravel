<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\courseController;
use App\Http\Controllers\studentcontroller;

Route::get('/', function () {
    return view('welcome');
});

//login
Route::get('/login', [authcontroller::class, 'login']);
Route::post('/login/checklogin', [authcontroller::class, 'checklogin']);
Route::get('/user/create', [authcontroller::class, 'create']);
Route::post('/user/store', [authcontroller::class, 'store']);

//course
Route::get('/course/create', [courseController::class, 'create']);
Route::post('/course/store', [courseController::class, 'store']);
Route::get('/course', [courseController::class, 'index']);
Route::get('/course/edit/{id}', [courseController::class, 'edit']);
Route::post('/course/update/{id}', [courseController::class, 'update']);
Route::get('/course/destroy/{id}', [courseController::class, 'destroy']);

//student
Route::get('/student/create/{id}', [studentcontroller::class, "create"]);
Route::post('/student/store', [studentcontroller::class, "store"]);
Route::get('/student/{uid}', [studentcontroller::class, "index"]);
Route::get('/student/edit/{id}/{uid}', [studentcontroller::class, 'edit']);
Route::post('/student/update/{id}/{uid}', [studentcontroller::class, 'update']);
Route::get('/student/destroy/{id}/{uid}', [studentcontroller::class, 'destroy']);
