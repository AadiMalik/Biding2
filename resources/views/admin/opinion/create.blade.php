@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Opinion
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.opinion.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user">User</label>
                <select name="user" class="form-control" id="" required>
                    @foreach ($user as $item)
                    <option value="{{$item->id}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="product">Product</label>
                <select name="product" class="form-control" id="" required>
                    @foreach ($product as $item)
                    <option value="{{$item->id}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                @if($errors->has('product'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">image</label>
                <input type="file" name="image" class="form-control" id="">
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">Feedback</label>
                <textarea type="text" name="description" class="form-control" id=""></textarea>
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">Status</label>
                <select name="status" class="form-control" id="" required>
                    <option value="0">Active</option>
                    <option value="1">Block</option>
                </select>
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

</div>

@endsection