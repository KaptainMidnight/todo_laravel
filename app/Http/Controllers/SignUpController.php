<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index()
    {
        return view('auth.signup');
    }

    public function registration(SignUpRequest $request)
    {
        $user = User::create($request->only(['name', 'email', 'password']));
        auth()->login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
