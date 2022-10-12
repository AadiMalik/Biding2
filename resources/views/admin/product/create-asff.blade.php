@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Product
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="to">Category</label>
                <select name="category" class="form-control" id="" required>
                    @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->name??''}}</option>
                    @endforeach
                </select>
                @if($errors->has('to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="price">Price</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="price">Shipping Price</label>
                <input class="form-control {{ $errors->has('shipping_price') ? 'is-invalid' : '' }}" type="number" name="shipping_price" id="shipping_price" value="{{ old('shipping_price', '') }}" required>
                @if($errors->has('shipping_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shipping_price') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="from">Start Time</label>
                <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="time" name="from" id="from" value="{{ old('from', '') }}" required>
                @if($errors->has('from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="to">End Time</label>
                <input class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}" type="time" name="to" id="to" value="{{ old('to', '') }}" required>
                @if($errors->has('to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="limit">Stock Limit</label>
                <input class="form-control {{ $errors->has('limit') ? 'is-invalid' : '' }}" type="number" name="limit" id="limit" value="{{ old('limit', '') }}" required>
                @if($errors->has('limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('limit') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="image1">Banner Image</label>
                <input class="form-control {{ $errors->has('image1') ? 'is-invalid' : '' }}" type="file" name="image1" id="image1" required>
                @if($errors->has('image1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image1') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="image">Produts Images</label>
                <input id="image-uploadify" name="image[]" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
            </div>
            
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea class="form-control" name="description">{{old('description')}}</textarea>
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