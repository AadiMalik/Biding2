@extends('layouts.app')

@section('content')
<section class="my_auctions">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="my_auctions_box">
                    <div class="my_auction_head">
                        <h4>Mi Subastek</h4>
                    </div>
                    <div class="my_auction_body">
                        <a href="{{url('comprar-bids')}}">
                            <img src="assets/images/cart.svg" alt="">
                            <p>Comprar Pujas </p>
                        </a>
                        <a href="#">
                            <img src="assets/images/002-cup.svg" alt="">
                            <p>Subastas Ganadas </p>
                        </a>
                        <a href="#">
                            <img src="assets/images/truck.svg" alt="">
                            <p>Mis Pedidos</p>
                        </a>
                        <a href="#"  >
                            <img src="assets/images/tickets.svg" alt="">
                            <p>Atención al cliente - Tickets </p>
                        </a>
                        {{-- <a href="#">
                            <span><p> 101</p></span>
                            <p>Subastas de Pujas</p>
                        </a> --}}
                        {{-- <a href="#">
                            <img src="assets/images/limitidivincita2.svg" alt="">
                            <p>Límites para ganar</p>
                        </a> --}}
                        {{-- <a href="#">
                            <img src="assets/images/shopping-bag.svg" alt="">
                            <p>IR A LA SHOP</p>
                        </a> --}}
                        <a href="#">
                            <img src="assets/images/sync.svg" alt="">
                            <p> Mi AutoPuja</p>
                        </a>
                        <a href="#">
                            <img src="assets/images/circular-clock.svg" alt="">
                            <p> Historial de Pujas</p>
                        </a>
                        <a href="#">
                            <img src="assets/images/my-auctions.svg" alt="">
                            <p> Historial Mis Subastas</p>
                        </a>
                        {{-- <a href="#">
                            <img src="assets/images/compraloora.svg" alt="">
                            <p> Cómpralo Ya</p>
                        </a> --}}
                        <a href="#">
                            <img src="assets/images/icon-credit-card.svg" alt="">
                            <p> Gestionar Tarjetas</p>
                        </a>
                        <a href="#">
                            <img src="assets/images/001-settings.svg" alt="">
                            <p></p> Configuración</p>
                        </a>
                        <a href="#">
                            <img src="assets/images/user-security.svg" alt="">
                            <p> Acceso y Seguridad</p>
                        </a>
                        <a href="#">
                            <img src="assets/images/logout.svg" alt="">
                            <p> Cerrar Sesión </p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="tabel_content ">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Ultima Puja</th>
                                    <th scope="col">Subasta</th>
                                    <th scope="col">Pujas</th>
                                    <th scope="col">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>o2-09-2022</p>
                                        <p>15:32:04</p>
                                    </td>
                                    <td>
                                        <p class="tabel_dark"><b>Auriculares bluetooth anitibacteria</b></p>
                                        <p>ID:2344556</p>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <p><b>Cerrada</b></p>
                                        <p>02-09-2022</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>o2-09-2022</p>
                                        <p>15:32:04</p>
                                    </td>
                                    <td>
                                        <p class="tabel_dark"><b>Auriculares bluetooth anitibacteria</b></p>
                                        <p>ID:2344556</p>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <p><b>Cerrada</b></p>
                                        <p>02-09-2022</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>o2-09-2022</p>
                                        <p>15:32:04</p>
                                    </td>
                                    <td>
                                        <p class="tabel_dark"><b>Auriculares bluetooth anitibacteria</b></p>
                                        <p>ID:2344556</p>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <p><b>Cerrada</b></p>
                                        <p>02-09-2022</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>o2-09-2022</p>
                                        <p>15:32:04</p>
                                    </td>
                                    <td>
                                        <p class="tabel_dark"><b>Auriculares bluetooth anitibacteria</b></p>
                                        <p>ID:2344556</p>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <p><b>Cerrada</b></p>
                                        <p>02-09-2022</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection