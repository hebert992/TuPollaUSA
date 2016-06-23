<!DOCTYPE html>
<html lang="ES">
<head>



    <meta charset="utf-8">
    <title>Tu Polla USA</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset("css/bootstrap.css")}}">
    <link rel="shortcut icon" href="{{asset("img/logo.png")}}" type="img/x-icon">
    <link rel="stylesheet" href="{{asset("css/estilos.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset('DateTimePicker/jquery.datetimepicker.css')}}"/>
    <link rel="stylesheet" href="{{asset("css/Chat.css")}}">

    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker.standalone.css')}}">
    <script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/Chat.js')}}"></script>
    <script src="{{asset('js/Noticias.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
    <!-- TIMEPICKER -->

</head>

<body>


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
        <a class="navbar-brand" href="{{url("/")}}">TupollaUSA</a>
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
                    <li><a href="{{url("/mercadopago")}}">Mercado Pago</a></li>
                </ul>
            </li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{url("/register")}}"><spam class="glyphicon glyphicon-pencil"></spam> Registro</a></li>
                <li><a href="{{url("/login")}}"><spam class="glyphicon glyphicon-user"></spam> Entrar</a></li>
            @else

                <li><a class="">Coins : {{Auth::user()->coins }}</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->nick }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        @if( Auth::user()->rol=="admin")
                            <li><a href="{{ url('/admin/usuarios') }}"><i class="glyphicon glyphicon-user"></i>Stud</a></li>
                            <li><a href="{{ url('/admin/tiendas') }}"><i class="glyphicon glyphicon-home"></i>Tiendas</a></li>
                            <li><a href="{{ url('/admin/polla') }}"><i class="glyphicon glyphicon-th-list"></i>Carreras</a></li>
                            <li><a href="{{ url('/admin/recargas') }}"><i class="glyphicon glyphicon-usd"></i>Recargas</a></li>
                            <li><a href="{{ url('/noticias') }}"><i class="glyphicon glyphicon-envelope"></i>Noticias</a></li>
                            <li><a href="{{ url('/usuario/apuestas') }}"><i class="glyphicon glyphicon-th-list"></i>Historial de Pollas</a></li>
                            <li><a href="{{ url('/admin/apuestas/list') }}"><i class="glyphicon glyphicon-th-list"></i>Ultimas de Apuestas</a></li>
                            <li><a href="{{ url('/admin/config') }}"><i class="glyphicon glyphicon-floppy-open"></i>Configuracion</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-off"></i>Salir</a></li>
                        @endif
                        @if( Auth::user()->rol=="tienda")
                            <li><a href="{{ url('/tienda/usuarios') }}"><i class="glyphicon glyphicon-user"></i>Stud</a></li>
                            <li><a href="{{ url('/usuario/apuestas') }}"><i class="glyphicon glyphicon-th-list"></i>Historial de Pollas</a></li>
                                <li><a href="{{ url('/admin/apuestas/list') }}"><i class="glyphicon glyphicon-th-list"></i>Ultimas de Apuestas</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-off"></i>Salir</a></li>
                        @endif

                        @if(Auth::user()->rol=="usuario")
                            <li><a href="{{ url('/usuario/apuestas') }}"><i class="glyphicon glyphicon-th-list"></i>Historial de Pollas</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="glyphicon glyphicon-off"></i>Salir</a></li>
                        @endif
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>




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
                    <img src="{{url("img/slide/1.jpg")}}" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="{{url("img/slide/2.jpg")}}" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="{{url("img/slide/3.jpg")}}" alt="...">
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
    @include("parcial.Mensajes")

    <div class="row">
        <div class="panel2 color1 col-md-4">
            <p>
            <div class ="page-header">
                <h3><a href="#">Chat TuPollaUSA</a></h3>
            </div>

            @if (Auth::guest())
              <center>
                <p><h2><b>Porfavor</b> </h2></p>
                <p><h4><b>Inicia sesion para usar el Chat</b></h4></p>
                <p><h4><b>TuPollaUSA</b></h4></p>
              </center>
        </div>

            @else

                    <div class="msg_wrap">
                        <div id="chat" class="msg_body">

                        </div>
                        <div class="msg_footer"><textarea class="msg_input" rows="4"></textarea></div>
                    </div>
                </div>

                @endif




        <div class="panel3 col-md-8 content ">

            @yield("content")




    </div>



        <div class="clearfix"></div>

</div>
    <div class="row">
        <div class="panel col-xs-12 col-sm-6 col-md-4">

            <a class="twitter-timeline" data-lang="es" data-width="390" data-height="390" href="https://twitter.com/tupollausa">Tweets by tupollausa</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>

        <div class="panel col-xs-12 col-sm-6 col-md-4" id="fb-root">
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=180878419840";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>


            <div class="fb-page" data-href="https://www.facebook.com/tupollausa" data-tabs="timeline" data-width="390" data-height="397" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/tupollausa" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/tupollausa">Tupollausa.com</a></blockquote></div>


        </div>
        <div class="panel color1 col-xs-12 col-sm-6 col-md-4" style="height:397px">
            <p>
            <div class ="page-header">
                <h3><a href="#" target="_blank">Noticias al dia </a></h3>
            </div>

            <ul>
                <div class="noticias" id="noticias">

                </div>
            </ul>

    </div>
</div>
</div>
<footer class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul>
                    <li><a href="#">Juegos Anteriores</a></li>
                    <li><a href="#"></a>Contactanos</li>
                    <li><a href="#">Formas de Pago</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <img src="{{url("img/fotter.jpg")}}" alt="No disponible">
            </div>
            <div class="col-md-4">
                <ul>
                    <li><a href="{{url("comojugar")}}">¿Como Jugar?</a></li>
                    <li><a href="{{url("/reglas")}}">Reglas</a></li>
                    <li><a href="#">Preguntas Frecuentes</a></li>
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
