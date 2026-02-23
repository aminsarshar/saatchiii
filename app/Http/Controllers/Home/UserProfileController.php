<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Wishlist;
use auth;
use Barryvdh\DomPDF\Facade\Pdf; // ← حتماً اینو اضافه کن
use Illuminate\Http\Request;



class UserProfileController extends Controller
{


    public function index()
    {
        $wishlist = Wishlist::where('user_id' , auth()->id())->get();
        $addresses = UserAddress::where('user_id', auth()->id())->get();
        // $orders_completed = Order::where('user_id', auth()->id())->where('payment_stage' , 'completed')->get();
        // $orders_waiting = Order::where('user_id', auth()->id())->where('payment_stage' , 'waiting')->get();

        $orders = Order::where('user_id', auth()->id())->get();
        // $products = Product::where('user_id', auth()->id())->get();

        $provinces = Province::all();
        return view('home.users_profile.index' , compact('provinces', 'addresses' , 'wishlist' , 'orders'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request ,string $id)
    {
        // $user = User::findOrFail($id);
        // $file = $request->file('avatar');
        // $avatar = '';
        // $avatar = time().".".$file->getClientOriginalExtension();
        // $file->move('home/images/users_avatar/',$avatar);
        $user = User::findOrFail($id);
        $file = $request->file('avatar');
        $avatar = '';

        if(!empty($file)){
            if(file_exists('home/images/users_avatar/'.$user->avatar)){
                // unlink('home/images/users_avatar/'.$user->avatar);
            }
            $avatar = time().".".$file->getClientOriginalExtension();
            $file->move('home/images/users_avatar/',$avatar);
        }else{
            $avatar = $user->avatar;
        }

        auth()->user()->update([
            'avatar' =>$avatar,
            'name' => $request->name,
            'cellphone' => $request->cellphone,
            'email' => $request->email,

        ]);

        alert()->success('اطلاعات مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('home.users_profile.index');
    }


    public function invoice($orderId)
    {
        // پیدا کردن سفارش کاربر
        $order = Order::with('orderItems.product')
                      ->where('user_id', auth()->id())
                      ->findOrFail($orderId);

        try {ث
            // ساخت PDF
            $pdf = Pdf::loadView('home.users_profile.invoice_pdf', compact('order'))
                      ->setPaper('a4', 'portrait');

            $filename = 'Invoice-' . ($order->ref_id ?? $order->id) . '.pdf';

            // دانلود مستقیم PDF بدون ریدایرکت
            return response()->streamDownload(
                fn() => print($pdf->output()),
                $filename
            );

        } catch (\Exception $e) {
            // نمایش خطای ساده
            return back()->with('error', 'امکان ایجاد PDF وجود ندارد: ' . $e->getMessage());
        }
    }
}



