<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function loginIndex(Request $request)
    {
        return Inertia::render('Auth/LoginView');
    }

    public function loginStore() {}

    public function registerIndex()
    {
        return Inertia::render('Auth/RegisterView');
    }

    public function registerStore() {}
}
