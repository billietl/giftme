<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('register.create');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create(request(['name','email','password']));
        auth()->login($user);
        return redirect()->route('home');
    }
}
