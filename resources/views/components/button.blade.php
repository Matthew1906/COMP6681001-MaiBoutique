<a href="{{ $link }}">
    <button
        class='
            @if ($color == 'fill') bg-cyan-600 rounded-md text-white hover:bg-red-600
            @else border border-cyan-600 rounded-md text-cyan-600 hover:text-red-600 hover:border-red-600
            @endif
            @if($size=='sm') p-1 md:p-2 text-xs md:text-sm
            @else p-2 md:p-3 text-md md:text-xl
            @endif
        '>
        {{ $text }}
    </button>
</a>
