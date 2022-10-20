@include('partials.header', ['title' => 'Home - MaiBoutique', 'signedIn' => $signedIn, 'admin' => $admin])
@if ($signedIn)
    <div class='w-100 h-screen flex justify-center items-center'>
        <div class='border border-gray-200 bg-slate-200 p-2 flex justify-center items-start gap-2'>
            <div class='border-2 border-gray-300 rounded p-4'>
                <img src="data:image/jpg;base64,{{ $product->image }}" alt="{{ $product->name }}"
                    class='h-60 w-60 object-cover'>
            </div>
            <div class='border border-gray-200 py-3 px-1 w-80 font-semibold'>
                <h1 class='text-4xl mb-1'>{{ $product->name }}</h1>
                <h3 class='text-2xl pb-1 border-b-2 border-gray-300'>{{ $product->price }}</h3>
                <h2 class='text-lg my-1'>Product Detail</h2>
                <p class='border-b-4 font-normal border-gray-500 pb-3 text-sm'>{{ $product->description }}</p>
                <h2 class='text-lg my-1'>Quantity:</h2>
                <form class='w-100 flex gap-2 my-2'>
                    <input type="number" name="qty" class='border border-gray-200 rounded-md py-1 px-2 flex-grow'>
                    @include('components.button', [
                        'link' => false,
                        'text' => 'Add to Cart',
                        'color' => 'fill',
                        'size' => 'sm',
                    ])
                </form>
                @include('components.button', [
                    'link' => route('home'),
                    'text' => 'Back',
                    'color' => 'fill-reverse',
                    'size' => 'sm',
                ])
            </div>
        </div>
    </div>
@endif
@include('partials.footer')
