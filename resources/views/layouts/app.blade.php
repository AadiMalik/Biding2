@php
    $media = media();
    $data = content();
@endphp
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="shortcut icon" href="{{ asset('assets/images/Logo subastek sin fondo.png') }}" type="image/x-icon">
    <title>{{$data['#tab_heading']['heading']??''}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/tiny-slider.css')}}" /> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    <style>
        .ajax-loading {
            text-align: center;
        }
        .count_green{
            color:green;
        }
    </style>
    @yield('style')
</head>

<body>
    <header class=" py-2">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <div class=" d-lg-none d-lg-inline-block">
                        <a class="btn  " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                            aria-controls="offcanvasExample">
                            <i class="fas fa-bars"></i>
                        </a>
                        <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasExample"
                            aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header">
                                <img class="offcanvas-title mx-auto" class="offcanvas-title"
                                    src="{{ asset($data['#logo']['image']??'assets/images/Logo subastek sin fondo.png') }}" alt="">
                                <h5 class="offcanvas-title"></h5>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body p-0">
                                <div>
                                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}"><i
                                            class="fas fa-th"></i>
                                        SUBASTAS EN VIVO</a>
                                    <a class="nav-link" href="#"> <i class="fas fa-trophy "></i>SUBASTAS
                                        CERRADAS</a>
                                    <a class="nav-link" href="#"><i class="fas fa-shopping-bag"></i> OPINIONES</a>
                                    <a class="nav-link" href="#"> <i class="fas fa-play-circle"></i>CÓMO
                                        FUNCIONA</a>
                                    CÓMO FUNCIONA

                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="navbar_brand" href="{{ url('/') }}"><img
                            src="{{ asset($data['#logo']['image']??'assets/images/Logo subastek sin fondo.png') }}" alt=""></a>
                </div>
                <div class="nav_bar d-none d-lg-flex ">
                    <a @if (Request::is('/')) class="nav-link active" @else class="nav-link" @endif
                        aria-current="page" href="{{ url('/') }}">SUBASTAS EN VIVO</a>
                    <a @if (Request::is('subasta-cerrada')) class="nav-link active" @else class="nav-link" @endif
                        href="{{ url('subasta-cerrada') }}">SUBASTAS CERRADAS</a>
                    <a @if (Request::is('opiniones')) class="nav-link active" @else class="nav-link" @endif
                        href="{{ url('opiniones') }}"> OPINIONES</a>
                    <a @if (Request::is('como-funciona')) class="nav-link active" @else class="nav-link" @endif
                        href="{{ url('faq') }}">FAQ</a>
                    @auth
                        <a @if (Request::is('dashboard')) class="nav-link active" @else class="nav-link" @endif
                            href="{{ url('dashboard') }}">MI SUBASTEK</a>
                    @endauth
                    <a @if (Request::is('comprar-bids')) class="nav-link active" @else class="nav-link" @endif
                        href="{{ url('comprar-bids') }}">COMPRAR BIDS</a>
                </div>
                <div class="d-flex justify-content-end align-items-center flex-row">
                    @auth
                        <a href="{{ url('dashboard') }}" class="w-50">
                            <img src="{{$data['#username_logo']['image']??''}}"
                                alt="" style="height: 20px;">
                            <i style="font-size: 14px; font-weight: bold;">{{Auth()->user()->name}}</i>
                        </a>
                        <a href="{{ url('comprar-bids') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn Sign_up"
                            style="width: 225px;height: 35px;
                    line-height: 30px;">Logout 
                    {{-- <small
                                style="background: #fff;
                        color: #000;
                        font-weight: bold;
                        border-radius: 10px;
                        padding: 2px;">PROMO</small> --}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                    @else
                        <a href="{{ url('login') }}" class="btn login_btn">ACCEDA</a>
                        <a href="{{ url('register') }}" class="btn Sign_up w-50">
                            Regístrese y
                            reciba 10
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/ic-single-money.svg"
                                alt="">
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 mb-5">
                    <div class="row">
                        <div class="col-6 col-lg-4 ">
                            <div class="footer_content">
                                <h3>DESCUBRE</h3>
                                <a href="{{url('/')}}">Subastas en Vivo</a>
                                <a href="{{ url('subasta-cerrada') }}">Subastas Cerradas</a>
                                <a href="{{ url('comprar-bids') }}">Comprar Bids</a>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 ">
                            <div class="footer_content">
                                <h3>EMPRESA</h3>
                                <a href="{{ url('sobre-nosotros') }}">Sobre Nosotros</a>
                                <a href="#">Contacto</a>
                                {{-- <a href="{{ url('terminos-y-condiciones') }}">Términos y Condiciones</a>
                                <a href="{{ url('política-de-privacidad') }}">Política de Privacidad</a> --}}
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 ">
                            <div class="footer_content">
                                <h3>AYUDA</h3>
                                <a href="{{ url('como-funciona') }}">¿Cómo funciona?</a>
                                <a href="{{ url('comprar-bids') }}">¿Cómo se obtienen las Pujas?</a>
                                <a href="{{url('faq')}}">FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 mb-5">
                    <div class="footer_right text-center">
                        <div class="footer_card">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/cred_card_paypal.svg"
                                alt="">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/cred_card_mastercard.svg"
                                alt="">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/cred_card_visa.svg"
                                alt="">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/cred_card_maestro.svg"
                                alt="">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/cred_card_amex.svg"
                                alt="">
                        </div>
                        <p><img src="https://f40606d012fc5041995f-84106119f45676330dd7c41909df20d6.ssl.cf2.rackcdn.com/images/security-payment.png')}}"
                                alt=""> {{$data['#payment_card']['description']??''}}</p>
                    </div>
                </div>
                <div class="footer_head text-center">
                    <h4>
                        {{$data['#follow_us']['heading']??''}}
                    </h4>
                    <div class="footer_icon">
                        @foreach ($media as $item)
                        <a href="{{$item->link??''}}" title="{{$item->name??''}}"><i class="{{$item->icon??''}}"></i></a>
                            
                        @endforeach
                    </div>
                    <p>
                        {{$data['#copyright']['heading']??''}}</p>
                </div>
            </div>
        </div>
    </footer>



    <script src="{{ asset('assets/js/bootsrap.js') }}"></script>


    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    {{-- <script type="text/javascript" src="{{asset('assets/js/tiny-slider.js')}}"></script> --}}
    {{-- <script type="text/javascript">
      var slider = tns({
        arrowKeys: true,
        "items": 1,
        container: ".js-sliderImageViewer",
        controls: false,
        loop: false,
        mouseDrag: true,
        navContainer: ".js-imageViewerNav",
  
      });
    </script> --}}
    @yield('script')
    
</body>

</html>
