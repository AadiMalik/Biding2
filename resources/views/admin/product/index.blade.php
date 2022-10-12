@extends('layouts.admin')
@section('content')

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Product</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Products</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
                        @can('product_create')
							<a class="btn btn-primary" href="{{ route("admin.product.create") }}">Create</a>
                        @endcan    
							<!-- <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div> -->
						</div>
					</div>
				</div>
				
				<h6 class="mb-0 text-uppercase">All Products</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        From
                                    </th>
                                    <th>
                                        To
                                    </th>
                                    <th>
                                        Limit
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product as $key => $item)
                                    <tr data-entry-id="{{ $item->id }}">
                                        
                                        <td>
                                            {{ $item->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->category_name->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->from ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->to ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->limit ?? '' }}
                                        </td>
                                        <td>
                                            <img src="{{asset($item->image1??'') }}" style="height: 100px;" alt="">
                                        </td>
                                        <td>
                                            {{ $item->description ?? '' }}
                                        </td>
                                        <td>
                                            @can('product_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.product.show', $item->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('product_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.product.edit', $item->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            {{-- @can('permission_delete')
                                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan --}}

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
						</div>
					</div>
				</div>
			</div>
</div>
@endsection