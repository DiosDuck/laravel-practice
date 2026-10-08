<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use App\Mail\DemoMail;

Route::get('/', [HomeController::class, 'index']);

Route::get('send-mail', function (Request $request) {
    return view('send-mail', ['email_sent' => $request->email_sent]);
})->name('send-mail.form');

Route::post('send-mail', function (Request $request) {
    Mail::to($request->email)->queue(new DemoMail($request->message));
    return to_route('send-mail.form', ['email_sent' => true]);
})->name('send-mail.submit');
