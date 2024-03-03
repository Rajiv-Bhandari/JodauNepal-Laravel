<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jodau-Nepal</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'figtree', sans-serif;
            background-color: #f4f4f4; /* Change the background color as needed */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            background-image: url('/images/background.jpg');
            background-size: cover;
            background-position: center;
            opacity: 1.5;
        }

        .quote {
        text-align: center;
        color: white;
        font-size: 24px;
        line-height: 1.5;
        margin-bottom: 20px;
        width: 80%;
        }


        .quote p {
            font-size: 30px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .become-technician-btn {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .become-technician-btn:hover {
            background-color: #0056b3;
        }

        /* Styles for Login/Register section */
        .auth-links {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 16px;
            color: #333;
        }

        .auth-links a {
            margin-left: 10px;
            text-decoration: none;
            color: white;
            transition: color 0.3s ease;
        }

        .auth-links a:hover {
            color: #007bff;
        }
        .services {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 10px;
            background-color: black;
            border-radius: 0;
            color: #fff;
        }

        .services h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .services ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .services li {
            background-color: brown;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
        }

    </style>
</head>
<body>
@php
    use App\Enums\UserType;
@endphp

    <div class="container">
        @if (Route::has('login'))
            <div class="auth-links">
                @auth
                    <!-- <a href="{{ url('/dashboard') }}">Dashboard</a> -->
                    @auth
                        @php
                            $userType = auth()->user()->usertype;
                        @endphp

                        <a href="{{ route(
                            match($userType) {
                                UserType::Admin => 'admin.dashboard',
                                UserType::Technician => 'dashboard.technician',
                                UserType::User => 'user.home',
                            }
                        ) }}">Dashboard</a>
                    @endauth

                @else
                    <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="quote">
            <p>Join our platform, Seamlessly connect with proficient technicians for your needs while providing experts with a platform to showcase their talents. Experience a hassle-free, efficient way to address technical issues while empowering technicians to offer their expertise and services. Together, let's revolutionize the way problems are solved.</p>
            <p>Technicians don't just fix problems;<br>they engineer solutions.</p>
            <a href="{{route('register-technician-form')}}" class="become-technician-btn">Become a Technician</a>
            
        </div>
    </div>
    <div class="services">
        <h3>Our Services : </h3>
        <ul>
            @forelse ($categories as $category)
                <li>{{ $category->name }}</li>
            @empty
                <p>No categories available.</p>
            @endforelse
        </ul>
    </div>

</body>
</html>
