<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewMessageReceived extends Notification
{
    use Queueable;

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database']; // You can also use 'mail', etc.
    }

    public function toArray($notifiable)
    {
        return [
            'message_id' => $this->message->id,
            'message' => 'New message received from: ' . $this->message->name,
        ];
    }
}

