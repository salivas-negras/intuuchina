<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class NewUserNotification extends Notification implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new notification instance.
     * @param User $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the corresponding email body.
     *
     * @return string
     */
    public function getMessage() {
        return __('mails.admin.new-user.body', ['program' => __('content.programs.' . $this->user->program)]);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
                    ->markdown('vendor.notifications.admin.new-user', ['user' => $this->user])
                    ->subject(__('mails.admin.new-user.subject'));


        if ($this->user->cv !== null && file_exists(storage_path('app/' . $this->user->cv))) {
            $mail->attach(storage_path('app/' . $this->user->cv));
        }

        return $mail;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}