<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="https://twemoji.maxcdn.com/2/svg/1f3ec.svg">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

{{-- Kurang Auth stuff and links (masih placeholder) --}}

<body class='w-full flex flex-col min-h-screen h-auto'>
    <nav
        class='bg-slate-200 px-5 py-2 md:px-10 md:py-5 flex flex-col md:flex-row justify-center md:justify-between items-center gap-2 md:gap-0'>
        <div class='flex flex-col md:flex-row items-center gap-1 md:gap-4'>
            <h1 class='font-semibold text-xl'>MAI BOUTIQUE</h1>
            @auth
                <ul class='font-light md:text-md flex list-none gap-3'>
                    <li><a href={{ route('home') }} class='hover:text-cyan-600'>Home</a></li>
                    <li><a href={{ route('search') }} class='hover:text-cyan-600'>Search</a></li>
                    @if (Auth::id() != 1)
                        <li><a href={{ route('cart', ['user_id' => Auth::id()]) }} class='hover:text-cyan-600'>Cart</a></li>
                        <li><a href="#" class='hover:text-cyan-600'>History</a></li>
                    @endif
                    <li><a href={{ route('profile')}} class='hover:text-cyan-600'>Profile</a></li>
                </ul>
            @endauth
        </div>
        <div class='flex gap-2 md:gap-4'>
            @auth
                @includeWhen(Auth::id() == 1, 'components.button', [
                    'link' => route('create-product'),
                    'text' => 'Add Item',
                    'color' => 'outline',
                    'size' => 'sm',
                ])
                @include('components.button', [
                    'link' => route('logout'),
                    'text' => 'Sign Out',
                    'color' => 'outline',
                    'size' => 'sm',
                ])
            @else
                @include('components.button', [
                    'link' => route('login'),
                    'text' => 'Sign In',
                    'color' => 'outline',
                    'size' => 'sm',
                ])
            @endauth
        </div>
    </nav>
    <main style='@auth background-image:none; @else background-image:url("{{ asset('header.webp') }}"); @endauth'
        class="min-h-screen h-auto mb-auto bg-cover bg-no-repeat">
