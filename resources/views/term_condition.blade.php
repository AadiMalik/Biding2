@extends('layouts.app')

@section('content')
<section class="term-condition">
    <div class="container">
        <h1>Términos y Condiciones</h1>
        @foreach ($term as $item)
        <div class="sub-section">
            {!!$item->description??''!!}
        </div>
        @endforeach
    </div>
</section>
 
@endsection