<?php

namespace App\Notifications;

use App\Suscripcion;
use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\DB;

class EnvioPasswordNotification extends Notification  implements ShouldQueue
{
    use Queueable;

    public $subject;

    public function __construct($subject)
    {
        $this->subject      = $subject;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)->subject($this->subject)
            ->markdown('emails.envio_password', [
                'usuario'       => $notifiable
        ]);
    }

    public function toArray($notifiable)
    {
        return [

        ];
    }
}
