@extends('layouts.app')

@section('content')
<section class="faq_ my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3  ">
                <div class="_faq_body p-0">
                    <ul id="accordion" class="accordion" id="nav-tab" role="tablist">

                        <li class="default open">
                            <div class="link">
                                <h5>AYUDA</h5>
                            </div>
                        </li>
                        <li class="default open">
                            <div class="link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">¿Cómo funciona</div>
                        </li>
                        <li class="default open">
                            <div class="link" id="nav-2nd-tab" data-bs-toggle="tab" data-bs-target="#nav-2nd" role="tab" aria-controls="nav-2nd" aria-selected="true">¿Cómo obtener Pujas?</a></div>
                        </li>

                        <li class="default open">
                            <div class="link">
                                <h5>PREGUNTAS FRECUENTES</h5>
                            </div>
                        </li>

                        <li class="default open">
                            <div class="link">SUBASTAS<i class="fa fa-chevron-right"></i></div>
                            <ul class="submenu">
                                <li><a href="#">Javascript</a></li>
                                <li><a href="#">jQuery</a></li>
                                <li><a href="#">Frameworks javascript</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="link"> Diseño responsive<i class="fa fa-chevron-right"></i></div>
                            <ul class="submenu">
                                <li><a href="#">Tablets</a></li>
                                <li><a href="#">Dispositivos mobiles</a></li>
                                <li><a href="#">Medios de escritorio</a></li>
                                <li><a href="#">Otros dispositivos</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="link"> Posicionamiento web<i class="fa fa-chevron-right"></i></div>
                            <ul class="submenu">
                                <li><a href="#">Google</a></li>
                                <li><a href="#">Bing</a></li>
                                <li><a href="#">Yahoo</a></li>
                                <li><a href="#">Otros buscadores</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-lg-8 col-md-9 col-12  ">
                <div class="faq_video tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <h2>¿Cómo funciona?</h2>
                    <iframe src="https://www.youtube.com/embed/8u7SUDW2mhM" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <div class="row">
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">
                                <h5>1. Escoge el producto que te guste</h5>
                                <p>Todas las Subastas empiezan desde tan solo 0,01 €</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">
                                <div class="border_left">
                                    <h5>1. Escoge el producto que te guste</h5>
                                    <p>Todas las Subastas empiezan desde tan solo 0,01 €</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">

                                <h5>1. Escoge el producto que te guste</h5>
                                <p>Todas las Subastas empiezan desde tan solo 0,01 €</p>
                            </div>
                        </div>
                    </div>

                    <button class="btn faq_btn_theme1">IR A LAS SUBASTAS</button>
                    <h4>¿Cómo obtener Pujas?</h4>
                    <div class="row mb-5">
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card2">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">
                                <div class="faq_card2_content">
                                    <h5>1. Escoge el producto que te guste</h5>
                                    <p>TodEn la página de Subastas en Vivo, cada minuto empiezan nuevas Subastas de
                                        Pujas que puedes ganar y utilizar para obtener los productos que quieras
                                    </p>
                                    <button class="btn faq_btn_theme2">IR A LAS SUBASTAS</button>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card2 ">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">
                                <div class="border_left faq_card2_content">
                                    <h5>1. Escoge el producto que te guste</h5>
                                    <p>
                                        Invita a tus amigos. Gana con tan solo un clic.
                                    </p>
                                    <button class="btn faq_btn_theme3">IR A LAS SUBASTAS</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card2">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">
                                <div class="faq_card2_content">
                                    <h5>1. Escoge el producto que te guste</h5>
                                    <p>Consigue el pleno de pujas y gana muchas más subastas. Obtén envíos gratuitos
                                        comprando los lotes de pujas más ventajosos.</p>
                                    <button class="btn faq_btn_theme4">IR A LAS SUBASTAS</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="last_content"> ofrece la devolución de las pujas a través de la función
                        <span>“Cómpralo Ya”. </span></h4>

                    <h4 class="last_content">
                        Si no ganas una subasta, puedes comprar el producto a precio de mercado y <span>te
                            devolveremos todas las pujas que gastaste durante la subasta.</span></h4>
                </div>
                <div class="faq_video tab-pane fade" id="nav-2nd" role="tabpanel" aria-labelledby="nav-2nd-tab">
                    <h2>¿Cómo funciona?</h2>
                    <iframe src="https://www.youtube.com/embed/8u7SUDW2mhM" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <div class="row">
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">
                                <h5>1. Escoge el producto que te guste</h5>
                                <p>Todas las Subastas empiezan desde tan solo 0,01 €</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">
                                <div class="border_left">
                                    <h5>1. Escoge el producto que te guste</h5>
                                    <p>Todas las Subastas empiezan desde tan solo 0,01 €</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">

                                <h5>1. Escoge el producto que te guste</h5>
                                <p>Todas las Subastas empiezan desde tan solo 0,01 €</p>
                            </div>
                        </div>
                    </div>

                    <button class="btn faq_btn_theme1">IR A LAS SUBASTAS</button>
                    <h4>¿Cómo obtener Pujas?</h4>
                    <div class="row mb-5">
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card2">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">
                                <div class="faq_card2_content">
                                    <h5>1. Escoge el producto que te guste</h5>
                                    <p>TodEn la página de Subastas en Vivo, cada minuto empiezan nuevas Subastas de
                                        Pujas que puedes ganar y utilizar para obtener los productos que quieras
                                    </p>
                                    <button class="btn faq_btn_theme2">IR A LAS SUBASTAS</button>
                                </div>


                            </div>
                        </div>
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card2 ">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">
                                <div class="border_left faq_card2_content">
                                    <h5>1. Escoge el producto que te guste</h5>
                                    <p>
                                        Invita a tus amigos. Gana con tan solo un clic.
                                    </p>
                                    <button class="btn faq_btn_theme3">IR A LAS SUBASTAS</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mt-3">
                            <div class="faq_card2">
                                <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_how_1.jpg"
                                    alt="">
                                <div class="faq_card2_content">
                                    <h5>1. Escoge el producto que te guste</h5>
                                    <p>Consigue el pleno de pujas y gana muchas más subastas. Obtén envíos gratuitos
                                        comprando los lotes de pujas más ventajosos.</p>
                                    <button class="btn faq_btn_theme4">IR A LAS SUBASTAS</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="last_content"> ofrece la devolución de las pujas a través de la función
                        <span>“Cómpralo Ya”. </span></h4>

                    <h4 class="last_content">
                        Si no ganas una subasta, puedes comprar el producto a precio de mercado y <span>te
                            devolveremos todas las pujas que gastaste durante la subasta.</span></h4>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection