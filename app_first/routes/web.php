<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Models\User;
use App\Models\Order;
use App\Http\Middleware\CheckRoleMiddleware;

Route::get('/', [HomeController::class, 'index']);
Route::get('/relation', function () {
    $order = Order::find(1);
    dd($order->image->path);

    //return view('relation', ['countries' => Country::all()]);
});
Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order', [OrderController::class, 'handleOrder'])->name('order.post');
Route::get('/about', [HomeController::class, 'about']);
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/file-upload', [FileUploadController::class, 'index'])->name('file.upload');
Route::post('/file-upload', [FileUploadController::class, 'submit'])->name('file.submit');
Route::get('/file-download', [FileUploadController::class, 'download'])->name('file.download');
Route::get('/file-delete', [FileUploadController::class, 'delete'])->name('file.delete');
