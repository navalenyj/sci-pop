@props(['name' => ''])

@error($name)
    @php($attributes = $attributes->merge(['class' => 'border-danger']))
@enderror

<input name="{{ $name }}" {{$attributes->class([
    'form-control',
])->merge([
    'type' => 'text'
])}} >
