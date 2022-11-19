<?php $segment1 = Request::segment(1); ?>
@extends('layouts.app')
@section('style')
    <style>
        .favriot-acction {
            margin: 2px;
            text-align: right;
        }

        .favriot-acction a {
            font-size: 20px;
            color: lightgray;
        }

        .favriot-acction a:hover {
            color: #2196f3;
        }

        .favriot-acction a.active {
            color: #2196f3;
        }

        .bid-opction {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .bid-opction a {
            color: black;
            font-size: 14px;
            padding: 5px 5px;
            background: #ffc707;
            border-radius: 10px;
            margin: 4px;
        }

        .bid-auto {
            color: black;
            font-size: 14px;
            padding: 5px 5px;
            background: #ffc707;
            border-radius: 5px;
            float: left;
        }

        .bid-opction a i {
            margin-right: 3px;
        }

        .bid-opction .other-amount {
            background: unset;
            padding: 0;
            text-decoration: underline;
            color: dimgray;
            margin-top: 10px;
        }

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
@endsection
@section('content')
    <section class="Home_banner d-md-block d-none">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($slider as $item)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ $item->image ?? '' }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
                {{-- <div class="carousel-item">
                    <img src="https://c55eb557d63a774402c1-6c5abf0376c5bc9ea81a0b21240a34f4.ssl.cf2.rackcdn.com/es/miglior-sito-aste-online_large_b.png"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://c55eb557d63a774402c1-6c5abf0376c5bc9ea81a0b21240a34f4.ssl.cf2.rackcdn.com/es/recensioni-bidoo_regular_bw.png"
                        class="d-block w-100" alt="...">
                </div> --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="nav_slider  pt-3 pb-2 ">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-12 my-auto mx-auto ">
                    <div class="owl-carousel owl-theme category-slider">
                        <div class="item"><a @if ($search == '') class="active1" @endif id="v_id"
                                href="/">All Auction</a></div>
                        @foreach ($category as $item)
                            @if ($item->id != 2)
                                <div class="item"><a @if ($search == $item->id) class="active1" @endif
                                        data-value="{{ $item->name }}" id="v_id"
                                        href="/?search={{ $item->id ?? '' }}">{{ ucwords($item->name) ?? '' }}</a></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="product_card">
        <div class="container" id="refresh">
            <div class="row" id="results"></div>
            <div class="ajax-loading"><img style="height: 100px; width:100px;" src="{{ asset('img/loading.gif') }}" /></div>
            {{-- <div class="row">
                @if ($product->count() > 0)
                    @foreach ($product as $item)
                        <div class="col-lg-2 col-md-4 col-6 mt-3 p-1">
                            <div class="card">
                                <a href="#">


                                    <img class="p-1 img2" src="{{ asset($item->image1) }}" alt="">
                                    <a class="title">${{ $item->limit ?? '' }} Tienda</a>

                                    <span class="card_prize">{{ '$' . $item->price }}</span>
                                    <span class="nickname">{{ $item->name ?? '' }}</span>
                                    <h4 class="card_time">Hoy a las {{ $item->from ?? '' }}</h4>
                                    <div class="card_rebre">
                                        <h4>REABRE PRONTO</h4>
                                    </div>
                                    <div class="d-flex p-1">
                                        <button class="btn btn_theme1 mx-1">
                                            <i class="fas fa-shopping-cart"></i>{{ $item->price ?? '' }}
                                            €{{ $item->price ?? '' }}</button>
                                        <button class="btn btn_theme2 mx-1"><i class="fas fa-shopping-cart"></i>UNO
                                            MISMO</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="container">No item Found!</div>
                @endif

            </div> --}}
            
        </div>
    </section>
    
@endsection


@section('script')
    <script type="text/javascript">
        // Show hide Auto bid
        function AutoShow(id) {
            // var x = document.getElementById("bids1'"+ id +"'");
            if ($("bids1" + id).css("display", "none")) {
                $("bids1" + id).css("display", "block");
            } else {
                $("bids1" + id).css("display", "none");
            }
        }
        $(document).ready(function() {

            // $("#results").load("{{ route('product.index') }}");
            // setInterval(function() {
            //     $("#results").load("{{ route('product.index') }}");
            // }, 3000);
        });
    </script>
    <script>
        var SITEURL = "{{ route('product.index') }}";
        var page = 1; //track user scroll as page number, right now page number is 1
        load_more(page); //initial content load
        $(window).scroll(function() { //detect page scroll
            if ($(window).scrollTop() + $(window).height() >= $(document)
                .height()) { //if user scrolled from top to bottom of the page
                page++; //page number increment
                load_more(page); //load content   
            }
        });

        function load_more(page) {
            $.ajax({
                    url: SITEURL + "?page=" + page,
                    type: "get",
                    datatype: "html",
                    beforeSend: function() {
                        $('.ajax-loading').show();
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {
                        //notify user if nothing to load
                        $('.ajax-loading').html("No more records!");
                        return;
                    }
                    $('.ajax-loading').hide(); //hide loading animation once data is received
                    $("#results").append(data); //append data into #results element     
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }

        //  Bid 

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function Win(id) {
            var product_id = id;
            $.ajax({
                type: 'POST',
                url: "{{ url('win-product') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_id: product_id,
                },

                success: function(data) {
                    var element = document.getElementById("win");
                    element.classList.add("count_green");
                    timeLeft = 10;

                    function countdown() {
                        var check = 'seconds' + id;

                        timeLeft--;
                        document.getElementById(check).innerHTML = String(timeLeft);
                        if (timeLeft > 0) {
                            setTimeout(countdown, 1000);
                        }
                    };

                    setTimeout(countdown, 1000);
                }
            });
        }

        function Bid(id) {
            var product_id = id;
            $.ajax({
                type: 'POST',
                url: "{{ url('bid-product') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_id: product_id,
                },

                success: function(data) {
                    timeLeft = 10;

                    function countdown() {
                        var check = 'seconds' + id;

                        timeLeft--;
                        document.getElementById(check).innerHTML = String(timeLeft);
                        if (timeLeft > 0) {
                            setTimeout(countdown, 1000);
                        }
                        if (timeLeft == 0) {
                            Win(product_id);
                        }
                    };

                    setTimeout(countdown, 1000);
                }
            });
        };

        function Wish(id) {
            var product_id = id;
            $.ajax({
                type: 'POST',
                url: "{{ url('wish-store') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_id: product_id,
                },

                success: function(data) {
                    $("#results").load("{{ route('product.index') }}");
                    setInterval(function() {
                        $("#results").load("{{ route('product.index') }}");
                    }, 3000);
                }
            });
        };

        function AutoBid(qty, id) {
            var product_id = id;
            var Qty = qty;
            if (Qty == 0) {
                Qty = $("#other"+product_id).val();
            }
            $.ajax({
                type: 'POST',
                url: "{{ url('auto-bid') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_id: product_id,
                    qty: Qty,
                },

                success: function(response) {
                    if (response == 'error') {
                        window.location.href = "comprar-bids";
                    }else if (response == 'error-login'){
                        window.location.href = "login";
                    } else {
                        $("#results").load("{{ route('product.index') }}");
                        setInterval(function() {
                            $("#results").load("{{ route('product.index') }}");
                        }, 3000);
                    }

                }
                // success: function(error) {
                //     window.location.href = "comprar-bids";
                // }
            });
        };
    </script>
@endsection
