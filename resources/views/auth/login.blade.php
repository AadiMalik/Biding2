@extends('layouts.app')

@section('content')
<div class="form-bg my-5">
    <div class="container">
        <div class="row">
            <div class=" col-md-7 col-12 col-lg-5 mx-auto">
                <div class="form-container">
                    <div class="form_logo">
                        <img src="{{asset('assets/images/Logo subastek sin fondo.png')}}" alt="">
                    </div>
                    <h3 class="title">Acceso </h3>
                    <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="checkbox">
                            <span class="check-label">Acepto los Términos  <a href="">Términos</a> y la  <a href="">Política de privacidad</a></span>
                        </div>
                        <button class="btn signup" type="submit">Acceso</button>
                    </form>
                    <div class="form_content mt-4 d-flex justify-content-between align-items-center">
                        <a href="{{ route('password.request') }}" class="recover">Recuperar contraseña</a>
                        <a href="{{ route('register') }}" class="create">Crea una cuenta </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Start -->
    {{-- <section class="login">
        <div class="container my-5 pt-md-5">
            <div class="col-12 col-md-6 mx-auto">
                <div class="card bg-light p-3">
                    <h2 class="text-center font-weight-bold mb-4 mb-md-5 text-green">Login in to Career Guide</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" id="" name="password"
                                placeholder="*******">
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn outline-btn px-5" type="submit">login</button>
                        </div>
                        <p class="text-right mt-4"><a href="{{ route('password.request') }}">Forgot Password</a></p>
                        <p class="mt-4">Don't hava account please <a href="{{ route('register') }}">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
