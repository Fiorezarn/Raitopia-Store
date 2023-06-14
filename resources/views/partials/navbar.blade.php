<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
</head>

<nav class="navbar navbar-expand-md navbar-light shadow-sm navbar-custom">
    <div class="container">
        <a class="logo" href="{{ url('/') }}">
            Raitopia
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse navbar-custom-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item nav-item-custom">
                    <a class="nav-list" href="/">Home</a>
                </li>
                <li class="nav-item nav-item-custom">
                    <a class="nav-list" href="/product">Product</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
