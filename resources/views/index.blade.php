@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="wrapper">
        <div class="title">Welcome Page</div>
          <form>
            @if(Auth::check())
              @if(Auth::user()->is_role == 2)
                <div class="sign-up">Supper Admin Already logdin?<a href="{{ url('superadmin/dashboard')}}">Dashboard</a></div>
              @elseif(Auth::user()->is_role == 1)
                <div class="sign-up">Admin Already logdin?<a href="{{ url('admin/dashboard')}}">Dashboard</a></div>
              @elseif(Auth::user()->is_role == 0)
                <div class="sign-up">User Already logdin?<a href="{{ url('user/dashboard')}}">Dashboard</a></div>
              @endif
              <div class="sign-in">User Logout? <a href="{{ url('logout')}}">Logout</a></div>
            @else
              <div class="sign-in">Sign In?<a href="{{ url('login')}}">Login</a></div>
              <div class="sign-up">join Now?<a href="{{ url('registeration')}}">Registeration</a></div>
            @endif

          </form>
      </div>
  </div>

@ 