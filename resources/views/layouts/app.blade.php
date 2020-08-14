<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Оптика для твоих глаз - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/circle-progress.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">     

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/goods.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/medilife-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <header class="header-section">

            <div class="container">
                <!-- Site Logo -->
                <a href="{{ url('/') }}" class="site-logo">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                </a>
                <!-- responsive -->
                <div class="nav-switch">
                    <i class="fa fa-bars"></i>
                </div>
                <!-- Main Menu -->
                <ul class="main-menu">
                    <li class="{{ (Request::is('main') || Request::is('/')) ? 'active' : '' }}"><a href="{{ route('main') }}">Главная</a></li>
                    <li class="{{ (Request::is('goods') || Request::is('goods/*')) ? 'active' : '' }}"><a href="{{ url('goods') }}">Товары</a></li>
                    @auth
                        <li class="{{ (Request::is('appointments') || Request::is('appointments/*')) ? 'active' : '' }}"><a href="{{ url('appointments') }}">Запись</a></li>
                    @endauth
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Контакты</a></li>

                    @auth                      
                        @if (Auth::user()->isAdmin())
                            <!-- <li><a href="#">Админ</a></li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Админ
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('roleusers') }}">Роли пользователей</a> 
                                    <div class="dropdown-divider"></div>  
                                    <a class="dropdown-item" href="{{ url('categories') }}">Категории</a>
                                </div>
                            </li>
                        @endif
                    @endauth

                    @if (Route::has('login'))
                        @auth
                        <!-- <li>{{ Auth::user()->name }}</li> -->
                        <li class="{{ Request::is('logout') ? 'active' : '' }}"><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a></li>
                        @else
                        <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ route('login') }}">Войти</a></li>
                        @endauth
                    </div>
                    @endif

                </ul>

            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

            <div class="header-info">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 hi-item">
                            <div class="hs-icon">
                                <img src="{{ asset('img/icons/map-marker.png') }}" alt="">
                            </div>
                            <div class="hi-content">
                                <h6>Жилянская</h6>
                                <p>Киев, Украина</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 hi-item">
                            <div class="hs-icon">
                                <img src="{{ asset('img/icons/clock.png') }}" alt="">
                            </div>
                            <div class="hi-content">
                                <h6>Часы работы</h6>
                                <p>Вт - Вс: 8:00 - 20:00</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 hi-item">
                            <div class="hs-icon">
                                <img src="{{ asset('img/icons/phone.png') }}" alt="">
                            </div>
                            <div class="hi-content">
                                <h6>+38 (000) 000-00-00</h6>
                                <p>Позвоните нам сейчас!</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 hi-item">
                            <div class="hs-icon">
                                <img src="{{ asset('img/icons/calendar.png') }}" alt="">
                            </div>
                            <div class="hi-content">
                                <h6>Жилянская</h6>
                                <p>Киев, Украина</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header section end -->

        <!-- Page info section -->
        <section class="page-info-section set-bg" data-setbg="{{ asset('img/page-info-bg/3.jpg') }}">
            <div class="container">
                <h2>Оптика «Для твоих глаз»</h2>
            </div>
        </section>
        <!-- Page info section end -->

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Newsletter section -->
        <!-- <section class="newsletter-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 banner-text text-white">
                        <h4>Подписывайтесь на нашу новостную рассылку</h4>
                        <p>Будьте в курсе последних новостей</p>
                    </div>
                    <div class="col-lg-5 text-lg-right">
                        <form class="newsletter-form">
                            <input type="email" placeholder="Email">
                            <button class="site-btn sb-dark">Подписатся</button>
                        </form>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- Newsletter section end -->
    
        <!-- Footer top section -->
        <section class="footer-top-section set-bg" data-setbg="{{ asset('img/footer-bg.png') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-widget">
                            <div class="fw-about">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                                <p>Забота о собственном зрении – один из самых важных критериев здоровья. Для того, чтобы сохранить зрение даже в преклонном возрасте, необходимо помнить о том, что наши глаза нуждаются в тщательном уходе не меньше, чем какой-либо другой жизненно важный орган.</p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-5">
                        <div class="footer-widget">
                            <div class="fw-links">
                                <h5 class="fw-title">Наши преимущества</h5>
                                <p>18 лет с вами</p>
                                <p>Высокий профессионализм</p>
                                <p>Забота о клиенте</p>
                                <p>Программы лояльности</p>
                                <p>Уютная атмосфера</p>
                                <p>Гарантия</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-7">
                        <div class="footer-widget">
                            <div class="fw-timetable">
                                <div class="fw-title">Часы работы</div>
                                <div class="timetable-content">
                                    <table>
                                        <tr>
                                            <td>Вторник</td>
                                            <td>8:00 - 20:00</td>
                                        </tr>
                                        <tr>
                                            <td>Среда</td>
                                            <td>8:00 - 20:00</td>
                                        </tr>
                                        <tr>
                                            <td>Четверг</td>
                                            <td>8:00 - 20:00</td>
                                        </tr>
                                        <tr>
                                            <td>Пятница</td>
                                            <td>8:00 - 20:00</td>
                                        </tr>
                                        <tr>
                                            <td>Субота</td>
                                            <td>8:00 - 20:00</td>
                                        </tr>
                                        <tr>
                                            <td>Воскресенье</td>
                                            <td>8:00 - 20:00</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer top section end -->


        <!-- Footer section -->
        <footer class="footer-section">
            <div class="container">
                <ul class="footer-menu">
                    <li><a href="{{ route('main') }}">Главная</a></li>
                    <li><a href="{{ url('goods') }}">Товары</a></li>
                    @auth
                        <li><a href="{{ url('appointments') }}">Запись</a></li>
                    @endauth
                    <li><a href="{{ route('contact') }}">Контакты</a></li>
                </ul>
                <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    &copy;2020-<script>document.write(new Date().getFullYear());</script> <span>Оптика «Для твоих глаз»</span></div>
            </div>
        </footer>
        <!-- Footer top section end -->
        
    </div>
</body>
</html>
