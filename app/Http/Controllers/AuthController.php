<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // GET /login - возвращает страницу логина
    public function showLogin()
    {
        return view('auth.login');
    }

    // POST /login - выполняет логин
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('status', 'logged-in');
        }

        return back()
            ->withErrors(['email' => __('auth.failed')])
            ->withInput()
            ->with('status', 'error');
    }

    // GET /register - возвращает страницу регистрации
    public function showRegister()
    {
        return view('auth.register');
    }

    // POST /register - выполняет регистрацию
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        return redirect('/')
            ->with('status', 'registered');
    }

    // POST /logout - выполняет логаут
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->with('status', 'logged-out');
    }
}
