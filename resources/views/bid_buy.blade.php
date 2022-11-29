@php
    $data = content();
@endphp
@extends('layouts.app')
@section('style')
    <style>
        .modal {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(77, 77, 77, .7);
            transition: all .4s;
        }

        .modal:target {
            visibility: visible;
            opacity: 1;
        }

        .modal__content {
            border-radius: 4px;
            position: relative;
            width: 500px;
            max-width: 90%;
            background: #fff;
            padding: 1em 2em;
        }

        .modal__footer {
            text-align: right;

            a {
                color: #585858;
            }

            i {
                color: #d02d2c;
            }
        }

        .modal__close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #585858;
            text-decoration: none;
        }
    </style>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
@endsection
@section('content')
    <section class="bid_buy">
        <div class="conatiner">

            <div class="bid_image  ">
                <img src="{{ asset($data['#buy_header']['image'] ?? '') }}" alt="">
                {{-- <div class="bid_timer  ">
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
            </div> --}}
            </div>
        </div>
    </section>
    <section class="bid_buy2">


        @extends('modals/payment');
        @extends('modals/payment_method');
        <div class="container">
            <div class="row bid_row mx-0 ">
                @foreach ($package as $item)
                    <div class="col-lg-3 col-md-4 col-10 mx-auto mt-3">
                        <div class="bid_card">
                            @if ($item->tag != null)
                                <div class="bid_badge11">
                                    <span style="top:0;">{{ $item->tag ?? '' }}</span>
                                </div>
                            @endif
                            <div class="bid_card_img bid_card_img1 ">
                                <img src="{{ asset($item->image ?? '') }}" style="width: 100%; height:140px; top:0; left:0;"
                                    alt="">
                                <div class="bid_header_text">
                                    <h2>{{ $item->bids ?? '' }}</h2>
                                    <h3>ofertas</h3>
                                </div>
                            </div>
                            <div class="bid_card_content">
                                <div class="d-flex">
                                    <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/ic-single-money.svg"
                                        alt="">
                                    <p><b>{{ $item->feature1 ?? '' }}</b></p>
                                </div>
                                <div class="d-flex">
                                    <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_padlock.svg"
                                        alt="">
                                    <p> {{ $item->feature2 ?? '' }}</p>
                                </div>
                                <div class="d-flex ju">
                                    <img src="https://1c308283f6f0dbd72b44-c007ec4697a7ceab9178ce16802c0e6b.ssl.cf2.rackcdn.com/1.0/images/icon_ship.svg"
                                        alt="">
                                    <p> {{ $item->feature3 ?? '' }}</p>
                                </div>

                                <div class="text-center bid_btn mt-3">
                                    <a type="button" class="btn btn-primary" href="#paymentModal{{ $item->id }}"><i
                                            class="fas fa-shopping-cart"></i>
                                        $ {{ $item->price ?? '' }}</a>
                                </div>
                                <p class="card_footer">{{ $item->time ?? '' }} $ {{ $item->limit ?? '' }} por puja</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}
@endsection
