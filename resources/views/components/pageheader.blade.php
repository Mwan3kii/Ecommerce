<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Site</title>
    <link rel="stylesheet" href="/assests/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>
    <header class="header-top">
        <div class="header-container">
            <h1 class="title">SHOPPY<span class="spanh1">Kart</span></h1>
            <div class="search-bar">
                <form action="/search" method="GET" class="search-form">
                    @csrf
                    <input type="text" name="search" placeholder="Search">
                    <button type="submit" class="search-button"><span class="fas fa-search me-2"></span></button>
                </form>
            </div>
            <div class="auth-div">
                @auth
                <div class="profile">
                    <span class="fas fa-user" aria-hidden="true"></span> 
                    <!-- <img src="images/p1.jpg" alt="Profile Picture" class="profile-image">    -->
                </div>
                <p>{{ auth()->user()->name }}</p>
                
                <form action="/logout" method="POST">
                @csrf
                    <button class="logout-btn">
                        <div class="fas fa-sign out"></div>
                            <span>Logout</span>
                    </button>
                </form>
                @else
                <form action="/login" method="GET">
                    @csrf
                    <button class="nav-btn" type="submit">
                        <div class="fas fa-user user"></div>
                        <span>Login</span>
                    </button>
                </form>
                @endauth
                <button class="cart-btn" id="cartButton">
                    <div class="fas fa-shopping-bag"></div>
                    <span>Cart</span>
                </button>
                @include('cart')
            </div>
        </div>
        <div>
            <div class="navbar-div">
                <ul class="nav-ul">
                    <a href="/landing-page">
                        <li class="nav-item">HOME</li>
                    </a>
                    <a href="/products">
                        <li class="nav-item">PRODUCTS</li>
                    </a>
                    <a href="/contact">
                        <li class="nav-item">CONTACT</li>
                    </a>
                    @auth
                        @if (auth()->user()->isAdmin())
                            <a href="/create-product"><li class="nav-item">ADD PRODUCT</li></a>
                            <a href="/admin-panel"><li class="nav-item">ADMIN PANEL</li></a>
                            <a href="/orders"><li class="nav-item">ORDERS</li></a>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</header>