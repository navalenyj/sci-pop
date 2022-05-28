
@extends('layouts.base')


@section('page.title' , 'Рекорды')

@section('content')
    <div class="col-12 col-md-6 offset-md-3">


        <x-card>
            <h4 class="text-center mb-3">Лучшие игроки в Quiz</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Ник</th>
                    <th scope="col">Рекорд</th>

                </tr>
                </thead>
                <tbody>
                @php($key = 1)
                @foreach($data as $el)
                    <tr>

                        <th scope="row">{{ $key++ }}</th>
                        <td>{{ $el->users['login'] }}</td>
                        <td>{{ $el->score }}</td>

                    </tr>
                @endforeach

                </tbody>
            </table>

        </x-card>

    </div>

@endsection
