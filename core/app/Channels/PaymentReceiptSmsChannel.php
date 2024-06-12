<?php
namespace App\Channels;

use Illuminate\Notifications\Notification;
use Ghasedak\Laravel\GhasedakFacade;

class PaymentReceiptSmsChannel
{
    public function send($notifiable , Notification $notification)
    {

        // dd($notification);

        // dd($notifiable ,$notification->code);
        $receptor = $notifiable->cellphone;
        // $receptor = "09360243065";
        $type = 1;
        $template = "payment";
        $param1 = $notification->orderId ;
        $param2 = $notification->amount ;
        $param3 = $notification->refId ;

        $response = GhasedakFacade::setVerifyType($type)->Verify($receptor, $template, $param1,$param2,$param3);
        return 'Done';



    }

}
?>
