@extends('layouts.template_01')

@section('title','Códigos de Ética')

@section('css')
    <style type="text/css">
        ul.vinetas{
            padding-left:40px;
        }
        ul.vinetas li {
            list-style: circle;
            text-align: justify;
        }

        ol.romanos{
            padding-left:40px;
        }
        ol.romanos li{
            list-style: upper-roman;
            text-align: justify;
        }

    </style>
@endsection

@section('content')

    <section class="page-title-section bg-img cover-background" data-overlay-dark="4" data-background="{{asset('images/bg/bg_acerca_de.jpg')}}">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Aviso de Privacidad</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{asset('/')}}">Inicio</a></li>
                        <li><a href="javascript:void(0)">Acerca de</a></li>
                        <li><a href="javascript:void(0)">Códigos de Ética</a></li>
                        <li><a href="javascript:void(0)">Aviso de Privacidad</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 padding-50px-right md-padding-30px-right sm-padding-15px-right">
                    <h6 class="font-weight-700 font-size16 sm-font-size14 text-uppercase left-title margin-20px-bottom">CÓDIGOS DE ÉTICA</h6>
                    <div class="single-sidebar-menu">
                        <ul class="no-margin">
                            <li><a href="{{asset('acerca_de/codigos_etica/mesa_directiva')}}">Mesa Directiva</a></li>
                            <li><a href="{{asset('acerca_de/codigos_etica/derechos_medicos')}}">Médicos</a></li>
                            <li><a href="{{asset('acerca_de/codigos_etica/derechos_pacientes')}}">Pacientes</a></li>
                            <li><a href="{{asset('acerca_de/codigos_etica/aviso_privacidad')}}">Aviso de Privacidad</a></li>
                            <li class="active"><a href="{{asset('acerca_de/codigos_etica/politica_conflictos')}}">Política sobre Conflictos</a></li>
                        </ul>
                    </div>
                    <div class="bg-img cover-background theme-overlay border-radius-5 margin-30px-bottom sm-margin-25px-bottom" data-overlay-dark="8" data-background="{{asset('images/bg/bg2.jpg')}}" >
                        <div class="position-relative z-index-9 text-center padding-50px-tb md-padding-40px-tb sm-padding-30px-tb padding-30px-lr">
                            <i class="fas fa-headset font-size50 md-font-size46 sm-font-size42 text-white margin-15px-bottom"></i>
                            <h5 class="text-white font-weight-600 margin-5px-bottom">¿Tienes alguna duda?</h5>
                            <p class="text-white font-weight-500">¡Contáctanos!</p>
                            <div class="bg-white separator-line-horrizontal-full opacity3 margin-20px-bottom sm-margin-15px-bottom"></div>
                            <ul class="text-center no-padding no-margin">
                                <li class="text-white margin-5px-bottom"><i class="fa fa-phone font-size16 text-white margin-15px-right"></i><a href="tel:015526147849 " class="text-white">01 55 2614 7849</a></li>
                                <li class="text-white"><i class="fa fa-envelope-open font-size16 text-white margin-15px-right"></i><a href="mailto:mail@example.com" class="text-white">atencionalsocio@smacve.org.mx</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="section-heading left">
                        <h4>Política sobre conflictos</h4>
                    </div>
                    <p class="text-justify">El objetivo general de establecer pautas para manejar posibles conflictos es mantener la confianza pública en la Sociedad y proteger la investidura de la mesa directiva asegurando que la integridad de los procesos de toma de decisiones por parte del liderazgo de la SMACVE no esté sesgada por factores financieros, profesionales o de algún otro tipo de interés. </p>
                    <p class="text-justify">Como administradores de la Sociedad, el liderazgo tiene la obligación de mantener el más alto estándar de conducta en la ejecución de sus funciones y responsabilidades en nombre de la SMACVE. Los conflictos de compromiso, ya sean percibidos o reales, pueden influir en la toma de decisiones y afectar negativamente a la organización.</p>
                    <p class="text-justify"><strong>Principios generales</strong></p>
                    <p class="text-justify">El liderazgo de la SMACVE se define como cualquier individuo que sirva en la Junta Directiva, consejos, comités, grupos de trabajo, comités ad hoc o en cualquier otra capacidad voluntaria para la Sociedad, sus publicaciones, Fundación o PSO. Un conflicto de intereses o compromiso es una circunstancia o situación que se presenta cuando la responsabilidad principal de un individuo de proporcionar decisiones, juicios u opiniones imparciales e imparciales en nombre de la SMACVE puede verse influenciada por un factor secundario. Los problemas surgen si los intereses secundarios influyen o parecen influir en la responsabilidad principal. </p>
                    <p class="text-justify">El conflicto de interés se define, por tanto, como un interés que podría afectar o podría parecer que afecta el juicio o la buena conducta de algún o algunos miembros, en perjuicio de los intereses de la Sociedad. Los conflictos pueden ser financieros o pueden derivarse de posiciones de liderazgo en otras organizaciones donde existe un potencial de competencia de intereses.</p>
                    <p class="text-justify">El liderazgo de la SMACVE evitará conflictos entre el bienestar de la SMACVE y su propio beneficio económico personal u otras responsabilidades. Esto se aplicará para cumplir con sus obligaciones, tomar decisiones y expresar sus puntos de vista en nombre de la SMACVE. Los siguientes principios y pautas abordan los conflictos de compromiso. El liderazgo de la SMACVE debe:</p>
                    <ul class="vinetas">
                        <li>Poner los intereses de la SMACVE en primer lugar mientras desempeña los deberes y responsabilidades de su función de SMACVE.</li>
                        <li>Ser justo y respetar los derechos de los demás en el desempeño de sus responsabilidades de SMACVE.</li>
                        <li>Ejercer la debida diligencia y competencia razonable en la conducción de los asuntos comerciales de la SMACVE, actuando siempre con buena fe e integridad.</li>
                        <li>Apoyar las acciones del organismo colectivo en el que están sirviendo, incluso si difieren de su posición personal, a menos que las acciones sean ilegales, poco éticas o inapropiadas.</li>
                        <li>Al realizar reuniones, ser inclusivo y fomentar una discusión abierta y sincera.</li>
                        <li>Mantener la confidencialidad de los procedimientos de la reunión; No comparta, copie, reproduzca, transmita ni divulgue información confidencial o trabajos en progreso relacionados con los negocios de la SMACVE (a menos que la ley lo exija o lo indique la Junta Directiva).</li>
                        <li>Revelar los posibles conflictos de interés que surjan en la conducción de los negocios de la SMACVE y abstenerse de discutir y / o votar sobre el asunto según sea necesario.</li>
                        <li>Cumplir con las pautas para las relaciones financieras con la industria incluidas en esta política.</li>
                        <li>Cumplir con todas las demás políticas de la SMACVE relacionadas con el desempeño de sus funciones y responsabilidades en nombre de la SMACVE; Esto incluye, entre otros, la Política antimonopolio de SMACVE, la Política de protección de denunciantes y la Política contra el acoso.  </li>
                    </ul>
                    <div class="space20"></div>
                    <h5>Relaciones Financieras con la Industria</h5>

                    <p><strong>Liderazgo de la sociedad</strong></p>
                    <p class="text-justify">A.	Ningún funcionario de la SMACVE puede tener relación financiera directa con la industria durante su período de servicio.</p>
                    <ol class="romanos">
                        <li>Los funcionarios incluyen presidente, vicepresidente, secretario y tesorero.</li>
                        <li>Una relación financiera directa implica una relación contractual económica en la que se recibe una contraprestación económica por evento o por un tiempo definido. </li>
                        <li>Los funcionarios tienen seis meses para terminar cualquier relación financiera directa después de la elección para el cargo.</li>
                        <li>Los funcionarios de la SMACVE pueden aceptar apoyo para la investigación siempre que el dinero de la subvención se pague a la institución (por ejemplo, un centro médico académico) donde se realiza la investigación, no al individuo. No obstante, el apoyo para la investigación, los servicios no compensados y otras relaciones permitidas deben ser divulgadas a la Sociedad. </li>
                        <li>Las excepciones a cualquiera de los anteriores se pueden apelar ante el Comité de Conflicto de Intereses y Conducta Profesional de la SMACVE (Sección XV), quien hará recomendaciones a la Junta Directiva.</li>
                    </ol>

                    <p class="text-justify">B.	Todas las personas que prestan servicios en calidad de voluntario según se define en los Principios Generales o la capacidad del personal de la SMACVE, sus publicaciones, la Fundación o la PSO completarán el Formulario de conflicto de intereses de la SMACVE anualmente y antes de asumir sus responsabilidades. El formulario será revisado por el Comité de Conflicto de Intereses y Conducta Profesional de la SMACVE.</p>
                    <p class="text-justify">C.	Funcionarios de la SMACVE, miembros de la Junta Ejecutiva y de la Junta de Directores Estratégicos, el Comité del Programa de CA-SMACVE21, el Comité de Educación de Postgrado, el Comité de Educación, el Comité Ejecutivo de PSO y los miembros del Comité Directivo de la Industria de PSO y otros líderes de la SMACVE (por ejemplo, editores de RMA, presidentes del consejo y comité) pueden asistir pero no pueden participar en simposios satelitales del Congreso Anual Vascular (CA-SMACVE21) o cualquier evento promocional / de marketing celebrado en la sala de exhibiciones en CA-SMACVE21 como oradores, moderadores u otros participantes importantes, ya que esto da la apariencia de que SMACVE está respaldando productos de la compañía ).</p>
                    <p class="text-justify">D.	Los presidentes y copresidentes del Comité del Programa de CA-SMACVE21, el Comité de Educación de Postgrado y el Comité de Educación pueden no tener relaciones financieras directas con la industria.</p>
                    <p class="text-justify">E.	La mayoría de los miembros del Comité del Programa CA-SMACVE21, el Comité de Educación de Postgrado y el Comité de Educación pueden no tener relaciones financieras directas con la industria.</p>
                    <ol class="romanos">
                        <li>Los presidentes que deseen servir tienen seis meses para terminar cualquier relación financiera directa después del nombramiento.</li>
                        <li>Los presidentes y los miembros del comité pueden aceptar apoyo para la investigación siempre que el dinero de la subvención se pague a la institución (por ejemplo, un centro médico académico) donde se realiza la investigación, no al individuo. No obstante, el apoyo a la investigación, los servicios no compensados y otras relaciones permitidas deben comunicarse a la Sociedad. Los presidentes y copresidentes de los grupos de redacción de directrices y medidas no deben tener relaciones con la industria.</li>
                    </ol>
                    <p class="text-justify">G.	Los presidentes y copresidentes de los comités o grupos de redacción relacionados con el desarrollo de directrices, supervisión de documentos, medidas de desempeño o resultados pueden no tener relaciones financieras directas con la industria.</p>
                    <p class="text-justify">H.	La mayoría de los miembros del grupo / comité de redacción pueden no tener relaciones financieras directas con la industria que sea relevante para el tema de la Guía. Si un miembro revela una relación financiera directa con la industria por un producto no relacionado con el tema del documento, esto aún constituye un conflicto de intereses.</p>
                    <ol class="romanos">
                        <li>Los presidentes que deseen servir tienen seis meses para terminar cualquier relación financiera directa después del nombramiento.</li>
                        <li>Los presidentes y los miembros del grupo de redacción pueden aceptar apoyo para la investigación siempre que el dinero de la subvención se pague a la institución (por ejemplo, un centro médico académico) donde se realiza la investigación, no al individuo. No obstante, el apoyo a la investigación, los servicios no compensados y otras relaciones permitidas deben ser divulgadas a la Sociedad.</li>
                    </ol>
                    <p class="text-justify">I.	Los miembros del personal de SMACVE, incluida la Fundación, las publicaciones de SMACVE y el personal de PSO tienen prohibido tener relaciones financieras directas con la industria; Además, los miembros del personal de SMACVE deben adherirse a la Política de obsequios para proveedores de SMACVE incluida en el manual del empleado de SMACVE.</p>
                    <p class="text-justify">J.	Al comienzo de las reuniones de liderazgo de la SMACVE (reuniones de la Junta Directiva, consejos, comités, etc.), el presidente / presidente revisará las divulgaciones de conflictos de intereses de los asistentes y recordará a los participantes la Política de conflictos de la SMACVE. Durante las discusiones que involucran a la industria donde existe un posible conflicto de intereses con un asistente, el individuo debe recusarse.</p>

                    <div class="space20"></div>
                    <p><strong>Liderazgo de publicaciones de SMACVE</strong></p>
                    <p class="text-justify">A.	Los Editores de RMA pueden no tener relaciones financieras directas con la industria durante sus términos de servicio.   </p>
                    <ol class="romanos">
                        <li>Los "editores de la Revista Mexicana de Angiología (RMA)" incluyen a los editores senior, editores asociados y editores asistentes de la Revista Mexicana de Angiología y Boletín de la Sociedad Mexicana de Angiología y Cirugía Vascular.</li>
                        <li>Se espera que todos los autores y revisores de los envíos a RMA sigan las instrucciones para los autores y las políticas editoriales establecidas por RMA.</li>
                    </ol>
                    <p class="text-justify">B.	Los editores del libro de texto de Rutherford y VESAP pueden no tener relaciones financieras directas con la industria durante su período de servicio.</p>
                    <ol class="romanos">
                        <li>Los editores deben terminar cualquier relación financiera directa dentro de los seis meses posteriores a su nombramiento.</li>
                        <li>Los editores pueden aceptar apoyo para la investigación siempre que el dinero de la subvención se pague a la institución (por ejemplo, un centro médico académico) donde se realiza la investigación, no al individuo. No obstante, el apoyo a la investigación, los servicios no compensados y otras relaciones permitidas deben comunicarse a la Sociedad.</li>
                        <li>Las excepciones a cualquiera de los anteriores se pueden apelar ante el Comité de Conflicto de Intereses y Conducta Profesional de la SMACVE (Sección III), quien hará recomendaciones a la Junta Directiva.</li>
                    </ol>
                    <p class="text-justify">C.	Todos los editores completarán el Formulario de conflicto de intereses de la SMACVE anualmente y antes de asumir sus responsabilidades. El formulario será revisado por el Comité de Conflicto de Intereses y Conducta Profesional de la SMACVE.</p>

                    <div class="space20"></div>
                    <p><strong>Liderazgo de PSO</strong></p>
                    <p class="text-justify">A.	Los miembros del Comité Ejecutivo de SMACVE PSO pueden no tener relaciones financieras directas con la industria.</p>
                    <ol class="romanos">
                        <li>Los miembros del Comité Ejecutivo de SMACVE PSO tienen seis meses para terminar cualquier relación financiera directa después de la elección para el cargo.   </li>
                        <li>Los miembros del Comité Ejecutivo de SMACVE PSO pueden aceptar apoyo para la investigación siempre que el dinero de la subvención se pague a la institución (por ejemplo, un centro médico académico) donde se realiza la investigación, no al individuo. No obstante, el apoyo a la investigación, los servicios no compensados y otras relaciones permitidas deben comunicarse a la Sociedad.</li>
                        <li>Los miembros del Comité Ejecutivo de SMACVE PSO no deben formar parte de una Junta ni ocupar un puesto de liderazgo para la fabricación de dispositivos médicos, ya sea compensados o no.</li>
                        <li>Las excepciones a cualquiera de los anteriores se pueden apelar ante el Comité de Conflictos de Intereses de la SMACVE, quien hará recomendaciones a la Junta Directiva.</li>
                    </ol>
                    <p class="text-justify">B.	Los miembros de los Comités Directivos de la Industria de SMACVE PSO pueden no tener relaciones financieras directas con la empresa o empresas que patrocinan el Estudio de la Industria del Comité.</p>
                    <ol class="romanos">
                        <li>Los miembros del Comité Directivo del Estudio de la Industria tienen seis meses para terminar cualquier relación financiera directa dentro de los seis meses posteriores a su nombramiento.</li>
                        <li>Los miembros del Comité Directivo del Estudio de la Industria durante sus términos de servicio no pueden aceptar apoyo directo para la investigación u otras actividades de la compañía o compañías que patrocinan el Estudio de la Industria del Comité. No obstante, los servicios no compensados y otras relaciones permitidas deben divulgarse en la Declaración de conflicto de intereses de la persona.</li>
                        <li>Los miembros del Comité Directivo del Estudio de la Industria no deberán formar parte de una Junta ni ocupar una posición de liderazgo para el fabricante de dispositivos médicos relacionada con el Estudio de la Industria de su Comité, ya sea compensado o no.</li>
                        <li>Los miembros del Comité Directivo del Estudio de la Industria pueden pertenecer a una división o institución que acepte fondos educativos y subvenciones de investigación sin restricciones siempre que el dinero de la subvención se pague a la división o institución (por ejemplo, centro médico académico), no al individuo.  </li>
                    </ol>

                    <div class="space20"></div>
                    <h5>Política de SMACVE sobre implementación de conflictos</h5>
                    <p class="text-justify">A.	La SMACVE nombrará un Comité de Conflicto de Intereses y Conducta Profesional.</p>
                    <p class="text-justify">B.	Los miembros de este Comité estarán libres de conflictos de intereses y no tendrán relaciones con la industria.</p>
                    <p class="text-justify">C.	Las responsabilidades de este Comité incluyen las siguientes:</p>
                    <ol class="romanos">
                        <li>Revisar anualmente todos los formularios de conflictos de intereses de los funcionarios de la SMACVE, miembros de la junta directiva, miembros del consejo y comité, editores de RMA, personal y cualquier otro miembro de la SMACVE en circunstancias sujetas a la influencia de la compañía que podrían poner en peligro la integridad de la Sociedad.</li>
                        <li>Las personas con control sobre el contenido de SMACVE CME, incluido el personal de SMACVE, deben cumplir con los procedimientos de SMACVE para identificar y resolver todos los conflictos de intereses antes de que la actividad de CME se entregue a los alumnos. El Comité de Conflictos de Intereses y Conducta Profesional actuará como árbitro final para cualquier conflicto de intereses no resuelto.</li>
                        <li>En situaciones donde hay información que no coincide con la información de divulgación proporcionada por un individuo, el Comité puede solicitar una aclaración del individuo y / o compañía.</li>
                        <li>En situaciones en las que exista un conflicto de intereses significativo que pueda afectar la integridad de la SMACVE, el Comité notificará y asesorará al Comité Ejecutivo de la SMACVE.</li>
                        <li>De acuerdo con las pautas de ACCME, una persona que no revele las relaciones financieras relevantes será descalificada para ser miembro de cualquier comité con responsabilidad o supervisión de planificación de CME, incluida la Junta, los consejos y los comités de la SMACVE. Aquellos que intencionalmente no revelen las relaciones financieras relevantes serán descalificados para ocupar cualquier cargo elegido o designado en la sociedad por un período de cinco años.</li>
                    </ol>
                    <p class="text-justify">D.	El Comité revisará las Directrices para la gestión de las relaciones con la industria de la SMACVE y la Política de la SMACVE sobre conflictos de intereses al menos una vez al año y las actualizará para que sean coherentes con las directrices promulgadas por otras organizaciones importantes como AMA, ACS, CMSS, AAMC, IOM, AdCA-SMACVE21ed, PHRMA y otros.</p>
                    <p class="text-justify">E.	Al comienzo de todas las reuniones de liderazgo de la SMACVE, la Fundación, la PSO y las publicaciones (consejos, comités, comités ad hoc y grupos de trabajo / grupos de trabajo), el presidente recordará a los participantes la Política sobre conflictos de la SMACVE y pedirá a los miembros que se recusen si existe conflicto. Esta información también debe incluirse en todas las agendas de las reuniones como recordatorio. </p>
                    <p class="text-justify">F.  Si un funcionario de la SMACVE, miembro de la junta directiva, miembro del consejo y comité, editor de RMA, personal y cualquier otro miembro de la SMACVE tiene conocimiento de un posible incumplimiento de la política de conflicto de interés deberá informar a este comité sobre las razones para creer que se ha incumplido la política. </p>

                    <div class="space20"></div>

                    <p class="text-justify"><small>Si tiene alguna pregunta sobre su solicitud, comuníquese con nosotros a astrid.carreno@smacve.org.mx </small></p>

                    <div class="space20"></div>
                    <p>
                        Sinceramente,<br/>
                        <strong>Astrid Carreño</strong><br/>
                        Dirección Administrativa<br/>
                        SMACVE
                    </p>


                </div>

            </div>
        </div>
    </section>

    <input type="hidden" id="seccion_smacve" value="#btn-acerca-de" />

@endsection


@section('javascript')

@endsection