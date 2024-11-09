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

            <div class="mb-3">
                <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror"
                    placeholder="Enter your fullname" value="{{ old('full_name')}}">
                @error('full_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter your email" value="{{ old('email')}}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" value="{{ old('email')}}">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"
                        placeholder="Enter confirm password">
                    @error('confirm_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" placeholder="Enter your birth date" value="{{ old('date_of_birth')}}">
                @error('date_of_birth')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <select name="course" class="form-control @error('course') is-invalid @enderror">
                    <option value="" selected>select your course</option>
                    <option value="BCA" {{old('course')=="BCA" ? 'selected' : '' }}>BCA</option>
                    <option value="MCA" {{old('course')=="MCA" ? 'selected' : '' }}>MCA</option>
                    <option value="Mtech" {{old('course')=="Mtech" ? 'selected' : '' }}>Mtech.</option>
                </select>
                @error('course')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex gap-3">
                Gender :
                <input type="radio" class="form-check-input" name="gender" value="male"> Male
                <input type="radio" class="form-check-input" name="gender" value="female"> Female
                <input type="radio" class="form-check-input" name="gender" value="other"> other
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex gap-3">
                Subjects :
                <input type="checkbox" class="form-check-input @error('subjects') is-invalid @enderror" name="subjects[]" value="php"> PHP
                <input type="checkbox" class="form-check-input @error('subjects') is-invalid @enderror" name="subjects[]" value="javascript"> JavaScript
                <input type="checkbox" class="form-check-input @error('subjects') is-invalid @enderror" name="subjects[]" value="laravel"> Laravel
                <input type="checkbox" class="form-check-input @error('subjects') is-invalid @enderror" name="subjects[]" value="jquery"> JQuery
                <input type="checkbox" class="form-check-input @error('subjects') is-invalid @enderror" name="subjects[]" value="html"> HTML
                @error('subjects')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class=" mb-3">
                <button type="submit" class="btn btn-success">Save</a>
            </div>

        </form>
    </div>
    <script src="{{ asset('js/all.min.js') }}"></script>
</body>

</html>
