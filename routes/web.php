<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('proveedores','ProveedoresController@index');
Route::get('proveedores/create','ProveedoresController@create');
Route::post('proveedores','ProveedoresController@store');
Route::get('proveedores/{URL}/edit','ProveedoresController@edit');
Route::put('proveedores/{URL}','ProveedoresController@update');
Route::get('proveedores/{URL}','ProveedoresController@show');
Route::post('proveedores/{URL}/comentar/','ComentariosController@store');
Route::post('proveedores/{URL}/calificar','CalificacionesController@store');

Route::get('proveedores/categorias/create','CategoriaController@create');
Route::post('proveedores/categorias','CategoriaController@store');


Route::get('proveedores/categorias/{id}/edit','CategoriaController@edit');




Route::get('/','FrontEndController@inicio');
Route::get('inicio','FrontEndController@inicio');
Route::get('home','FrontEndController@inicio');

Route::get('acerca_de/quienes_somos','FrontEndController@quienes_somos');
Route::get('acerca_de/mesa_directiva','FrontEndController@mesa_directiva');
Route::get('acerca_de/miembros','FrontEndController@miembros');
Route::get('acerca_de/expresidentes','FrontEndController@expresidentes');

Route::get('acerca_de/codigos_etica/mesa_directiva','FrontEndController@codigos_etica_mesa_directiva');
Route::get('acerca_de/codigos_etica/derechos_medicos','FrontEndController@codigos_etica_derechos_medicos');
Route::get('acerca_de/codigos_etica/derechos_pacientes','FrontEndController@codigos_etica_derechos_pacientes');
Route::get('acerca_de/codigos_etica/aviso_privacidad','FrontEndController@codigos_etica_aviso_privacidad');
Route::get('acerca_de/codigos_etica/politica_conflictos','FrontEndController@codigos_etica_politica_conflictos');
Route::get('acerca_de/convenios','FrontEndController@convenios');

Route::get('atencion_socio/guias_clinicas','FrontEndController@guias_clinicas');
Route::get('atencion_socio/estatutos','FrontEndController@estatutos')->middleware('auth');
Route::get('atencion_socio/pago_anualidad','FrontEndController@pago_anualidad');

/*********************** INVESTIGACIÓN ***************************/
Route::get('investigacion/comision_actualizacion_gpc/{section}','FrontEndController@comisionActualizacionGPC')->middleware('auth');
Route::get('investigacion/comite_promocion/','FrontEndController@comitePromocionInicio');
Route::get('investigacion/comite_promocion/{section}','FrontEndController@comitePromocion')->middleware('auth');


Route::get('educacion_medica/comision_cirujanos_vasculares_jovenes','FrontEndController@educacion_comision_cirujanos_vasculares_jovenes');
Route::get('educacion_medica/buscar','FrontEndController@educacion_medica_buscar');
Route::get('educacion_medica/{categoria?}','FrontEndController@educacion_medica');
Route::get('educacion_medica/{categoria}/post/{idPost}','FrontEndController@educacion_medica_post');

Route::post('educacion_medica/chat/send_message','FrontEndController@chat_send_message');
Route::post('educacion_medica/chat/retrieve_chat_messages','FrontEndController@retrieve_chat_messages');

Route::get('merida_2020/costo_inscripcion','FrontEndController@merida_2020_costo_inscripcion');
Route::get('merida_2020/sede','FrontEndController@merida_2020_sede');
Route::get('merida_2020/hoteles','FrontEndController@merida_2020_hoteles');
Route::get('merida_2020/programa','FrontEndController@merida_2020_programa');
Route::get('merida_2020/programa/descargar','FrontEndController@merida_2020_programa_descargar');
Route::get('merida_2020/programa/actualizar','FrontEndController@merida_2020_programa_actualizar');
Route::get('merida_2020/registro_online','FrontEndController@merida_2020_registro_online');
Route::get('merida_2020/profesores','FrontEndController@merida_2020_profesores');

Route::get('requisitos_2021/{section?}','FrontEndController@trabajosLibresRequisitos');



Route::get('boletines/primera_edicion','FrontEndController@boletin_primera_edicion');
Route::get('boletines/segunda_edicion','FrontEndController@boletin_segunda_edicion');
Route::get('boletines/tercera_edicion','FrontEndController@boletin_tercera_edicion');
Route::get('boletines/cuarta_edicion','FrontEndController@boletin_cuarta_edicion');
Route::get('boletines/quinta_edicion','FrontEndController@boletin_quinta_edicion');
Route::get('boletines/sexta_edicion','FrontEndController@boletin_sexta_edicion');


Route::get('eventos','FrontEndController@eventos');
Route::get('seminarios-residentes','FrontEndController@eventosSeminarioResidentes')->middleware('auth');
Route::get('sesiones_academicas','FrontEndController@eventosSesionesAcademicas')->middleware('auth');




Route::post('eventos_json','FrontEndController@eventos_json');

Route::get('contacto','FrontEndController@contacto');
Route::post('contacto','FrontEndController@contacto_send_mail');

Route::get('registered',function(){
    return view('auth.registered');
})->middleware('auth');

Route::get('change_password',function (){

    $users = \App\User::all();

    foreach ($users as $user){

       $password = 'smcv.2019'.$user->idUsuario;

       $user->password          =   bcrypt($password);
       $user->passwordVisible   = $password;
       //$user->save();

    }

    return 'hecho';
});

Route::get('actualizar_pagos/{anualidad}',function ($idAnualidad){

    $anualidad = \App\Anualidad::find($idAnualidad);

    $ano = 'a'.$anualidad->anualidad;


    $users = \App\User::whereIn($ano,[2,3])->get();

    foreach ($users as $user){

      $pago = new \App\Pago();
      $pago->idUsuario      = $user->idUsuario;
      $pago->idAnualidad    = $anualidad->idAnualidad;
      $pago->idStatusPago   = $user->$ano;
      $pago->monto          = $anualidad->costo;
      $pago->eliminado      = 0;
     // $pago->save();
    }

    return 'hecho '.$ano;
});




Route::get('webinar_servier_28','FrontEndController@webinar_servier_28');
Route::get('webinar_fleboestetica','FrontEndController@webinar_fleboestetica');
Route::get('webinar_alfasigma_04','FrontEndController@webinar_alfasigma_04');
Route::get('webinar_alfasigma_18','FrontEndController@webinar_alfasigma_18');
Route::get('webinar_pierre_fabre','FrontEndController@webinar_pierre_fabre');
Route::get('webinar','FrontEndController@webinar_teva');
Route::post('webinar','FrontEndController@store_webinar_teva');


/*********************** MI CUENTA ***************************/

Route::get('mi_cuenta', 'MiCuentaController@mi_cuenta');
Route::get('mi_cuenta/anualidades', 'MiCuentaController@mi_cuenta_anualidades');
Route::get('mi_cuenta/informacion_pago', 'MiCuentaController@mi_cuenta_informacion_pago');
Route::get('mi_cuenta/herramientas_para_socios', 'MiCuentaController@herramientas_para_socios');


Route::get('mi_cuenta/mis_datos_personales', 'MiCuentaController@mis_datos_personales');
Route::patch('mi_cuenta/{idUsuario}/update_mis_datos_personales', 'MiCuentaController@update_mis_datos_personales');

Route::get('mi_cuenta/edit_password', 'MiCuentaController@edit_password');
Route::patch('mi_cuenta/{idUsuario}/update_password', 'MiCuentaController@update_password');

Route::post('mi_cuenta/compartir_informacion/{share_response}', 'MiCuentaController@compartir_informacion');

Route::get('mi_cuenta/payment/{idAnualidad}/credit_card','OpenPayController@paymentForm');
Route::post('mi_cuenta/payment/{idAnualidad}','OpenPayController@payment');

/*********************** VOLUNTARIADO ***************************/

Route::get('voluntariado', 'FrontEndController@voluntariado_index');

/*Route::get('voluntariado/step_1', 'VoluntariadoController@voluntariado_step_1');
Route::post('voluntariado/step_1', 'VoluntariadoController@store_voluntariado_step_1');

Route::get('voluntariado/step_2', 'VoluntariadoController@voluntariado_step_2');
Route::post('voluntariado/step_2', 'VoluntariadoController@store_voluntariado_step_2');

Route::get('voluntariado/step_3', 'VoluntariadoController@voluntariado_step_3');
Route::post('voluntariado/step_3', 'VoluntariadoController@store_voluntariado_step_3');

Route::get('voluntariado/step_3/{orden}', 'VoluntariadoController@voluntariado_step_3_declaracion_interes');
Route::post('voluntariado/step_3/{orden}', 'VoluntariadoController@store_voluntariado_step_3_declaracion_interes');

Route::get('voluntariado/step_3_encuestas', 'VoluntariadoController@voluntariado_step_3_encuestas');
Route::post('voluntariado/step_3_encuestas', 'VoluntariadoController@store_voluntariado_step_3_encuestas');

Route::get('voluntariado/step_4', 'VoluntariadoController@voluntariado_step_4');
Route::post('voluntariado/step_4', 'VoluntariadoController@store_voluntariado_step_4');

Route::get('voluntariado/step_5', 'VoluntariadoController@voluntariado_step_5');
Route::post('voluntariado/step_5', 'VoluntariadoController@store_voluntariado_step_5');

Route::get('voluntariado/step_6', 'VoluntariadoController@voluntariado_step_6');*/


// SECCION PAYPAL

Route::get('mi_cuenta_payment/status',array(
    'as'   => 'mi_cuenta_payment.status',
    'uses' => 'PaypalController@mi_cuenta_getPaymentStatus'
));
Route::get('mi_cuenta_pay_with_paypal/usuario/{idUsuario}/anualidad/{idAnualidad}', 'PaypalController@mi_cuenta_payWithPaypal');

Route::get('mi_cuenta/pago_paypal_aprobado/usuario/{idUsuario}/anualidad/{idAnualidad}', 'MiCuentaController@pago_paypal_aprobado');
Route::get('mi_cuenta/pago_paypal_no_aprobado_cancelado_error/{tipo}/{mensaje?}', 'MiCuentaController@pago_paypal_no_aprobado_cancelado_error');



/*********************** ADMINISTRACION **********************/

Auth::routes();
Route::get('admin','AdminController@index');

/***********************ADMIN USUARIOS*********************  */

Route::get('admin/usuarios/send_email_password', 'UsuarioController@send_email_password');
Route::get('admin/usuarios/export', 'UsuarioController@export');

Route::get('admin/usuarios','UsuarioController@index');
Route::get('admin/usuarios/create','UsuarioController@create');
Route::post('admin/usuarios','UsuarioController@store');


Route::get('admin/usuarios/{idUsuario}','UsuarioController@show');
Route::get('admin/usuarios/{idUsuario}/edit','UsuarioController@edit');
Route::patch('admin/usuarios/{idUsuario}','UsuarioController@update');
Route::delete('admin/usuarios/{idUsuario}','UsuarioController@destroy');

Route::get('admin/usuarios/{idUsuario}/edit_password', 'UsuarioController@editPassword');
Route::patch('admin/usuarios/{idUsuario}/updated_password', 'UsuarioController@updatePassword');


Route::get('admin/usuarios/{idUsuario}/anualidades', 'UsuarioController@anualidades');
Route::patch('admin/usuarios/{idUsuario}/registrar_pago_anualidad', 'UsuarioController@registrarPagoAnualidad');





/***********************ADMIN POST*********************  */

Route::get('admin/educacion_medica','PostController@index');
Route::get('admin/educacion_medica/create','PostController@create');
Route::post('admin/educacion_medica','PostController@store');

Route::get('admin/educacion_medica/{idPost}','PostController@show');
Route::get('admin/educacion_medica/{idPost}/edit','PostController@edit');
Route::patch('admin/educacion_medica/{idPost}','PostController@update');
Route::delete('admin/educacion_medica/{idPost}','PostController@destroy');

Route::post('admin/educacion_medica/upload_image','PostController@upload_image');
Route::post('admin/educacion_medica/destroy_image','PostController@destroy_image');

Route::post('admin/educacion_medica/upload_pdf','PostController@upload_pdf');
Route::post('admin/educacion_medica/destroy_pdf','PostController@destroy_pdf');
