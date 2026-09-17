<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/file-upload', [FileUploadController::class, 'index'])->name('file.upload');
Route::post('/file-upload', [FileUploadController::class, 'submit'])->name('file.submit');
Route::get('/file-download', [FileUploadController::class, 'download'])->name('file.download');
Route::get('/file-delete', [FileUploadController::class, 'delete'])->name('file.delete');
