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
            @if ($size == 'sm') p-2 md:px-4 text-xs md:text-sm
            @else p-4 px-8 md:px-16 text-md md:text-xl @endif
            @isset($class){{$class}}@endisset
        '>
    {{ $text }}
</button>
@if($link)
</a>
@endif
