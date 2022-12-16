<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Show profile
    public function profile() {
        return view('pages.profile');
    }

    // Show edit profile form
    public function editProfile() {
        return view('pages.edit-profile');
    }

    // Show edit password form
    public function editPassword() {
        return view('pages.edit-password');
    }

    // Update profile
    public function update(Request $req) {
        if(array_key_exists("old-password", $req->input())){
            $formFields = $req->validate([
                'old-password' => ['required', 'current_password'],
                'new-password' => ['required', 'min:5', 'max:20']
            ]);

            $password = bcrypt($formFields['new-password']);

            $formFields = [
                'password' => $password
            ];
        }
        else{
            $formFields = $req->validate([
                'username' => ['required', 'min:5', 'max:20'],
                'email' => ['required', 'email'],
                'phone' => ['numeric', 'min_digits:10', 'max_digits:13'],
                'address' => ['required', 'min:5']
            ]);
        }
        User::where('id', '=', Auth::id())->update($formFields);
        return redirect(route('users.show', ['user_id'=>Auth::id()]));
    }
}
