@props(['col' =>'col-12'])


<div {{ $attributes->class([
    "card p-3 bg-light mb-4 {$col}"
]) }}>

    {{ $slot }}

</div>
