<div class='border rounded-sm border-gray-400 p-4'>
    <img src="{{ asset("storage/products/".$product->image) }}" alt="{{ $product->name }}" class='h-60 w-60 object-cover mb-1'>
    <h3 class='font-bold text-xl'>{{ $product->name }}</h3>
    <h4 class='text-md font-md mb-1'>Rp. {{ $product->price }} </h4>
    @if ($type == 'cart')
        <h4 class='text-md font-md mb-1'>Qty: {{ $qty }}</h4>
        <div class='flex gap-1 mt-2'>
            @include('components.button', [
                'link' => route('products.show', ['id' => $product->id]),
                'text' => 'Edit Cart',
                'color' => 'fill',
                'size' => 'sm',
            ])
            <form action={{ route('orders.destroy', ['user_id' => Auth::id(), 'product_id' => $product->id]) }}
                method='POST'>
                @csrf
                @method('DELETE')
                @include('components.button', [
                    'link' => false,
                    'text' => 'Remove from Cart',
                    'color' => 'fill-reverse',
                    'size' => 'sm',
                ])
            </form>
        </div>
    @else
        @include('components.button', [
            'link' => route('products.show', ['id' => $product->id]),
            'text' => 'More Detail',
            'color' => 'fill',
            'size' => 'sm',
        ])
    @endif
</div>
