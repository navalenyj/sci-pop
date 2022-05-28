@props(['pos' => 'start' , 'mb' => 3, 'mt' => 3 , 'ms' => 0 , 'me' => 0])

<h3 {{ $attributes->class([
    "mb-{$mb} mt-{$mt} ms-{$ms} me-{$me} text-{$pos}"
]) }}>

    {{ $slot }}

</h3>
