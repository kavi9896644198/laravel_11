@extends('layouts.app')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .dashboard {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard h1 {
            margin-top: 0;
            color: #333;
        }

        .dashboard .info {
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .dashboard .info:last-child {
            border-bottom: none;
        }

        .dashboard .info label {
            font-weight: bold;
            color: #555;
        }

        .dashboard .info p {
            margin: 0;
            color: #666;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Admin Dashboard</h1>
        <div class="info">
            <label>Name:</label>
            <p>{{ $getrecord->name }}</p>
        </div>
        <div class="info">
            <label>Email:</label>
            <p>{{ $getrecord->email }}</p>
        </div>
        <div class="sign-in">User Logout? <a href="{{ url('logout')}}">Logout</a></div>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Your Company. All rights reserved.
    </div>

@endsection