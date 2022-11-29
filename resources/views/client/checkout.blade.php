@extends('layouts.admin')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Carrito de compras</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Carrito de compras</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="main-body">
                    <section class="check-out">
                        <div class="container">
                            <div class="py-5 text-center">
                                <h2>Checkout form</h2>
                                <p class="lead">lorem plusam dolor waht you can Bootstrap's form controls. Each required
                                    form group has a validation state that can be triggered by attempting to submit the form
                                    without completing it.</p>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-4 order-md-2 mb-4">
                                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="text-muted">Your cart</span>
                                        <span class="badge badge-secondary badge-pill">3</span>
                                    </h4>
                                    <ul class="list-group mb-3">
                                        @php
                                            $sub_total = 0;
                                            $shipping_charge = 0;
                                            $promo = 0;
                                        @endphp
                                        @foreach ($cart as $item)
                                            @php
                                                $product_total = $item->product_name->price * $item->qty;
                                                $sub_total += $item->product_name->price * $item->qty;
                                                $shipping_charge += $item->product_name->shipping_price;
                                                $total = $sub_total + $shipping_charge;
                                                $promo = $item->promo_name->discount ?? '0';
                                                $promo_name = $item->promo_name->name ?? 'Promo Code';
                                            @endphp
                                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                <div>
                                                    <h6 class="my-0">{{ $item->product_name->name ?? '' }}</h6>
                                                    <small class="text-muted">QTY:{{ $item->qty ?? '' }}</small>
                                                </div>
                                                <span class="text-muted">${{ $product_total ?? '0' }}</span>
                                            </li>
                                        @endforeach

                                        {{-- <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0">Second product</h6>
                                                <small class="text-muted">Brief description</small>
                                            </div>
                                            <span class="text-muted">$8</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div>
                                                <h6 class="my-0">Third item</h6>
                                                <small class="text-muted">Brief description</small>
                                            </div>
                                            <span class="text-muted">$5</span>
                                        </li> --}}
                                        <li class="list-group-item d-flex justify-content-between bg-light">
                                            <div class="text-success">
                                                <h6 class="my-0">{{ $promo_name }}</h6>
                                                <small>${{ $promo ?? '0' }}</small>
                                            </div>
                                            <span class="text-success">-${{ $promo ?? '0' }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <span>Total (USD)</span>
                                            <strong>${{ $total - $promo }}</strong>
                                        </li>
                                    </ul>

                                    <form action="{{ url('promo-code') }}" method="post" class="card p-2"
                                        style="min-height: unset;">
                                        @csrf
                                        {!! $errors->first('code', "<span class='text-danger'>:message</span>") !!}
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="code"
                                                placeholder="Promo code">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-secondary">Redeem</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-8 order-md-1">
                                    <h4 class="mb-3">Billing address</h4>
                                    <form action="{{url('order-submit')}}" method="post" class="needs-validation" novalidate="">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">First Name*</label>
                                                <input type="text" class="form-control" name="first_name"
                                                    placeholder="First Name" value="" required>
                                                {!! $errors->first('first_name', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName">Last Name*</label>
                                                <input type="text" class="form-control" name="last_name"
                                                    placeholder="Last Name" value="" required>
                                                {!! $errors->first('last_name', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="username">Phone No*</label>
                                            <div class="input-group">

                                                <input type="text" class="form-control" name="phone"
                                                    placeholder="Phone No" required>
                                            </div>
                                            {!! $errors->first('phone', "<span class='text-danger'>:message</span>") !!}
                                        </div>

                                        <div class="mb-3">
                                            <label for="email">Email*</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="you@example.com" required>
                                            {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                                        </div>

                                        <div class="mb-3">
                                            <label for="address">Address*</label>
                                            <input type="text" class="form-control" name="address"
                                                placeholder="1234 Main St" required>
                                            {!! $errors->first('address', "<span class='text-danger'>:message</span>") !!}
                                        </div>

                                        <div class="mb-3">
                                            <label for="address2">Address 2 <span
                                                    class="text-muted">(Optional)</span></label>
                                            <input type="text" class="form-control" name="address2"
                                                placeholder="Apartment or suite">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 mb-3">
                                                <label for="country">Country*</label>
                                                <input type="text" class="form-control" name="country"
                                                    placeholder="Country" required>
                                                {{-- <select class="custom-select d-block w-100 form-control" id="country"
                                                    required="">
                                                    <option value="">Choose...</option>
                                                    <option>United States</option>
                                                </select> --}}
                                                {!! $errors->first('country', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="state">State*</label>
                                                <input type="text" class="form-control" name="state"
                                                    placeholder="State" required>
                                                {{-- <select class="custom-select d-block w-100 form-control" id="state"
                                                    required="">
                                                    <option value="">Choose...</option>
                                                    <option>California</option>
                                                </select> --}}
                                                {!! $errors->first('state', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="zip">Zip*</label>
                                                <input type="text" class="form-control" name="zipcode" placeholder=""
                                                    required>
                                                {!! $errors->first('zipcode', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" value="1" class="custom-control-input" name="billing_address">
                                            <label class="custom-control-label" for="same-address">Shipping address is the
                                                same as my billing address</label>
                                        </div>
                                        {{-- <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="save-info">
                                            <label class="custom-control-label" for="save-info">Save this information for
                                                next time</label>
                                        </div> --}}
                                        <hr class="mb-4">

                                        <h4 class="mb-3">Payment</h4>
                                        <div class="form-row">
                                            @foreach ($payment_method as $item1)
                                                <div class="alert alert-danger col-md-12"
                                                    style="padding: 0px 1.25rem; margin-bottom:0px;">
                                                    <b>{{ $item1->name ?? '' }}</b><br>
                                                    <span>{{ $item1->number ?? '' }}</span><br>
                                                    <input type="radio" name="payment_method"
                                                        value="{{ $item1->id }}" id=""
                                                        style="float: right;">
                                                    <span>{{ $item1->month ?? '' }}/{{ $item1->year ?? '' }}</span>
                                                </div><br>
                                            @endforeach
                                            {!! $errors->first('payment_method', "<span class='text-danger'>:message</span>") !!}

                                        </div>
                                        {{-- <div class="d-block my-3">
                                            <div class="custom-control custom-radio">
                                                <input id="credit" name="paymentMethod" type="radio"
                                                    class="custom-control-input" checked="" required="">
                                                <label class="custom-control-label" for="credit">Credit card</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="debit" name="paymentMethod" type="radio"
                                                    class="custom-control-input" required="">
                                                <label class="custom-control-label" for="debit">Debit card</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="paypal" name="paymentMethod" type="radio"
                                                    class="custom-control-input" required="">
                                                <label class="custom-control-label" for="paypal">Paypal</label>
                                            </div>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="cc-name">Name on card</label>
                                                <input type="text" class="form-control" name="card_name"
                                                    placeholder="">
                                                {!! $errors->first('card_name', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="cc-number">Credit card number</label>
                                                <input type="number" class="form-control" name="card_no"
                                                    placeholder="">
                                                {!! $errors->first('card_no', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-3">
                                                <label for="cc-expiration">Expiry Month</label>
                                                <input type="number" class="form-control" name="month"
                                                    placeholder="">
                                                {!! $errors->first('month', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="cc-expiration">Expiry Year</label>
                                                <input type="number" class="form-control" name="year"
                                                    placeholder="">
                                                {!! $errors->first('year', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="cc-expiration">CVV</label>
                                                <input type="number" class="form-control" name="cvc"
                                                    placeholder="">
                                                {!! $errors->first('cvc', "<span class='text-danger'>:message</span>") !!}
                                            </div>
                                        </div>
                                        <hr class="mb-4">
                                        <button class="btn btn-primary  btn-block mb-4" type="submit">Order Place</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection
