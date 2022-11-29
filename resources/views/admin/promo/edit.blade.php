@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Promo Code
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.promo.update", $promo->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">Promo Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ $promo->name??'' }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="discount">Discount Amount</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ $promo->discount??'' }}" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="expiry">Expiry</label>
                <input class="form-control {{ $errors->has('expiry') ? 'is-invalid' : '' }}" type="datetime-local" name="expiry" id="expiry" value="{{ $promo->expiry??'' }}" required>
                @if($errors->has('expiry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expiry') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="expiry">Status</label>
                <select name="status" class="form-control" id="">
                    <option value="0" {{($promo->status==0)?'selected':''}}>Active</option>
                    <option value="1" {{($promo->status==1)?'selected':''}}>Block</option>
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
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