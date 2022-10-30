@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Package Buy</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Buy Package</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <h6 class="mb-0 text-uppercase">All Buy Package</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        Sr.
                                    </th>
                                    <th>
                                        Package Name
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Bids
                                    </th>
                                    <th>
                                        User Name
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($package_buy as $key => $item)
                                    <tr data-entry-id="{{ $item->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $key+1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->package_name->bids ?? '' }}  Bids
                                        </td>
                                        <td>
                                            {{ $item->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->bids ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->user_name->name ?? '' }}
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
