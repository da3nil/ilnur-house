<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <!--top-header-->
    <nav class="navbar navbar-inverse" style="border-radius: 0">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
{{--                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"--}}
{{--                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">--}}
{{--                    <span class="sr-only">Toggle navigation</span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                </button>--}}
                <a class="navbar-brand" href="#">Сюда можно вставить текст :P</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
{{--                <ul class="nav navbar-nav">--}}
{{--                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>--}}
{{--                    <li><a href="#">Link</a></li>--}}
{{--                    <li class="dropdown">--}}
{{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"--}}
{{--                           aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#">Action</a></li>--}}
{{--                            <li><a href="#">Another action</a></li>--}}
{{--                            <li><a href="#">Something else here</a></li>--}}
{{--                            <li role="separator" class="divider"></li>--}}
{{--                            <li><a href="#">Separated link</a></li>--}}
{{--                            <li role="separator" class="divider"></li>--}}
{{--                            <li><a href="#">One more separated link</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--                <form class="navbar-form navbar-left">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" class="form-control" placeholder="Search">--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-default">Submit</button>--}}
{{--                </form>--}}
                <ul class="nav navbar-nav navbar-right">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <li class="dropdown-item">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                    >{{ __('Выйти') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

{{--        <div class="top-header">--}}
{{--            <div class="container">--}}
{{--                <div class="top-header-main">--}}
{{--                    <div class="col-md-6 top-header-left">--}}
{{--                        <div class="drop">--}}
{{--                            <div class="box">--}}
{{--                                @guest--}}
{{--                                    <select tabindex="4" class="dropdown drop">--}}
{{--                                        <option value="" class="label">Аккаунт</option>--}}
{{--                                        <option value="1"><a href="#">Войти</a></option>--}}
{{--                                    </select>--}}
{{--                                @else--}}
{{--                                    <select tabindex="4" class="dropdown drop">--}}
{{--                                        <option value="" class="label">{{ Auth::user()->name }}</option>--}}
{{--                                        <option onclick="event.preventDefault()" value="1">Выход</option>--}}
{{--                                    </select>--}}
{{--                                @endguest--}}
{{--                            </div>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 top-header-left">--}}
{{--                        <div class="cart box_1">--}}
{{--                            <a href="checkout.html">--}}
{{--                                <div class="total">--}}
{{--                                    <span class="simpleCart_total"></span></div>--}}
{{--                                <img src="images/cart-1.png" alt="" />--}}
{{--                            </a>--}}
{{--                            <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>--}}
{{--                            <div class="clearfix"> </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="clearfix"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
<!--top-header-->
    <!--start-logo-->
    <div class="logo">
        <a href="index.html"><h1>ЮВЕЛИРНЫЙ СКЛАД</h1></a>
    </div>
    <!--start-logo-->
    <!--bottom-header-->
    <div class="header-bottom">
        <div class="container">
            <div class="header">
                <div class="col-md-9 header-left">
                    <div class="top-nav">
                        <ul class="memenu skyblue">
                            <li class="@if(Request::route()->getName() === "home") active @endif"><a href="{{ route('home') }}">Главная</a></li>
                            <li class="@if(Request::route()->getName() === "product.index") active @endif"><a href="{{ route('product.index') }}">Товары</a></li>
                            <li class="@if(Request::route()->getName() === "category.index") active @endif"><a href="{{ route('category.index') }}">Категории</a></li>
                            <li class=""><a href="#">Справочник</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3 header-right">
                    <div class="search-bar">
                        <input type="text" value="Поиск" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Поиск';}">
                        <input type="submit" value="">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--bottom-header-->
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="index.html">Главная</a></li>
                    <li class="active">Войти</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->

@yield('content')

<!--information-starts-->
    <div class="information">
        <div class="container">
            <div class="infor-top">
                <div class="col-md-3 infor-left">
                    <h3>Follow Us</h3>
                    <ul>
                        <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                        <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                        <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>Информация</h3>
                    <ul>
                        <li><a href="#"><p>Specials</p></a></li>
                        <li><a href="#"><p>New Products</p></a></li>
                        <li><a href="#"><p>Our Stores</p></a></li>
                        <li><a href="contact.html"><p>Contact Us</p></a></li>
                        <li><a href="#"><p>Top Sellers</p></a></li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>Мой аккаунт</h3>
                    <ul>
                        <li><a href="account.html"><p>My Account</p></a></li>
                        <li><a href="#"><p>My Credit slips</p></a></li>
                        <li><a href="#"><p>My Merchandise returns</p></a></li>
                        <li><a href="#"><p>My Personal info</p></a></li>
                        <li><a href="#"><p>My Addresses</p></a></li>
                    </ul>
                </div>
                <div class="col-md-3 infor-left">
                    <h3>О складе</h3>
                    <h4>The company name,
                        <span>Lorem ipsum dolor,</span>
                        Glasglow Dr 40 Fe 72.</h4>
                    <h5>+955 123 4567</h5>
                    <p><a href="mailto:example@email.com">contact@example.com</a></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--information-end-->
    <!--footer-starts-->
    <div class="footer">
        <div class="container">
            <div class="footer-top">
                <div class="col-md-6 footer-left">
                    <form>
                        <input type="text" value="Enter Your Email" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
                <div class="col-md-6 footer-right">
                    <p style="font-family: 'Bree-Serif-k', sans-serif">© 2021 Басыров Ильнур</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
    {{--            <div class="container">--}}
    {{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
    {{--                    {{ config('app.name', 'Laravel') }}--}}
    {{--                </a>--}}
    {{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
    {{--                    <span class="navbar-toggler-icon"></span>--}}
    {{--                </button>--}}

    {{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
    {{--                    <!-- Left Side Of Navbar -->--}}
    {{--                    <ul class="navbar-nav mr-auto">--}}

    {{--                    </ul>--}}

    {{--                    <!-- Right Side Of Navbar -->--}}
    {{--                    <ul class="navbar-nav ml-auto">--}}
    {{--                        <!-- Authentication Links -->--}}
    {{--                        @guest--}}
    {{--                            <li class="nav-item">--}}
    {{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
    {{--                            </li>--}}
    {{--                            @if (Route::has('register'))--}}
    {{--                                <li class="nav-item">--}}
    {{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
    {{--                                </li>--}}
    {{--                            @endif--}}
    {{--                        @else--}}
    {{--                            <li class="nav-item dropdown">--}}
    {{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
    {{--                                    {{ Auth::user()->name }}--}}
    {{--                                </a>--}}

    {{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
    {{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
    {{--                                       onclick="event.preventDefault();--}}
    {{--                                                     document.getElementById('logout-form').submit();">--}}
    {{--                                        {{ __('Logout') }}--}}
    {{--                                    </a>--}}

    {{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
    {{--                                        @csrf--}}
    {{--                                    </form>--}}
    {{--                                </div>--}}
    {{--                            </li>--}}
    {{--                        @endguest--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </nav>--}}

    {{--        <main class="py-4">--}}
    {{--            @yield('content')--}}
    {{--        </main>--}}
</div>
</body>
</html>
