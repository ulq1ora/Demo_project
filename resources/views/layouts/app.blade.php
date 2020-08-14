<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-sacele=1.0">
    <meta http-equiv="X-UA-compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">


</head>
<body>
    @include('inc.header')

    <div class="container mt-5">
        @include('inc.alerts')

        <div class="row">
            <div class="col-6">
                @yield('content')
            </div>
        </div>
        @include('inc.pastas')
    </div>



</body>
</html>
