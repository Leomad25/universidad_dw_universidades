<?php

use Illuminate\Support\Facades\Route;
/* Controllers */
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\RoomController;

/* Routing */
Route::get('/', [UniversityController::class, 'index'])->name('home');
Route::get('/createUniversity', [UniversityController::class, 'create'])->name('createUniversitiesGet');
Route::get('/university/{id}', [RoomController::class, 'index'])->name('university');

Route::post('/createUniversity', [UniversityController::class, 'formReciver'])->name('createUniversitiesPost');
Route::post('/createRoom', [RoomController::class, 'formReciver'])->name('createRoom');