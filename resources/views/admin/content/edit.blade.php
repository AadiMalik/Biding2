@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Content
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.content.update", $content->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="page">Page</label>
                <input type="text" name="page" value="{{$content->page??''}}" class="form-control" id="">
            </div>
			<div class="form-group">
                <label class="required" for="heading">Heading</label>
                <input type="text" name="heading" value="{{$content->heading??''}}" class="form-control" id="">
            </div>
			<div class="form-group">
                <label class="required" for="icon">Icon</label>
                <input type="text" name="icon" value="{{$content->icon??''}}" class="form-control" id="">
            </div>
			<div class="form-group">
                <label class="required" for="link">Link</label>
                <input type="text" name="link" value="{{$content->link??''}}" class="form-control" id="">
            </div>
            <div class="form-group">
                <img src="{{asset($content->image??'')}}" style="height: 100px; width:100px;" alt="">
                <label class="required" for="image">Image</label>
                <input type="file" name="image" class="form-control" id="">
            </div>
            <div class="form-group">
                <label class="required" for="description">description</label>
                <textarea name="description" class="form-control" id=""> {{$content->description??''}}</textarea>
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