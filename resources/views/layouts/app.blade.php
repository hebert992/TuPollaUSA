<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="utf-8">
    <title>Tu Polla USA</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset("css/bootstrap.css")}}">
    <link rel="shortcut icon" href="{{asset("img/logo.png")}}" type="img/x-icon">
    <link rel="stylesheet" href="{{asset("css/estilos.css")}}">

    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    <!-- TIMEPICKER -->

</head>
<body>
<header>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- El logotipo y el icono que despliega el menú se agrupan
             para mostrarlos mejor en los dispositivos móviles -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-ex1-collapse">
                <span class="sr-only">Desplegar navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url("/")}}">TuPollaUSA</a>
        </div>

        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
             otro elemento que se pueda ocultar al minimizar la barra -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{url("/programacion")}}"><spam class="glyphicon glyphicon-calendar"></spam> Programacion</a></li>
                <li><a href="{{url("/apuestas")}}"><spam class="glyphicon glyphicon-thumbs-up"></spam> Tu Polla</a></li>
                <li><a href="{{url("/ganadores")}}"><spam class="glyphicon glyphicon-list-alt"></spam> Puntuaciones</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <spam class="glyphicon glyphicon-usd"></spam> Registro de Pago <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Efectivo</a></li>
                        <li><a href="#">Transferencia</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Mercado Pago</a></li>
                    </ul>
                </li>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Entrar</a></li>
                    <li><a href="{{ url('/register') }}">Registrarse</a></li>
                @else

                    <li><a class="glyphicon glyphicon-euro">{{Auth::user()->coins }}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            @if( Auth::user()->rol=="admin")
                                <li><a href="{{ url('/admin/usuarios') }}"><i class="glyphicon glyphicon-user"></i>Usuarios</a></li>
                                <li><a href="{{ url('/admin/tiendas') }}"><i class="glyphicon glyphicon-home"></i>Tiendas</a></li>
                                <li><a href="{{ url('/admin/polla') }}"><i class="glyphicon glyphicon-th-list"></i>Carreras</a></li>
                                <li><a href="{{ url('/admin/recargas') }}"><i class="glyphicon glyphicon-usd"></i>Recargas</a></li>
                                <li><a href="{{ url('/admin/config') }}"><i class="glyphicon glyphicon-floppy-open"></i>Configuracion</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-off"></i>Salir</a></li>
                            @endif
                            @if( Auth::user()->rol=="tienda")
                                <li><a href="{{ url('/tienda/usuarios') }}"><i class="glyphicon glyphicon-user"></i>Usuarios</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-off"></i>Salir</a></li>
                            @endif

                            @if(Auth::user()->rol=="usuario")
                                <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-off"></i>Salir</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>


</header>

<div class="container">
    <div class="panel row">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="{{asset("img/slide/1.png")}}" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="{{asset("img/slide/2.png")}}" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="{{asset("img/slide/2.png")}}" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>


            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


    <div class="row">
        <div class= "col-md-13">

        @yield('content')
        </div>

    </div>
    <div class="row">
        <div class="panel color1 col-xs-12 col-sm-6 col-md-4 column">
            <p>
            <div class ="page-header">
                <h3><a href="http://www.twitter.com" target="_blank">Twitter</a></h3>
            </div>
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </p>

        </div>
        <div class="panel color2 col-xs-12 col-sm-6 col-md-4">
            <p>
            <div class ="page-header">
                <h3><a  href="http://www.facebook.com" target="_blank">Facebook</a></h3>
            </div>

            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p></div>
        <div class="panel color1 col-xs-12 col-sm-6 col-md-4">
            <p>
            <div class ="page-header">
                <h3><a href="http://www.instagram" target="_blank">Instagram</a></h3>
            </div>

            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p></div>


    </div>
</div>

<footer class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul>
                    <li><a href="{{url("/comojugar")}}">¿Como Jugar?</a></li>
                    <li><a href="{{url("/reglas")}}">Reglas</a></li>
                    <li><a href="">Formas de Pago</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <img src="{{asset("img/fotter.jpg")}}">
            </div>
            <div class="col-md-4">
                <ul>
                    <li><a href="">Anteriores Juegos</a></li>
                    <li><a href="">Contactos</a></li>
                    <li><a href="">Preguntas Frecuentes</a></li>
                </ul>
            </div>
        </div>
        <p>Todos los derechos Reservados <spam class="glyphicon glyphicon-copyright-mark"></spam> TupollaUSA.com</p>
    </div>
</footer>



<script src="{{asset("js/jquery-1.12.3.min.js")}}"></script>
<script src="{{asset("js/bootstrap.js")}}"></script>
<script src="{{asset("js/jquery.slides.js")}}"></script>

</body>
</html>


