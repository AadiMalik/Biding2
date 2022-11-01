@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Slider Image
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.slider.update", $slider->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <img src="{{asset($slider->image??'') }}" style="height: 100px;" alt=""><br>
                <label class="required" for="image1">Image</label>
                <input class="form-control" type="file" name="image">
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