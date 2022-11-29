
@extends('layouts.admin')
@section('content')

<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Promo Code</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Promo Code</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
                        @can('permission_create')
							<a class="btn btn-primary" href="{{ route("admin.promo.create") }}">Create</a>
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
				
				<h6 class="mb-0 text-uppercase">All Promo Code</h6>
				<hr/>
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
                                            Promo Code
                                        </th>
                                        <th>
                                            Discount Amount
                                        </th>
                                        <th>
                                            Expiry
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($promo as $key => $item)
                                        <tr data-entry-id="{{ $item->id }}">
                                            <td>

                                            </td>
                                            <td>
                                                {{ $key+1 ?? '' }}
                                            </td>
                                            <td>
                                                {{ $item->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $item->discount ?? '' }}
                                            </td>
                                            <td>
                                                {{ $item->expiry ?? '' }}
                                            </td>
                                            <td>
                                                @if($item->status==0)
                                                Active
                                                @else
                                                Block
                                                @endif
                                            </td>
                                            <td>

                                                @can('promo_edit')
                                                    <a class="btn btn-xs btn-info" href="{{ route('admin.promo.edit', $item->id) }}">
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
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

        @endsection    