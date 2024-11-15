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
            <a href="{{ route('logout') }}" class="text-decoration-none text-white">Logout</a>

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
                <th>Actions</th>
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
                            <td><img src="{{ asset('storage/' . $row->profile) }}" class="img-thumbnail rounded-5"
                                    height="60" width="60"></td>
                            <td>
                                <a href="{{ route('studentForm', ['id' => $row->id]) }}"
                                    class="btn btn-outline-warning" >Edit</a>
                                <a href="{{ route('delete', ['id' => $row->id]) }}"
                                    class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    {{-- @endif --}}
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
