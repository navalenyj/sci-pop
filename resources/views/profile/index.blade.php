@extends('layouts.base')

@section('title' , 'Личный кабинет')

@section('content')

    <h3 class="border-bottom">Привет , {{  $user['login']}}</h3>
    <div class="mt-3">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <x-form action="{{route('user.change.data')}}" method="POST" enctype="multipart/form-data">
            <x-card>
                <div class="row">
                    <img src="{{ '/storage/' . $user['avatar'] }}"
                         class="col-xl-2 p-1 col-6 offset-3 offset-sm-0 col-sm-3"
                         alt="">
                    <div class="text  col-xl-10 ps-3 col-12 col-sm-9 fs-5">
                        <div class="border-bottom">
                            Почта: {{ $user['email'] }}
                        </div>

                        <x-form-item>
                            <x-label for="password">Новый пароль:</x-label>
                            <x-input type="password" id="password" name="password" autofocus/>
                        </x-form-item>

                        <x-form-item>
                            <x-label for="password_confirmation">Еще раз:</x-label>
                            <x-input type="password" id="password_confirmation" name="password_confirmation" autofocus/>
                        </x-form-item>

                    </div>

                    <x-form-item>
                        <div class="mt-3 fs-5">
                            <x-label for="avatar">Аватар</x-label>
                            <x-input type="file" id="avatar" name="avatar"/>
                        </div>

                    </x-form-item>
                    <div class="ms-1">
                        <x-form-btn>Сменить данные</x-form-btn>
                    </div>

                </div>
            </x-card>
        </x-form>
    </div>
@endsection
