<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ThingController;
use App\Http\Controllers\UseThingController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\MainController;

//Auth
Route::get('/auth/signup', [AuthController::class, 'signup']);
Route::post('/auth/registr', [AuthController::class, 'registr']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/signin', [AuthController::class, 'authenticate']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

//Things
Route::resource('thing', ThingController::class);
Route::get('thing/{thing}', [ThingController::class, 'show'])->name('thing.show');

Route::post('/usething/{thing}/use', [UseThingController::class, 'store'])->name('usething.store');

//Places
Route::resource('place', PlaceController::class);
Route::get('place/{place}', [PlaceController::class, 'show'])->name('place.show');


Route::get('/', [MainController::class, 'index'])->name('main.index');
