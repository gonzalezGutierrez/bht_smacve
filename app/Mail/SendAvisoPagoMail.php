<?php

namespace App\Mail;

use App\Anualidad;
use App\Pago;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAvisoPagoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $pago;
    public $anualidad;
    public $metodoPago;


    public function __construct(User $usuario , Pago $pago, Anualidad $anualidad,$metodoPago)
    {
        $this->usuario      = $usuario;
        $this->pago         = $pago;
        $this->anualidad    = $anualidad;
        $this->metodoPago   = $metodoPago;
    }


    public function build()
    {
        return $this->from('administrator@smacve.org.mx','PORTAL WEB SMACVE')->subject("Aviso de Registro de Pago")
            ->markdown('emails.aviso_registro_pago', [
                'usuario'   => $this->usuario,
                'pago'      => $this->pago,
                'anualidad' => $this->anualidad,
                'metodoPago' =>  $this->metodoPago
            ]);

    }
}
