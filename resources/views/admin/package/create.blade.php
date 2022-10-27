@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Package
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.package.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="bids">Bids*</label>
                <input type="text" name="bids" class="form-control" id="" required>
            </div>
            <div class="form-group">
                <label class="required" for="price">Price*</label>
                <input type="number" step="any" name="price" class="form-control" id="" required>
            </div>
            <div class="form-group">
                <label class="required" for="limit">Limit*</label>
                <input type="number" name="limit" value="0" class="form-control" id="" required>
            </div>
            <div class="form-group">
                <label class="required" for="Time">Time*</label>
                <input type="text" name="time" class="form-control" id="" required>
            </div>
            <div class="form-group">
                <label class="required" for="feature1">Feature 1*</label>
                <input type="text" name="feature1" class="form-control" id="" required>
            </div>
            <div class="form-group">
                <label class="required" for="feature2">Feature 2*</label>
                <input type="text" name="feature2" class="form-control" id="" required>
            </div>
            <div class="form-group">
                <label class="required" for="feature3">Feature 3*</label>
                <input type="text" name="feature3" class="form-control" id="" required>
            </div>
            <div class="form-group">
                <label class="required" for="tag">Tag (optional)</label>
                <input type="text" name="tag" class="form-control" id="">
            </div>
            <div class="form-group">
                <label class="required" for="image">Background Image*</label>
                <input type="file" name="image" class="form-control" id="" required>
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