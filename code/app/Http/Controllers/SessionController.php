<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.login');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('name', '=', request(['name']))->firstOrFail();
        auth()->login($user);
        return redirect('/');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
