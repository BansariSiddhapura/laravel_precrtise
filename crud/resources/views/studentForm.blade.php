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
    <div class="container w-50 my-5 border py-3 px-4 shadow-sm">
        <p class="fs-3 fw-medium">Add Student</p>
        {{-- {{$data}} --}}
        <form action="{{ route('studentRegister') }}" id="studentForm" method="post">
            @csrf
            <input type="hidden" name="id">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="full_name" class="form-control" placeholder="Enter your fullname">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="row mb-3">
                <div class="input-group col">
                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                </div>
                <div class="input-group col">
                    <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="confirm_password" class="form-control"
                        placeholder="Enter confirm password">
                </div>
            </div>
            <div class="mb-3">
                <input type="date" name="date_of_birth" class="form-control" placeholder="Enter your birth date">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-list"></i></span>
                <select name="course" class="form-control">
                    <option value="" selected>select your course</option>
                    <option value="BCA">BCA</option>
                    <option value="MCA">MCA</option>
                    <option value="Mtech">Mtech.</option>
                </select>
            </div>
            <div class="mb-3 d-flex gap-3">
                Gender :
                <input type="radio" class="form-check-input" name="gender" value="male"> Male
                <input type="radio" class="form-check-input" name="gender" value="female"> Female
                <input type="radio" class="form-check-input" name="gender" value="other"> other
            </div>
            <div class="mb-3 d-flex gap-3">
                Subjects :
                <input type="checkbox" class="form-check-input" name="subjects[]" value="php"> PHP
                <input type="checkbox" class="form-check-input" name="subjects[]" value="javascript"> JavaScript
                <input type="checkbox" class="form-check-input" name="subjects[]" value="laravel"> Laravel
                <input type="checkbox" class="form-check-input" name="subjects[]" value="jquery"> JQuery
                <input type="checkbox" class="form-check-input" name="subjects[]" value="html"> HTML
            </div>
            <div class="input-group mb-3">
                <button type="submit" class="btn btn-success">Save</a>
            </div>

        </form>
    </div>
    <script src="{{ asset('js/all.min.js') }}"></script>
</body>

</html>
