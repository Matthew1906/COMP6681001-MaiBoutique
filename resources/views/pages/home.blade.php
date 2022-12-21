@extends('layout')

@section('title', "Home")

@section('body')
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
            <form action="{{ route('products.search') }}" method='GET' class='w-100 flex gap-2 mt-2 p-4'>
                <input type="text" name='query' class='border border-gray-200 rounded-sm py-1 px-2 flex-grow'
                    placeholder='Type something' value="{{Request::query('query')}}">
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
        class='flex flex-wrap @if(count($products) % 4 == 0)justify-center lg:justify-between @else justify-start @endif gap-4 px-5 py-2'>
        @foreach ($products as $product)
            @include('components.product-card', ['product' => $product, 'type' => 'product'])
        @endforeach
        @if($products->count()==0)
            <h2>No Products found!!</h2>
        @endif
    </div>
    @if ($products->lastPage() > 1)
        <ul class="mt-2 flex justify-center items-center">
            @for($page = 1;$page<=$products->lastPage();++$page)
            <li>
                <a class="p-2 text-black @if($page==$products->currentPage()) text-2xl drop-shadow-md font-semibold @else text-xl @endif" href="{{ $products->appends(request()->input())->url($page) }}">
                    {{$page}}
                </a>
            </li>
            @endfor
        </ul>
    @endif
</div>

@endsection
