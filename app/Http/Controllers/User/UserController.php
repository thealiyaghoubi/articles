<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerCreate()
    {
        return view('users.register');
    }

    public function registerStore(UserRequest $request)
    {

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ];

        Auth::login(User::create($data));
        return redirect('/dashboard');
    }

    public function loginCreate()
    {
        return view('users.login');
    }

    public function loginStore(Request $request)
    {
        if (Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')])) {
            return redirect('/dashboard');
        }
        return redirect()->back()->with('loginError', 'email or password is incorrect.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function index()
    {
        return view('users.dashboard');
    }
}
