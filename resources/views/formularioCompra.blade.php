<!DOCTYPE html>
<html lang="en">

<head>
    <title>Al fallo shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link rel="apple-touch-icon" href="resources/img/peso.png">
    <link rel="shortcut icon" type="image/x-icon" href="resources/img/peso.png">

    <link rel="stylesheet" href="{{ asset('resources/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/templatemo.css') }}">
<link rel="stylesheet" href="{{ asset('resources/css/custom.css') }}">
<!-- Incluye Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Incluye Bootstrap JS y Popper.js (si es necesario) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('resources/css/fontawesome.min.css') }}">

</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-dumbbell mx-2"></i>
                    Suplementos para entrenar al fallo
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="/">
                Al fallo shop
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/suplementos">Suplementos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/accesorios">Accesorios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/snacks">Snacks</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    
                    <a class="nav-icon position-relative text-decoration-none" href="/carrito">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>
                    @if (Auth::check())
                                <div class="dropdown">
                                    <a class="nav-icon position-relative text-decoration-none dropdown-toggle" href="{{ route('usuario') }}" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-user text-dark mr-3"></i> {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    @if (Auth::user()->name === 'admin')
                                    <a class="dropdown-item" href="/addProducto">Agregar productos</a>
                                        <a class="dropdown-item" href="/productos">Ver y editar </a>
                                        <a class="dropdown-item" href="/ventas">Todas las ventas</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('usuario') }}">Ver información</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </div>
                                </div>
                                @else
                                <a class="nav-icon position-relative text-decoration-none" href="/login">
                                    <i class="fa fa-fw fa-sign-in-alt text-dark mr-3"></i> Iniciar sesión
                                </a>
                                @endif
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
<body>
    <br>
    <br>
    
<div class="container">
<form method="post" action="{{ url('/comprar') }}" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label for="direccion" class="form-label">Direccion:</label>
        <input type="text" name="direccion" class="form-control" id="direccion">
    </div>
    <div class="col-md-6">
        <label for="tarjeta" class="form-label">Num tarjeta:</label>
        <input type="text" name="tarjeta" class="form-control" id="tarjeta">
    </div>
    <div class="col-md-6">
        <label for="fecha_nac" class="form-label">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nac" class="form-control" id="fecha_nac">
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Comprar</button>
    </div>
</form>
<br>
<br>

    <br>
    <br>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     <!-- Start Footer -->
     <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Al fallo shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Solo en linea 
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">0123459789</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@alfallo.com">info@alfallo.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Productos</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="/suplementos">Suplementos</a></li>
                        <li><a class="text-decoration-none" href="/accesorios">Accesorios</a></li>
                        <li><a class="text-decoration-none" href="/snakcs">Snacks</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Información extra</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="/contacto">Contacto</a></li>
                        <li><a class="text-decoration-none" href="/usuario">Tu cuenta</a></li>
                    </ul>
                </div>

            </div>

           
            

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>

   
