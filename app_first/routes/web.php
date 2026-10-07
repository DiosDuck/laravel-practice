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
