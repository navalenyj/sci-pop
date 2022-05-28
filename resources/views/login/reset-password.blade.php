@extends('layouts.auth')


@section('page.title' , 'Cброс пароля')



@section('auth.title')
    <x-card-title>Сброс пароля</x-card-title>
    <x-link href="{{ route('user.login') }}">Вход</x-link>
@endsection
@section('auth.content')
    @error('email')
       <x-alert>{{ $message }}</x-alert>

    @enderror




    <x-form action=" {{route('password.update')}} " method="POST">
        <input type="hidden" name="token" value="{{ $token }}" />
        <x-form-item>
            <x-label for="email">Email</x-label>
            <x-input id="email"  name="email" autofocus/>
        </x-form-item>
        <x-form-item>
            <x-label for="password">Пароль</x-label>
            <x-input type="password" id="password"  name="password" autofocus/>
        </x-form-item>

        <x-form-item>
            <x-label for="password_confirmation">Повторите пароль</x-label>
            <x-input type="password" id="password_confirmation"  name="password_confirmation" autofocus/>
        </x-form-item>
        <div class="mt-4">
            <x-form-btn>cбросить</x-form-btn>
        </div>

    </x-form>
@endsection
