@extends('layouts.app2')
@include("parcial.Mensajes")
@section('content')
    <h3 class="text-center">Reglas</h3>

    <ul>
        <li>1.-Cada Apostador debe registrar su Stud (Que es el nombre de su polla) para que pueda estar identificado.</li></br>
        <li>2.-La polla Jugará con las 6 ultimas carreras todos los Sábados del hipódromo seleccionado para la semana , las carreras válidas serán publicadas en nuestra página desde el jueves. (Programa)</li></br>
        <li>3.-Cada Stud debe seleccionar 1 Ejemplar por carrera, para acumular 6 ejemplares seleccionados.</li></br>
        <li>4.-Si el ejemplar seleccionado es retirado , le corresponderá el ejemplar de abajo, por ejemplo si su ejemplar seleccionado es el nro 4 y es retirado , le corresponderá el nro 5 y así sucesivamente.</li></br>
        <li>5.-El monto total a repartir al ganador(es) será anunciado antes de la primera carrera válida para la polla , siempre se tendrá un monto mínimo garantizado. (Adicional)</li></br>
        <li>6.-El monto total a repartir será solo para el primer lugar (El Stud con más puntaje) en caso de que exista empate se divide entre los ganadores.</li></br>
        <li>7.-El puntaje será de acuerdo al dividendo oficial del Hipodromo, solo obtendrán puntos los ejemplares que lleguen en los 3 primeros lugares, WIN(Ganador) PLACE(Segundo) Y SHOW(Tercero) , el que acierte al ejemplar ganador obtiene los puntos del dividendo de del ejemplar que llegue primero WIN (Ganador)  , el que acierte el ejemplar que llegue segundo lugar obtiene los puntos del dividendo de PLACE (Segundo Lugar) y el que acierte el ejemplar que arribe de tercero obtendrá los puntos del dividendo de SHOW (Tercer Lugar), los ejemplares que lleguen del 4to lugar hacia atrás no obtienen puntuación en esa carrera. Los puntos se irán acumulando para tener una puntuación total al finalizar la 6ta carrera válida para la polla, el ganador es el que acumule más puntos (suma de dividendos en las 6 carreras).</li></br>

    </ul>
@endsection
