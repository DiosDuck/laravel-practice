<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class OrderController extends Controller implements HasMiddleware
{
    function index() {
        return view('order.index');
    }

    function handleOrder(Request $request) {
        dd($request->all());
    }

    public static function middleware()
    {
        return [new Middleware('check_role:admin', except: ['index'])];
    }
}
