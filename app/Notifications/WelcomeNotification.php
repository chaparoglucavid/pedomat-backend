<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Pedomat sizi salamlayır!')
            ->greeting('Xoş gəldiniz, {$notifiable->full_name},')
            ->line('Platformamızdan qeydiyyatdan keçdiyiniz üçün sizə təşəkkür edirik!')
            ->action('Elə indi tətbiqə daxil olaraq istifadəyə başlaya bilərsiniz!', url('/'))
            ->line('Hər hansı bir dəstəyə ehtiyac olarsa əlaqə saxlamaqdan çəkinməyin.');
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
