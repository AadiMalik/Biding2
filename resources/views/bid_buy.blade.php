@php
    $data = content();
@endphp
@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection
@section('content')
<section class="bid_buy">
    <div class="conatiner">
        <div class="bid_image  ">
            <img src="{{asset($data['#buy_header']['image']??'')}}"
                alt="">
            <div class="bid_timer  ">
                <p class="timer_con">Caduca en:</p>
                <div class="watch">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="watch_timer">
                            <span>
                                <h5>02</h5>
                            </span>
                            <p>días</p>
                        </div>
                        <div class="watch_timer">
                            <span>
                                <h5>15</h5>
                            </span>
                            <p>horas</p>
                        </div>
                        <div class="watch_timer">
                            <span>
                                <h5>2</h5>
                            </span>
                            <p>minutos</p>
                        </div>
                        <div class="watch_timer">
                            <span>
                                <h5>09</h5>
                            </span>
                            <p>second</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bid_buy2  ">
    <div class="container   ">
        <div class="row bid_row mx-0 ">
            @foreach($package as $item)
            <div class="col-lg-3 col-md-4 col-10 mx-auto mt-3">
                <div class="bid_card">
                    @if($item->tag!=null)
                    <div class="bid_badge11">                            
                        <span>{{$item->tag??''}}</span>
                    </div>
                    @endif
                    <div class="bid_card_img bid_card_img1 ">
                        <img src="{{asset($item->image??'')}}"
                            alt="">



                        <div class="bid_header_text">
                            <h2>{{$item->bids??''}}</h2>
                            <h3>ofertas</h3>
                        </div>
                    </div>
                    <div class="bid_card_content">
                        <div class="d-flex">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/ic-single-money.svg"
                                alt="">
                            <p><b>{{$item->feature1??''}}</b></p>
                        </div>
                        <div class="d-flex">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_padlock.svg"
                                alt="">
                            <p> {{$item->feature2??''}}</p>
                        </div>
                        <div class="d-flex ju">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_ship.svg"
                                alt="">
                            <p> {{$item->feature3??''}}</p>
                        </div>

                        <div class="text-center bid_btn mt-3">
                            <button type="button" class="btn " data-toggle="modal"
                            data-target="#paymentModal{{ $item->id }}"><i class="fas fa-shopping-cart"></i> $ {{$item->price??''}}</button>
                        </div>
                        <p class="card_footer">{{$item->time??''}} {{$item->limit??''}} per bid</p>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-lg-3  col-md-4 col-10 mt-3 mx-auto ">
                <div class="bid_card">
                    <div class="bid_card_img bid_card_img2">
                        <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/soldier.png"
                            alt="">
                        <div class="bid_header_text">
                            <h2>150</h2>
                            <h3>ofertas</h3>
                        </div>
                    </div>
                    <div class="bid_card_content">
                        <div class="d-flex">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/ic-single-money.svg"
                                alt="">
                            <p><b>150 ofertas</b></p>
                        </div>
                        <div class="d-flex">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_padlock.svg"
                                alt="">
                            <p> + 1 ESPACIO PARA GANAR</p>
                        </div>
                        <div class="d-flex ju">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_ship.svg"
                                alt="">
                            <p> 1 día de envío gratis</p>
                        </div>
                        <div class="text-center bid_btn mt-3">
                            <button class="btn "><i class="fas fa-shopping-cart"></i> € 29.9</button>
                        </div>
                        <p class="card_footer">0.21 0 per bid</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-4 col-10 mx-auto  mt-3">
                <div class="bid_card">
                    <div class="bid_badge11">                            
                        <span>The + Sold</span>
                    </div>
                    <div class="bid_card_img bid_card_img3">
                        <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/soldier.png"
                            alt="">
                        <div class="bid_header_text">
                            <h2>150</h2>
                            <h3>ofertas</h3>
                        </div>
                    </div>
                    <div class="bid_card_content">
                        <div class="d-flex">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/ic-single-money.svg"
                                alt="">
                            <p><b>150 ofertas</b></p>
                        </div>
                        <div class="d-flex">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_padlock.svg"
                                alt="">
                            <p> + 1 ESPACIO PARA GANAR</p>
                        </div>
                        <div class="d-flex ju">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_ship.svg"
                                alt="">
                            <p> 1 día de envío gratis</p>
                        </div>
                        <div class="text-center bid_btn mt-3">
                            <button class="btn "><i class="fas fa-shopping-cart"></i> € 29.9</button>
                        </div>
                        <p class="card_footer">0.21 0 per bid</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-4 col-10 mx-auto mt-3">
                <div class="bid_card">
                    <div class="bid_card_img bid_card_img4">
                        <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/soldier.png"
                            alt="">
                        <div class="bid_header_text">
                            <h2>150</h2>
                            <h3>ofertas</h3>
                        </div>
                    </div>
                    <div class="bid_card_content">
                        <div class="d-flex">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/ic-single-money.svg"
                                alt="">
                            <p><b>150 ofertas</b></p>
                        </div>
                        <div class="d-flex">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_padlock.svg"
                                alt="">
                            <p> + 1 ESPACIO PARA GANAR</p>
                        </div>
                        <div class="d-flex ju">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_ship.svg"
                                alt="">
                            <p> 1 día de envío gratis</p>
                        </div>
                        <div class="text-center bid_btn mt-3">
                            <button class="btn "><i class="fas fa-shopping-cart"></i> € 29.9</button>
                        </div>
                        <p class="card_footer">0.21 0 per bid</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3  col-md-4 col-10 mx-auto mt-3">
                <div class="bid_card">
                    <div class="bid_card_img bid_card_img5">
                        <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/soldier.png"
                            alt="">
                        <div class="bid_header_text">
                            <h2>150</h2>
                            <h3>ofertas</h3>
                        </div>
                    </div>
                    <div class="bid_card_content">
                        <div class="d-flex">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/ic-single-money.svg"
                                alt="">
                            <p><b>150 ofertas</b></p>
                        </div>
                        <div class="d-flex">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_padlock.svg"
                                alt="">
                            <p> + 1 ESPACIO PARA GANAR</p>
                        </div>
                        <div class="d-flex ju">
                            <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_ship.svg"
                                alt="">
                            <p> 1 día de envío gratis</p>
                        </div>

                        <div class="text-center bid_btn mt-3">
                            <button class="btn "><i class="fas fa-shopping-cart"></i> € 29.9</button>
                        </div>
                        <p class="card_footer">0.21 0 per bid</p>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 mx-auto">
                <div class="Guarantee_card">
                    <img src="{{asset($data['#guarantee_card']['image']??'assets/images/cockade.svg')}}" alt="">
                    <div>
                        <h3>{{$data['#guarantee_card']['heading']}}</h3>
                        <p>
                            {!!$data['#guarantee_card']['description']!!}
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@extends('modals/payment');
@extends('modals/payment_method');
</section>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

@endsection