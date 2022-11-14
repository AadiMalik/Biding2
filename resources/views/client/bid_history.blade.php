@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Mis Subastas (Clásicas)</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Pujas utilizadas</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <h6 class="mb-0 text-uppercase">All Pujas utilizadas</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th>
                                        Última Puja
                                    </th>
                                    <th>
                                        Subasta
                                    </th>
                                    <th>
                                        Pujas utilizadas
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bid_use as $key => $item)
                                    <tr data-entry-id="{{ $item->id }}">

                                        <td>
                                            {{ $item->created_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->product_name->name ?? '' }} <br>
                                            ID:{{ $item->product_id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->bids ?? '' }}
                                        </td>
                                        <td>
                                            <b>Cerrada</b> <br>
                                            {{ $item->created_at->format('d-m-Y') ?? '' }}
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
