@extends('layouts.app')

@section('content')
    <section class="term-condition">
        <div class="container">
            <center>
                <b>{{$product->name??''}}</b><img src="{{ asset($product->image1??'') }}" style="width: 120px;" alt="">
            </center>
            <hr>
            <center>
                <table style="width:400px;">
                    <tbody>
                        <tr>
                            <td>Precio de Venta:</td>
                            <td>${{$product->price??'0'}}</td>
                        </tr>
                        <tr>
                            <td>Gastos de transacción:</td>
                            <td>${{$product->shipping_price??'0'}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Precio Total:</b></td>
                            <td><b>${{$product->price+$product->shipping_price}}</b></td>
                        </tr>
                    </tbody>
                </table>
            </center>
            <hr>
            <center>
                <h3>Escoge el método de pago</h3>
                <form action="{{url('checkout-store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id ?? '' }}">
                    <table style="width:600px;">
                        <tbody>
                            <tr>
                                <td style="width:275px;">
                                    <div class="row" style="margin-right:20px;">
                                        <div class="form-group col-md-12">
                                            <label for="">Card Holder</label>
                                            <div class="search">
                                                <input type="text" name="card_name" class="form-control" id=""
                                                    placeholder="">
                                                {!! $errors->first('card_name', "<span class='text-danger'>:message</span>") !!}
                
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="">Card No</label>
                                            <div class="search">
                                                <input type="text" name="card_no" class="form-control card-number" id=""
                                                    placeholder="">
                                                    {!! $errors->first('card_no', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Expiry Month</label>
                                            <div class="search">
                                                <input type="text" name="month" class="form-control card-expiry-month"
                                                    id="" placeholder="">
                                                    {!! $errors->first('month', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Expiry Year</label>
                                            <div class="search">
                                                <input type="text" name="year" class="form-control card-expiry-year"
                                                    id="" placeholder="">
                                                    {!! $errors->first('year', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">CVC Number</label>
                                            <div class="search">
                                                <input type="text" name="cvc" class="form-control card-cvc" id=""
                                                    placeholder="">
                                                    {!! $errors->first('cvc', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="width:275px; border-left: 2px solid #4444;">
                                    @foreach ($payment_method->where('user_id',Auth()->user()->id) as $item1)
                                <div class="alert alert-danger"
                                    style="padding: 0px 1.25rem; margin-bottom:5px; margin-left:20px;">
                                    <b>{{$item1->name??''}}</b><br>
                                    <span>{{$item1->number??''}}</span><br>
                                    <input type="radio" name="payment_method" value="{{$item1->id}}" style="float: right;">
                                    <span>{{$item1->month??''}}/{{$item1->year??''}}</span>
                                </div>
                            @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" style="margin-top: 20px;"
                                        class="btn btn-primary form-control">Place Order</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </center>
        </div>
    </section>
@endsection
