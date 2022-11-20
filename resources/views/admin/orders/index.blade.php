@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Orders</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Orders</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                    </div>
                </div>
            </div>

            <h6 class="mb-0 text-uppercase">All Orders</h6>
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
                                        Order ID
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Product Price
                                    </th>
                                    <th>
                                        Shipping Price
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        User Name
                                    </th>
                                    {{-- <th>
                                            Payment Method
                                        </th> --}}
                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Update Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="result">
                                @foreach ($order as $key => $item)
                                    <tr data-entry-id="{{ $item->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $item->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->product_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->shipping_price ?? '0' }}
                                        </td>
                                        <td>
                                            {{ $item->total ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->user_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->status ?? '' }}
                                        </td>

                                        <td>
                                            <select id="status{{ $item->id }}">
                                                <option value="Processing">Processing</option>
                                                <option value="On the way">On the way</option>
                                                <option value="Deliver">Deliver</option>
                                                <option value="Complete">Complete</option>
                                            </select>
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
@section('script')
    @foreach ($order as $item)
        <script>
            $("#status{{ $item->id }}").change(function() {
                var status = $(this).val();
                var id = {{ $item->id }}
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/change_status') }}",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: id,
                        status: status,
                    },

                    success: function(response) {
                        window.location.href=window.location.href;
                    }
                });
            });
        </script>
    @endforeach
@endsection
