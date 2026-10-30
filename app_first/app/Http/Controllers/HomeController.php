<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(Request $request) {
        Cache::put('foo2', 'bar2');
        return view('welcome',);
    }
}
