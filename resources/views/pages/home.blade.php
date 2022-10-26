@include('partials.header', ['title' => 'Home - MaiBoutique', 'signedIn' => $signedIn, 'admin' => $admin])
@auth
    <div class='h-auto p-5 mb-auto'>
        <h1 class='text-xl md:text-2xl font-semibold text-center mb-1'>
            @isset($search)
                @if ($search)
                    Search your favorite clothes!
                @endisset
            @else
                Find your best clothes here!
            @endif
        </h1>
        @isset($search)
            @if ($search)
                {{-- Backend not done --}}
                <form action="/search" method='GET' class='w-100 flex gap-2 mt-2 p-4'>
                    <input type="text" name='query' class='border border-gray-200 rounded-sm py-1 px-2 flex-grow'
                        placeholder='Type something'>
                    @include('components.button', [
                        'link' => false,
                        'text' => 'Search',
                        'color' => 'fill',
                        'size' => 'sm',
                    ])
                </form>
            @endif
        @endisset
        <div class='flex flex-wrap @if(count($products)%4==0)justify-between @else justify-start @endif gap-4 px-5 py-2'>
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
@endauth
@include('partials.footer')
