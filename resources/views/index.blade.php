<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('public/css/style.css') }}">
    <title>Welcome Page | Webutopian</title>
</head>
<body>
  <div class="container">
      <div class="wrapper">
        <div class="title">Welcome Page</div>
          <form>
              <div class="sign-in">Sign In?<a href="{{ url('login')}}">Login</a></div>
              <div class="sign-up">join Now?<a href="{{ url('registeration')}}">Registeration</a></div>
          </form>
      </div>
  </div>
</body>
</html>