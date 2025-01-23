<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResources;
use App\Http\Resources\UserResources;
use App\Models\User;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class AuthController extends Controller
{

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        return Inertia::render('Auth/ProfileView', [
            'user' => new ProfileResources($user)
        ]);
    }

    public function loginIndex(Request $request)
    {
        return Inertia::render('Auth/LoginView');
    }

    public function loginStore(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($data, $request->remember_me)) {
            return to_route('/');
        }

        throw ValidationException::withMessages([
            'email' => 'Kredensial tidak sesuai dengan yang terdaftar'
        ]);


        return redirect()->back();;
    }

    public function registerIndex()
    {
        return Inertia::render('Auth/RegisterView');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'unique:users,email'],
            'no_telp' => ['required', 'max:15'],
            'password' => ['required', 'min:7', 'confirmed']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'no_telp' => $request->no_telp,
            'role_id' => 2
        ]);

        return redirect()->back();
    }


    public function logout()
    {
        Auth::logout();
    }
}
