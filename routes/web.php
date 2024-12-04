<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;

Route::get('/Division', DivisionController::class .'@index')->name('Division.index');
Route::get('/Division/create', [DivisionController::class, 'create'])->name('Division.create');
Route::post('/Division', [DivisionController::class, 'store'])->name('Division.store');
Route::get('/Division/{id}/edit', [DivisionController::class, 'edit'])->name('Division.edit');
Route::delete('/Division/{id}', [DivisionController::class, 'destroy'])->name('Division.destroy');
Route::put('/Division/{id}', [DivisionController::class, 'update'])->name('Division.update');

Route::get('/Unit', UnitController::class .'@index')->name('Unit.index');
Route::get('/Unit/create', [UnitController::class, 'create'])->name('Unit.create');
Route::post('/Unit', [UnitController::class, 'store'])->name('Unit.store');
Route::get('/Unit/{id}/edit', [UnitController::class, 'edit'])->name('Unit.edit');
Route::delete('/Unit/{id}', [UnitController::class, 'destroy'])->name('Unit.destroy');
Route::put('/Unit/{id}', [UnitController::class, 'update'])->name('Unit.update');

Route::get('/User', UserController::class .'@index')->name('User.index');
Route::get('/User/create', [UserController::class, 'create'])->name('User.create');
Route::post('/User', [UserController::class, 'store'])->name('User.store');
Route::get('/User/{id}/edit', [UserController::class, 'edit'])->name('User.edit');
Route::delete('/User/{id}', [UserController::class, 'destroy'])->name('User.destroy');
Route::put('/User/{id}', [UserController::class, 'update'])->name('User.update');

