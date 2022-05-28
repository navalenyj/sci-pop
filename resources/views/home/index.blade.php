@extends('layouts.base')

@section('page.title' , 'Главная')

@section('content')

    <h4 class="border-bottom border-end p-2 mb-4">
        Интеллект в период пандемии
    </h4>


    <div class="row justify-content-center ms-4 me-4">
        <x-card col="col-12 col-md-11">

            <div class="ps-1 pe-1 ps-md-3 pe-md-3">


                <div class="ps-1 pe-1 ps-md-3 pe-md-3">


                    <div class="fs-5 mt-3 mb-3">Оставаться дома, следить за состоянием
                        своего здоровья и исключать контакты с
                        другими после тесного контакта с лицами. Главное в период пандемии. А портал поможет в этом! 😉
                    </div>


                </div>
            </div>


        </x-card>


        <h4 class="border-start border-bottom p-2 text-end mb-4">
            Онлайн викторина
        </h4>
        <div class="ps-1 pe-1 ps-md-3 pe-md-3">
            <div class="row justify-content-center">

                <x-card col="col-12 col-md-8 me-0 me-md-4">

                    <h5 class="text-center">Что такое викторина?</h5>
                    <div class="row">

                        <img class="col-xl-2 p-1 col-6 offset-3 offset-sm-0 col-sm-3" src="{{ asset('img/quiz.png') }}"
                             alt="">


                        <div class="text  col-xl-10 ps-3 col-12 col-sm-9">
                            Викторина — игра, заключающаяся в ответах на устные или письменные вопросы из различных
                            областей
                            знания. Викторины в основном отличаются друг от друга правилами, определяющими очерёдность
                            хода,
                            типы и сложность вопроса, порядок определения победителей, вознаграждение за правильный
                            ответ.
                        </div>
                    </div>


                    <a href="{{ route('game.quiz') }}"
                       class="btn btn-warning col-12 col-sm-3 col-xl-2 mt-2">Играть</a>


                </x-card>


                <x-card col="col-12 col-md-3">
                    <div class="col-12">
                        <h5 class="text-center mt-md-0">Лучшие игроки:</h5>
                        @php($key = 1)
                        @foreach($records as $record)
                            <div class="text-center mt-2">{{ $key++ }}. {{ $record->users['login'] }}
                                - {{ $record->score }}</div>
                        @endforeach

                    </div>
                </x-card>


                <h4 class="border-end border-bottom p-2 text-start mb-4">
                    Науч-поп
                </h4>
                @foreach($posts as $post)

                    <x-card col="col-9 col-sm-4 me-0 me-sm-3 col-lg-3 position-relative pb-5">
                        <div class="pb-3">

                            <div class="d-flex justify-content-between align-items-center border-bottom">

                                <div class="text" id="post-id">#{{ $post['id'] }}</div>
                                <div
                                    class="text">{{ \Carbon\Carbon::parse($post['created_at'])->format('Y.m.d') }}</div>


                            </div>

                            <h5 class="text-center mt-3">{{ $post['title'] }}</h5>
                            <div class="text">
                                {{ $post['description'] }}
                            </div>


                        </div>


                    </x-card>

                @endforeach


                <h4 class="border-start border-bottom p-2 text-end mb-4">
                    О нас
                </h4>

                <x-card col="col-12 col-md-11">

                    <div class="ps-1 pe-1 ps-md-3 pe-md-3">


                        <div class="ps-1 pe-1 ps-md-3 pe-md-3">


                            <div class="fs-5 mt-3 mb-3">
                                Новый амбициозный проект созданный с благими побуждениями дарить людям знания и защищать
                                их от пандемии.
                                <br>
                                <br>
                                <div class="border-bottom fs-6">
                                    Почему именно наш сайт?
                                </div>
                                <ul class="mt-2 fs-6">
                                    <li>
                                        Стильный дизайн
                                    </li>
                                    <li>
                                        Удобный и понятный интерфейс
                                    </li>
                                    <li>
                                        Абсолюдно бесплатный
                                    </li>
                                    <li>
                                        Позволяет самообразововаться
                                    </li>
                                </ul>
                            </div>


                        </div>
                    </div>


                </x-card>
            </div>

            <div class="p-3">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/intelect-slider.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Интеллект</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/pandemia-slider.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Пандемия</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/time-slider.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Время</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <h4 class="border-bottom border-end p-2 mb-4">
            Что такое интеллект?
        </h4>

        <x-card col="col-12 col-md-11">

            <div class="ps-1 pe-1 ps-md-3 pe-md-3">


                <div class="ps-1 pe-1 ps-md-3 pe-md-3">

                    Интелле́кт (от лат. intellectus «восприятие»; «разуме́ние», «понимание»; «понятие», «рассу́док»)
                    или ум — качество психики, состоящее из способности осознавать новые ситуации, способности к
                    обучению и запоминанию на основе опыта, пониманию и применению абстрактных (фракталы) концепций, и
                    использованию своих знаний для управления окружающей человека средой[4]. Общая способность к
                    познанию и решению проблем, которая объединяет познавательные способности: ощущение, восприятие,
                    память, представление, мышление, воображение.

                    Согласно теории интеллекта психолога Рэймонда Кэттелла интеллект можно условно разделить на
                    подвижный и кристаллизовавшийся. Первый состоит в способности мыслить логически, анализировать и
                    решать задачи, выходящие за пределы предыдущего опыта; второй включает накопленный опыт и
                    способность использовать усвоенные знания и навыки.

                    В целом существует проблема видов интеллекта, тесно связанная с факторными теориями интеллекта,
                    которые делятся на две основные группы — однофакторные и многофакторные.

                </div>
            </div>


        </x-card>
    </div>

@endsection

