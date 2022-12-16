@include('partials.header', ['title' => $product->name . ' - MaiBoutique'])
<div class='h-auto p-3 flex justify-center items-start'>
    <div
        class='border border-gray-200 bg-slate-200 my-3 md:mt-10 md:p-2 flex flex-col md:flex-row justify-center items-center md:items-start gap-2'>
        <div class='border-2 border-gray-300 rounded p-4'>
            <img src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->name }}"
                class='h-60 w-60 object-cover'>
        </div>
        <div class='border border-gray-200 py-1 md:py-3 md:px-1 md:w-96 font-semibold'>
            <h1 class='text-2xl md:text-4xl mb-1'>{{ $product->name }}</h1>
            <h3 class='text-xl md:text-2xl pb-1 border-b-2 border-gray-300'>{{ $product->price }}</h3>
            <h2 class='md:text-lg my-1'>Product Detail</h2>
            <p class='font-normal pb-1 text-xs md:text-sm'>{{ $product->description }}
            <h2 class='md:text-lg my-1 border-b-4 pb-3 border-gray-500'>Stock: {{ $product->stock }}</h2>
            </p>
            @if (Auth::user()->role->name=='Member')
                <h2 class='md:text-lg my-1'>Quantity:</h2>
                @if ($edit)
                    @php
                        $prompt = 'Update Cart';
                    @endphp
                @else
                    @php
                        $prompt = 'Add to Cart';
                    @endphp
                @endif
                <form action={{ route('orders.update', ['user_id' => Auth::id(), 'product_id' => $product->id]) }}
                    method='POST' class='w-100 flex flex-col md:flex-row gap-2 my-2'>
                    @csrf
                    @method('PATCH')
                    <input type="number" name="quantity" value={{ $quantity }}
                        class='border border-gray-200 rounded-md py-1 px-2 flex-grow'>
                    @include('components.button', [
                        'link' => false,
                        'text' => $prompt,
                        'color' => 'fill',
                        'size' => 'sm',
                    ])
                </form>
                @error('quantity')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                @enderror
            @endif
            <div class='w-100 flex gap-2 my-2'>
                @include('components.button', [
                    'link' => route('products.index'),
                    'text' => 'Back',
                    'color' => 'fill-reverse',
                    'size' => 'sm',
                    'class' => 'px-10 md:px-12',
                ])
                @if (Auth::user()->role->name=='Admin')
                    <form action={{ route('products.destroy', ['id' => $product->id]) }} method="post">
                        @csrf
                        @method('DELETE')
                        @include('components.button', [
                            'link' => false,
                            'text' => 'Delete Item',
                            'color' => 'fill-reverse',
                            'size' => 'sm',
                            'class' => 'px-5 md:px-12',
                        ])
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@include('partials.footer')
