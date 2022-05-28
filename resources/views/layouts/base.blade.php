<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ url('css/app.css') }} ">
    <title>@yield('page.title' , config('app.name'))</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="d-flex flex-column justify-content-between min-vh-100">


    @include('includes.header')

    <main class="flex-grow-1">
        <x-container>
            @yield('content')
        </x-container>

    </main>

    @include('includes.footer')
</div>

<script src=" {{url('js/app.js')}} "></script>
@stack('scripts')
</body>
</html>
