<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $guarded = [];

    public function getStatusAttribute($status)
    {
        switch($status){
            case '0' :
                $status = 'در انتظار پرداخت';
                break;
            case '1' :
                $status = 'پرداخت شده';
                break;
        }
        return $status;
    }

    public function getPaymentTypeAttribute($paymentType)
    {
        switch($paymentType){
            case 'pos' :
                $paymentType = 'دستگاه pos';
                break;
            case 'online' :
                $paymentType = 'اینترنتی';
                break;
        }
        return $paymentType;
    }

    // public function getPaymentStageAttribute($paymentStage)
    // {
    //     switch($paymentStage){

    //         case '1' :
    //             $paymentStage = 'در انتظار بررسی';
    //             break;

    //         case '2' :
    //             $paymentStage = 'در حال انجام';    
    //             break;
    //         case '3' :
    //             $paymentStage = 'تکمیل شده';
    //             break;

    //         case '4' :
    //             $paymentStage = 'لغو شده';
    //             break;

    //         // case 'inprogress' :
    //         //     $paymentStage = 'در حال تکمیل سفارش';
    //         //     break;

    //         // case 'completed' :
    //         //     $paymentStage = 'تکمیل شده';
    //         //     break;
    //     }
    //     return $paymentStage;
    // }
    

    public function getPaymentStatusAttribute($paymentStatus)
    {
        switch($paymentStatus){
            case '0' :
                $paymentStatus = 'ناموفق';
                break;
            case '1' :
                $paymentStatus = 'موفق';
                break;
        }
        return $paymentStatus;
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function address()
    {
        return $this->belongsTo(UserAddress::class);
    }


    
}
