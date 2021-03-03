<?php

namespace App\Notifications;

use App\Anualidad;
use App\MetodoPago;
use App\Pago;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PagoEjecutadoNotification extends Notification
{
    use Queueable;

    public $usuario;
    public $pago;
    public $anualidad;
    public $metodoPago;


    public function __construct(User $usuario , Pago $pago, Anualidad $anualidad, MetodoPago $metodoPago)
    {
        $this->usuario      = $usuario;
        $this->pago         = $pago;
        $this->anualidad    = $anualidad;
        $this->metodoPago   = $metodoPago;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }



    public function toMail($notifiable)
    {
        return (new MailMessage)->subject('Pago anualidad SMACVE')
            ->markdown('emails.pago_ejecutado', [
                'usuario'   => $this->usuario,
                'pago'      => $this->pago,
                'anualidad' => $this->anualidad,
                'metodoPago' => $this->metodoPago
            ]);
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
