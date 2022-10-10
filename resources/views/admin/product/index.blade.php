@extends('layouts.admin')
@section('content')
@can('product_create')
<div class="page-wrapper">
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.product.create") }}">
                {{ trans('global.add') }} Product
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Product {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission"  id="table-1">
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

                            </td>
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
            </table>
        </div>
    </div>
</div>

</div>

@endsection