<?php

use Illuminate\Support\Facades\Route;
/* Controllers */
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\RoomController;

/* Routing */
Route::get('/', [UniversityController::class, 'index'])->name('home');
Route::get('/createUniversity', [UniversityController::class, 'create'])->name('createUniversitiesGet');
Route::get('/updateUniversity/{id}', [UniversityController::class, 'updateById'])->name('updateUniversities');
Route::get('/university/{id}', [RoomController::class, 'index'])->name('university');

Route::post('/createRoom', [RoomController::class, 'formReciver'])->name('createRoom');
Route::post('/createUniversity', [UniversityController::class, 'formReciver'])->name('createUniversityPost');
Route::put('/createUniversity/{id}', [UniversityController::class, 'formReciver'])->name('createUniversityPut');

Route::get('/deleteUniversity/{id}', [UniversityController::class, 'delete'])->name('deleteUniversity');
Route::get('/deleteRoom/{id}', [RoomController::class, 'delete'])->name('deleteUniversityRoom');