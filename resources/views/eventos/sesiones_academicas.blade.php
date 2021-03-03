@extends('layouts.template_01')

@section('title','Sesiones academicas')

@section('css')
    <script type="text/javascript" src="{{asset('libraries/js-marker-clusterer/src/markerclusterer.js')}}"></script>
    <style>
        .btn-actions{
            background-color: #d0ad55 !important;
            color:white;
            padding: 10px;
        }
        .btn-actions:hover {
            color:white;
        }
    </style>
@endsection

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_eventos.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Sesiones Academicas</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Sesiones Academicas</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center margin-50px-bottom sm-margin-30px-bottom">
                <div class="col-lg-12">
                    <h5 class="text-uppercase">Sesiones academicas</h5>
                    <p>
                        <span class="fa fa-quote-left margin-10px-right font-size20"></span>
                        Para SMACVE es fundamental fortalecer el aprendizaje con las teorías, casos y experiencias que se comparten y debaten en congresos y seminarios, por ello año con año hacemos el esfuerzo para que nuestros doctores asistan a los eventos más importantes en el mundo, con el fin de obtener nuevos conocimientos, tecnicas e instrumentos que nos ayuden a mejorar día con día nuestra labor.
                        <span class="fa fa-quote-right margin-10px-left font-size20"></span>
                    </p>
                </div>
            </div>
            <div class="row justify-content-center margin-50px-bottom sm-margin-30px-bottom">
                <div class="col-lg-8 col-sm-8">
                    <div class="row">
                        <div class="col-12 mb-2 d-flex justify-content-between align-items-center">
                            <h4>Próximas Sesiones</h4>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Evento</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>18/02/2021</td>
                                    <td>
                                        Pie diabético otra pandemia en México, el manejo del cirujano vascular <br>
                                        <small style="font-weight: bold;">Dr. Gerardo Morales Galina</small> <br>
                                        <small style="font-weight: bold;">Dr. Juaquín Becerra Bello</small>
                                    </td>
                                    <td>
                                        <a href="http://bit.ly/37a24yL"  target="_blank" class="btn disabled btn-dark btn-sm">Confirma tu asistencia</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>25/02/2021</td>
                                    <td>
                                        De la teoría a la practica del pie diabético por el cirujano vascular.<br>
                                        <small style="font-weight: bold;">Dr. Paulo Cesar Olvera Hernández.</small> <br>
                                        <small style="font-weight: bold;">Dr. Marco Ruiz Blas.</small>
                                    </td>
                                    <td>
                                        <a href="http://bit.ly/sesion_academica_02" target="_blank" class="btn btn-actions btn-sm">Confirma tu asistencia</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="owl-carousel owl-theme"  id="regional-carousel">
                        <div class="item"><img src="{{asset('eventos_views/sesiones/s_2.jpeg')}}" alt="Ciudad de México" /></div>
                        <div class="item"><img src="{{asset('eventos_views/sesiones/s_1.jpeg')}}" alt="Ciudad de México" /></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-eventos" />

@endsection


@section('javascript')
    <!-- Clave API  AIzaSyD8qcmSDv99YKxFFfBJEfU9bkU0EqQYqAo  -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8qcmSDv99YKxFFfBJEfU9bkU0EqQYqAo&callback=initMap"></script>


    <script src="{{asset('js/eventos.js')}}" type="text/javascript"></script>
@endsection
