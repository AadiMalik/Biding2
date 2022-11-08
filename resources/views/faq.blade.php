@extends('layouts.app')

@section('content')
    <section class="frequent-qus">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-11 col-lg-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h1>PREGUNTAS FRECUENTES</h1>
                            <div class="accordion" id="accordionExample">
                                @foreach ($faq as $item)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne{{$item->id}}" @if($loop->first) aria-expanded="true" @else  aria-expanded="false" @endif aria-controls="collapseOne{{$item->id}}">
                                            {{$item->title??''}}
                                        </button>
                                    </h2>
                                    <div id="collapseOne{{$item->id}}" class="accordion-collapse collapse @if($loop->first) show @endif"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            @if($item->image!=null)
                                            <img src="{{asset($item->image??'')}}">
                                            @endif
                                            @if($item->video!=null)
                                            {!!$item->video??''!!}
                                            @endif
                                            <p>{!!$item->description??''!!}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
