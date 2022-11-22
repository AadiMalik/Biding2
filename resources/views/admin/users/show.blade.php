@extends('layouts.admin')
@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Detail</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Detail</li>
                    </ol>
                </nav>
            </div>
            {{-- <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{asset($user->image??'/admin/images/avatars/avatar-2.png')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <h4>{{$user->name??''}}</h4>
                                        <p class="text-secondary mb-1">{{$user->email??''}}</p>
                                        <p class="text-muted font-size-sm">{{$user->address??''}}</p>
                                        {{-- <button class="btn btn-primary">Follow</button>
                                        <button class="btn btn-outline-primary">Message</button> --}}
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Email:</h6>
                                        <span class="text-secondary">{{$user->email??''}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Package:</h6>
                                        <span class="text-secondary">{{$user->package_name->bids??''}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Bids:</h6>
                                        <span class="text-secondary">{{$user->bids??''}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        {{-- <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="John Doe" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="john@example.com" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="(239) 816-9029" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="(320) 380-4539" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="Bay Area, San Francisco, CA" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="button" class="btn btn-primary px-4" value="Save Changes" />
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="d-flex align-items-center mb-3">Buy Products</h5>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Order At</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($win_product as $item)
                                                    
                                                <tr>
                                                    <td>{{$item->product_name->code??''}}</td>
                                                    <td>{{$item->product_name->name??''}}</td>
                                                    <td>{{$item->price??''}}</td>
                                                    <td>{{$item->status??''}}</td>
                                                    <td>{{$item->created_at??''}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="d-flex align-items-center mb-3">Win Products</h5>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Win At</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($product_hold as $item)
                                                    
                                                <tr>
                                                    <td>{{$item->code??''}}</td>
                                                    <td>{{$item->name??''}}</td>
                                                    <td>{{$item->price??''}}</td>
                                                    <td>{{$item->updated_at??''}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="d-flex align-items-center mb-3">Bid Use</h5>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Bid</th>
                                                <th>Bid At</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($bid_use as $item)
                                                    
                                                <tr>
                                                    <td>{{$item->product_name->code??''}}</td>
                                                    <td>{{$item->product_name->name??''}}</td>
                                                    <td>{{$item->bids??''}}</td>
                                                    <td>{{$item->created_at??''}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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