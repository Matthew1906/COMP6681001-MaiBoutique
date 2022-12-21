@extends('layout')

@section('title', "Edit Password")

@section('body')
<div class="update-password flex justify-center my-16">
    <div class="update-password w-[400px] bg-white rounded-lg p-8">
        <h2 class="text-3xl text-center">
            Update Password
        </h2>

        <form action="{{ route('users.update', ['user_id'=>Auth::id()]) }}" method="POST" class="my-8 w-full">
            @csrf
            @method('patch')
            <div class="old-password mt-4">
                <label for="old-password">
                    Old Password
                </label><br>
                <input type="password" name="old-password" id="old-password" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                placeholder="(5-20 letters)">

                @error('old-password')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="new-password mt-4">
                <label for="new-password">
                    New Password
                </label><br>
                <input type="password" name="new-password" id="new-password" class="w-full border-2 rounded-md px-2 py-1 mt-2"
                placeholder="(5-20 letters)">

                @error('new-password')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit"
                class="w-full rounded-md bg-green-600 hover:bg-green-700 p-2 mt-8
                text-white text-lg font-bold">
                Save
            </button>
        </form>
        <a href="{{URL::previous()}}"
            class="py-2 px-8 rounded-lg border-2 border-red-600 text-red-600
            hover:bg-red-600 hover:text-white">
                Back
        </a>
    </div>
</div>

@endsection
