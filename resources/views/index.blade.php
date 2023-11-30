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

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
 <!-- Start Banner Hero -->
 <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="/suplementos" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="/suplementos" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="resources/img/img1.png" alt="" >
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>FQA</b> ¿Por qué tomar suplementos?</h1>
                                <h3 class="h2">Dependiendo tus objetivos</h3>
                                <p>
                                    Los suplementos pueden ayudar a mejorar el rendimiento en el gimnasio, aumentar la masa muscular y reducir la grasa corporal. Sin embargo, es importante consultar con un médico o nutricionista antes de tomar cualquier suplemento, ya que algunos pueden tener efectos secundarios.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="resources/img/img2.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success">Ya disponible!
                                </h1>
                                <h3 class="h2">Productos de CBum</h3>
                                <p>
                                   Los suplementos de Chris Bumstead están diseñados para ayudar a los culturistas a alcanzar sus objetivos de entrenamiento y rendimiento. La línea de productos incluye una variedad de suplementos, que incluyen creatina, proteína, aminoácidos esenciales, pre-entrenamiento y post-entrenamiento.


                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="resources/img/img3.png" alt="" width="300" height="300">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success">TIP</h1>
                                <h3 class="h2">Uso de straps</h3>
                                <p>
                                Los traps, o trapecios, son un grupo muscular ubicado en la parte superior de la espalda. Son importantes en el gym porque ayudan a:

Realizar movimientos de empuje y tracción. Los traps ayudan a estabilizar la columna vertebral y a proporcionar potencia a los movimientos de empuje, como las flexiones de banca, y de tracción, como las dominadas.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorias</h1>
                <p>
                    Complementa tu alimentación con los suplementos que tenemos para ti!
                </p>
            </div>
        </div>
        <div class="row">
  <div class="col-12 col-md-4 p-5 mt-3">
    <a href="/suplementos"><img src="resources/img/prote.jpg" class="rounded-circle img-fluid border mx-auto" width="300" height="300"></a>
    <h5 class="text-center mt-3 mb-3">Suplementos</h5>
    <p class="text-center"><a class="btn btn-success">Ver</a></p>
  </div>
  <div class="col-12 col-md-4 p-5 mt-3">
    <a href="/snacks"><img src="resources/img/barras.jpg" class="rounded-circle img-fluid border mx-auto" width="300" height="300"></a>
    <h5 class="text-center mt-3 mb-3">Snacks</h5>
    <p class="text-center"><a class="btn btn-success">Ver</a></p>
  </div>
  <div class="col-12 col-md-4 p-5 mt-3">
    <a href="/accesorios"><img src="resources/img/straps.jpg" class="rounded-circle img-fluid border mx-auto" width="300" height="300"></a>
    <h5 class="text-center mt-3 mb-3">Accesorios</h5>
    <p class="text-center"><a class="btn btn-success">Ver</a></p>
  </div>
</div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Productos más vendidos</h1>
                    <p>
                        Conoce los productos más vendidos de la semana para que puedas darle con todo al gym 
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a  href="/single/8">
                            <img src="resources/img/proteazul.jpg" class="card-img-top" alt="..." width="300" height="300">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$1,070.00</li>
                            </ul>
                            <a  href="/single/8" class="h2 text-decoration-none text-dark">Proteina vegetal Birdman</a>
                            <p class="card-text">
                            Rica Fuente de Proteína: Con hasta 24 gramos de proteína de alta calidad por porción, ideal para complementar tu dieta y apoyar tus objetivos de acondicionamiento físico.                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="/single/16">
                            <img src="resources/img/smun.jpg" class="card-img-top" alt="..." width="300" height="300">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$207.00</li>
                            </ul>
                            <a href="/single/16" class="h2 text-decoration-none text-dark">Straps con muñequera</a>
                            <p class="card-text">
                            Carga más peso: al enfocar el peso en las muñecas, da más seguridad y confianza al manipular grandes pesos. Logra más repeticiones.                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="/single/28">
                            <img src="resources/img/chips.jpg" class="card-img-top" alt="..." width="300" height="300">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$544.00</li>
                            </ul>
                            <a href="/single/28" class="h2 text-decoration-none text-dark">Chips de Proteína</a>
                            <p class="card-text">
                            18g de proteína y 4g carbs Horneadas - nunca fritas. Elaborado con aislados de proteína de suero de leche de alta calidad Sin Ingredientes de Soya añadidos Sin Gluten                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->


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
                        <li><a class="text-decoration-none" href="/stacks">Stacks</a></li>
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
    <script src="{{ asset('resources/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{ asset('resources/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('resources/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('resources/js/templatemo.js') }}"></script>
    <script src="{{ asset('resources/js/custom.js') }}"></script>
    <!-- End Script -->
</body>

</html>