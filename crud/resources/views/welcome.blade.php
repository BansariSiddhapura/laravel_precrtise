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
            <div class="dropdown dropstart">
                <img src="https://cdn-icons-png.flaticon.com/512/8847/8847419.png" height="40px" width="40px"
                    class="img-fluid" data-bs-toggle="dropdown" aria-expanded="false">
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>




        </div>
    </nav>
    <div class="container-fluid w-75 my-3">
        <div>
            @if (session()->has('message'))
                <x-package-alert type="success" message="{{ session('message') }}" />
            @endif
            @if (session()->has('message_delete'))
                <x-package-alert type="danger" message="{{ session('message_delete') }}" />
            @endif
        </div>
        <a href="{{ route('studentForm') }}" class="btn btn-primary">Add student</a>

        <table class="table table-bordered table-striped my-3">
            <thead>
                <th>ID</th>
                <th>FullName</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Course</th>
                <th>Gender</th>
                <th>Subjects</th>
                <th>Profile</th>
                {{-- <th>Actions</th> --}}
            </thead>
            <tbody>

                @foreach ($allData as $row)
                    {{-- @if ($row['fullName'] != Auth::user()->fullName) --}}
                    <tr>
                        {{-- @dd($row->profile) --}}
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->fullName }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->date_of_birth }}</td>
                        <td>{{ $row->courses }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->subjects }}</td>
                        <td><img src="{{ asset('storage/' . $row->profile) }}" class="rounded-5" height="60"
                                width="60"></td>
                        {{-- <td>
                                <a href="{{ route('studentForm', ['id' => $row->id]) }}"
                                    class="btn btn-warning" >Edit</a>
                                <a href="{{ route('delete', ['id' => $row->id]) }}"
                                    class="btn btn-danger">Delete</a>
                            </td> --}}
                    </tr>
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <script src="{{ asset('js/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
