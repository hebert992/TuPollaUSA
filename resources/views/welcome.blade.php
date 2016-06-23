@extends('layouts.app')

@section('content')
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

        <p>
        <h3 class="text-center">Inicio</h3>
        Contenido Variado de informacion relevante a las pollas, premios, promociones, etc.... se pueden usar imagenes etc....
        solo contenido informativo debido a que las cosas relevantes van a estar en los sub menus dependiendo de las apuestas que quiera hacer!
        </p>
        <div class="panel panel-default">
            <div class="panel-heading">Proximas Carreras (tabla de muestra)</div>
            <div class="panel-body">
                <p>
                    Esto es una Tabla de muestra de como se publicaran los caballos en cada una de las carreras que se van a publicar para las apuestas
                </p>

            </div>


            <table class="table table-striped table-hover">
                <tr>
                    <td><b>Puerta</b></td>
                    <td><b>Caballo</b></td>
                    <td><b>Jinete</b></td>
                    <td><b>Entrenador</b></td>
                    <td><b>MI</b></td>
                    <td><b>WIN</b></td>
                </tr>
                <tr>
                    <td class="caballo1"><b>1</b></td>
                    <td>LOTTERY TICKET</td>
                    <td>Leyva</td>
                    <td>ETC</td>
                    <td>5/1</td>
                    <td>WIN</td>
                </tr>
                <tr>
                    <td class="caballo2"><b>2</b></td>
                    <td>ROYAL MAJESTIC</td>
                    <td>Meneses</td>
                    <td>ETC</td>
                    <td>30/1</td>
                    <td>WIN</td>
                </tr>
                <tr>
                    <td class="caballo3"><b>3</b></td>
                    <td>EXTREME JUSTICE</td>
                    <td>Cruz</td>
                    <td>ETC</td>
                    <td>10/1</td>
                    <td>WIN</td>
                </tr>
                <tr>
                    <td class="caballo4"><b>4</b></td>
                    <td>CAPE DYSNASTY</td>
                    <td>Gaffalione</td>
                    <td>ETC</td>
                    <td>6/1</td>
                    <td>WIN</td>
                </tr>
                <tr>
                    <td class="caballo5"><b>5</b></td>
                    <td>CONQUEST CHERIMASH</td>
                    <td>Trujillo</td>
                    <td>ETC</td>
                    <td>8/1</td>
                    <td>WIN</td>
                </tr>
                <tr>
                    <td class="caballo6"><b>6</b></td>
                    <td>SPEIGHSHILL</td>
                    <td>Sanchez</td>
                    <td>ETC</td>
                    <td>10/1</td>
                    <td>WIN</td>
                </tr>

                <tr>
                    <td class="caballo7"><b>7</b></td>
                    <td>VEES BOY</td>
                    <td>Castro</td>
                    <td>ETC</td>
                    <td>3/1</td>
                    <td>WIN</td>
                </tr>
                <tr>
                    <td class="caballo8"><b>8</b></td>
                    <td>EL RUSTICO</td>
                    <td>Rios</td>
                    <td>ETC</td>
                    <td>20/1</td>
                    <td>WIN</td>
                </tr>
                <tr>
                    <td class="caballo9"><b>9</b></td>
                    <td>KEEPTHEDREAMALIVE</td>
                    <td>Jaramillo</td>
                    <td>ETC</td>
                    <td>4/1</td>
                    <td>WIN</td>
                </tr>
                <tr>
                    <td class="caballo10"><b>10</b></td>
                    <td>FASTNET LATINA</td>
                    <td>Zoyas</td>
                    <td>ETC</td>
                    <td>10/1</td>
                    <td>WIN</td>
                </tr>

            </table>
        </div>

    <div class="clearfix"></div>



@endsection
