<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AceptarNotification extends Notification
{
    use Queueable;
    protected $fecha;
    protected $horario_anterior;
    protected $horario_solicitado;

    /**
     * Create a new notification instance.
     */
    public function __construct($fecha, $horario_anterior, $horario_solicitado)
    {
        $this->fecha = $fecha;
        $this->horario_anterior = $horario_anterior;
        $this->horario_solicitado = $horario_solicitado;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }
    public function toDatabase(object $notifiable){
        return [
            'data' => "Su solicitud de cambio ha sido aceptada, su horario de la fecha $this->fecha ha cambiado de $this->horario_anterior a $this->horario_solicitado"
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
