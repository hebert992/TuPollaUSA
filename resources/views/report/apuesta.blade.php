<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Confirmacion de polla</title>

</head>
<body>

<main >
    <div style="text-align:center;">
    <div id="details" class="clearfix">
        <div id="invoice">
            <h1>ID Polla: {{ $factura->id_apuesta }}</h1>
            <h2 class="date">Stud: {{ \App\User::find($factura->id_cliente)->nick }}</h2>
            <div class="date">Fecha: {{ $factura->created_at }}</div>

        </div>
    </div>

    <table border="0" cellspacing="0" cellpadding="0">

        <tr>
            <th >#</th>
            <th >Apuesta</th>
            <th>Caballo</th>

        </tr>



        <tr>
            <td >{{1 }}   ---   </td>

            <td>{{ $po= \App\pollas::find($factura->id_polla1)->name }}   ---    </td>
            <td >{{ $cab1= \App\caballos::find($factura->id_caballo1)->posicion }} {{\App\caballos::find($factura->id_caballo1)->name}}</td>
        </tr>
        <tr>
            <td >{{2 }}   ---   </td>

            <td>{{ $po1= \App\pollas::find($factura->id_polla2)->name }}   ---    </td>
            <td >{{ $cab1= \App\caballos::find($factura->id_caballo2)->posicion }} {{\App\caballos::find($factura->id_caballo2)->name}}</td>
        </tr>
        <tr>
            <td >{{3 }}   ---   </td>

            <td>{{ $p2= \App\pollas::find($factura->id_polla3)->name }}   ---    </td>
            <td >{{ $cab1= \App\caballos::find($factura->id_caballo3)->posicion }} {{\App\caballos::find($factura->id_caballo3)->name}}</td>
        </tr>
        <tr>
            <td >{{4 }}   ---   </td>

            <td>{{ $p3= \App\pollas::find($factura->id_polla4)->name }}   ---    </td>
            <td >{{ $cab1= \App\caballos::find($factura->id_caballo4)->posicion }} {{\App\caballos::find($factura->id_caballo4)->name}}</td>
        </tr>
        <tr>
            <td >{{5 }}   ---   </td>

            <td>{{ $po= \App\pollas::find($factura->id_polla5)->name }}   ---    </td>
            <td >{{ $cab1= \App\caballos::find($factura->id_caballo5)->posicion }} {{\App\caballos::find($factura->id_caballo5)->name}}</td>
        </tr>
        <tr>
            <td >{{6 }}   ---   </td>

            <td>{{ $po= \App\pollas::find($factura->id_polla6)->name }}   ---    </td>
            <td >{{ $cab1= \App\caballos::find($factura->id_caballo6)->posicion }} {{\App\caballos::find($factura->id_caballo6)->name}}</td>
        </tr>



    </table>
</div>


 <div style="text-align:right;">
    @if($factura->id_master != null)
         Facturado por: {{\App\User::find($factura->id_master)->nick}}

    @else
        Facturado por: WEB
   @endif
</div>
</body>

</html>