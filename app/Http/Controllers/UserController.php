<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
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
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'phone' => ['numeric', 'min_digits:10', 'max_digits:13'],
            'address' => ['required', 'min:5']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        return redirect(route('home'));
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

        if (auth()->attempt($formFields)) {
            $req->session()->regenerate();

            return redirect(route('home'));
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    // Logout user
    public function logout()
    {
        auth()->logout();
        return redirect(route('home'));
    }
}
