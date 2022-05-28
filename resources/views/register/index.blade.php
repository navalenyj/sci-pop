@extends('layouts.auth')


@section('page.title' , 'Регаемся')



@section('auth.title')
    <x-card-title>Регистрация</x-card-title>
    <x-link href="{{ route('user.login') }}">Вход</x-link>
@endsection
@section('auth.content')

    @if($errors->any())
        <x-alert>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif


    <x-form action="{{ route('user.register') }}" method="POST" enctype="multipart/form-data">
        <x-form-item>
            <x-label for="Email">Email</x-label>
            <x-input type="email" id="email" aria-describedby="emailHelp" name="email" autofocus/>
        </x-form-item>
        <x-form-item>
            <x-label for="login">Логин</x-label>
            <x-input id="login" name="login"  />
        </x-form-item>
        <x-form-item>
            <x-label for="avatar">Аватар</x-label>
            <x-input type="file" id="avatar" name="avatar"/>
            <div id="Help" class="form-text text-end">Необязательное поле</div>

        </x-form-item>
        <x-form-item>
            <x-label for="password">Пароль</x-label>
            <x-input type="password" id="password" name="password"/>
        </x-form-item>
        <x-form-item>
            <x-label for="password_confirmation">Подтвердите пароль</x-label>
            <x-input type="password" id="password_confirmation" name="password_confirmation"/>
        </x-form-item>


        <x-form-btn>Создать аккаунт</x-form-btn>
    </x-form>
@endsection

