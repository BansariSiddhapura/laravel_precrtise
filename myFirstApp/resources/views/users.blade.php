        {{-- <h1>hello {{ $name }}</h1> --}}

        {{-- used for js code --}}
        {{-- <h1>city {!! $city !!}</h1> --}}

        {{-- <h1>city : {{ !empty($city) ? $city : 'no city' }}</h1> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <th>id</th>
                <th>Name</th>
                <th>Roll no</th>
                <th>City</th>
                <th>Show profile</th>
            </thead>
            <tbody>
                @foreach ($users as $id => $value)
                    <tr>
                        <td>{{ $id }}</td>
                        <td>{{ $value['name'] }}</td>
                        <td>{{ $value['roll'] }}</td>
                        <td>{{ $value['city'] }}</td>
                        <td><a href="{{ route('profile', $id) }}">Show profile</a></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>

</html>
