@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Mis Pedidos</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Mis Pedidos</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <h6 class="mb-0 text-uppercase">All Mis Pedidos</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th>
                                        Producto
                                    </th>
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Precio
                                    </th>
                                    <th>
                                        Precio de envío
                                    </th>
                                    <th>
                                        Precio total
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                    {{-- <th>
                                        Opinión
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $key => $item)
                                    <tr data-entry-id="{{ $item->id }}">
                                        <td>
                                            <img src="{{$item->product_name->image1??''}}" style="width:100px; height:100px;" alt=""> <br>
                                            {{$item->product_name->name??''}} <br>
                                            n º de pedido:{{$item->id}}
                                        </td>
                                        <td>
                                            {{ $item->created_at ?? '' }}
                                        </td>
                                        <td>
                                            ${{ $item->price ?? '0' }}
                                        </td>
                                        <td>
                                            ${{ $item->shipping_price ?? '0' }}
                                        </td>
                                        <td>
                                            ${{ $item->total ?? '0' }}
                                        </td>
                                        <td>
                                            {{ $item->status ?? '' }}
                                        </td>
                                        {{-- <td>
                                            @if(isset($item->status))
                                            <a href="{{url('feedback/'.$item->id)}}" class="btn btn-info">Retroalimentación</a>
                                            @else
                                            N/A
                                            @endif
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
