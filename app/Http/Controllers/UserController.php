<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required', Rule::unique('users', 'name'),
            'email' => 'required|email', Rule::unique('users', 'email'),
            'password' => 'required|min:6',
        ], [
            'username.required' => 'Username is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);

        return redirect('/landing-page')->with('success', 'Registration successful!');
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            'loginemail' => 'required|email',
            'loginpassword' => 'required|min:6',
        ], [
            'loginemail.required' => 'Email is required',
            'loginemail.email' => 'Email is invalid',
            'loginpassword.required' => 'Password is required',
            'loginpassword.min' => 'Password must be at least 6 characters',
        ]);
        
        if (Auth::attempt(['email' => $request->loginemail, 'password' => $request->loginpassword])) {
            $request->session()->regenerate();
            return redirect('/landing-page')->with('success', 'Login successful!');
            
        } else {
            return redirect('/login')->with('error', 'Invalid credentials!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('/landing-page')->with('success', 'Logout successful!');
    }
}