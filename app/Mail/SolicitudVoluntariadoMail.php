<?php

namespace App\Mail;

use App\Anualidad;
use App\Pago;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SolicitudVoluntariadoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $solicitud;
    public $detalleSolicitud;


    public function __construct(User $usuario , $solicitud, $detalleSolicitud)
    {
        $this->usuario              = $usuario;
        $this->solicitud            = $solicitud;
        $this->detalleSolicitud     = $detalleSolicitud;
    }


    public function build()
    {
        return $this->from('administrator@smacve.org.mx','PORTAL WEB SMACVE')->subject("Solicitud de Voluntariado Presentada")
            ->markdown('emails.solicitud_voluntariado_presentada', [
                'usuario'           => $this->usuario,
                'solicitud'         => $this->solicitud,
                'detalleSolicitud'  => $this->detalleSolicitud
            ]);

    }
}
