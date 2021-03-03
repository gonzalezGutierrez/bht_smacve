@extends('layouts.template_01')

@section('title','ExPresidentes')

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_acerca_de.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Ex Presidentes</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Acerca de</a></li>
                        <li><a href="javascript:void(0)">Ex Presidentes SMACVE</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
              @foreach($expresidentes as $expresidente)
                <div class="col-lg-3 col-md-4 col-xs-6 margin-50px-bottom sm-margin-20px-bottom text-center">
                    <div class="team-style3">
                        <div class="team-member-img">
                            <img class="img-responsive" src="{{asset('images/expresidentes/'.$expresidente->foto)}}" alt="">
                            <div class="team-description">
                                <div class="team-description-wrapper">
                                    <div class="team-description-content">
                                        <p class="about-me">Presidente SMACVE <br/> {{$expresidente->inicio}} -  {{$expresidente->fin}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-cover"></div>
                        </div>
                        <div class="text-center margin-15px-top xs-margin-15px-top">
                            <div class="member-name alt-font text-extra-gray">{{$expresidente->nombre}} {{$expresidente->apellidoPaterno}} {{$expresidente->apellidoMaterno}}</div>
                            <div class="years">{{$expresidente->inicio}} -  {{$expresidente->fin}}</div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-acerca-de" />

@endsection


@section('javascript')

@endsection