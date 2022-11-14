@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="page-content">

            <h6 class="mb-0 text-uppercase">All Subastas Ganadas</h6>
            <hr />
            <div class="card">
                <div class="card-body">

                    <form action="{{ url('product-payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$win_product->id}}">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Product Detail</h4>
                                <hr>
                                <img src="{{ asset($win_product->image1 ?? '') }}" style="width:100px; height:100px;"
                                    alt="">
                                <br>
                                <b>Name: </b>{{ $win_product->name ?? '' }} <br>
                                <b>ID: </b>{{ $win_product->id }} <br>
                                <b>Price: </b>${{ $win_product->bid_price ?? '' }}
                            </div>
                            <div class="col-md-6">
                                <h4>Payment Method</h4>
                                <hr>
                                <div class="form-row">
                                    @foreach ($payment_method as $item1)
                                        <div class="alert alert-danger col-md-12"
                                            style="padding: 0px 1.25rem; margin-bottom:0px;">
                                            <b>{{ $item1->name ?? '' }}</b><br>
                                            <span>{{ $item1->number ?? '' }}</span><br>
                                            <input type="radio" name="payment_method" value="{{ $item1->id }}"
                                                id="" checked style="float: right;" required>
                                            <span>{{ $item1->month ?? '' }}/{{ $item1->year ?? '' }}</span>
                                        </div><br>
                                    @endforeach
                                    {!! $errors->first('payment_method', "<span class='text-danger'>:message</span>") !!}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-warning showmodal" style="float:right;" data-toggle="modal"
                                                data-target="#Payment_methodModal" data-dismiss="modal">Add New</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px;">
                                <button type="submit" class="btn btn-primary">Pay Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal mt-5 ms-5" id="Payment_methodModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Method</h5>
                    <button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('payment_method.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Card Holder</label>
                                <div class="search">
                                    <input type="text" name="card_name" class="form-control" id=""
                                        placeholder="" required>
                                    {!! $errors->first('card_name', "<span class='text-danger'>:message</span>") !!}

                                </div>
                            </div>
                            <div class="form-group col-md-6  ">
                                <label for="">Card No</label>
                                <div class="search">
                                    <input type="text" name="card_no" class="form-control card-number" id=""
                                        placeholder="" required>
                                    {!! $errors->first('card_no', "<span class='text-danger'>:message</span>") !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Expiry Month</label>
                                <div class="search">
                                    <input type="text" name="month" class="form-control card-expiry-month"
                                        id="" placeholder="" required>
                                    {!! $errors->first('month', "<span class='text-danger'>:message</span>") !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Expiry Year</label>
                                <div class="search">
                                    <input type="text" name="year" class="form-control card-expiry-year"
                                        id="" placeholder="" required>
                                    {!! $errors->first('year', "<span class='text-danger'>:message</span>") !!}
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">CVC</label>
                                <div class="search">
                                    <input type="text" name="cvc" class="form-control card-cvc" id=""
                                        placeholder="" required>
                                    {!! $errors->first('cvc', "<span class='text-danger'>:message</span>") !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modale_buttons">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
@endsection
