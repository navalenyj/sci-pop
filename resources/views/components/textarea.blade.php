@props(['name' => ''])

@error($name)
@php($attributes = $attributes->merge(['class' => 'border-danger']))
@enderror

<textarea name="{{ $name }}" style="height: 100px" {{$attributes->class([
    'form-control',
])->merge([

])}}> </textarea>

