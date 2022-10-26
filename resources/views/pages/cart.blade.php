@include('partials.header', ['title' => 'My Cart - MaiBoutique', 'signedIn' => $signedIn, 'admin' => $admin])
@if ($signedIn)
    <div class='h-auto p-5 mb-auto'>
        <h1 class='text-xl md:text-2xl font-semibold text-center mb-1'>
            My Cart
        </h1>
        <div class='my-2 flex justify-end items-center gap-2 px-5'>
            <h1 class='text-lg md:text-xl font-semibold text-center mb-1'>
                Total Price: 40,000
            </h1>
            @include('components.button', [
                'link' => false,
                'text' => 'Check Out ('.count($products).')',
                'color' => 'fill',
                'size' => 'sm',
            ])
        </div>
        <div class='flex flex-wrap @if(count($products)%4==0)justify-between @else justify-center @endif gap-2 px-4 py-2'>
            @foreach ($products as $product)
                @include('components.product-card', ['product' => $product, 'type' => 'cart'])
            @endforeach
        </div>
    </div>
@endif
@include('partials.footer')
