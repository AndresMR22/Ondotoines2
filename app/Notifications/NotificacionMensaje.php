<?php

namespace App\Notifications;

use App\Models\Mensaje;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificacionMensaje extends Notification
{
    use Queueable;

    public function __construct(Mensaje $mensaje)
    {
        $this->mensaje = $mensaje;
    }

  
    public function via($notifiable)
    {
        return ['database'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    
    public function toArray($notifiable)
    {
        return [
            "nombres"=>$this->mensaje->nombre,
                "correo"=>$this->mensaje->email,
                "asunto"=>$this->mensaje->asunto,
                "mensaje"=>$this->mensaje->mensaje,
                "hora"=>$this->mensaje->hora,
                "horasFaltantes"=>$this->mensaje->horasFaltantes,
                "icon"=>"fa-shopping-cart",
                "titulo"=>"Nueva consulta"
        ];
    }
}
