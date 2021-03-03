<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormatoFecha extends Model
{
    public static function getSpanishFormat($fecha) {

        $date       = date('l d/F/Y', strtotime($fecha));

        $nombreDia  = date("l",strtotime($fecha)); // Saturday

        $diaSemana  = date("d",strtotime($fecha)); // 1

        $mes        = date("m",strtotime($fecha)); // 11

        $nombreMes  = date("F",strtotime($fecha)); // November

        $ano        = date("Y",strtotime($fecha)); // 2016


        if ($nombreDia=="Monday")   $nombreDia="Lunes";
        if ($nombreDia=="Tuesday")  $nombreDia="Martes";
        if ($nombreDia=="Wednesday")$nombreDia="Miércoles";
        if ($nombreDia=="Thursday") $nombreDia="Jueves";
        if ($nombreDia=="Friday")   $nombreDia="Viernes";
        if ($nombreDia=="Saturday") $nombreDia="Sabado";
        if ($nombreDia=="Sunday")   $nombreDia="Domingo";

        if ($nombreMes=="January")  $nombreMes="ENE";
        if ($nombreMes=="February") $nombreMes="FEB";
        if ($nombreMes=="March")    $nombreMes="MAR";
        if ($nombreMes=="April")    $nombreMes="ABR";
        if ($nombreMes=="May")      $nombreMes="MAY";
        if ($nombreMes=="June")     $nombreMes="JUN";
        if ($nombreMes=="July")     $nombreMes="JUL";
        if ($nombreMes=="August")   $nombreMes="AGO";
        if ($nombreMes=="September")$nombreMes="SEP";
        if ($nombreMes=="October")  $nombreMes="OCT";
        if ($nombreMes=="November") $nombreMes="NOV";
        if ($nombreMes=="December") $nombreMes="DIC";


        $SpanishDate = "<div class='fecha'>".$diaSemana."/".$nombreMes."</div><div class='year'>".$ano."</div>";

        return $SpanishDate;
    }
}
