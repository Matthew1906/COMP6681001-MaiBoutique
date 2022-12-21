@extends('layout')

@section('title', "Home")

@section('body')
<div class='bg-black bg-opacity-50 w-full h-screen flex justify-center items-center'>
    <div class='text-center px-3 md:px-0'>
        <h1 class='text-white text-2xl md:text-5xl font-bold mb-3'>Welcome to MaiBoutique</h1>
        <p class='text-white text-md md:text-xl font-light mb-3'>Online Boutique that provides you with various
            clothes to suit your various activities.</p>
        @include('components.button', [
            'link' => route('users.create'),
            'text' => 'Sign Up Now',
            'color' => 'fill',
            'size' => 'lg',
        ])
    </div>
</div>
@endsection
