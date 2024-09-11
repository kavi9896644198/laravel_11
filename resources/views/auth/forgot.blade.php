@extends('layouts.app')

@section('content')

    <div class="main">
        @include('message')
        <h2>Forgot Password Form</h2>
        <form action="{{ url('forgot_post')}}" method="post">
            {{ csrf_field() }}
            <label for="email">Email:</label>
            <input type="email" value="{{ old('email') }}" id="email" name="email" required />
            <div class="forget_password"><a href="{{ url('forgot')}}">Forget Password</a></div> 
            <div class="row button"><input type="submit" value="Forgot Password"></div>
              <div class="sign-in">Sign Up? <a href="{{ url('registeration')}}">Registeration</a></div>
              <div class="singup-link">Welcome Page? <a href="{{ url('/') }}">Welcome Page</a></div>
        </form>
    </div>

     @endsection