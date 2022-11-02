@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Social Media</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Social Media</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        @can('media_create')
                            <a class="btn btn-primary" href="{{ route('admin.media.create') }}">Create</a>
                        @endcan
                    </div>
                </div>
            </div>

            <h6 class="mb-0 text-uppercase">All Social Media</h6>
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
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Icon
                                    </th>
                                    <th>
                                        Link
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($media as $key => $item)
                                    <tr data-entry-id="{{ $item->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $item->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->icon ?? '' }}
                                        </td>
                                        <td>
                                            {{ $item->link ?? '' }}
                                        </td>
                                        <td>

                                            @can('media_edit')
                                                <a class="btn btn-xs btn-info"
                                                    href="{{ route('admin.media.edit', $item->id) }}">
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
