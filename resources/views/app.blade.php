<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
</head>

<body>
    @include('navbar')
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
    <script src="{{ asset('js/output.js') }}"></script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
    @yield('footer')
</body>

</html>
