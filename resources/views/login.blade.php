<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-css">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('store')}}">
    @csrf
  <input type="text" name="email" placeholder="email">
  <input type="password" name="password" placeholder="password"> 

  <button type="submit">Submit</button>
</form>
 
@if (Auth::check()) 
  <p>Login berhasil:</p>
  <p> {{ Auth::user() }}</p> 

  <form method="POST" action="{{ route('logout')}}">
    @csrf 
    <button type="submit">Logout</button>
  </form> 
@endif 

</body>
</html>