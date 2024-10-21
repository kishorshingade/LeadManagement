<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use App\Models\User;

class RegistrationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Dear, ' . $this->user->name)
            ->line('Thank you for joining the ZynovvaTech family!')
            ->line('We are excited to welcome you to our community of savvy shoppers.')
            ->line('Please see below the login credentials:')
            ->line('Email id: ' . $this->user->email)
            ->line('Password: ' . $this->password)
            ->line('Please do not reply to this mail. If you have any query, please write to info@zynovvvaTech.com.')
            ->action('Click here to Login', url('/login'))
            ->salutation("Regards, \r\n Team ZynovvaTech");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'A new user has registered.',
            'user_name' => $this->user->name,
        ];
    }
}
