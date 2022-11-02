@include('partials.header', ['title' => 'Home - MaiBoutique'])

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
            <form action={{ route('search') }} method='GET' class='w-100 flex gap-2 mt-2 p-4'>
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
    <div
        class='flex flex-wrap @if (count($products) % 4 == 0) justify-between @else justify-start @endif gap-4 px-5 py-2'>
        @foreach ($products as $product)
            @include('components.product-card', ['product' => $product, 'type' => 'product'])
        @endforeach
    </div>
    {{ $products->links() }}
</div>

@include('partials.footer')
