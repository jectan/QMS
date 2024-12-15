<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RequestDocumentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\RegisteredDocController;
use App\Http\Controllers\DocTypeController;
use App\Http\Controllers\RequestTypeController;

Route::get('/', [SessionController::class, 'create'])->name('Session.create');
Route::post('/login', [SessionController::class, 'store'])->name('Session.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('Session.destroy');

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

Route::get('/Role', RoleController::class .'@index')->name('Role.index');

Route::get('/RequestDocument', RequestDocumentController::class .'@index')->name('RequestDocument.index');
Route::get('/RequestDocument/create', [RequestDocumentController::class, 'create'])->name('RequestDocument.create');
Route::post('/RequestDocument', [RequestDocumentController::class, 'store'])->name('RequestDocument.store');
Route::get('/RequestDocument/{id}/edit', [RequestDocumentController::class, 'edit'])->name('RequestDocument.edit');
Route::delete('/RequestDocument/{id}', [RequestDocumentController::class, 'destroy'])->name('RequestDocument.destroy');
Route::put('/RequestDocument/{id}', [RequestDocumentController::class, 'update'])->name('RequestDocument.update');
Route::get('/RequestDocument/{file}', [RequestDocumentController::class, 'show'])->name('RequestDocument.show');
//Route::get('/RequestDocument/show/{file}', [RequestDocumentController::class, 'download'])->name('RequestDocument.download');

Route::get('/ReviewDocument', ReviewController::class .'@index')->name('Review.index');
Route::get('/ReviewDocument/{id}/create', [ReviewController::class, 'create'])->name('Review.create');
Route::put('/ReviewDocument/{id}', [ReviewController::class, 'store'])->name('Review.store');
Route::get('/ReviewDocument/{id}/edit', [ReviewController::class, 'edit'])->name('Review.edit');
Route::delete('/ReviewDocument/{id}', [ReviewController::class, 'destroy'])->name('Review.destroy');
Route::put('/ReviewDocument/edit/{id}', [ReviewController::class, 'update'])->name('Review.update');

Route::get('/ApproveDocument', ApproveController::class .'@index')->name('Approve.index');
Route::get('/ApproveDocument/{id}/create', [ApproveController::class, 'create'])->name('Approve.create');
Route::put('/ApproveDocument/{id}', [ApproveController::class, 'store'])->name('Approve.store');
Route::get('/ApproveDocument/{id}/edit', [ApproveController::class, 'edit'])->name('Approve.edit');
Route::delete('/ApproveDocument/{id}', [ApproveController::class, 'destroy'])->name('Approve.destroy');
Route::put('/ApproveDocument/edit/{id}', [ApproveController::class, 'update'])->name('Approve.update');

Route::get('/RegisterDocument', RegisteredDocController::class .'@index')->name('Register.index');
Route::get('/RegisterDocument/{id}/create', [RegisteredDocController::class, 'create'])->name('Register.create');
Route::put('/RegisterDocument/{id}', [RegisteredDocController::class, 'store'])->name('Register.store');
Route::get('/RegisterDocument/{id}/edit', [RegisteredDocController::class, 'edit'])->name('Register.edit');
Route::delete('/RegisterDocument/{id}', [RegisteredDocController::class, 'destroy'])->name('Register.destroy');
Route::put('/RegisterDocument/edit/{id}', [RegisteredDocController::class, 'update'])->name('Register.update');

Route::get('/Document', RegisteredDocController::class .'@index2')->name('Registered.index2');
Route::get('/Document/{file}', [RegisteredDocController::class, 'show'])->name('Registered.show');

Route::get('/DocType', DocTypeController::class .'@index')->name('DocType.index');
Route::get('/DocType/create', [DocTypeController::class, 'create'])->name('DocType.create');
Route::post('/DocType', [DocTypeController::class, 'store'])->name('DocType.store');
Route::get('/DocType/{id}/edit', [DocTypeController::class, 'edit'])->name('DocType.edit');
Route::delete('/DocType/{id}', [DocTypeController::class, 'destroy'])->name('DocType.destroy');
Route::put('/DocType/{id}', [DocTypeController::class, 'update'])->name('DocType.update');

Route::get('/RequestType', RequestTypeController::class .'@index')->name('RequestType.index');
