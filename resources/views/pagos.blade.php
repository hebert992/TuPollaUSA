@extends("layouts.app2")
@section('content')
<p>
<h3 class="text-center">Pagos con Targeta de credito</h3>
Los pagos con targeta de credito a TupollaUSA.com son gestionados a traves de la plataforma de mercadopago, es muy facil, solo tienes que selecionar la cantidad de coins a recargar y se te sera redirigido a la pagina de mercado pago  donde podras ingresar tus datos y hacer el correspondiente pago con TDC y seran acreditados en tu cuenta de TupollaUSA
</p>
<div class="panel panel-default">
    <form action="{{url("/mercadopago/pagar")}}" method="post">
        {{csrf_field()}}
    <select class="form-control" name="cantidad">
        @for($a=1;$a<11;$a++)

                <option value="{{$a}}">{{$a}}</option >

        @endfor
    </select>
<button type="submit">
    <a mp-mode="dftl"  name="MP-payButton" class='blue-ar-l-rn-none'>Pagar</a>
</button>
    </form>
</div>

@endsection