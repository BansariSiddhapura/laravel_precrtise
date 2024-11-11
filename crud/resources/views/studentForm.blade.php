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
            <a href="{{ route('showTable') }}" class="text-decoration-none text-white">Show all students</a>
        </div>
    </nav>
    <div class="container w-50 my-5 border py-3 px-4 shadow-sm">
        <p class="fs-3 fw-medium">Add Student</p>
        {{-- {{$selectOne}} --}}
        <form action="{{ route('studentRegister') }}" id="studentForm" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $selectOne->id ?? '' }}">
            <div class="mb-3">
                <input type="text" name="fullName" class="form-control @error('fullName') is-invalid @enderror"
                    placeholder="Enter your fullname" value="{{ old('fullName', $selectOne->fullName ?? '') }}">
                @error('fullName')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter your email" value="{{ old('email', $selectOne->email ?? '') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            @if ($selectOne == null)
                <div class="row mb-3">
                    <div class="col">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter your password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <input type="password" name="confirm_password"
                            class="form-control @error('confirm_password') is-invalid @enderror"
                            placeholder="Enter confirm password" @if ($selectOne == !null) disabled @endif>
                        @error('confirm_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endif
            <div class="mb-3">
                <input type="date" name="date_of_birth"
                    class="form-control @error('date_of_birth') is-invalid @enderror"
                    placeholder="Enter your birth date"
                    value="{{ old('date_of_birth', $selectOne->date_of_birth ?? '') }}">
                @error('date_of_birth')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <select name="courses" class="form-control @error('courses') is-invalid @enderror">
                    <option value="" selected>select your course</option>
                    <option value="BCA" {{ old('courses', $selectOne->courses ?? '') == 'BCA' ? 'selected' : '' }}>
                        BCA
                    </option>
                    <option value="MCA" {{ old('courses', $selectOne->courses ?? '') == 'MCA' ? 'selected' : '' }}>
                        MCA
                    </option>
                    <option value="Mtech"
                        {{ old('courses', $selectOne->courses ?? '') == 'Mtech' ? 'selected' : '' }}>
                        Mtech.</option>
                </select>
                @error('courses')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex gap-3">
                Gender : {{$gender=old('gender', $selectOne->gender ?? '')}}
                <input type="radio" class="form-check-input" name="gender" value="male"
                    {{ $gender== 'male' ? 'checked' : '' }}> Male
                <input type="radio" class="form-check-input" name="gender" value="female"
                    {{ $gender == 'female' ? 'checked' : '' }}> Female
                <input type="radio" class="form-check-input" name="gender" value="other"
                    {{ $gender == 'other' ? 'checked' : '' }}> other
                @error('gender')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex gap-3">
                Subjects :
                <input type="checkbox" class="form-check-input @error('subjects') is-invalid @enderror"
                    name="subjects[]" value="php"
                    {{ in_array('php', old('subjects', explode(',', $selectOne->subjects ?? ''))) ? 'checked' : '' }}>
                PHP
                <input type="checkbox" class="form-check-input @error('subjects') is-invalid @enderror"
                    name="subjects[]" value="javascript"
                    {{ in_array('javascript', old('subjects', explode(',', $selectOne->subjects ?? ''))) ? 'checked' : '' }}>
                JavaScript
                <input type="checkbox" class="form-check-input @error('subjects') is-invalid @enderror"
                    name="subjects[]" value="laravel"
                    {{ in_array('laravel', old('subjects', explode(',', $selectOne->subjects ?? ''))) ? 'checked' : '' }}>
                Laravel
                <input type="checkbox" class="form-check-input @error('subjects') is-invalid @enderror"
                    name="subjects[]" value="jquery"
                    {{ in_array('jquery', old('subjects', explode(',', $selectOne->subjects ?? ''))) ? 'checked' : '' }}>
                JQuery
                <input type="checkbox" class="form-check-input @error('subjects') is-invalid @enderror"
                    name="subjects[]" value="html"
                    {{ in_array('html', old('subjects', explode(',', $selectOne->subjects ?? ''))) ? 'checked' : '' }}>
                HTML
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
