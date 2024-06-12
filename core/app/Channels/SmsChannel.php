<?php
namespace App\Channels;

use Illuminate\Notifications\Notification;
use Ghasedak\Laravel\GhasedakFacade;

class SmsChannel
{
    public function send($notifiable , Notification $notification)
    {

        // dd($notifiable ,$notification->code);
        $receptor = $notifiable->cellphone;
        // $receptor = "09360243065";
        $type = 1;
        $template = "caseshop";
        $param1 = $notification->code ;

        $response = GhasedakFacade::setVerifyType($type)->Verify($receptor, $template, $param1);
        return 'Done';

        

    }

}
?>
