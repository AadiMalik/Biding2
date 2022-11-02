@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Social Media
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.media.update", $media->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{$media->name??''}}" id="" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="icon">Icon</label>
                <input type="text" name="icon" class="form-control" value="{{$media->icon??''}}" id="" required>
                @if($errors->has('icon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icon') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="link">Link</label>
                <input type="text" name="link" class="form-control" value="{{$media->link??''}}" id="" required>
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
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