<?php

namespace App\Mail;

use App\Anualidad;
use App\Pago;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRegistroTEVAMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email;
    public $especialidad;
    public $telefono;


    public function __construct($nombre, $email, $especialiad, $telefono)
    {
        $this->nombre           = $nombre;
        $this->email            = $email;
        $this->especialidad     = $especialiad;
        $this->telefono         = $telefono;
    }


    public function build()
    {
        return $this->from('administrator@smacve.org.mx','PORTAL WEB SMACVE')->subject("Aviso de Registro Webinar TEVA")
            ->markdown('emails.aviso_registro_webinar_teva', [
                'nombre'        => $this->nombre,
                'email'         => $this->email,
                'especialidad'  => $this->especialidad,
                'telefono'      => $this->telefono
            ]);

    }
}
