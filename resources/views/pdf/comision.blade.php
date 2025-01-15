<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{public_path('css/bootstrap.min.css') }}"/>
    <style>
        .container{
            margin-right: 2cm !important;
            margin-left: 1.5cm !important;
        }
        .text-title-primary{
            color: #1d1d1b;
            font-weight: bold;
        }
        .subtitulo{
            margin-top: 30px;
        }
        dd{
            margin-bottom: 10px;
        }
        .pedido{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .firma{
            padding-top: 90px;
            height: 30px;
        }
        .text-bold{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3">
            <img src="{{ $logo }}" alt="Imagen en Base64" width="100px">
        </div>
        <div class="col-xs-9 text-right">
            <div class="h5 text-title-primary">NRO. COMISION</div>
            <div class="h5 text-title-primary"></div>
        </div>
    </div>
    <div class="row justify-center titulo">
        <div class="col-xs-3">
        </div>
        <div class="col-xs-6 text-center">
            <div class="h4 text-title-primary">COMPROBANTE DE COMISION</div>
        </div>
        <div class="col-xs-3">

        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <dt>Fecha:</dt><dd>{{ $comision->fecha }}</dd>
        </div>
        <div class="col-xs-4">
            <dt>Estado:</dt><dd>{{$comision->estado}}</dd>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <dt>Conductor:</dt><dd>{{$comision->conductor->usuario->nombres}}</dd>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <dt>Fecha Inicio:</dt><dd>{{$comision->fecha_inicio}}</dd>
        </div>
        <div class="col-xs-3">
            <dt>Fecha Fin:</dt><dd>{{$comision->fecha_fin}}</dd>
        </div>
        <div class="col-xs-3">
            <dt>Monto Pago:</dt><dd>{{$comision->monto}}</dd>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 firma">
            <div class="text-h6 text-center text-bold">ENTREGUÉ CONFORME</div>
            {{--<div  class="text-center">{{$proyecto->nombre_cliente}}</div>--}}
            {{--<div  class="text-center">{{$proyecto->ci_cliente}}</div>--}}
        </div>
        <div class="col-xs-6 firma">
            <div class="text-h6 text-center text-bold">RECIBÍ CONFORME</div>
            {{--<div class="text-center">{{$ingreso->usuarioRegistroPago->nombreCompleto}}</div>--}}
            {{--<div class="text-center">{{$ingreso->usuarioRegistroPago->numero_documento}}</div>--}}
        </div>
    </div>
    <!-- COPIA -->
    {{--<br>--}}
    {{--<br>--}}
    {{--<br>--}}
    {{--<br>--}}
    {{--<br>--}}
    {{--<div class="row">--}}
        {{--<div class="col-xs-3">--}}
            {{--<img src="{{ $logo }}" alt="Imagen en Base64" width="200px">--}}
        {{--</div>--}}
        {{--<div class="col-xs-9 text-right">--}}
            {{--<div class="h5 text-title-primary">COPIA CLIENTE</div>--}}
            {{--<div class="h5 text-title-primary">{{ $ingreso->codigo }}</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row justify-center titulo">--}}
        {{--<div class="col-xs-3">--}}
        {{--</div>--}}
        {{--<div class="col-xs-6 text-center">--}}
            {{--<div class="h4 text-title-primary">COMPROBANTE DE INGRESO</div>--}}
        {{--</div>--}}
        {{--<div class="col-xs-3">--}}

        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
        {{--<div class="col-xs-4">--}}
            {{--<dt>Fecha:</dt><dd>{{ \Carbon\Carbon::parse($ingreso->fecha_pago)->format('d/m/Y') }}</dd>--}}
        {{--</div>--}}
        {{--<div class="col-xs-4">--}}
            {{--<dt>Estado:</dt><dd>{{$ingreso->estado}}</dd>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
        {{--<div class="col-xs-4">--}}
            {{--<dt>Proyecto:</dt><dd>{{$proyecto->nombre}}</dd>--}}
        {{--</div>--}}
        {{--<div class="col-xs-8">--}}
            {{--<dt>Concepto:</dt><dd>{{$ingreso->concepto}}</dd>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
        {{--<div class="col-xs-3">--}}
            {{--<dt>Monto Pago:</dt><dd>{{$ingreso->monto_pago}}</dd>--}}
        {{--</div>--}}
        {{--<div class="col-xs-3">--}}
            {{--<dt>Total:</dt><dd>{{(floatval($proyecto->presupuesto)* floatval($proyecto->utilidad))+floatval($proyecto->presupuesto)}}</dd>--}}
        {{--</div>--}}
        {{--<div class="col-xs-3">--}}
            {{--<dt>A cuenta:</dt><dd>{{$proyecto->ingreso}}</dd>--}}
        {{--</div>--}}
        {{--<div class="col-xs-3">--}}
            {{--<dt>Saldo:</dt><dd>{{ (floatval($proyecto->presupuesto)* floatval($proyecto->utilidad))+floatval($proyecto->presupuesto) - floatval($proyecto->ingreso)}}</dd>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
        {{--<div class="col-xs-6 firma">--}}
            {{--<div class="text-h6 text-center text-bold">ENTREGUÉ CONFORME</div>--}}
            {{--<div  class="text-center">{{$proyecto->nombre_cliente}}</div>--}}
            {{--<div  class="text-center">{{$proyecto->ci_cliente}}</div>--}}
        {{--</div>--}}
        {{--<div class="col-xs-6 firma">--}}
            {{--<div class="text-h6 text-center text-bold">RECIBÍ CONFORME</div>--}}
            {{--<div class="text-center">{{$ingreso->usuarioRegistroPago->nombreCompleto}}</div>--}}
            {{--<div class="text-center">{{$ingreso->usuarioRegistroPago->numero_documento}}</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
</body>
</html>