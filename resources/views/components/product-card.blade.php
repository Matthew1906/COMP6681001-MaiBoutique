<div class='border rounded-sm border-gray-400 p-4'>
    <img src="data:image/jpg;base64,{{ $product->image }}" alt="{{ $product->name }}" class='h-60 w-60 object-cover mb-1'>
    <h3 class='font-bold text-xl'>{{ $product->name }}</h3>
    <h4 class='text-md font-md mb-1'>{{ $product->price }}</h4>
    {{-- Kurang link to detail page --}}
    @include('components.button', [
        'link' => route('detail', ['id'=>$product->id]),
        'text' => 'More Detail',
        'color' => 'fill',
        'size' => 'sm',
    ])
</div>
