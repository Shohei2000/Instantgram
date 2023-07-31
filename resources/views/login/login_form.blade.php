<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログインフォーム</title>
    @include('custom_header')
</head>
<body>

<form class="form-signin" method="POST" action="{{ route('login') }}">
@csrf
  <h1 class="h3 mb-3 font-weight-normal text-center">Instantgram</h1>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('login_error'))
    <div class="alert alert-danger">
        {{ session('login_error') }}
    </div>
@endif
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block w-100" type="submit">ログイン</button>
</form>
    
</body>
</html>