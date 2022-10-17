@extends('layouts.app')

@section('content')
    <section class="term-condition">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="Product_gallery">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-2 order-2 order-md-1 ">
                                    <div class="o-slider-image-viewer__nav js-imageViewerNav">
                                        <span class="o-slider-image-viewer__dot">
                                            <img class="o-slider-image-viewer__dot-image" src="{{asset($product->image1??'')}}">
                                        </span>
                                        {{-- <span class="o-slider-image-viewer__dot">
                                            <img class="o-slider-image-viewer__dot-image" src="assets/images/images1.jfif">
                                        </span>
                                        <span class="o-slider-image-viewer__dot">
                                            <img class="o-slider-image-viewer__dot-image" src="assets/images/images2.jfif">
                                        </span>
                                        <span class="o-slider-image-viewer__dot">
                                            <img class="o-slider-image-viewer__dot-image" src="assets/images/images4.jfif">
                                        </span> --}}
                                    </div>
                                </div>
                                <div class="col-md-10 col-12 mt-2 order-1 order-md-2">
                                    <div class="product_imgs">
                                        <ul class="o-slider-image-viewer__inner js-sliderImageViewer">
                                            <li class="o-slider-image-viewer__slide">
                                                <img class="c-product-image-viewer__image" src="{{asset($product->image1??'')}}">
                                            </li>
                                            {{-- <li class="o-slider-image-viewer__slide">
                                                <img class="c-product-image-viewer__image" src="assets/images/images1.jfif">
                                            </li>
                                            <li class="o-slider-image-viewer__slide">
                                                <img class="c-product-image-viewer__image" src="assets/images/images2.jfif">
                                            </li>
                                            <li class="o-slider-image-viewer__slide">
                                                <img class="c-product-image-viewer__image" src="assets/images/images4.jfif">
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12 mt-4 order-3">
                                    <div class="card_body_content">
                                        <h5> Info Subasta:</h5>
                                        <p>Gastos de envío:<span>4,99 €</span></p>
                                        <p>Horario de apertura de la Subasta: <span>{{$product->from??''}} - {{$product->to??''}}</span></p>
                                        <p>Límites para ganar: <span>1 cada 30 días</span></p>
                                        <p>ID Subasta: <span>{{$item->id??''}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Product_cont2">
                        <h2>Cómpralo Ya</h2>
                        <p>
                            Compra el producto y te reembolsamos todas las Pujas utilizadas.
                        </p>
                        <div class="d-flex justify-content-start align-items-baseline">
                            <h3>Te reembolsamos:</h3>
                            <img src="{{asset('assets/images/ic-single-money.svg')}}" alt="" /><span>
                                0 Pujas</span>
                        </div>
                        <h4>Ahora o nunca: <span>5:08:11:57</span></h4>
                        <button class="btn">
                            <img src="" alt="" /> CÓMPRALO YA A {{$product->price??'0.00'}} €
                        </button>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="pro_tabel">
                        <div class="product_content1">
                            <span class="pro_price">0,58 $</span>
                            <div class="pro_Sec">
                                <span>.8s</span>
                                <img src="{{asset('assets/images/icon_turbo.png')}}" alt="" />
                            </div>
                        </div>
                        <div class="pro_content2 text-center">
                            <img src="{{asset('assets/images/auction_won_stars.png')}}" alt="" />
                            <p>kiobe</p>
                            <p>
                                <span>2</span>
                                Pujas utilizadas
                            </p>
                            <p><span>¡Has Ganado:</span><span>ayer a las {{$product->to??''}}</span></p>
                        </div>
                        <div class="table-responsive pro_detail_tabel">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">PRECIO</th>
                                        <th scope="col">MODALIDAD</th>
                                        <th scope="col">HORARIO</th>
                                        <th scope="col">USUARIO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>0,58</td>
                                        <td>Manual</td>
                                        <td>08:42:06</td>
                                        <td>kiobe</td>
                                    </tr>
                                    <tr>
                                        <td>0,58</td>
                                        <td>Manual</td>
                                        <td>08:42:06</td>
                                        <td>kiobe</td>
                                    </tr>
                                    <tr>
                                        <td>0,58</td>
                                        <td>Manual</td>
                                        <td>08:42:06</td>
                                        <td>kiobe</td>
                                    </tr>
                                    <tr>
                                        <td>0,58</td>
                                        <td>Manual</td>
                                        <td>08:42:06</td>
                                        <td>kiobe</td>
                                    </tr>
                                    <tr>
                                        <td>0,58</td>
                                        <td>Manual</td>
                                        <td>08:42:06</td>
                                        <td>kiobe</td>
                                    </tr>
                                    <tr>
                                        <td>0,58</td>
                                        <td>Manual</td>
                                        <td>08:42:06</td>
                                        <td>kiobe</td>
                                    </tr>
                                    <tr>
                                        <td>0,58</td>
                                        <td>Manual</td>
                                        <td>08:42:06</td>
                                        <td>kiobe</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="Product_auction_content">
        <div class="container">
            <div class="Product_cont">
                <div class="row">
                    <div class="col-12 col-md-12">
                        {!!$product->description??''!!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
