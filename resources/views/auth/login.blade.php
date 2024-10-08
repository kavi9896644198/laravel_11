@extends('layouts.app')

@section('content')
    <div class="main">
    	@include('message')
        <h2>Login Form</h2>
        <form action="{{ url('login_post')}}" method="post">
        	{{ csrf_field() }}
            <label for="email">Email:</label>
            <input type="email" id="email" value="{{ old('email') }}" name="email" required />
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />
            <div class="forget_password"><a href="{{ url('forgot')}}">Forget Password</a></div> 
            <div class="row button"><input type="submit" value="Login"></div>
              <div class="sign-in">Sign Up? <a href="{{ url('registeration')}}">Registeration</a></div>
              <div class="singup-link">Welcome Page? <a href="{{ url('/') }}">Welcome Page</a></div>
        </form>
    </div>

    @endsection