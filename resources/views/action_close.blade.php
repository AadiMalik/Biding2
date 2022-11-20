@php
    $data = content();
@endphp
@extends('layouts.app')

@section('content')
<section class="auction_close my-5">
    <div class="container">
        <div class="auction mt-5">
            <p class="secong_age"><i class="far fa-clock"></i>hace unos segundos</p>
            @foreach ($use_bid as $item)
            <div class="auction_box mt-1 py-3">
                <a href="">
                    <div class="row ">
                        <div class="col-lg-2 col-md-3 col-12 mt-1">
                            <img src="{{asset($item->product_name->image1??'')}}"
                                alt="">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12 my-auto mt-1">
                            <p class=" subastek_con">$ {{$item->product_name->price??'0'}} {{$item->product_name->name??''}}</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 my-auto mt-1">
                            <div class="row  ">
                                <div class="col-12 col-md-6 my-auto">
                                    <p class="trophy_con mt-1 d-flex"><i class="fas mt-1 mx-1 fa-trophy"></i>
                                        {{$item->user_name->name??''}}</p>
                                </div>
                                <div class="col-12 col-md-6 my-auto">
                                    <div class="box_price text-end">
                                        <h5 class="prix">{{$item->product_name->min_bid_price??''}} $</h5>
                                        <p>{{$item->product_name->price??'0'}} $</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection