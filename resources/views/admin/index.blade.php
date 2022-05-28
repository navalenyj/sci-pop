@extends('layouts.auth')


@section('page.title' , 'Регаемся')



@section('auth.title')
    <x-card-title>Создания науч-поп поста</x-card-title>

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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <x-form method="POST" action="{{ route('user.admin.post.add')  }}">
        <x-form-item>
            <x-label for="title">Заголовок</x-label>
            <x-input type="text" id="title" name="title" autofocus/>
        </x-form-item>

        <div class="mb-4">
            <select class="form-select" name="category" aria-label="Default select example">

                @foreach($data as $el)

                    <option value="{{ $el['id'] }}"> {{ $el['category'] }}</option>

                @endforeach

            </select>
        </div>


        <div class="form-floating mb-3">
            <x-textarea name="description"></x-textarea>
            <label for="floatingTextarea2">Описание</label>
        </div>


        <x-form-btn>Cоздать пост</x-form-btn>
    </x-form>
@endsection

