# Notes : CURD using Authentication

## flash message

web.php :

```php
session()->flash('message_delete', 'student deleted successfully');
```

blade.php :

```php
   @if (session()->has('message_delete'))
         <div class="alert alert-danger d-flex justify-content-between">
            {{ session('message_delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
```

## some basics validations

**required, numeric,lowercase etc..**

**size :** size:3,size:12

**between :** between:min,max **example:** between:100,500

**after,before :** used for date validation **example:** after:date before:date

**unique :** unique:students,email,$userId

students:tablename

email:column name

$userId:exclude the current user's email from the uniqueness check

### old()

**old('key','default_value') :** used for get the old input value

## Authentication

**Auth::check()** : User login then return true otherwise false

**Auth::login()** : Used to manually authenticate a user and log them in

**Auth::attempt()** : Used to authenticate a user based on user input

**Auth::user()** : return currently authenticated user , null if no user logged in

**Auth::id()**: return ID of the currently logged/authenticated user

**Auth::guest()**: when user are not login then redirect another page.

### encypt password

Models->Students.php :

```php
    protected function casts() : array
    {
        return [
            'password' => 'hashed'
        ];
    }
```

**casts() :** way of converting attribute to common data types.

**supported cast types :**

- array
- double
- boolean
- date
- datetime
- hased
- integer
- float
- real
- string
- timestamp
- collections
- encrypted ect....

## How to make custom component

### 1. create component using command

```sql
php artisan make:component Alert
```

it makes two file: **1.** app->view->components->Alert.php **2.** resources->views->components->alert.blade.php

### 2. Register Component

app->provider :-

```php
public function boot(): void
    {
        Blade::component('package-alert', Alert::class);
    }
}
```

### 3. Ready the component in alert.blade.php

```php
<div>
    <div class="alert alert-{{ $type }} d-flex justify-content-between">
        {{ $message }}
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
</div>
```

### 4. pass the component's data attributes in class(app->view->components->Alert.php) constructor

```php
public function __construct(public string $type,public string $message)
{
        
}
```

### 5. use it into any blade.php file

```php
@if (session()->has('login'))
    <x-package-alert type="danger" message="{{session('login')}}"/>
@endif

@if (session()->has('message'))
    <x-package-alert type="success" message="{{session('message')}}"/>
@endif

@if (session()->has('message_delete'))
    <x-package-alert type="danger" message="{{session('message_delete')}}"/>
@endif

```
