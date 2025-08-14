<?php

use App\Models\User;
use App\Notifications\OTPSms;
use Ghasedak\Laravel\GhasedakFacade;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Livewire\Auth\Register\Register;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Livewire\Auth\Register2\Register2;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Home\AddressController;
use App\Http\Controllers\Home\CompareController;
use App\Http\Controllers\Home\PaymentController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Home\WishlistController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryBlogController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Home\UserProfileController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Home\BlogController as HomeBlogController;
use App\Http\Controllers\Home\CommentController as HomeCommentController;
use App\Http\Controllers\Home\ProductController as HomeProductController;
use App\Http\Controllers\Home\CategoryController as HomeCategoryController;
use UniSharp\LaravelFilemanager\Lfm;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin-panel/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard')->middleware('role:super_admin|admin|writer');

Route::prefix('admin-panel/management')->name('admin.')->group(function () {

    Route::resource('brands', BrandController::class)->middleware(['role_or_permission:super_admin|admin|product_management']);
    Route::resource('attributes', AttributeController::class)->middleware(['role_or_permission:super_admin|admin|product_management']);
    Route::resource('categories', CategoryController::class)->middleware(['role_or_permission:super_admin|admin|product_management']);
    Route::resource('comments', CommentController::class)->middleware(['role_or_permission:super_admin|admin|product_management']);
    Route::resource('coupons', CouponController::class)->middleware(['role_or_permission:super_admin|admin|product_management']);
    Route::resource('orders', OrderController::class)->middleware(['role_or_permission:super_admin|admin|order_management']);
    Route::resource('transactions', TransactionController::class)->middleware(['role_or_permission:super_admin|admin|order_management']);
    Route::resource('users', UserController::class)->middleware(['role_or_permission:super_admin|admin|users_management']);
    Route::resource('permissions', PermissionController::class)->middleware(['role_or_permission:super_admin|admin']);
    Route::resource('roles', RoleController::class)->middleware(['role_or_permission:super_admin|admin']);
    Route::resource('categoryblog', CategoryBlogController::class)->middleware(['role_or_permission:super_admin|admin|writer']);


    // Users

    Route::resource('users', UserController::class)->middleware(['role_or_permission:super_admin|admin|users_management']);

    Route::get('/trashed_users', [UserController::class, 'trashed'])->name('users.trashed_user')
        ->middleware(['role_or_permission:super_admin|admin']);

    // Products
    Route::resource('products', ProductController::class)->middleware(['role_or_permission:super_admin|admin|product_management']);

    Route::get('/trashed_products', [ProductController::class, 'trashed'])->name('products.trashed_product')
        ->middleware(['role_or_permission:super_admin|admin|product_management']);


    // Edit Product Category
    Route::get('/products/{product}/category-edit', [ProductController::class, 'editCategory'])->name('products.category.edit')
        ->middleware(['role_or_permission:super_admin|admin|product_management']);

    Route::put('/products/{product}/category-update', [ProductController::class, 'updateCategory'])->name('products.category.update')
        ->middleware(['role_or_permission:super_admin|admin|product_management']);

    // Edit Product Image
    Route::get('/products/{product}/images-edit', [ProductImageController::class, 'edit'])->name('products.images.edit')
        ->middleware(['role_or_permission:super_admin|admin|product_management']);

    Route::delete('/products/{product}/images-destroy', [ProductImageController::class, 'destroy'])->name('products.images.destroy')
        ->middleware(['role_or_permission:super_admin|admin|product_management']);

    Route::put('/products/{product}/images-set-primary', [ProductImageController::class, 'setPrimary'])->name('products.images.set_primary')
        ->middleware(['role_or_permission:super_admin|admin|product_management']);

    Route::post('/products/{product}/images-add', [ProductImageController::class, 'add'])->name('products.images.add')
        ->middleware(['role_or_permission:super_admin|admin|product_management']);

    // Blogs

    Route::resource('blogs', BlogController::class)->middleware(['role_or_permission:super_admin|admin|writer']);

    Route::get('/trashed_blogs', [BlogController::class, 'trashed'])->name('blogs.trashed_blog')
        ->middleware(['role_or_permission:super_admin|admin|blog_management']);


    // Tags

    Route::resource('tags', TagController::class)->middleware(['role_or_permission:super_admin|admin|product_management']);

    Route::get('/trashed_tags', [TagController::class, 'trashed'])->name('tags.trashed_tag')
        ->middleware(['role_or_permission:super_admin|admin']);

    // Banners
    Route::resource('banners', BannerController::class)->middleware(['role_or_permission:super_admin|admin|product_management']);

    Route::get('/trashed_banners', [BannerController::class, 'trashed'])->name('banners.trashed_banner')
        ->middleware(['role_or_permission:super_admin|admin']);



    Route::get('/comments/{comment}/change-approve', [CommentController::class, 'changeApprove'])->name('comments.change-approve')
        ->middleware(['role_or_permission:super_admin|admin|product_management']);

    // Get Category Attributes
    Route::get('/category-attributes/{category}', [CategoryController::class, 'getCategoryAttributes'])
        ->middleware(['role_or_permission:super_admin|admin|product_management']);
});


// blogs

Route::get('/blog/{blogs:slug}', [HomeBlogController::class, 'show'])->name('home.blogs.show');


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/categories/{category:slug}', [HomeCategoryController::class, 'show'])->name('home.categories.show');
Route::get('/products/{product:slug}', [HomeProductController::class, 'show'])->name('home.products.show');
Route::post('/comments/{product}', [HomeCommentController::class, 'store'])->name('home.comments.store');

Route::get('/add-to-wishlist/{product}', [WishlistController::class, 'add'])->name('home.wishlist.add');
Route::get('/remove-from-wishlist/{product}', [WishlistController::class, 'remove'])->name('home.wishlist.remove');

Route::get('/compare', [CompareController::class, 'index'])->name('home.compare.index');
Route::get('/add-to-compare/{product}', [CompareController::class, 'add'])->name('home.compare.add');
Route::get('/remove-from-compare/{product}', [CompareController::class, 'remove'])->name('home.compare.remove');


Route::get('/cart', [CartController::class, 'index'])->name('home.cart.index');
Route::post('/add-to-cart', [CartController::class, 'add'])->name('home.cart.add');
Route::get('/remove-from-cart/{rowId}', [CartController::class, 'remove'])->name('home.cart.remove');
Route::put('/cart', [CartController::class, 'update'])->name('home.cart.update');
Route::get('/clear-cart', [CartController::class, 'clear'])->name('home.cart.clear');
Route::post('/check-coupon', [CartController::class, 'checkCoupon'])->name('home.coupons.check');
Route::get('/checkout', [CartController::class, 'checkout'])->name('home.orders.checkout');





Route::post('/payment', [PaymentController::class, 'payment'])->name('home.payment');
Route::get('/payment-verify/{gatewayName}', [PaymentController::class, 'paymentVerify'])->name('home.payment_verify');


Route::get('/payment_ok', [PaymentController::class, 'pay_ok'])->name('home.cart.payment_ok');
Route::get('/payment_not_ok', [PaymentController::class, 'pay_not_ok'])->name('home.cart.payment_not_ok');
Route::get('/register2', Register2::class)->name('register2');


// برای ورود از طریق گوگل
Route::get('/login/{provider}', [AuthController::class, 'redirectToProvider'])->name('provider.login');
Route::get('/login/{provider}/callback', [AuthController::class, 'handleProviderCallback']);

// برای ورود از طریق پیامک
Route::any('/loginsms/', [AuthController::class, 'loginsms'])->name('loginsms');
Route::post('/check-otp/', [AuthController::class, 'checkOtp']);
Route::post('/resend-otp/', [AuthController::class, 'resendOtp']);




Route::prefix('profile')->name('home.')->group(function () {
    Route::get('/', [UserProfileController::class, 'index'])->name('users_profile.index');
    Route::get('/comments', [HomeCommentController::class, 'usersProfileIndex'])->name('comments.users_profile.index');
    Route::get('/wishlist', [WishlistController::class, 'usersProfileIndex'])->name('wishlist.users_profile.index');


    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    Route::put('/addresses/{address}', [AddressController::class, 'update'])->name('addresses.update');
    Route::put('/{user}', [UserProfileController::class, 'update'])->name('users_profile.update');


    Route::get('/orders', [CartController::class, 'usersProfileIndex'])->name('orders.users_profile.index');
});

Route::get('/get-province-cities-list', [AddressController::class, 'getProvinceCitiesList']);


Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('home.about-us');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('home.contact-us');
Route::post('/contact-us-form', [HomeController::class, 'contactUsForm'])->name('home.contact-us.form');
Route::get('/shop', [HomeController::class, 'shop'])->name('home.shop');
Route::get('/error404', [HomeController::class, 'error404'])->name('home.error404');

// blog
Route::get('/blog', [HomeBlogController::class, 'index'])->name('home.blog.index');

// special offer

Route::get('/special-offer', [HomeController::class, 'specialoffer'])->name('home.special-offer');

// search
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search/results', [SearchController::class, 'search'])->name('search.results');


Route::get('/logout', function () {
    auth()->logout();
    return redirect()->back();
});

Route::get('/test', function () {

    $user = User::find(20);
    $user->notify(new OTPSms(1234));
});


Route::group(['prefix' => 'laravel-filemanager'], function () {
    Lfm::routes();
});
// Route::post('/ckeditor/upload', [App\Http\Controllers\CKEditorController::class, 'upload'])->name('ckeditor.upload');

// Route::any('/login' , [AuthController::class , 'login'])->name('login');




// Route::get('/test', function () {
//     $response = Ghasedak\Laravel\GhasedakFacade::setVerifyType(Ghasedak\Laravel\GhasedakFacade::VERIFY_MESSAGE_TEXT)
//     ->Verify(
//         "09336116359", // receptor
//         "shopcase", // name of the template which you've created in you account
//         "123456",      // parameters (supporting up to 10 parameters)
//     );

// });



// Route::get('/test', function () {

//     $user = User::find(1);
//     $user->notify(new OTPSms(1234));

// });
