@extends('layouts.base')

@section('page.title' , 'Викторина')

@section('content')
    <x-form>

        <div class="col-12 col-sm-8 col-lg-6 offset-0 offset-sm-2 offset-lg-3">

            <x-card>


                <div class="mb-4 mt-4">
                    <div class="d-flex justify-content-between align-items-center mt-2 mb-2">


                        <h5 class="d-flex">
                            <div class="text-title pe-1">Время:</div>
                            <div class="text-title" id="time">1:15</div>
                        </h5>

                        <h5 class="d-flex">
                            <div class="text-title pe-1">Счет:</div>
                            <div class="text-title" id="score">0</div>
                        </h5>
                    </div>


                    <div class="quiz-header" id="header">
                        <div class="text-center fs-4 fw-bold bg-light">
                        </div>

                    </div>


                    <div class="ps-3 pe-3 mb-3">
                        <ul class="quiz-list list-group list-group-flush" id="list">
                            <li class="list-group-item bg-light">
                                <label>
                                    <input type="radio" class="answer" name="answer"/>
                                    <span>Ответ...</span>
                                </label>
                            </li>
                            <li class="list-group-item bg-light">
                                <label>
                                    <input type="radio" class="answer" name="answer"/>
                                    <span>Ответ...</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 offset-3" id="container-btn">

                        <a class="w-50 btn btn-warning" id="submit">Ответить</a>

                    </div>
                </div>


            </x-card>
            <x-link href="{{ route('game.quiz.records') }}">Список лидеров</x-link>
        </div>
    </x-form>
    @push('scripts')
        <script src="{{ asset('js/quiz.js') }}"></script>
    @endpush

@endsection
