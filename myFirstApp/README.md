# Routes

- simple route
- named route
- group route

## how to pass variable or array from routes to view

web.php :

```php
function allUsers()
{
    return
        [
            1 => ['name' => "Alice", 'roll' => 20, 'city' => "Rajkot"],
            2 => ['name' => "Bob", 'roll' => 21, 'city' => "Ahmedabad"],
            3 => ['name' => "Charlie", 'roll' => 22, 'city' => "Surat"],
            4 => ['name' => "David", 'roll' => 23, 'city' => "Vadodara"]
        ];
}

Route::get('/users', function () {
    $name = "corbital";

    $data = allUsers();

    // way-1
    // return view('users',['name'=>$name,
    //                     'city'=>'<script>alert("hello")</script>']);

    //way-2
    //return view('users')->with('name',$name)->with('city','rajkot');

    //way-3 not working
    //return view('users')->withName('corbital')->withCity('rajkot');

    return view('users', ['users' => $data]);
});
```

users.blade.php :

```php

        {{-- <h1>hello {{ $name }}</h1> --}}

        {{-- used for js code --}}
        {{-- <h1>city {!! $city !!}</h1> --}}

        {{-- <h1>city : {{ !empty($city) ? $city : 'no city' }}</h1> --}}

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
```

## Query Builder

**fetch all Data :**

```sql
DB::table('users')->get();
```

**insert data :**

```sql
DB::table('users')->insert(['name'=>'abcd','email'=>'abcd@gmail.com','password'=>'123']);
```

**delete data :**

```sql
DB::table('users')->where('id',2)->delete();
```

**update data :**

```sql
DB::table('users')->where('id',2)->update(['email'=>'abc@yahoo.com']);
```

## Eloquent

**fetch all Data :**

```sql
Products::all();
```

**insert data :**

```sql
Products::create(['productId'=>$data['product_id'],'productName'=>$data['product_name'],'customerName'=>$data['customer_name']])
```

**delete data :**

```sql
Products::where('id',$id)->delete();
```

**update data :**

```sql
Products::where('id',$id)->update(['productId'=>$data['product_id'],'productName'=>$data['product_name'],'customerName'=>$data['customer_name']]);
```

**insert and update both :**

```sql
Products::updateorCreate(['id'=>$data['id']],['productId'=>$data['product_id'],'productName'=>$data['product_name'],'customerName'=>$data['customer_name']]);
```

## validations

**required - numeric - between - lowercase - uppercase:**

between : between:min,max

```php
$data->validate([
            'product_id' => 'required|numeric|between:100,500',
            'product_name' => 'required|lowercase',
            'customer_name' => 'required|uppercase'
        ],[
           'product_name.lowercase' => 'please enter product name in lowecase'
        ]);
```
