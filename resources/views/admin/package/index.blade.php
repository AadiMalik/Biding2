@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Packages</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Packages</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        @can('package_create')
                            <a class="btn btn-primary" href="{{ route('admin.package.create') }}">Create</a>
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

            <h6 class="mb-0 text-uppercase">All Package</h6>
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
                                        Bids
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    {{-- <th>
                                        Time
                                    </th>
                                    <th>
                                        Limit
                                    </th> --}}
                                    <th>
                                        Feature 1
                                    </th>
                                    <th>
                                        Feature 2
                                    </th>
                                    <th>
                                        Feature 3
                                    </th>
                                    <th>
                                        Tag
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($package as $key => $item)
                                    <tr data-entry-id="{{ $item->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $key+1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->bids ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->price ?? '' }}
                                        </td>
                                        {{-- <td>
                                            {{ $item->time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->limit ?? '' }}
                                        </td> --}}
                                        <td>
                                            {{ $item->feature1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->feature2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->feature3 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->tag ?? '' }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($item->image ?? '') }}" style="width: 100px; height:100px;"
                                                alt="">
                                        </td>
                                        <td>

                                            @can('package_edit')
                                                <a class="btn btn-xs btn-info"
                                                    href="{{ route('admin.package.edit', $item->id) }}">
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
