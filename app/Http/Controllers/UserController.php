<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function create(array $data)
    {
        return User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );
    }

    public function getRegistration()
    {
     return view('register');
    }

    public function postRegistration(RegisterRequest $request) {
        $request->validated();
        $data = $request->all();
        $this->create($data);
        return redirect(url("login"))->withSuccess('You have signed-in');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(LoginRequest $request) {
        $request->validated();
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect(url("main"))->with('Signed in');
        }
        return redirect('login')->withSuccess('Login details are not valid');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
