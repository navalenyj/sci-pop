@extends('layouts.auth')


@section('page.title' , 'Cброс пароля')



@section('auth.title')
    <x-card-title>Сброс пароля</x-card-title>
    <x-link href="{{ route('user.login') }}">Вход</x-link>
@endsection
@section('auth.content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>

    @endif
    @error('message')
    <x-alert>{{ $message }}</x-alert>
    @enderror
    <p>Сообщение может попасть в "cпам" будьте внимательны , проверьте!</p>
    <x-form action=" {{route('password.request')}} " method="POST">
        <x-form-item>
            <x-label for="Email">Email</x-label>
            <x-input id="email"  name="email" autofocus/>
        </x-form-item>

<div class="mt-4">
    <x-form-btn>отправить</x-form-btn>
</div>

    </x-form>
@endsection

