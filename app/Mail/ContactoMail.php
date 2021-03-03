<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $telefono;
    public $email;
    public $mensaje;

    public function __construct($nombre,$telefono, $email,$mensaje)
    {
        $this->nombre       = $nombre;
        $this->telefono     = $telefono;
        $this->email        = $email;
        $this->mensaje      = $mensaje;
    }


    public function build()
    {
        return $this->from('administrator@smacve.org.mx','PORTAL WEB SMACVE')->subject("Solicitud de Contacto")->view('emails.enviomailgenerico');

    }
}
