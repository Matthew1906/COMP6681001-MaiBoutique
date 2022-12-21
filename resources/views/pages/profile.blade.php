@extends('layout')

@section('title', "My Profile")

@section('body')
<div class="profile-card w-full lg:w-2/5 m-auto mt-8 p-3">
    <div class='p-4 lg:p-8 border-2 border-gray-400 text-center'>
        <h1 class="text-4xl">My Profile</h1>

        <div class="user-label w-fit m-auto bg-gray-400 text-white rounded-lg font-semibold
        my-4 px-8 py-1">
            {{ Auth::user()->role->name }}
        </div>

        <div class="user-details">
            <strong>Username: {{ Auth::user()->username }}</strong>

            <p>{{ Auth::user()->email }}</p>
            <p>Address: {{ Auth::user()->address }}</p>
            <p>Phone: {{ Auth::user()->phone }}</p>
        </div>

        <div class="button-container flex justify-center mt-4">
            @if (Auth::user()->role->name == 'Member')
                <a href="{{ route('users.edit.profile', ['user_id' => Auth::id()]) }}"
                    class="edit-profile mx-8 py-2 px-8 bg-blue-600 text-white  rounded-lg border-2 border-blue-600
                hover:bg-white hover:text-blue-600 transition">
                    Edit Profile
                </a>
            @endif

            <a href="{{ route('users.edit.password', ['user_id' => Auth::id()]) }}"
                class="edit-password mx-8 py-2 px-8 rounded-lg border-2 border-blue-600 text-blue-600
            hover:bg-blue-600 hover:text-white
            transition">
                Edit Password
            </a>
        </div>
    </div>
</div>

@endsection
