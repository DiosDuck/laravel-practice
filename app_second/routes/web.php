<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('customers/trash', [CustomerController::class, 'trashIndex'])->name('customers.trash');
Route::put('customers/restore/{id}', [CustomerController::class, 'trashRestore'])->name('customers.restore');
Route::delete('customers/hard-delete/{id}', [CustomerController::class, 'trashDelete'])->name('customers.hard-delete');
Route::resource('customers', CustomerController::class);
Route::redirect('/', route('customers.index'));
