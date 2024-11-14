<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link href="{{ asset('css/all.min.css') }}">
    <title>Form</title>
</head>

<body>
    <nav class="navbar bg-dark text-light">
        <div class="container-fluid">
            <span class="fs-3">Welcome</span>
            <a href="{{ route('studentForm') }}" class="text-decoration-none text-white">Register</a>
        </div>
    </nav>
    <div class="container w-25 my-5 border py-4 px-4 shadow-sm">
        @if (session()->has('login'))
            <div class="alert alert-danger d-flex justify-content-between">
                {{ session('login') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
            {{-- <x-package-alert /> --}}
           
        @endif
        <p class="fs-3 fw-medium text-center">Student Login</p>
        <form action="{{ route('login') }}" id="studentForm" method="post">
            @csrf

            <div class="mb-3">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter your email">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Enter your password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class=" mb-3">
                <button type="submit" class="btn btn-success">Save</a>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
