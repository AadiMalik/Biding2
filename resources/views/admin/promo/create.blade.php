@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Promo Code
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.promo.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Promo Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="discount">Discount Amount</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="expiry">Expiry</label>
                <input class="form-control {{ $errors->has('expiry') ? 'is-invalid' : '' }}" type="datetime-local" name="expiry" id="expiry" value="{{ old('expiry', '') }}" required>
                @if($errors->has('expiry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expiry') }}
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