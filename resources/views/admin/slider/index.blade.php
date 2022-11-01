@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Slider</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Slider Images</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        @can('slider_create')
                            <a class="btn btn-primary" href="{{ route('admin.slider.create') }}">Create</a>
                        @endcan
                    </div>
                </div>
            </div>

            <h6 class="mb-0 text-uppercase">All Slider Images</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <th>
                                        Sr.
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
                                @foreach ($slider as $index => $item)
                                    <tr data-entry-id="{{ $item->id }}">

                                        <td>
                                            {{ $index+1 ?? '' }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($item->image ?? '') }}" style="height: 100px;"
                                                alt="">
                                        </td>
                                        <td>
                                            @can('slider_edit')
                                                <a class="btn btn-xs btn-info"
                                                    href="{{ route('admin.slider.edit', $item->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan
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
