@extends('layouts.base')


@section('page.title' , 'Игры')

@section('content')
    <x-card>
<x-text-center>
    <x-card-title pos="center">Викторина</x-card-title>
</x-text-center>

        <div class="row">
            <div class="col-xl-2 col-lg-2 me-lg-5 me-xl-0 col-md-3 me-md-4 col-sm-12">
                <div class="col-3">

                    <x-card-img-game-logo
                        src=" {{ url('img/quiz.png') }}"/>
                </div>

            </div>
            <div class="col-xl-10 ps-xxl-2 ps-xl-4 col-lg-9 col-md-8 mt-md-0 col-sm-12 mt-3">

                <x-card-text>
                    Викторина — игра, заключающаяся в ответах на устные или письменные вопросы из различных областей
                    знания. Викторины в основном отличаются друг от друга правилами, определяющими очерёдность хода,
                    типы и сложность вопроса, порядок определения победителей, вознаграждение за правильный ответ.
                    <br>
                    <br>
                    За минуту ты должен как можно на большее количество вопросов дать ответ. Если ответ верный , тебе
                    дается дополнительно 15 секунд и 100 очков. В случае ошибки отнимается 15.
                    <br>
                    <br>
                    Набери как можно больше и попади в топ!
                </x-card-text>
            </div>
        </div>
        <div class="mt-3 row gy-3 ms-1">
            <x-btn-game-start href="{{ route('game.quiz') }}">Играть</x-btn-game-start>
            <x-btn-game-leaders href="{{route('game.quiz.records')}}">Список лидеров</x-btn-game-leaders>
        </div>
    </x-card>

@endsection
