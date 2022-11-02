@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Content</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Contents</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        @can('content_create')
                            <a class="btn btn-primary" href="{{ route('admin.content.create') }}">Create</a>
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

            <h6 class="mb-0 text-uppercase">All Contents</h6>
            <hr />
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
                                        Page
                                    </th>
                                    <th>
                                        Heading
                                    </th>
                                    <th>
                                        Key
                                    </th>
                                    <th>
                                        Icon
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
                                @foreach ($content as $key => $item)
                                    <tr data-entry-id="{{ $item->id }}">

                                        <td>
                                            {{ $item->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->page ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->heading ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->key ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->icon ?? '' }}
                                        </td>

                                        <td>
                                            <img src="{{ asset($item->image ?? '') }}" style="height: 100px;" alt="">
                                        </td>
                                        <td>
                                            {{ $item->description ?? '' }}
                                        </td>
                                        <td>

                                            @can('content_edit')
                                                <a class="btn btn-xs btn-info"
                                                    href="{{ route('admin.content.edit', $item->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

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
