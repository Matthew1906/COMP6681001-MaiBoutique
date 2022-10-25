@include('partials.header', ['title' => 'My Cart - MaiBoutique', 'signedIn' => $signedIn, 'admin' => $admin])
@if ($signedIn)
    <div class='h-auto p-5 mb-auto'>
        <h1 class='text-xl md:text-2xl font-semibold text-center mb-1'>
            My Cart
        </h1>
        <div class='flex flex-wrap justify-center gap-4 px-5 py-2'>
            @foreach ($products as $product)
                @include('components.product-card', ['product' => $product, 'type' => 'cart'])
            @endforeach
        </div>
    </div>
@endif
@include('partials.footer')
