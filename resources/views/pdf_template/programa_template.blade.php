<?php use Carbon\Carbon; ?>


<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pagina Oficial de la Sociedad Mexicana de Angiología, Cirugía Vascular y Endovascular A.C." >
    <meta name="keywords" content="evento médico, veracruz, endovascular, vascular, intervencionismo periférico, amputaciones, mexico" />
    <meta name="author" content="Black Horse Technologies" >
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMACVE | Programa 2020</title>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('images/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('images/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('images/favicon/safari-pinned-tab.svg')}}" color="#800b1d">
    <meta name="msapplication-TileColor" content="#b91d47">
    <meta name="theme-color" content="#ffffff">
    <link rel="shortcut icon" href="{{asset('images/favicon/favicon.ico')}}">

    <style type="text/css">

        @page {
            margin: 2.5cm 1.5cm 2.0cm 1.5cm;
            odd-footer-name: html_myFooter1;
            margin-footer: 1.5cm;     /*  Margen desde la orilla de la página del content del footer  */
            background:url({{asset('plantilla_programa/bg.jpg')}}) ;
            background-image-resolution:300dpi;
            background-image-resize:6;

        }

        body{
            font-family: 'caviardreams', sans-serif;
        }

        .portada{
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .bienvenida{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .directorio{
            padding-top: 40px;
            padding-left: 20px;
            text-align: center;

        }
        .directorio .segmento-directorio{
            margin-bottom: 15px;
            font-size: 11px;
        }


        .cronogramas{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .fecha-evento{
            color:#FFFFFF;
            background-color:#2c3b66;
            font-size: 22px;
            font-weight: bold;
            padding: 5px;
            width: 300px;
            font-family: 'dincondensed', sans-serif;
            padding-left: 60px;
            margin-left: -60px;
        }
        .nombre-sala{
            color:#FFF;
            background-color:#a60000;
            font-size: 16px;
            font-weight: bold;
            font-family: 'dincondensed', sans-serif;
            padding: 5px;
            width: 170px;
            padding-left: 60px;
            margin-left: -60px;
        }
        .nombre-sala .descripcion-sala{
            font-size: 12px;
            font-weight: normal;
            display: block;
        }

        .table-bht-congress{
            margin: 20px 0 40px 30px;
            width: 100%;
            max-width: 100%;
        }
        .table-bht-congress tbody td{
            vertical-align: middle;
            font-size: 10px;
            padding:4px 4px 4px 4px;
            font-family: 'dincondensed', sans-serif;
            color: #000;
        }
        .table-bht-congress tbody tr.bloque{
            vertical-align: middle;
        }
        .table-bht-congress tbody tr.bloque td.nombre-bloque{
            font-size: 14px;
            font-weight: 600;
            color:  #3d1307 !important;
            padding-top: 20px;
        }
        .table-bht-congress tbody tr.bloque td.horario-bloque{
            font-size: 12px;
            font-weight: 600;
            color: #000;
            padding-top: 20px;
        }
        .table-bht-congress tbody tr.bloque td.comite-bloque{
            font-size: 10px;
            font-weight: 400;
            color:  #3d1307 !important;
            padding:0 4px 15px 4px;
        }

        .table-bht-congress tbody td.t_inicio{
            border-right: 2px solid #a60000;
            width: 60px;
        }
        .table-bht-congress tbody td.tema{
            padding-left: 10px;
            border-right: 2px solid  #a60000;
            width: 500px;
        }
        .table-bht-congress tbody td.expositor{
            padding-left: 10px;
        }


        .profesor-nacional{
            float: left;
            width: 33%;
            font-family: 'dincondensed', sans-serif;
            font-size: 11px;
            margin-bottom: 4px;
        }

        .fecha-evento-profesor-internacional{
            color:#FFFFFF;
            background-color:#2c3b66;
            font-size: 22px;
            font-weight: bold;
            padding: 5px;
            width: 300px;
            font-family: 'dincondensed', sans-serif;
            padding-left: 60px;
            margin-left: -60px;
            margin-bottom: 10px; ;
        }
        .profesor-internacional{
            font-family: 'dincondensed', sans-serif;
            font-size: 12px;
            margin-top: 0;
            margin-bottom: 10px;
            text-align: center;
        }

        .profesor-internacional .nombre{
            font-weight: 700;
            margin-bottom: 0;
        }

        .profesor-internacional .pais{
            font-size: 10px;
            font-weight: 700;
            margin-bottom: 0;
            color: #a60000;;
        }


        .text-center{
            text-align: center;
        }

        .page-footer{
            text-align: right;
            font-size: 8px;
            font-weight: bold;
        }

        .salto-pagina-before{
            page-break-before: always;
        }
        .salto-pagina-after{
            page-break-after: always;
        }


    </style>
</head>
<body>


<div class="portada">
    <img src="{{asset('plantilla_programa/portada.jpg')}}"/>
</div>

<div class="salto-pagina-before"></div>
<div class="bienvenida">
    <img src="{{asset('plantilla_programa/bienvenida_drmunoa_parte_1.jpg')}}"/>
</div>

<div class="salto-pagina-before"></div>
<div class="bienvenida">
    <img src="{{asset('plantilla_programa/bienvenida_drmunoa_parte_2.jpg')}}"/>
</div>

<div class="salto-pagina-before"></div>
<div class="directorio">
    <h3 class="text-center"><strong>LII Congreso Internacional de Angiología, Cirugía Vascular y Endovascular Merida 2020</strong></h3>
    <br/><br/>

    <div class="segmento-directorio">
        <strong>Presidente:</strong><br/>
        Dr. José Antonio Muñoa Prado
    </div>
    <div class="segmento-directorio">
        <strong>Vicepresidente:</strong><br/>
        Dr. Carlos Arturo Hinojosa Becerril
    </div>
    <div class="segmento-directorio">
        <strong>Director de programa académico:</strong><br/>
        Dr. Jaime Gerardo Estrada Guerrero
    </div>

    <div class="segmento-directorio">
        <strong>Co-Directores de programa académico:</strong><br/>
        Dr. Erasto Aldrett Lee<br/>
        Dr. Neftalí Rodríguez Ramírez
    </div>

    <div class="segmento-directorio">
        <strong>Comité internacional:</strong><br/>
        Dr. Alejandro Nuricumbo<br/>
        Dra. Nora Sánchez Nicolat
    </div>

    <div class="segmento-directorio">
        <strong>Director de comités de evaluación:</strong><br/>
        Dr. Carlos Arturo Hinojosa Becerril
    </div>

    <div class="segmento-directorio">
        <strong>Comité de evaluación de trabajos de ingreso:</strong><br/>
        Dr. Venancio Pérez Damián<br/>
        Dra. Vanessa Rubio Escudero<br/>
        Dr. Javier Anaya Ayala<br/>
        Dr. Rodrigo Lozano Corona
    </div>

    <div class="segmento-directorio">
        <strong>Comité de evaluación de trabajos libres:</strong><br/>
        Dr. Mario Vázquez Hernández<br/>
        Dr. Alejandro González Ochoa<br/>
        Dr. Rodrigo Garza Herrera
    </div>

    <div class="segmento-directorio">
        <strong>Comité de evaluación de trabajos de video:</strong><br/>
        Dra. Aleyna Fabiola González Ruiz<br/>
        Dra. Tamara Muñoz Martínez
    </div>

    <div class="segmento-directorio">
        <strong>Comité de evaluación de trabajos de cartel:</strong><br/>
        Dr. Jorge García Dávila<br/>
        Dra. Davinia Elizabeth Sámano<br/>
        Dr. Fernando Guardado Bermudez <br/>
        Dr. Jesús Emmanuel Arriaga Caballero
    </div>

    <div class="segmento-directorio">
        <strong>Comité de enlace local:</strong><br/>
        Dr. Gerardo Peón Peralta
    </div>
</div>

<div class="salto-pagina-before"></div>
<div class="bienvenida">
    <img src="{{asset('plantilla_programa/bienvenida_drestrada_2020.jpg')}}"/>
</div>

<h4 class="fecha-evento salto-pagina-before">MIERCOLES 28 DE OCTUBRE</h4>
<table class="table-bht-congress" cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <?php $idBloque = 0; ?>
    @foreach($agenda28 as $conferencia)
        @if($conferencia->idBloque !== $idBloque)
            <?php  $idBloque =  $conferencia->idBloque; ?>
            <tr class="bloque">
                <td colspan="2" class="nombre-bloque">
                    <strong>{!!  $conferencia->bloque!!} </strong>
                </td>
                <td class="horario-bloque">
                    {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioBloque)->format('H:i') }} -
                    {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaFinBloque)->format('H:i') }} HRS CST
                </td>
            </tr>
            <tr class="bloque">
                <td colspan="3" class="comite-bloque">
                    @if(!empty($conferencia->moderador))
                        <strong>MODERADOR:</strong> {{$conferencia->moderador}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista1))
                        <strong>COMENTARISTA 1:</strong> {{$conferencia->comentarista1}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista2))
                        <strong>COMENTARISTA 2:</strong> {{$conferencia->comentarista2}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista3))
                        <strong>COMENTARISTA 3:</strong> {{$conferencia->comentarista4}}<br/>
                    @endif
                </td>
            </tr>
        @endif

        <tr class="conferencia" id="conferencia-{{$conferencia->idConferencia}}">
            <td class="t_inicio">
                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioConferencia)->format('H:i') }}
            </td>
            <td class="tema">{!! $conferencia->tema !!}</td>
            <td class="expositor">{{$conferencia->ponente}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h4 class="fecha-evento">JUEVES 29 DE OCTUBRE</h4>
<table class="table-bht-congress" cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <?php $idBloque = 0; ?>
    @foreach($agenda29 as $conferencia)
        @if($conferencia->idBloque !== $idBloque)
            <?php  $idBloque =  $conferencia->idBloque; ?>
            <tr class="bloque">
                <td colspan="2" class="nombre-bloque">
                    <strong>{!!  $conferencia->bloque!!} </strong>
                </td>
                <td class="horario-bloque">
                    {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioBloque)->format('H:i') }} -
                    {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaFinBloque)->format('H:i') }} HRS CST
                </td>
            </tr>
            <tr class="bloque">
                <td colspan="3" class="comite-bloque">
                    @if(!empty($conferencia->moderador))
                        <strong>MODERADOR:</strong> {{$conferencia->moderador}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista1))
                        <strong>COMENTARISTA 1:</strong> {{$conferencia->comentarista1}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista2))
                        <strong>COMENTARISTA 2:</strong> {{$conferencia->comentarista2}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista3))
                        <strong>COMENTARISTA 3:</strong> {{$conferencia->comentarista4}}<br/>
                    @endif
                </td>
            </tr>
        @endif

        <tr class="conferencia" id="conferencia-{{$conferencia->idConferencia}}">
            <td class="t_inicio">
                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioConferencia)->format('H:i') }}
            </td>
            <td class="tema">{!! $conferencia->tema !!}</td>
            <td class="expositor">{{$conferencia->ponente}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h4 class="fecha-evento">VIERNES 30 DE OCTUBRE</h4>
<table class="table-bht-congress" cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <?php $idBloque = 0; ?>
    @foreach($agenda30 as $conferencia)
        @if($conferencia->idBloque !== $idBloque)
            <?php  $idBloque =  $conferencia->idBloque; ?>
            <tr class="bloque">
                <td colspan="2" class="nombre-bloque">
                    <strong>{!!  $conferencia->bloque!!} </strong>
                </td>
                <td class="horario-bloque">
                    {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioBloque)->format('H:i') }} -
                    {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaFinBloque)->format('H:i') }} HRS CST
                </td>
            </tr>
            <tr class="bloque">
                <td colspan="3" class="comite-bloque">
                    @if(!empty($conferencia->moderador))
                        <strong>MODERADOR:</strong> {{$conferencia->moderador}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista1))
                        <strong>COMENTARISTA 1:</strong> {{$conferencia->comentarista1}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista2))
                        <strong>COMENTARISTA 2:</strong> {{$conferencia->comentarista2}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista3))
                        <strong>COMENTARISTA 3:</strong> {{$conferencia->comentarista4}}<br/>
                    @endif
                </td>
            </tr>
        @endif

        <tr class="conferencia" id="conferencia-{{$conferencia->idConferencia}}">
            <td class="t_inicio">
                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioConferencia)->format('H:i') }}
            </td>
            <td class="tema">{!! $conferencia->tema !!}</td>
            <td class="expositor">{{$conferencia->ponente}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h4 class="fecha-evento">SABADO 31 DE OCTUBRE</h4>
<table class="table-bht-congress" cellpadding="0" cellspacing="0" border="0">
    <tbody>
    <?php $idBloque = 0; ?>
    @foreach($agenda31 as $conferencia)
        @if($conferencia->idBloque !== $idBloque)
            <?php  $idBloque =  $conferencia->idBloque; ?>
            <tr class="bloque">
                <td colspan="2" class="nombre-bloque">
                    <strong>{!!  $conferencia->bloque!!} </strong>
                </td>
                <td class="horario-bloque">
                    {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioBloque)->format('H:i') }} -
                    {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaFinBloque)->format('H:i') }} HRS CST
                </td>
            </tr>
            <tr class="bloque">
                <td colspan="3" class="comite-bloque">
                    @if(!empty($conferencia->moderador))
                        <strong>MODERADOR:</strong> {{$conferencia->moderador}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista1))
                        <strong>COMENTARISTA 1:</strong> {{$conferencia->comentarista1}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista2))
                        <strong>COMENTARISTA 2:</strong> {{$conferencia->comentarista2}}<br/>
                    @endif
                    @if(!empty($conferencia->comentarista3))
                        <strong>COMENTARISTA 3:</strong> {{$conferencia->comentarista4}}<br/>
                    @endif
                </td>
            </tr>
        @endif

        <tr class="conferencia" id="conferencia-{{$conferencia->idConferencia}}">
            <td class="t_inicio">
                {{  Carbon::CreateFromFormat('H:i:s', $conferencia->horaInicioConferencia)->format('H:i') }}
            </td>
            <td class="tema">{!! $conferencia->tema !!}</td>
            <td class="expositor">{{$conferencia->ponente}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h4 class="fecha-evento-profesor-internacional salto-pagina-before">PROFESORES INTERNACIONALES</h4>
@foreach($profesores as $profesor)
    @if($profesor->idPais  > 1)
        <div class="profesor-internacional">
            <div class="nombre">{{$profesor->titulo}}  {{$profesor->apellidoPaterno}} {{$profesor->apellidoMaterno}} {{$profesor->nombre}}</div>
            <div class="pais">{{$profesor->pais}} </div>
        </div>
    @endif
@endforeach


<h4 class="fecha-evento salto-pagina-before">PROFESORES NACIONALES</h4>
<br/><br/><br/><br/>
@foreach($profesores as $profesor)
    @if($profesor->idPais == 1)
        <div class="profesor-nacional">{{$profesor->titulo}}  {{$profesor->apellidoPaterno}} {{$profesor->apellidoMaterno}} {{$profesor->nombre}}</div>
    @endif
@endforeach

<htmlpagefooter name="myFooter1">
    <div class="page-footer">Hoja {PAGENO}{nbpg}</div>
</htmlpagefooter>

</body>
</html>