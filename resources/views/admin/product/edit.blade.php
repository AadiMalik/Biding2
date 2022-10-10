@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Product
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product.update", $product->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{$product->name}}" required>
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
                    <option value="{{$item->id}}" {{($product->category_id==$item->id)?'selected':''}}>{{$item->name??''}}</option>
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
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{$product->price}}" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="from">From</label>
                <input class="form-control {{ $errors->has('from') ? 'is-invalid' : '' }}" type="time" name="from" id="from" value="{{$product->from}}" required>
                @if($errors->has('from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="to">To</label>
                <input class="form-control {{ $errors->has('to') ? 'is-invalid' : '' }}" type="time" name="to" id="to" value="{{$product->to}}" required>
                @if($errors->has('to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('to') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="limit">Bid Limit</label>
                <input class="form-control {{ $errors->has('limit') ? 'is-invalid' : '' }}" type="number" name="limit" id="limit" value="{{$product->limit}}" required>
                @if($errors->has('limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('limit') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <img src="{{asset($product->image1??'') }}" style="height: 100px;" alt=""><br>
                <label class="required" for="image1">Image 1</label>
                <input class="form-control {{ $errors->has('image1') ? 'is-invalid' : '' }}" type="file" name="image1">
                @if($errors->has('image1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image1') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                @if(isset($product->image2))<img src="{{asset($product->image2??'') }}" style="height: 100px;" alt=""><br>@endif
                <label class="required" for="image2">Image 2</label>
                <input class="form-control" type="file" name="image2" id="image2">
            </div>
            <div class="form-group">
                @if(isset($product->image3))<img src="{{asset($product->image3??'') }}" style="height: 100px;" alt=""><br>@endif
                <label class="required" for="image3">Image 3</label>
                <input class="form-control" type="file" name="image3" id="image3">
            </div>
            <div class="form-group">
                @if(isset($product->image4))<img src="{{asset($product->image4??'') }}" style="height: 100px;" alt=""><br>@endif
                <label class="required" for="image4">Image 4</label>
                <input class="form-control" type="file" name="image4" id="image4">
            </div>
            <div class="form-group">
                @if(isset($product->image5))<img src="{{asset($product->image5??'') }}" style="height: 100px;" alt=""><br>@endif
                <label class="required" for="image5">Image 5</label>
                <input class="form-control" type="file" name="image5" id="image5">
            </div>
            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea class="form-control" name="description">{{$product->description??''}}</textarea>
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