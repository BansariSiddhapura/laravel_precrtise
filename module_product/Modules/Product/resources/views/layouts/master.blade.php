<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body>
    <nav class="navbar bg-dark text-light">
        <div class="container-fluid d-flex justify-content-center">
            <span class="fs-3">Module CRUD</span>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
