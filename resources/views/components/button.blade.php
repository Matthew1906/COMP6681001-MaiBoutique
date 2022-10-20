@if($link)
<a href={{$link}}>
@endif
<button
    class='
            @switch($color)
            @case('fill') bg-cyan-600 rounded-md text-white hover:bg-red-600 @break
            @case('outline') border border-cyan-600 rounded-md text-cyan-600 hover:text-red-600 hover:border-red-600 @break
            @case('fill-reverse') bg-red-600 rounded-md text-white hover:bg-cyan-600 px-3 @break
            @case('outline-reverse') border border-red-600 rounded-md text-red-600 hover:text-cyan-600 hover:border-cyan-600 @break
            @endswitch
            @if ($size == 'sm') p-1 md:p-2 text-xs md:text-sm
            @else p-2 md:p-3 text-md md:text-xl @endif
        '>
    {{ $text }}
</button>
@if($link)
</a>
@endif
