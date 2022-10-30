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

    // Show profile
    public function profile() {
        return view('pages.profile');
    }

    // Show edit profile form
    public function updateProfile() {
        return view('pages.edit-profile');
    }

    // Show edit password form
    public function updatePassword() {
        return view('pages.edit-password');
    }

    // Update profile
    public function update(Request $req) {
        $user = auth()->user();

        if(array_key_exists("old-password", $req->input())){
            $formFields = $req->validate([
                'old-password' => ['required', 'current_password'],
                'new-password' => ['required', 'min:5', 'max:20']
            ]);

            $password = bcrypt($formFields['new-password']);

            $formFields = [
                'password' => $password
            ];

            $user->update($formFields);

            return redirect(route('profile'));
        }
        else{
            $formFields = $req->validate([
                'username' => ['required', 'min:5', 'max:20'],
                'email' => ['required', 'email'],
                'phone' => ['numeric', 'min_digits:10', 'max_digits:13'],
                'address' => ['required', 'min:5']
            ]);

            $user->update($formFields);

            return redirect(route('profile'));
        }
    }
}
