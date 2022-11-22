@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Mi Subastas Ganadas</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Subastas Ganadas</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <h6 class="mb-0 text-uppercase">All Subastas Ganadas</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th>
                                        Subasta
                                    </th>
                                    <th>
                                        Fecha
                                    </th>
                                    <th>
                                        Precio
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($win_product as $key => $item)
                                    <tr data-entry-id="{{ $item->id }}">

                                        <td>
                                            <img src="{{$item->image1??''}}" style="width:100px; height:100px;" alt=""> <br>
                                            {{$item->name??''}} <br>
                                            ID:{{$item->code}}
                                        </td>
                                        <td>
                                            {{ $item->updated_at ?? '' }}
                                        </td>
                                        <td>
                                            ${{ $item->bid_price ?? '' }}
                                        </td>
                                        <td>
                                            @if(count($buy_product->where('product_id',$item->id))>0)
                                            <a href="{{url('feedback/'.$item->id)}}" class="btn btn-info">Retroalimentación</a>
                                            @else
                                            <a href="{{url('buy-product/'.$item->id)}}" class="btn btn-primary">Paga Ahora</a>
                                            @endif
                                        </td>
                                        
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
