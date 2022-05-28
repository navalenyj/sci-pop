@extends('layouts.auth')


@section('page.title' , 'Вход')



@section('auth.title')
    <x-card-title>Вход</x-card-title>
    <x-link href="{{ route('user.register') }}">Регистрация</x-link>
@endsection
@section('auth.content')
    @if(session('status'))
        <div class="alert alert-success">Пароль успешно изменен , войдите в аккаунт</div>
    @endif
    @error('auth')
    <x-alert>{{ $message }}</x-alert>
    @enderror
    <x-form action=" {{route('user.login')}} " method="POST">
        <x-form-item>
            <x-label for="login">Логин</x-label>
            <x-input id="login" name="login" autofocus/>
        </x-form-item>
        <x-form-item>
            <x-label for="password">Пароль</x-label>
            <x-input type="password" id="password" name="password"/>
        </x-form-item>
        <div class="mt-3 mb-3">
            <x-link href="{{ route('password.request') }}">Не помню пароль</x-link>

        </div>

        <x-form-btn>Войти</x-form-btn>
    </x-form>
@endsection

