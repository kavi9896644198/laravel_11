<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ url('public/css/style.css') }}">
    <title>Login Form</title>
</head>
<body>
    <div class="main">
    	<span style="color: red;">{{ $errors->first('password') }}</span>
        <span style="color: red;">{{ $errors->first('confirm_password') }}</span>
    	@include('message')
        <h2>Reset Password Form</h2>
        <form action="{{ url('reset_post/'.$token) }}" method="post">
        	{{ csrf_field() }}
            <label for="email">Password:</label>
            <input type="password" id="password" name="password"/>
            <label for="password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" /> 
            <div class="row button"><input type="submit" value="Reset Password"></div>
        </form>
    </div>
</body>

</html>