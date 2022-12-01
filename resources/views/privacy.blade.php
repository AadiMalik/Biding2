@extends('layouts.app')

@section('content')
    <section class="Privacy">
        <div class="container">
            <div class="Heading_privacy">
                <h1>Política de Privacidad</h1>
                <h1>(actualizado el 25 de julio del 2019)</h1>
            </div>
            @foreach ($privacy as $item)
                {!!$item->description??''!!}
            @endforeach
        </div>
    </section>
@endsection
