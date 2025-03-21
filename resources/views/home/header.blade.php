<!DOCTYPE html>
<html lang="ar" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ANA Shop </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- RTL Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}" type="text/css">
</head>
<style>
    .dropdown li a:hover {
        color: blue;
    }

    /* RTL specific styles */
    body {
        text-align: right;
    }

    .header__menu ul li .dropdown {
        right: 0;
        left: auto;
        padding: 10px 20px;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    a{
        text-decoration:none;
    }

    .header__menu ul li .dropdown li {
        margin: 10px 0;
    }

    .header__right {
        text-align: left;
    }

    .header__menu ul li:hover .dropdown {
        display: block;
    }

    .showcart {
        display: none;
    }

    /* إخفاء القائمة في وضع الهاتف المحمول */
    @media (max-width: 991px) {
        .header__menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: white;
            z-index: 1000;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .hideImg {
            display: none;
        }

        .showcart {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header__menu ul {
            flex-direction: column;
        }

        .header__menu ul li {
            margin: 10px 10px;
        }

        .canvas__open {
            display: block;
            cursor: pointer;
            font-size: 24px;
            margin: 0 0 30px 0;
        }

        .header__menu.active {
            display: block;
        }

        .header__logo {
            max-width: 30%
        }
        .header__right__auth{
            font-size: 20px;
            font-weight: bold;
            transform: translate(20px, -60px);
        }
    }
</style>

<body>
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{ url('/') }}">
                            <img style="height: 80px;width: 80px;" src={{ url('img/logo55.png') }} alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7" style="display: flex; justify-content: center; align-items: center;">
                    <nav class="header__menu" id="navbar" style="direction: rtl">
                        <ul>
                            <li class="{{ Request::is('/') ? 'active' : '' }}">
                                <a style="font-size: 20px; font-weight:bold;" href="{{ url('/') }}">{{ __('messages.home') }}</a>
                            </li>
                            <li class="{{ Request::is('category/men*') ? 'active' : '' }}">
                                <a style="font-size: 20px; font-weight:bold;"
                                    href="{{ url('category/men') }}">{{ __('messages.men') }}</a>
                                <ul class="dropdown">
                                    @foreach ($categories as $category)
                                        @if ($category->category_type === \App\Enums\CategoryType::MEN)
                                            <li><a href="{{ route('category_filter', ['category' => $category->name]) }}"
                                                    style="color: black;">{{ $category->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{ Request::is('category/women*') ? 'active' : '' }}">
                                <a style="font-size: 20px; font-weight:bold;"
                                    href="{{ url('category/women') }}">{{ __('messages.women') }}</a>
                                <ul class="dropdown">
                                    @foreach ($categories as $category)
                                        @if ($category->category_type === \App\Enums\CategoryType::WOMEN)
                                            <li><a href="{{ route('category_filter', ['category' => $category->name]) }}"
                                                    style="color: black;">{{ $category->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{ Request::is('category/girls*') ? 'active' : '' }}">
                                <a style="font-size: 20px; font-weight:bold;"
                                    href="{{ url('category/girls') }}">{{ __('messages.girls') }}</a>
                                <ul class="dropdown">
                                    @foreach ($categories as $category)
                                        @if ($category->category_type === \App\Enums\CategoryType::GIRLS)
                                            <li><a href="{{ route('category_filter', ['category' => $category->name]) }}"
                                                    style="color: black;">{{ $category->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{ Request::is('category/boys*') ? 'active' : '' }}">
                                <a style="font-size: 20px; font-weight:bold;"
                                    href="{{ url('category/boys') }}">{{ __('messages.boys') }}</a>
                                <ul class="dropdown">
                                    @foreach ($categories as $category)
                                        @if ($category->category_type === \App\Enums\CategoryType::BOYS)
                                            <li><a href="{{ route('category_filter', ['category' => $category->name]) }}"
                                                    style="color: black;">{{ $category->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{ Request::is('category/newborn*') ? 'active' : '' }}">
                                <a style="font-size: 20px; font-weight:bold;"
                                    href="{{ url('category/newborn') }}">{{ __('messages.newborn') }}</a>
                                <ul class="dropdown">
                                    @foreach ($categories as $category)
                                        @if ($category->category_type === \App\Enums\CategoryType::NEWBORN)
                                            <li><a href="{{ route('category_filter', ['category' => $category->name]) }}"
                                                    style="color: black;">{{ $category->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{ Request::is('category/accessories*') ? 'active' : '' }}">
                                <a style="font-size: 20px; font-weight:bold;"
                                    href="{{ url('category/accessories') }}">{{ __('messages.accessories') }}</a>
                                <ul class="dropdown">
                                    @foreach ($categories as $category)
                                        @if ($category->category_type === \App\Enums\CategoryType::ACCESSORIES)
                                            <li><a href="{{ route('category_filter', ['category' => $category->name]) }}"
                                                    style="color: black;">{{ $category->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li class="{{ Request::is('category/nuts*') ? 'active' : '' }}">
                                <a style="font-size: 20px; font-weight:bold; margin:0 10px 0 0"
                                    href="{{ url('category/nuts') }}">{{ __('messages.nuts') }}</a>
                                <ul class="dropdown">
                                    @foreach ($categories as $category)
                                        @if ($category->category_type === \App\Enums\CategoryType::NUTS)
                                            <li><a href="{{ route('category_filter', ['category' => $category->name]) }}"
                                                    style="color: black;">{{ $category->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>

                            </li>

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        @auth
                            <div class="header__right__auth">
                                <x-app-layout>
                                </x-app-layout>
                            </div>
                        @else
                            <div class="header__right__auth">
                                <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
                                <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
                            </div>
                        @endauth
                        <ul class="header__right__widget">
                            <li>
                                <a href="{{ url('/cart') }}">
                                    <span class="icon_cart_alt" style="font-size: 25px;"></span>
                                    @auth
                                        <div class="tip">{{ $countcart }}</div>
                                    @endauth
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/orders') }}">
                                    <span class="icon_bag_alt" style="font-size: 25px;"></span>
                                    @auth
                                        <div class="tip">{{ $countorder }}</div>
                                    @endauth
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="showcart">
                <div class="canvas__open" id="mobile-menu-toggle">
                    <i class="fa fa-bars"></i>
                </div>
                                        @auth
                        @else
                            <div class="header__right__auth">
                                <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
                                <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
                            </div>
                        @endauth
                @auth
                    <ul class="header__right__widget">
                    <li>
                        <a href="{{ url('/cart') }}">
                            <span class="icon_cart_alt" style="font-size: 25px;"></span>
                            @auth
                                <div class="tip">{{ $countcart }}</div>
                            @endauth
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/orders') }}">
                            <span class="icon_bag_alt" style="font-size: 25px;"></span>
                            @auth
                                <div class="tip">{{ $countorder }}</div>
                            @endauth
                        </a>
                    </li>
                </ul>
                @endauth
            </div>

        </div>
    </header>
    <script>
        document.getElementById('mobile-menu-toggle').addEventListener('click', function() {
            var navbar = document.getElementById('navbar');
            navbar.classList.toggle('active');
        });
    </script>
</body>

</html>
