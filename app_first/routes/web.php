<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;

Route::get('/', [HomeController::class, 'index']);
