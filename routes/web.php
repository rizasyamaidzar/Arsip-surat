<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\UserManagementController;

Route::get('/', [ArsipController::class, 'index'])->name('list-arsip');
Route::get('/arsip/{id}', [ArsipController::class, 'detail'])->name('detail-arsip');
Route::get('/create-arsip', [ArsipController::class, 'create'])->name('create-arsip');
Route::post('/store-arsip', [ArsipController::class, 'store'])->name('store-arsip');
Route::post('/delete-arsip', [ArsipController::class, 'destroy'])->name('destroy.arsip');
Route::get('/edit-arsip/{id}', [ArsipController::class, 'edit'])->name('edit-arsip');
Route::post('/update-arsip', [ArsipController::class, 'update'])->name('update-arsip');
Route::put('/arsip/{id}/update-file', [ArsipController::class, 'updateFile'])->name('arsip.updateFile');


Route::get('/category', [CategoryController::class, 'index'])->name('list-category');
Route::get('/category/{id}', [CategoryController::class, 'detail'])->name('detail-category');
Route::get('/create-category', [CategoryController::class, 'create'])->name('create-category');
Route::post('/store-category', [CategoryController::class, 'store'])->name('store-category');
Route::post('/delete-category', [CategoryController::class, 'destroy'])->name('destroy.category');
Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
Route::post('/update-category', [CategoryController::class, 'update'])->name('update-category');
Route::put('/category/{id}/update-file', [CategoryController::class, 'updateFile'])->name('category.updateFile');


Route::get('/about', [AboutController::class, 'index'])->name('about');
