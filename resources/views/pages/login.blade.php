@extends('layout')

@section('title', "Sign In")

@section('body')
<div class="login flex justify-center my-16">
    <div class="login flex flex-col items-center w-[400px] bg-white rounded-lg p-8">
        <h2 class="text-3xl font-semibold">
            Sign In
        </h2>
        <form action="{{ route('users.authenticate') }}" method="POST" class="mt-2 w-full">
            @csrf
            <div class="email mt-2">
                <label for="email">
                    Email
                </label><br>
                <input type="text" name="email" id="email" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    value="{{ Cookie::get('email')? Cookie::get('email') : old('email') }}">

                @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="password mt-2">
                <label for="password">
                    Password
                </label><br>
                <input type="password" name="password" id="password" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                    placeholder="(5-20 letters)" value="{{ Cookie::get('password')? Cookie::get('password') : old('password') }}">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="remember_me mt-2 flex justify-end items-center gap-1">
                <input type="checkbox" name="remember_me" id="remember_me">
                <label for="remember_me">
                    Remember Me
                </label>
            </div>
            <button type="submit"
                class="w-full rounded-md bg-blue-400 hover:bg-blue-600 p-2 mt-6
                text-white text-lg font-bold">
                Sign In
            </button>
        </form>
        <div class="sign-in text-sm mt-4">
            Not Registered yet?
            <a href="{{ route('users.create') }}" class="underline text-blue-400 hover:text-blue-600">
                Register Here
            </a>
        </div>
    </div>
</div>

@endsection
