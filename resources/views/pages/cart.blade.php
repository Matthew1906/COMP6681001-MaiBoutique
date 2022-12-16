@include('partials.header', ['title' => 'My Cart - MaiBoutique'])
@auth
    <div class='h-auto p-5 mb-auto'>
        <h1 class='text-xl md:text-2xl font-semibold text-center mb-1'>
            My Cart
        </h1>
        <div class='my-2 flex justify-end items-center gap-2 px-5'>
            <h1 class='text-lg md:text-xl font-semibold text-center mb-1'>
                Total Price: Rp. {{ $total_price }}
            </h1>
            @include('components.button', [
                'link' => $total_qty == 0 ? false : route('transactions.store', ['user_id' => Auth::id()]),
                'text' => 'Check Out (' . $total_qty . ')',
                'color' => 'fill',
                'size' => 'sm',
            ])
        </div>
        <div
            class='flex flex-wrap @if ($cart->count() % 4 == 0) justify-between @else justify-start @endif gap-2 px-4 py-2'>
            @foreach ($cart as $content)
                @include('components.product-card', [
                    'product' => $content->product,
                    'qty' => $content->quantity,
                    'type' => 'cart',
                ])
            @endforeach
            @if ($cart->count() == 0)
                <h1>No items in the cart!</h1>
            @endif
        </div>
    </div>
@endauth
@include('partials.footer')
