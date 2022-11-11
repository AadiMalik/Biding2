<?php $segment1 = Request::segment(1); ?>
@extends('layouts.app')
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
        <div class="container">
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
                    timeLeft = 8;

                    function countdown() {
                        var check = 'seconds'+id;

                        timeLeft--;
                        document.getElementById(check).innerHTML = String(timeLeft);
                        if (timeLeft > 0) {
                            setTimeout(countdown, 1000);
                        }
                    };

                    setTimeout(countdown, 1000);
                }
            });
        };
    </script>
@endsection
