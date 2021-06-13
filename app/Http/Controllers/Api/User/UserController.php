<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Requests\UserRequest;
use App\Models\User;
use http\Env\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = Str::random(40);
        Auth::login($user);
        if (User::query()->where('id', Auth::id())->update(['api_token' => $token])) {
            $success['user'] = $user;
            $success['token'] = $token;
            return response()->json($success, 200);

        }
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
            $token = Str::random(40);
            if (User::query()->where("id",  Auth::id())->update(['api_token' => $token])) {
                return response()->json($token, 200);
            }
        }
    }


    public function logout()
    {
        User::query()->where('id', Auth::id())->update(['api_token' => null]);
        return response()->json(null, 204);
    }

}
