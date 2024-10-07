<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7f7f7;
        }
        .welcome-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            margin-bottom: 30px;
            font-size: 36px;
        }
        .links a {
            color: #007bff;
            text-decoration: none;
            font-size: 18px;
            margin: 0 10px;
            padding: 10px 20px;
            border: 1px solid #007bff;
            border-radius: 5px;
        }
        .links a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="welcome-container">
    <h1>Welcome to Laravel CRUD Mobil & Spek</h1>

    <!-- Check if user is logged in or not -->
    <div class="links">
        @if (Route::has('login'))
            @auth
                <!-- If user is authenticated, show Dashboard link -->
                <a href="{{ url('/dashboard') }}">Dashboard</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <!-- Form logout untuk mengirim request POST -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <!-- If user is not authenticated, show Login and Register links -->
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </div>
</div>

</body>
</html>
