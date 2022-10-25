<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

{{-- Kurang Auth stuff and links (masih placeholder) --}}

<body class='w-full flex flex-col min-h-screen h-auto'>
    <nav
        class='bg-slate-200 px-5 py-2 md:px-10 md:py-5 flex flex-col md:flex-row justify-center md:justify-between items-center gap-2 md:gap-0'>
        <div class='flex flex-col md:flex-row items-center gap-1 md:gap-4'>
            <h1 class='font-semibold text-xl'>MAI BOUTIQUE</h1>
            @if ($signedIn)
                <ul class='font-light md:text-md flex list-none gap-3'>
                    <li><a href={{route('home')}} class='hover:text-cyan-600'>Home</a></li>
                    <li><a href={{route('search')}} class='hover:text-cyan-600'>Search</a></li>
                    @if (!$admin)
                        <li><a href={{route('cart', ['user_id'=>2])}} class='hover:text-cyan-600'>Cart</a></li>
                        <li><a href="#" class='hover:text-cyan-600'>History</a></li>
                    @endif
                    <li><a href="#" class='hover:text-cyan-600'>Profile</a></li>
                </ul>
            @endif
        </div>
        <div class='flex gap-2 md:gap-4'>
            @includeWhen(!$signedIn, 'components.button', [
                'link' => '#',
                'text' => 'Sign In',
                'color' => 'outline',
                'size' => 'sm',
            ])
            @includeWhen($signedIn && $admin, 'components.button', [
                'link' => route('add-product'),
                'text' => 'Add Item',
                'color' => 'outline',
                'size' => 'sm',
            ])
            @includeWhen($signedIn, 'components.button', [
                'link' => '#',
                'text' => 'Sign Out',
                'color' => 'outline',
                'size' => 'sm',
            ])
        </div>
    </nav>
    <main style="{{ $signedIn ? '' : 'background-image:url("' . asset('header.webp') . '");' }}"
        class="min-h-screen h-auto mb-auto bg-cover bg-no-repeat">
