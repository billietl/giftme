<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\LoginRequest;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('session.login');
    }

    public function store(LoginRequest $request)
    {
        $user = User::where([
            ['name', '=', $request->name],
            ['password', '=', $request->password]
        ])->first();
        auth()->login($user);
        return redirect('/');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
