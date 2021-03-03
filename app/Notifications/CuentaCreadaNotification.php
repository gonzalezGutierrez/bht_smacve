<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CuentaCreadaNotification extends Notification
{
    use Queueable;

    public  $usuario;

    public function __construct(User $usuario)
    {
        $this->usuario  = $usuario;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)->subject('Credenciales de Acceso a tu Cuenta SMACVE')
            ->markdown('emails.cuenta_creada', ['usuario' => $this->usuario]);
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
