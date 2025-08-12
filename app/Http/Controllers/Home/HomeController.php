<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductVariation;
// use App\Models\Carbon;
use App\Models\Setting;
use App\Models\ContactUs;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;
use App\Models\Category;
use App\Models\Blog;
use Carbon\Carbon;



class HomeController extends Controller
{
    public function index()
    {
        $sliders = Banner::where('type' , 'sliders')->where('is_active' , 1)->orderBY('priority')->get();
        $indexTopBanners = Banner::where('type' , 'TopBanners')->where('is_active' , 1)->orderBY('priority')->get();
        $indexBottomBanners = Banner::where('type' , 'BottomBanners')->where('is_active' , 1)->orderBY('priority')->get();
        $indexCenterBanners = Banner::where('type' , 'CenterBanners')->where('is_active' , 1)->orderBY('priority')->get();
        $indexSpecialBanners = Banner::where('type' , 'SpecialBanners')->where('is_active' , 1)->orderBY('priority')->get();


        $product_normal_mens = Product::where('category_id' , '17' , '15')->where('is_active' , 1)->where('type' , 1)->get()->take(15);
        $product_normal_womens = Product::where('category_id' , '22')->where('is_active' , 1)->where('type' , 1)->get()->take(15);
        $product_daily_offers = Product::where('is_active' , 1)->where('type' , 1)->get()->take(15);

        $products = Product::where('is_active' , 1)->get()->take(15);
        $products_special_offers = Product::where('is_active' , 1)->where('type' , 2)->get()->take(15);
        $blog = Blog::where('is_active' , 1)->get()->take(20);

        // $targetDate = Carbon::parse('2023-10-10'); // تاریخ تعیین شده
        // $currentDate = Carbon::now();

        return view('home.index' , compact(
            // 'targetDate'
            // ,
            // 'currentDate'
            'sliders'
             ,
            'indexTopBanners'
            ,
            'indexBottomBanners'
            ,
            'indexCenterBanners'
            ,
            'indexSpecialBanners'
            ,
            'products_special_offers'
            ,
            'product_normal_mens'
            ,
            'product_normal_womens'
            ,
            'product_daily_offers'
            ,
            'products'
            ,
            'blog'
        ));
    }

     public function aboutUs()
    {
        $indexTopBanners = Banner::where('type' , 'TopBanners')->where('is_active' , 1)->orderBY('priority')->get();
        return view('home.about-us', compact('indexTopBanners'));

    }



    public function contactUs()
    {
        $setting = Setting::findOrFail(1);
        return view('home.contact-us', compact('setting'));
    }

    public function contactUsForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:50',
            'email' => 'required|email',
            'subject' => 'required|string|min:4|max:250',
            'text' => 'required|string|min:4|max:3000',
            'g-recaptcha-response' => [new GoogleReCaptchaV3ValidationRule('contact_us')]



        ]);

        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'text' => $request->text,


        ]);

        alert()->success('پیام شما با موفقیت ثبت شد', 'با تشکر');
        return redirect()->back();


    }


    function Shop(Request $request,Product $products)
    {
        $attributes = $products->attributes()->with('values')->get();
        $variation = $products->attributes()->with('variationValues')->first();
        // $products = Product::where('is_active' , 1)->get()->take(5);

        $products = Product::where('is_active' , 1)->filter()->search()->paginate(12);



        return view('home.shop', compact('attributes' , 'variation' , 'products'));

    }


    function specialoffer(Request $request,Product $products_special_offers)
    {


        $products_special_offers = Product::where('is_active' , 1)->where('type' , 2)->filter()->search()->paginate(12);


        return view('home.special-offer', compact('products_special_offers'));

    }



}
