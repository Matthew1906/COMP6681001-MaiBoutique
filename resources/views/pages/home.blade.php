@include('partials.header', ['title' => 'Home - MaiBoutique', 'signedIn' => $signedIn, 'admin' => $admin])
@if ($signedIn)
    <div class='w-100 h-auto p-5 mb-auto'>
        <h1 class='text-xl md:text-2xl font-semibold text-center mb-1'>Find your best clothes here!!</h1>
        <div class='flex flex-wrap justify-center lg:justify-between gap-4 p-5'>
            @foreach ($products as $product)
                @include('components.product-card', ['product' => $product, 'type' => 'product'])
            @endforeach
        </div>
        {{-- KURANG PAGINATION!!!! --}}
    </div>
@else
    <div class='bg-black bg-opacity-50 w-100 h-screen flex justify-center items-center'>
        <div class='text-center px-3 md:px-0'>
            <h1 class='text-white text-2xl md:text-5xl font-bold mb-3'>Welcome to MaiBoutique</h1>
            <p class='text-white text-md md:text-xl font-light mb-3'>Online Boutique that provides you with various
                clothes to suit your various activities.</p>
                {{-- Kurang link to signup --}}
            @include('components.button', [
                'link' => '#',
                'text' => 'Sign Up Now',
                'color' => 'fill',
                'size' => 'lg',
            ])
        </div>
    </div>
@endif
@include('partials.footer')
