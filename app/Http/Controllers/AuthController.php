<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    // Show register form
    public function create()
    {
        return view('pages.register');
    }

    // Store registered user data
    public function store(Request $req)
    {
        $formFields = $req->validate([
            'username' => ['required', 'min:5', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:5', 'max:20'],
            'phone' => ['numeric', 'min_digits:10', 'max_digits:13'],
            'address' => ['required', 'min:5'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $new_user = new User($formFields);
        $new_user->role_id = 2;
        $new_user->save();

        return redirect(route('products.index'));
    }

    // Show login form
    public function login()
    {
        return view('pages.login');
    }

    // Authenticate user
    public function authenticate(Request $req)
    {
        $formFields = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5', 'max:20']
        ]);
        if (Auth::attempt($formFields)) {
            if($req->remember_me){
                Cookie::queue('email', $req->email, 1440);
                Cookie::queue('password', $req->password, 1440);
            }
            $req->session()->regenerate();
            return redirect(route('products.index'));
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Logout user
    public function logout()
    {
        Auth::logout();
        return redirect(route('products.index'));
    }
}
