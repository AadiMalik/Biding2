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
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <th colspan="2">
                                            Producto
                                        </th>
                                        <th>Cantidad</th>
                                        <th>Actualizar</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $sub_total=0;
                                            $shipping_charge=0;
                                        @endphp
                                        @foreach ($cart as $item)
                                        @php
                                            $product_total = $item->product_name->price * $item->qty;
                                            $sub_total += $item->product_name->price * $item->qty;
                                            $shipping_charge += $item->product_name->shipping_price;
                                            $total = $sub_total + $shipping_charge;
                                        @endphp
                                        <tr>
                                            <td>
                                                <img src="{{asset($item->product_name->image1??'')}}" style="width:100px; hieght:100px;" alt="">
                                            </td>
                                            <td>
                                                 <h5>{{$item->product_name->name??''}}</h5>
                                                <b>ID:</b> {{$item->product_name->code??''}}
                                            </td>
                                            <form action="{{route('UpdateCart',$item->id)}}" method="post">
                                                @csrf
                                            <td>
                                                <input type="number" name="qty" min="1" value="{{$item->qty??'0'}}" required>
                                            </td>
                                            <td style="display: inline-flex;">
                                                <button type="submit" class="btn btn-primary btn-sm"><span class="bx bx-check"></span></button>
                                                <a href="{{url('cart-delete/'.$item->id)}}" class="btn btn-danger btn-sm"><span class="bx bx-trash"></span></a>
                                            </td>
                                        </form>
                                            <td>
                                               $ {{$product_total??'0'}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Sub Total:</h6>
                                        <span class="text-secondary"><b>$ {{$sub_total??'0'}}</b></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Shipping Charges:</h6>
                                        <span class="text-secondary"><b>$ {{$shipping_charge??'0'}}</b></span>
                                    </li>
                                    {{-- <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Discount:</h6>
                                        <span class="text-secondary"><b>$ 0.00</b></span>
                                    </li> --}}
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h5 class="mb-0">Grand Total:</h5>
                                        <span class="text-secondary"><h6>$ {{$total??'0'}}</h6></span>
                                    </li>
                                </ul>
                                <hr class="my-4" />
                                <a href="{{url('checkout')}}" class="btn btn-info form-control">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection