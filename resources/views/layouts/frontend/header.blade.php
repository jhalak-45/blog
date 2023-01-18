<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <title>{{ $title }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/jhalak.jpg') }}">
    <link href="/dist/app.css" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/typing.js') }}"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white  sticky-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand py-1" href="{{ URL::to('/') }}">Jhalak Dhami</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse px-0  navbar-collapse py-1 px-auto" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/projects') }}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>

                    @if (Route::has('login'))
                        <div class="hidden fixed d-flex top-0 right-0 sm:block">
                            @auth
                                <li class="nav-item">
                                    <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                                </li>

                                {{-- <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="nav-link">Register</a>
                                    @endif

                                </li> --}}

                            @endauth
                        </div>
                    @endif
            </div>
            </ul>

        </div>
        </div>
    </nav>
