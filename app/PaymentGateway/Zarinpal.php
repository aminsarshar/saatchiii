<?php

namespace App\PaymentGateway;

class Zarinpal extends Payment
{
    public function send($amounts, $description, $addressId)
    {
        $data = array(
            'MerchantID' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            'Amount' => $amounts['paying_amount'],
            'CallbackURL' => route('home.payment_verify' , ['gatewayName' => 'zarinpal']),
            'Description' => $description
        );

        $merchant_id = "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx"; // کد مرچنت خودت
        $callback_url = route('home.payment_verify' , ['gatewayName' => 'zarinpal']);   // آدرس بازگشت

        $data = [
        "merchant_id" => $merchant_id,
        "amount"      => $amounts['paying_amount'] * 10,
        "callback_url"=> $callback_url,
        "description" => $description,
         ];

    $jsonData = json_encode($data);

    $ch = curl_init("https://sandbox.zarinpal.com/pg/v4/payment/request.json");
    curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ]);

    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
        return ['error' => "cURL Error #: " . $err];
    }

    $result = json_decode($result, true);

    if (isset($result["data"]["code"]) && $result["data"]["code"] == 100) {
        $authority = $result["data"]["authority"];

        $createOrder = parent::createOrder($addressId, $amounts, $authority, 'zarinpal');
        // اینجا می‌تونی سفارش رو توی دیتابیس ثبت کنی
        // مثل همون parent::createOrder که داشتی
        // $createOrder = parent::createOrder($addressId, $amounts, $authority, 'zarinpal');

        return ['success' => "https://sandbox.zarinpal.com/pg/StartPay/" . $authority];
    } else {
        return ['error' => json_encode($result["errors"], JSON_UNESCAPED_UNICODE)];
    }

    }



public function verify($authority, $amount)
{
    $MerchantID = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

    // زرین‌پال همه مبلغ‌ها رو به ریال می‌خواد → اگر تو سایتت تومانه باید *10 کنی
    $amount = $amount * 10;

    $data = array(
        'merchant_id' => $MerchantID,
        'authority'   => $authority,
        'amount'      => $amount
    );

    $jsonData = json_encode($data);

    $ch = curl_init('https://sandbox.zarinpal.com/pg/v4/payment/verify.json');
    curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
    ));

    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
        return ['error' => "cURL Error #:" . $err];
    }

    $result = json_decode($result, true);

    if (isset($result["data"]["code"]) && $result["data"]["code"] == 100) {
        $ref_id = $result["data"]["ref_id"];

        // بروزرسانی سفارش در دیتابیس
        $updateOrder = parent::updateOrder($authority, $ref_id);
        if (array_key_exists('error', $updateOrder)) {
            return $updateOrder;
        }

        \Cart::clear();
        return ['success' => 'Transaction success. RefID: ' . $ref_id];
    } else {
        // نمایش خطاهای API جدید
        return ['error' => 'Transaction failed. ' . json_encode($result["errors"], JSON_UNESCAPED_UNICODE)];
    }
}
}




//     public function verify($authority, $amount)
//     {
//         $MerchantID = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

//         $data = array('MerchantID' => $MerchantID, 'Authority' => $authority, 'Amount' => $amount);
//         $jsonData = json_encode($data);
//         $ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentVerification.json');
//         curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
//         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//         curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//             'Content-Type: application/json',
//             'Content-Length: ' . strlen($jsonData)
//         ));
//         $result = curl_exec($ch);
//         $err = curl_error($ch);
//         curl_close($ch);
//         $result = json_decode($result, true);
//         if ($err) {
//             return ['error' => "cURL Error #:" . $err];
//         } else {
//             if (isset($result["data"]["code"]) && $result["data"]["code"] == 100) {
//                 $updateOrder = parent::updateOrder($authority, $result['RefID']);
//                 if (array_key_exists('error', $updateOrder)) {
//                     return $updateOrder;
//                 }
//                 \Cart::clear();
//                 return ['success' => 'Transation success. RefID:' . $result['RefID']];
//             } else {
//                 return ['error' => 'Transation failed. Status:' . $result['Status']];
//             }
//         }
//     }
// }



