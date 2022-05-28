@extends('layouts.base')

@section('content')

    <x-card>
        <div class="d-flex align-items-center justify-content-between">
            @yield('auth.title')
        </div>
        @yield('auth.content')
    </x-card>

@endsection
