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
        <h1>Your Profile</h1>
        <hr>
        <h3>Name : {{$user['name']}}</h3>
        <h3>Roll No : {{$user['roll']}}</h3>
        <h3>City : {{$user['city']}}</h3>
    </div>
</body>

</html>
