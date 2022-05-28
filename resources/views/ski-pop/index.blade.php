@extends('layouts.base')

@section('page.title' , 'Науч-поп')

@section('content')

    <x-card col="col-12">
        <div class="text-center">

            @foreach($categories as $category)

                <a href="{{ route('ski-pop.category' , $category['id']) }}" class="me-3">{{ $category['category'] }}</a>
            @endforeach
                <a href="{{ route('ski-pop') }}">Все</a>

        </div>

    </x-card>

    <div class="row justify-content-center">

{{--        <x-card col="col-9 me-3">--}}
{{--            <div class="d-flex justify-content-between align-items-center">--}}
{{--                <div>--}}
{{--                    Фильтр--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <a href="" class="pe-3">Новые</a>--}}
{{--                    <a href="" class="pe-3">По возрастанию</a>--}}
{{--                    <a href="" class="">По убыванию</a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </x-card>--}}
        @foreach($posts as $post)

            <x-card col="col-9 col-sm-4 me-0 me-sm-3 col-lg-3 position-relative pb-5">
                <div class="pb-3">

                    <div class="d-flex justify-content-between align-items-center border-bottom">

                        <div class="text" id="post-id">#{{ $post['id'] }}</div>
                        <div class="text">{{ \Carbon\Carbon::parse($post['created_at'])->format('Y.m.d') }}</div>


                    </div>

                    <h5 class="text-center mt-3">{{ $post['title'] }}</h5>
                    <div class="text">
                        {{ $post['description'] }}
                    </div>


                    <div class="position-absolute bottom-0 start-0">


                        <div class="like ps-3 pb-0">


                            <form action="{{ route('ski-pop.add.like', $post->id)  }}" method="post">
                                @csrf
                                <button type="submit" class="border-0 bg-transparent" id="like">
                                    <div class="d-flex align-items-center">

                                        @if(\App\Models\PostLikes::checkLike($post->id))

                                            <img class="icon-like me-2" src="{{ asset('img/marks/likeActive.png') }}"
                                                 alt="">
                                        @else
                                            <img class="icon-like me-2" src="{{ asset('img/marks/like.png') }}" alt="">
                                        @endif
                                        <div class="text">{{ $likes[$post->id] }}</div>

                                    </div>

                                </button>

                            </form>
                        </div>


                    </div>
                </div>


            </x-card>

        @endforeach
        <div class="d-flex justify-content-center mt-4">

            <div>
                {{ $posts->links() }}
            </div>
        </div>

    </div>

    {{--    @push('scripts')--}}
    {{--        <script src="{{ asset('js/main.js') }}"></script>--}}
    {{--    @endpush--}}
@endsection
