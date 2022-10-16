@extends('layouts.app')

@section('content')
    <section class="banner_OPINIONES">
        <div class="container">
            <div class="OPINIONES_content">
                <h2>60361</h2>
                <h3> OPINIONES Y TESTIMONIOS
                </h3>
            </div>
        </div>
    </section>
    <section class="recientes ">
        <div class="container-fluid p-0">
            <ul class="nav nav-pills mb-3 id=" pills-tab" role="tablist">
                <li class="nav-item w-50 active  d-flex justify-content-center align-items-center" role="presentation">
                    <button class="nav-link  " id="pills-recientes-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-recientes" type="button" role="tab" aria-controls="pills-recientes"
                        aria-selected="true">Las más recientes</button>
                </li>
                <li class="nav-item w-50  d-flex justify-content-center align-items-center" role="presentation">
                    <button class="nav-link navlink_1" id="pills-votadas-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-votadas" type="button" role="tab" aria-controls="pills-votadas"
                        aria-selected="false">Las más votadas</button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-recientes" role="tabpanel"
                aria-labelledby="pills-recientes-tab">
                <section class="Daanniele_s my-5">
                    <div class="container" id="results">
                        {{-- <div class="auction_box">
                        <div class="row py-3" id="results">
                            <div class="ajax-loading"><img style="height: 100px; width:100px;" src="{{ asset('img/loading.gif') }}" /></div>
                            <div class="col-md-9 col-12 mt-2">
                                <a href="">
                                    <div class="Daanniele">
                                        <h2>Daanniele <span>ha compartido su logro</span></h2>
                                        <div class="row">
                                            <div class="col-5 col-md-3">
                                                <img  src="https://a71eba0458acf57331d3-d31ce5ebd093935dff8526660841b743.ssl.cf2.rackcdn.com/products/f13744_es.jpg"
                                                alt="">
                                            </div>
                                            <div class="col-5 col-md-6">
                                                <h3>Auriculares Bluetooth </h3>
                                                <h4>0,07 $ </h4>
                                                <p>0,07 $ </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-12 mt-2">
                                <img src="https://673c18bd6bf702599f61-4a4bfb6f1e308ec872a3c66562b422cf.ssl.cf2.rackcdn.com/b_27281935.jpg"
                                alt="">
                            </div>
                        </div>
                        <div class="gusta_btn">
                            <button class="btn">Me Gusta</button>
                            <span>(2)</span>
                        </div>
                    </div>
                    <div class="auction_box">
                        <div class="row py-3">
                            <div class="col-md-9 col-12 mt-2">
                                <a href="">
                                    <div class="Daanniele">
                                        <h2>Daanniele <span>ha compartido su logro</span></h2>
                                        <div class="row">
                                            <div class="col-5 col-md-3">
                                                <img  src="https://a71eba0458acf57331d3-d31ce5ebd093935dff8526660841b743.ssl.cf2.rackcdn.com/products/f13744_es.jpg"
                                                alt="">
                                            </div>
                                            <div class="col-5 col-md-6">
                                                <h3>Auriculares Bluetooth </h3>
                                                <h4>0,07 $ </h4>
                                                <p>0,07 $ </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-12 mt-2">
                                <img src="https://673c18bd6bf702599f61-4a4bfb6f1e308ec872a3c66562b422cf.ssl.cf2.rackcdn.com/b_27281935.jpg"
                                alt="">
                            </div>
                        </div>
                        <div class="gusta_btn">
                            <button class="btn">Me Gusta</button>
                            <span>(2)</span>
                        </div>
                    </div>
                    <div class="auction_box">
                        <div class="row py-3">
                            <div class="col-md-9 col-12 mt-2">
                                <a href="">
                                    <div class="Daanniele">
                                        <h2>Daanniele <span>ha compartido su logro</span></h2>
                                        <div class="row">
                                            <div class="col-5 col-md-3">
                                                <img  src="https://a71eba0458acf57331d3-d31ce5ebd093935dff8526660841b743.ssl.cf2.rackcdn.com/products/f13744_es.jpg"
                                                alt="">
                                            </div>
                                            <div class="col-5 col-md-6">
                                                <h3>Auriculares Bluetooth </h3>
                                                <h4>0,07 $ </h4>
                                                <p>0,07 $ </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-12 mt-2">
                                <img src="https://673c18bd6bf702599f61-4a4bfb6f1e308ec872a3c66562b422cf.ssl.cf2.rackcdn.com/b_27281935.jpg"
                                alt="">
                            </div>
                        </div>
                        <div class="gusta_btn">
                            <button class="btn">Me Gusta</button>
                            <span>(2)</span>
                        </div>
                    </div>
                    <div class="auction_box">
                        <div class="row py-3">
                            <div class="col-md-9 col-12 mt-2">
                                <a href="">
                                    <div class="Daanniele">
                                        <h2>Daanniele <span>ha compartido su logro</span></h2>
                                        <div class="row">
                                            <div class="col-5 col-md-3">
                                                <img  src="https://a71eba0458acf57331d3-d31ce5ebd093935dff8526660841b743.ssl.cf2.rackcdn.com/products/f13744_es.jpg"
                                                alt="">
                                            </div>
                                            <div class="col-5 col-md-6">
                                                <h3>Auriculares Bluetooth </h3>
                                                <h4>0,07 $ </h4>
                                                <p>0,07 $ </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-12 mt-2">
                                <img src="https://673c18bd6bf702599f61-4a4bfb6f1e308ec872a3c66562b422cf.ssl.cf2.rackcdn.com/b_27281935.jpg"
                                alt="">
                            </div>
                        </div>
                        <div class="gusta_btn">
                            <button class="btn">Me Gusta</button>
                            <span>(2)</span>
                        </div>
                    </div> --}}

                    </div>
                </section>
            </div>
            <div class="tab-pane fade" id="pills-votadas" role="tabpanel" aria-labelledby="pills-votadas-tab">
                <section class="Daanniele_s my-5">
                    <div class="container" id="most_results">
                        {{-- <div class="auction_box">
                        <div class="row py-3">
                            <div class="col-md-9 col-12 mt-2">
                                <a href="">
                                    <div class="Daanniele">
                                        <h2>Daanniele <span>ha compartido su logro</span></h2>
                                        <div class="row">
                                            <div class="col-5 col-md-3">
                                                <img  src="https://a71eba0458acf57331d3-d31ce5ebd093935dff8526660841b743.ssl.cf2.rackcdn.com/products/f13744_es.jpg"
                                                alt="">
                                            </div>
                                            <div class="col-5 col-md-6">
                                                <h3>Auriculares Bluetooth </h3>
                                                <h4>0,07 $ </h4>
                                                <p>0,07 $ </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-12 mt-2">
                                <img src="https://673c18bd6bf702599f61-4a4bfb6f1e308ec872a3c66562b422cf.ssl.cf2.rackcdn.com/b_27281935.jpg"
                                alt="">
                            </div>
                        </div>
                        <div class="gusta_btn">
                            <button class="btn">Me Gusta</button>
                            <span>(2)</span>
                        </div>
                    </div>
                    <div class="auction_box">
                        <div class="row py-3">
                            <div class="col-md-9 col-12 mt-2">
                                <a href="">
                                    <div class="Daanniele">
                                        <h2>Daanniele <span>ha compartido su logro</span></h2>
                                        <div class="row">
                                            <div class="col-5 col-md-3">
                                                <img  src="https://a71eba0458acf57331d3-d31ce5ebd093935dff8526660841b743.ssl.cf2.rackcdn.com/products/f13744_es.jpg"
                                                alt="">
                                            </div>
                                            <div class="col-5 col-md-6">
                                                <h3>Auriculares Bluetooth </h3>
                                                <h4>0,07 $ </h4>
                                                <p>0,07 $ </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-12 mt-2">
                                <img src="https://673c18bd6bf702599f61-4a4bfb6f1e308ec872a3c66562b422cf.ssl.cf2.rackcdn.com/b_27281935.jpg"
                                alt="">
                            </div>
                        </div>
                        <div class="gusta_btn">
                            <button class="btn">Me Gusta</button>
                            <span>(2)</span>
                        </div>
                    </div> --}}
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        var SITEURL = "{{ route('opinion.index') }}";
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
    </script>

<script>
    var SITEURL = "{{ route('most_opinion.index') }}";
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
                $("#most_results").append(data); //append data into #results element     
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('No response from server');
            });
    }
</script>
@endsection
