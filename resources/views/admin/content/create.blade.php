@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Content
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.content.store") }}" enctype="multipart/form-data">
            @csrf
			<div class="form-group">
                <label class="required" for="page">Page</label>
                <input type="text" name="page" class="form-control" id="">
            </div>
			<div class="form-group">
                <label class="required" for="key">Key*</label>
                <input type="text" name="key" class="form-control" id="" required>
                @if($errors->has('key'))
                    <div class="invalid-feedback">
                        {{ $errors->first('key') }}
                    </div>
                @endif
            </div>
			<div class="form-group">
                <label class="required" for="heading">Heading</label>
                <input type="text" name="heading" class="form-control" id="">
            </div>
			<div class="form-group">
                <label class="required" for="icon">Icon</label>
                <input type="text" name="icon" class="form-control" id="">
            </div>
			<div class="form-group">
                <label class="required" for="link">Link</label>
                <input type="text" name="link" class="form-control" id="">
            </div>
            <div class="form-group">
                <label class="required" for="image">Image</label>
                <input type="file" name="image" class="form-control" id="">
            </div>
            <div class="form-group">
                <label class="required" for="description">description</label>
                <textarea name="description" class="form-control" id=""></textarea>
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