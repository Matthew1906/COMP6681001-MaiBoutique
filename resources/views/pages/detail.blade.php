@include('partials.header', ['title' => $product->name.' - MaiBoutique', 'signedIn' => $signedIn, 'admin' => $admin])
@if ($signedIn)
    <div class='h-auto p-3 flex justify-center items-start'>
        <div
            class='border border-gray-200 bg-slate-200 my-3 md:mt-10 md:p-2 flex flex-col md:flex-row justify-center items-center md:items-start gap-2'>
            <div class='border-2 border-gray-300 rounded p-4'>
                <img src="data:image/jpg;base64,{{ $product->image }}" alt="{{ $product->name }}"
                    class='h-60 w-60 object-cover'>
            </div>
            <div class='border border-gray-200 py-1 md:py-3 md:px-1 md:w-80 font-semibold'>
                <h1 class='text-2xl md:text-4xl mb-1'>{{ $product->name }}</h1>
                <h3 class='text-xl md:text-2xl pb-1 border-b-2 border-gray-300'>{{ $product->price }}</h3>
                <h2 class='md:text-lg my-1'>Product Detail</h2>
                <p class='border-b-4 font-normal border-gray-500 pb-3 text-xs md:text-sm'>{{ $product->description }}
                </p>
                @if (!$admin)
                    @php
                        $prompt = 'Add to Cart'
                    @endphp
                    @isset($edit)
                        @php
                            $prompt = 'Edit Cart'
                        @endphp
                    @endisset
                    <h2 class='md:text-lg my-1'>Quantity:</h2>
                    <form class='w-100 flex flex-col md:flex-row gap-2 my-2'>
                        <input type="number" name="qty"
                            class='border border-gray-200 rounded-md py-1 px-2 flex-grow'>
                        @include('components.button', [
                            'link' => false,
                            'text' => $prompt,
                            'color' => 'fill',
                            'size' => 'sm',
                        ])
                    </form>
                @endif
                <div class='w-100 flex gap-2 my-2'>
                    @include('components.button', [
                        'link' => route('home'),
                        'text' => 'Back',
                        'color' => 'fill-reverse',
                        'size' => 'sm',
                        'class' => 'px-10 md:px-12',
                    ])
                    @if($admin)
                    @include('components.button', [
                        'link' => route('home'),
                        'text' => 'Delete Item',
                        'color' => 'fill-reverse',
                        'size' => 'sm',
                        'class' => 'px-5 md:px-12',
                    ])
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
@include('partials.footer')
