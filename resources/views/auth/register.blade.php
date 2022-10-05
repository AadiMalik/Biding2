@extends('layouts.app')

@section('content')
<div class="form-bg  ">
	<div class="container">
		<div class="row">
			<div class=" col-md-7 col-12 col-lg-5 mx-auto">
				<div class="form-container">
					<div class="form_logo">
						<img src="assets/images/Logo subastek sin fondo.png" alt="">
					</div>
					<h3 class="title">Crear una cuenta</h3>
					<span class="description">o use su correo electrónico para registrarse:</span>
                        <form class="form-horizontal" action="{{ route('register') }}" method="POST">
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
							<input type="text" name="name" class="form-control" placeholder="Name">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="checkbox" class="checkbox">
							<span class="check-label">
								Estoy de acuerdo con la <a href="{{url('terminos-y-condiciones')}}">Terminos</a> and <a href="">Privacidad
							Política.</a></span>
						</div>
						<button class="btn signup" type="submit">Inscribirse</button>
						<a href="{{route('login')}}" class="btn signin">Iniciar sesión</a>
					</form>
					<div class="form_content">
						<p>Al hacer clic en "Registrarse gratis", declara que ha leído y aceptado los Términos y condiciones
						</p>
						<p> Ya tienes una cuenta?  <a href="{{route('login')}}">Iniciar sesión</a> </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

    <!-- start -->
    {{-- <section class="login">
        <div class="container my-5 pt-md-5">
            <div class="col-12 col-md-6 mx-auto">
                <div class="card bg-light p-3">
                    <h2 class="text-center font-weight-bold mb-4 mb-md-5 text-green">Sign Up in to Career Guide</h2>
                    <form action="{{ route('register') }}" method="POST">
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
                            <label for="" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="" placeholder="First Name"
                                name="first_name" value="{{ old('first_name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="" placeholder="Last Name"
                                name="last_name" value="{{ old('last_name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" id="" placeholder="*******"
                                name="password">
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn outline-btn px-5" type="submit">Submit</button>
                        </div>
                        <p class="text-right mt-4"><a href="{{ route('password.request') }}">Forgot Password</a></p>
                        <p class="mt-4">Hava an account please <a href="{{ route('login') }}">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
