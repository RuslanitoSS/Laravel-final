<?php

use App\Http\Controllers\ThingController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\UsesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::resource('things', ThingController::class)->middleware('auth');
Route::resource('places', PlaceController::class)->middleware('auth');
Route::resource('uses', UsesController::class)->middleware('auth');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
