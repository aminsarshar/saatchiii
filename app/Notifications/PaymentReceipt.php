<?php


namespace App\Notifications;

use App\Channels\PaymentReceiptSmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentReceipt extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($orderId , $amount , $refId)
    {
        $this->orderId = $orderId;
        $this->amount = $amount;
        $this->refId = $refId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [PaymentReceiptSmsChannel::class];
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

    public function toSms($notifiable)
    {
        return [
            'orderId' =>  $this->orderId,
            'amount' =>  $this->amount,
            'refId' =>  $this->refId,
        ];
    }
}
