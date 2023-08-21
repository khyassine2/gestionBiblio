<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ url('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ url('fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ url('css/aos.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    @livewireStyles
    <title>ClubBiblio</title>
</head>

<body>


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav text-danger ">
        <div class="container">
            <div class="site-navigation">
                <a href="{{ route('home') }}" class="logo m-0 " style="text-decoration: none !
                ">ClubBiblio <span class="text-primary">.</span></a>

                <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">

                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    {{--  <li><a href="services.html">Services</a></li>  --}}


                    {{--  <li><a href="about.html">About</a></li>  --}}
                    <li> <a class="nav-link" href="{{route('offrirlivre')}}">{{ __('Offrir un livre') }}</a></li>
                    {{--  *************  --}}
                    <li class="nav-item">
                        @if (isset(Auth::user()->numInsc))
                            <a class="nav-link"  href="{{ route('locations') }}">{{ __('Locations un livre')}}</a>
                        @else
                            <a href='#' class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ __('Locations un livre')}}</a>
                        @endif

                    </li>
                    @isset(Auth::user()->nom)
                        @if (Auth::user()->role=='admin' || Auth::user()->role=='user')
                            <li><a class="nav-link" href="{{ route('consulterSeances') }}">{{ __('Afficher Les Seances') }}</a></li>
                        @endif
                    @endisset

                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    @isset(Auth::user()->role)
                    @if(Auth::user()->role=='admin')

                    <li class="has-children">
                        <a href="#">Gerer</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('gestionLivre') }}">Livres</a></li>
                            <li><a href="{{route('seances.index',['etat'=>'admin'])}}">Seances</a></li>
                            <li><a href="{{route('membres.index')}}">Membres</a></li>
                            <li class="has-children">
                                <a href="#">Menu Two</a>
                                <ul class="dropdown">
                                    <li><a href="#">Sub Menu One</a></li>
                                    <li><a href="#">Sub Menu Two</a></li>
                                    <li><a href="#">Sub Menu Three</a></li>
                               </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @endisset
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="has-children">
                            <a href="#">{{ Auth::user()->nom }}</a>
                            <ul class="dropdown" style="width: 90px !important">
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a></li>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @endguest
                </ul>

                <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>

            </div>
        </div>
    </nav>


    <div class="hero">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container ">
            @yield('content')

        </div>
    </div>
    <div class="container">
    @yield('main')
    </div>

 {{--  <header class="py-4">
@yield('content')
        </header>
        <main class="py-5">
            @yield('main')
        </main>  --}}
    {{--  <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="section-title text-center mb-3">Our Services</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-lg-4 order-lg-1">
                    <div class="h-100"><div class="frame h-100"><div class="feature-img-bg h-100" style="background-image: url('images/hero-slider-1.jpg');"></div></div></div>
                </div>

                <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1" >

                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-house display-4 text-primary"></span>
                            <h3>Beautiful Condo</h3>
                            <p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
                        </div>
                    </div>

                    <div class="feature-1 ">
                        <div class="align-self-center">
                            <span class="flaticon-restaurant display-4 text-primary"></span>
                            <h3>Restaurants & Cafe</h3>
                            <p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
                        </div>
                    </div>

                </div>

                <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3" >

                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-mail display-4 text-primary"></span>
                            <h3>Easy to Connect</h3>
                            <p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
                        </div>
                    </div>

                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-phone-call display-4 text-primary"></span>
                            <h3>24/7 Support</h3>
                            <p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>  --}}

    {{--  <div class="untree_co-section count-numbers py-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="9313">0</span>
                        </div>
                        <span class="caption">No. of Travels</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="8492">0</span>
                        </div>
                        <span class="caption">No. of Clients</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="100">0</span>
                        </div>
                        <span class="caption">No. of Employees</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="120">0</span>
                        </div>
                        <span class="caption">No. of Countries</span>
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}


{{--  for admin or user  --}}
@isset(Auth::user()->role)
@if (Auth::user()->role=='admin' || Auth::user()->role=='user')
    @yield('animation')
@endif
@endisset






    <div class="untree_co-section">
       @yield('section01')
    </div>



    <div >
       @yield('section02')
    </div>

    <div class="site-footer">
        <div class="inner first">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="widget">
                            <h3 class="heading">Club biblio</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        </div>
                        <div class="widget">
                            <ul class="list-unstyled social">
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li><a href="#"><span class="icon-dribbble"></span></a></li>
                                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                                <li><a href="#"><span class="icon-apple"></span></a></li>
                                <li><a href="#"><span class="icon-google"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 pl-lg-5">
                        <div class="widget">
                            <h3 class="heading">Pages</h3>
                            <ul class="links list-unstyled">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="widget">
                            <h3 class="heading">Resources</h3>
                            <ul class="links list-unstyled">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="widget">
                            <h3 class="heading">Contact</h3>
                            <ul class="list-unstyled quick-info links">
                                <li class="email"><a href="#">mail@example.com</a></li>
                                <li class="phone"><a href="#">+212 666666</a></li>
                                <li class="address"><a href="#">fes Maroc</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="inner dark">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-8 mb-3 mb-md-0 mx-auto">
                        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script src="{{ url('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('js/popper.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ url('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ url('js/aos.js') }}"></script>
    <script src="{{ url('js/moment.min.js') }}"></script>
    <script src="{{ url('js/daterangepicker.js') }}"></script>

    <script src="{{ url('js/typed.js') }}"></script>
    <script>
        $(document).ready(function() {
            var slides = $('.slides'),
            images = slides.find('img');

            images.each(function(i) {
                $(this).attr('data-id', i + 1);
            })

            var typed = new Typed('.typed-words', {
                strings: ["votre biblio."," votre club."],
                typeSpeed: 120,
                backSpeed: 120,
                backDelay: 4000,
                startDelay: 1000,
                loop: true,
                showCursor: true,
                preStringTyped: (arrayPos, self) => {
                    arrayPos++;
                    $('.slides img').removeClass('active');
                    $('.slides img[data-id="'+arrayPos+'"]').addClass('active');
                }

            });
        })

    </script>

    <script src="{{ url('js/custom.js') }}"></script>
{{--  Modal  --}}
    @livewire('verification')
      @livewireScripts
</body>

</html>

