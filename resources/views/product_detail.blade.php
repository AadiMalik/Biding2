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
                                        @php
                                            $images = json_decode($product->image, true);
                                            $date_from = date('Y-m-d H:i:s', strtotime($product->from));
                                            $date_to = date('Y-m-d H:i:s', strtotime($product->to));
                                        @endphp
                                        @if (isset($images))
                                            @foreach ($images as $item)
                                                <span class="o-slider-image-viewer__dot">
                                                    <img class="o-slider-image-viewer__dot-image"
                                                        src="{{ asset('/img/' . $item ?? '') }}">
                                                </span>
                                            @endforeach
                                        @else
                                            <span class="o-slider-image-viewer__dot">
                                                <img class="o-slider-image-viewer__dot-image"
                                                    src="{{ asset($product->image1 ?? '') }}">
                                            </span>
                                        @endif
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
                                            @if (isset($images))
                                                @foreach ($images as $item)
                                                    <li class="o-slider-image-viewer__slide">
                                                        <img class="c-product-image-viewer__image"
                                                            src="{{ asset('img/' . $item ?? '') }}">
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="o-slider-image-viewer__slide">
                                                    <img class="c-product-image-viewer__image"
                                                        src="{{ asset($product->image1 ?? '') }}">
                                                </li>
                                            @endif
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
                                        <p>Gastos de env??o:<span>{{ $product->shipping_price ?? '' }} $</span></p>
                                        <p>Horario de apertura de la Subasta: <span>{{ $date_from ?? '' }} -To-
                                                {{ $date_to ?? '' }}</span></p>
                                        <p>L??mites para ganar: <span>1 cada 30 d??as</span></p>
                                        <p>ID Subasta: <span>{{ $product->id ?? '' }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="Product_cont2">
                        <h2>C??mpralo Ya</h2>
                        <p>
                            Compra el producto y te reembolsamos todas las Pujas utilizadas.
                        </p>
                        <div class="d-flex justify-content-start align-items-baseline">
                            <h3>Te reembolsamos:</h3>
                            <img src="{{ asset('assets/images/ic-single-money.svg') }}" alt="" /><span>
                                @auth {{ $bid_use->where('user_id', Auth()->user()->id)->sum('bids') ?? '' }}
                                @else
                                0 @endauth Pujas</span>
                        </div>
                        {{-- <h4>Ahora o nunca: <span>5:08:11:57</span></h4> --}}
                        <button class="btn">
                            <a onclick="AddtoCart()" style="color:#fff;"><img src=""
                                    alt="" /> C??MPRALO YA A {{ $product->price ?? '0.00' }} $</a>
                        </button>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="pro_tabel">
                        <div class="product_content1">
                            <span class="pro_price">{{ $product->min_bid_price ?? '0' }} $</span>
                            <div class="pro_Sec">
                                <span>.10s</span>
                                <img src="{{ asset('assets/images/icon_turbo.png') }}" alt="" />
                            </div>
                        </div>
                        <div class="pro_content2 text-center">
                            <img src="{{ asset('assets/images/auction_won_stars.png') }}" alt="" />
                            <p>kiobe</p>
                            <p>
                                <span>{{ $bid_use->sum('bids') ?? '0' }}</span>
                                Pujas utilizadas
                            </p>
                            <p><span>??Has Ganado:</span><span> a las {{ $date_to ?? '' }}</span></p>
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
                                <tbody id="pro_table">
                                    @foreach ($bid_use as $item)
                                        <tr>
                                            <td>{{ $product->min_bid_price ?? '0' }}</td>
                                            <td>Manual</td>
                                            <td>{{ $item->created_at->format('H:i:s') }}</td>
                                            <td>{{ $item->user_name->name ?? '' }}</td>
                                        </tr>
                                    @endforeach

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
                        {!! $product->description ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            $("#pro_table").load("{{ url('product_detail_bid/' . $product->id) }}");
            setInterval(function() {
                $("#pro_table").load("{{ url('product_detail_bid/' . $product->id) }}");
            }, 3000);
        });

        function AddtoCart() {
            var product_id = {{$product->id}};
            $.ajax({
                type: 'POST',
                url: "{{ route('AddtoCart') }}",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    product_id: product_id,
                },

                success: function(response) {
                    if (response == 'error') {
                        window.location.href = "login";
                    } else {
                        alert('Product Add to cart!');
                        $("#pro_table").load("{{ url('product_detail_bid/' . $product->id) }}");
                        setInterval(function() {
                            $("#pro_table").load("{{ url('product_detail_bid/' . $product->id) }}");
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
