@props(['color' => 'primary' , 'position' => 'start'])


<a {{ $attributes->class([
    "link link-{$color} text-{$position}"
]) }}>{{ $slot }}</a>
