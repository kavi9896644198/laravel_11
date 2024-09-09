<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ url('public/css/style.css') }}">
    <title>Registration Form</title>
</head>
<body>
    <div class="main">
        <div>
          <span style="color: red;">{{ $errors->first('username') }}</span>
          <span style="color: red;">{{ $errors->first('email') }}</span>
          <span style="color: red;">{{ $errors->first('password') }}</span>
          <span style="color: red;">{{ $errors->first('repassword') }}</span>
        </div>
        <h2>Registration Form</h2>
        @include('message')
        <form action="{{ url('registeration_post')}}" method="post">
          {{ csrf_field() }}
            <label for="last">Username:</label>
            <input type="text" id="username" value="{{ old('username') }}" name="username"/>
            <label for="email">Email:</label>
            <input type="email" id="email" value="{{ old('email') }}" name="email"/>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password"/>

            <label for="repassword">Confirm Password:</label>
            <input type="password" id="repassword" name="repassword"/>

            <label for="mobile">Role Type:</label>
            <select class="selectbox" name="is_role">
              <option value="">Select role</option>
              <option value="2" {{ old('is_role') == '2' ? 'selected' : '' }}>Super Admin</option>
              <option value="1" {{ old('is_role') == '1' ? 'selected' : '' }}>Admin</option>
              <option value="0" {{ old('is_role') == '0' ? 'selected' : '' }}>User</option>
          </select>
            <div class="row button"><input type="submit" value="Registeration"></div>
              <div class="sign-in">Sign In?<a href="{{ url('login')}}">Login</a></div>
              <div class="singup-link">Welcome Page?<a href="{{ url('/') }}">Welcome Page</a></div>
        </form>
    </div>
</body>

</html>