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
    <script src="./script.js" defer></script>
</head>
<body>
    <header class="header-top">
        <div class="header-container">
            <h1 class="title">SHOPPY<span class="spanh1">Kart</span></h1>
            <div class="navbar-div">
                <ul class="nav-ul">
                    <li class="nav-item">HOME</li>
                    <li class="nav-item">ABOUT</li>
                    <a href="products.php">
                        <li class="nav-item">PRODUCTS</li>
                    </a>
                    <a href="./create-product.html"><li class="nav-item">ADD PRODUCT</li></a>
                    <li class="search-bar">
                        <span class="fas fa-search me-2" aria-hidden="true"></span>
                    </li>
                </ul>
            </div>
            
            <div class="auth-div">
                <div class="profile">
                    <span class="fas fa-user" aria-hidden="true"></span> 
                    <!-- <img src="images/p1.jpg" alt="Profile Picture" class="profile-image">    -->
                </div>
                @auth
                <p>Welcome back, {{ auth()->user()->name }}!</p>
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
                {{-- <form action="/register" method="GET">
                    @csrf
                    <button class="nav-btn" type="submit">
                        <div class="fas fa-user user"></div>
                        <span>Signup</span>
                    </button>
                </form> --}}
                <button class="cart-btn" id="cartButton">
                        <div class="fas fa-shopping-bag"></div>
                        <span>Cart</span>
                </button>
            </div>
        </div>
    </header>