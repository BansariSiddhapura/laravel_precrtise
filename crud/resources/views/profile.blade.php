
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>Home</title>
</head>

<body>
    <nav class="navbar bg-dark text-light">
        <div class="container-fluid">
            <span class="fs-3">Welcome {{ Auth::user()->fullName }}</span>
            <a href="{{ route('showTable') }}" class="text-decoration-none text-white">Back</a>
        </div>
    </nav>

   <div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header text-center">
            <h1>{{Auth::user()->fullName}}</h1>
        </div>
        <div class="card-body bg-dark text-light">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('storage/' . Auth::user()->profile) }}" alt="" class="img-fluid img-thumbnail">
                </div>
                <div class="col fs-2 my-5">
                    <p>Email : {{Auth::user()->email}}</p>
                    <p>Date Of Birth : {{Auth::user()->date_of_birth}}</p>
                    <p>Courses : {{Auth::user()->courses}}</p>
                    <p>Gender : {{Auth::user()->gender}}</p>
                    <p>Subjects : {{Auth::user()->subjects}}</p>
                    <div>
                        <a href="{{ route('studentForm', ['id' => Auth::user()->id]) }}"
                            class="btn btn-warning" >Edit</a>
                        <a href="{{ route('delete', ['id' => Auth::user()->id]) }}"
                            class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
