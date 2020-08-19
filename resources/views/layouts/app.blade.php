<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sacele=1.0">
    <meta http-equiv="X-UA-compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


</head>
<body>
    @include('inc.header')

    <div class="container mt-5">
        @include('inc.alerts')

        <div class="row">
            <div class="container">
                @yield('content')
            </div>
            @include('inc.pastas')
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
</body>
</html>
