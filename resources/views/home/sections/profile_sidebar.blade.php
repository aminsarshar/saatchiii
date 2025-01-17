{{-- <div class="myaccount-tab-menu nav" role="tablist">

    <a href="{{ route('home.users_profile.index') }}" class="{{ request()->is('profile') ? 'active' : '' }}">
        <i class="fa-solid fa-user"></i>
        پروفایل
    </a>

    <a href="{{route('home.orders.users_profile.index')}}" class="{{ request()->is('profile/orders') ? 'active' : '' }}">
        <i class="fa-solid fa-cart-shopping"></i>
        سفارشات
    </a>

    <a href="{{route('home.addresses.index')}}" class="{{ request()->is('profile/addresses') ? 'active' : '' }}">
        <i class="fa-solid fa-location-dot"></i>
        آدرس ها
    </a>

    <a href="{{route('home.wishlist.users_profile.index')}}" class="{{ request()->is('profile/wishlist') ? 'active' : '' }}">
        <i class="fa-solid fa-heart"></i>
        لیست علاقه مندی ها
    </a>

    <a href="{{ route('home.comments.users_profile.index') }}" class="{{ request()->is('profile/comments') ? 'active' : '' }}">
        <i class="fa-solid fa-comments"></i>
        نظرات
    </a>

    <a href="{{route('logout')}}">
        <i class="fa-solid fa-right-from-bracket"></i>
        خروج
    </a>

</div> --}}
{{-- <link rel="stylesheet" href="{{asset('assets/css/style-1.css')}}"> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    /* start dashboard  */
.ui-boxs {
    position: sticky;
    top: 0;
    padding-bottom: 20px;
}

.ui-box {
    margin-bottom: 20px;
}

.ui-box-white .ui-box-item-desc {
    background-color: #fff;
}

.ui-box-white .ui-box-item-title {
    background-color: #f7f7f7;
}

.ui-box-item {
    border-radius: 10px;
    background: #fff;
    box-shadow: rgb(0 0 0 / 10%) 0px 0px 10px 0px !important;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}

.ui-box-item-title {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.ui-box-item-title h4 {
    font-size: 18px;
}

.ui-box-item-title a i {
    vertical-align: -webkit-baseline-middle;
    vertical-align: -moz-middle-with-baseline;
}

.ui-box-item-desc {
    background: #f7f7f7;
    padding: 10px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.dashboard-user-img-profile {
    text-align: center;
}

.dashboard-user-img-profile img {
    border: 4px double #eaaf00;
}

.dashboard-user-info {
    text-align: center;
    padding-bottom: 10px;
    border-bottom: 1px solid #ddd;
}

.dashboard-user-info .user-name {
    font-weight: bold;
    margin-bottom: 7px;
}

.dashboard-user-info .user-number {
    font-size: 13px;
}

.dashboard-user-btn {
    padding: 5px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}


.dashboard-user-btn div:hover a {
    color: #007fee !important;
}

.dashboard-user-btn div i,
.dashboard-user-btn div a {
    cursor: pointer;
    display: block;
    text-align: center;
}

.dashboard-user-btn div a {
    font-size: 14px;
}

.sidebar-menu {
    overflow: hidden;
}

.sidebar-menu li {
    padding: 5px 0;
    transition: 0.2s all linear;
    -webkit-transition: 0.2s all linear;
    -moz-transition: 0.2s all linear;
    -ms-transition: 0.2s all linear;
    -o-transition: 0.2s all linear;
}

.sidebar-menu li:hover {
    background: #c77dff1b;
}

.sidebar-menu li.active {
    background: linear-gradient(to right, #c77dff, #9d4edd);
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
}

.sidebar-menu li.active a span,
.sidebar-menu li.active a i {
    color: #fff;
}

.sidebar-menu li.active a i {
    vertical-align: -webkit-baseline-middle;
    vertical-align: -moz-middle-with-baseline;
    margin-left: 2px;
}

.sidebar-menu li a {
    font-size: 15px;
}

.dashboard-cart .card {
    --bs-card-inner-border-radius: 0px;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}

.dashboard-cart {
    height: 140px;
    text-align: center;
    margin-bottom: 20px;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}

.dashboard-cart-title {
    font-size: 14px;
    font-weight: bold;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    padding: 15px 10px;
    background-color: #e1e1e1;
    color: #333;
    height: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.dashboard-cart-title i {
    vertical-align: -webkit-baseline-middle;
    vertical-align: -moz-middle-with-baseline;
    font-size: 25px;
    margin-left: 5px;
}

.dashboard-cart-footer {
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    background: #0e3eb7;
    color: #fff;
    padding: 15px 10px;
    height: 50%;
}

.main-table tbody tr.text-center td {
    text-align: center;
}

.main-table tbody td {
    padding: 10px 10px;
    text-align: right;
}

.main-table-2 h6 {
    font-size: 14px;
}

.main-table-2 p {
    font-size: 15px;
    color: #333;
}

.product-row {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    background: #fff;
}

.product-row:nth-last-child(1) {
    border-bottom: none;
}

.product-row-desc {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.product-row-desc-item {
    display: flex;
    align-items: center;
}

.product-row-title {
    margin-right: 10px;
}

.product-row-title h6 {
    font-size: 13px;
    color: #6c757d;
}

.product-row-icon {
    padding: 5px;
}

.product-row-icon i {
    font-size: 18px;
}

.product-row-icon i.bi-trash:hover {
    color: #ce0909;
}

.product-row-icon i.bi-cart-plus:hover {
    color: #009500;
}

.product-price {
    padding: 10px 0;
}

.product-price p {
    color: #04ac12;
    font-weight: bold;
}

.orders {
    padding: 10px 0;
}

.order-item {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.order-item:nth-last-child(1) {
    padding-bottom: 0px;
    border-bottom: none;
}

.order-item-status {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    padding: 0 0 15px 0;
}

.order-item-status-item p {
    font-weight: bold;
}

.order-item-status-item i {
    font-size: 25px;
    color: #009500;
    vertical-align: -webkit-baseline-middle;
    vertical-align: -moz-middle-with-baseline;
}

.dropd-status i {
    font-size: 16px;
    color: #333;
}

.order-item-status-item span {
    margin-right: 5px;
}

.order-item-detail {
    padding-bottom: 20px;
    border-bottom: 1px solid #ddd;
}

.order-item-detail ul li {
    margin-left: 20px;
    padding-bottom: 10px;
    font-size: 14px;
}

.order-item-detail ul li:nth-last-child(1) {
    padding-bottom: 0;
}

.order-item-detail ul li span {
    margin-left: 7px;
}

.order-item-product-list {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    padding: 20px 0;
    border-bottom: 1px solid #ddd;
}

.order-item-product-list-item {
    margin-left: 7px;
}

.order-item-show {
    padding: 20px 0 0 0;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.order-item-show p {
    color: #052c8d;
    font-size: 14px;
}

.order-item-show p i {
    font-size: 20px;
    vertical-align: -webkit-baseline-middle;
    vertical-align: -moz-middle-with-baseline;
    margin-left: 5px;
}

.order-item-comment {
    display: flex;
    justify-content: flex-end;
    color: #052c8d;
}

.order-item-comment a {
    color: #052c8d;
}

.product-list-row-lg .product-row-title h6 {
    font-size: 16px;
}

.order-progress h6 i {
    font-size: 25px;
    vertical-align: -webkit-baseline-middle;
    vertical-align: -moz-middle-with-baseline;
    color: #009500;
}

.order-progress .progress {
    height: 10px;
}

.order-progress .progress .progress-bar {
    background-color: #05ae65;
}

.notifi-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.notifi-desc {
    padding: 10px 0;
}

.dot-click i {
    width: 5px;
    height: 5px;
    margin-bottom: 2px;
}

/* end dashboard */
</style>
@auth



<div class="col-lg-3">
    <div class="ui-boxs">
        <div class="ui-box">
            <div class="ui-box-item">
                <div class="ui-box-item-desc" style="border-radius: 10px;background-color: #fff;">
                    <div class="dashboard-user-img-profile">
                        {{-- {{asset('admin/images/hero/'.$hero->image)}}
                        auth()->user()->avatar --}}
                        <div class="avatar_image">
                            <img style="height: 90px;width: 95px;object-fit: cover;" src="{{ asset('home/images/users_avatar/'.auth()->user()->avatar) == null ? asset('assets/image/user-profile.png') : asset('home/images/users_avatar/'.auth()->user()->avatar) }}" width="80" height="80"
                    class="img-fluid rounded-circle" alt="">


                        </div>
                    </div>
                    <div class="dashboard-user-info">
                        <h6 class="user-name">{{auth()->user()->name}}</h6>
                        <h6 class="text-muted user-number">{{auth()->user()->cellphone}}</h6>
                    </div>
                    <div class="dashboard-user-btn">
                        <div>
                            <i class="bi bi-key"></i>
                            <a href="forget.html" class="text-muted">تغییر رمز عبور</a>
                        </div>
                        <div>
                            <i class="bi bi-arrow-left-circle"></i>
                            <a href="{{route('logout')}}" class="text-muted">خروج از حساب</a>
                        </div>

                       <div>
                           <i class="fa-solid fa-pen"  data-bs-toggle="collapse" data-bs-target="#collapseEditProfile" aria-expanded="false" aria-controls="collapseEdit"></i>
                        <a href="#" class="text-muted" data-bs-toggle="collapse" data-bs-target="#collapseEditProfile" aria-expanded="false" aria-controls="collapseEdit">
                            ویرایش اطلاعات
                        </a>
                       </div>

                        <hr>

                        <div class="collapse" id="collapseEditProfile"  style="    margin-top: 30px;">
                            <form
                            action="{{ route('home.users_profile.update', ['user' => auth()->user()->id]) }}"
                            method="POST"
                            enctype="multipart/form-data"
                            >
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="tax-select col-lg-6 col-md-6">
                                    <label>
                                        نام و نام خانوادگی
                                    </label>
                                    <input class="form-control" type="text" name="name" value="{{auth()->user()->name}}">
                                    @error('name', 'nameUpdate')
                                        <p class="input-error-validation">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                                <div class="tax-select col-lg-6 col-md-6">
                                    <label>
                                        شماره تماس
                                    </label>
                                    <input class="form-control" type="text" name="cellphone"
                                        value="{{auth()->user()->cellphone}}">
                                    @error('cellphone', 'cellphoneUpdate')
                                        <p class="input-error-validation">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                                <div class="tax-select col-lg-6 col-md-6">
                                    <label>
                                         ایمیل
                                    </label>
                                    <input class="form-control" type="text" name="email"
                                        value="{{auth()->user()->email}}">
                                    @error('email', 'emailUpdate')
                                        <p class="input-error-validation">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>

                                <div class="tax-select col-lg-6 col-md-6">
                                    <label>
                                         عکس
                                    </label>
                                    <input class="form-control" type="file" name="avatar"
                                        value="{{auth()->user()->avatar}}">
                                    @error('avatar', 'emailUpdate')
                                        <p class="input-error-validation">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>


                                <div class=" col-lg-12 col-md-12">

                                    <button class="btn-main btn-main-primary" type="submit" style="margin-top: 20px">
                                    ویرایش اطلاعات
                                    </button>
                                    {{-- <hr> --}}
                                </div>

                            </div>

                        </form>
                        </div>

                        {{-- <div>
                            <i class="fa-solid fa-pen"></i>
                            <a href="#" class="text-muted" data-bs-toggle="collapse" data-bs-target="#collapseEdit-{{auth()->user()->id}}" aria-expanded="false" aria-controls="collapseEdit">
                                ویرایش اطلاعات
                            </a>
                        </div>
                        <div class="collapse" id="collapseEdit-{{auth()->user()->id}}"  >
                            <form
                            action="{{ route('home.users_profile.update', ['user' => auth()->user()->id]) }}"
                            method="POST"
                            enctype="multipart/form-data"
                            >
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="tax-select col-lg-6 col-md-6">
                                    <label>
                                        نام و نام خانوادگی
                                    </label>
                                    <input class="form-control" type="text" name="name" value="{{auth()->user()->name}}">
                                    @error('name', 'nameUpdate')
                                        <p class="input-error-validation">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                                <div class="tax-select col-lg-6 col-md-6">
                                    <label>
                                        شماره تماس
                                    </label>
                                    <input class="form-control" type="text" name="cellphone"
                                        value="{{auth()->user()->cellphone}}">
                                    @error('cellphone', 'cellphoneUpdate')
                                        <p class="input-error-validation">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>
                                <div class="tax-select col-lg-6 col-md-6">
                                    <label>
                                         ایمیل
                                    </label>
                                    <input class="form-control" type="text" name="email"
                                        value="{{auth()->user()->email}}">
                                    @error('email', 'emailUpdate')
                                        <p class="input-error-validation">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>

                                <div class="tax-select col-lg-6 col-md-6">
                                    <label>
                                         عکس
                                    </label>
                                    <input class="form-control" type="file" name="avatar"
                                        value="{{auth()->user()->avatar}}">
                                    @error('avatar', 'emailUpdate')
                                        <p class="input-error-validation">
                                            <strong>{{ $message }}</strong>
                                        </p>
                                    @enderror
                                </div>


                                <div class=" col-lg-12 col-md-12">

                                    <button class="cart-btn-2" type="submit" style="background-color: #FFC107;
                                    color: white;
                                    margin-bottom: 40px;"> ویرایش آدرس
                                    </button>
                                    <hr>
                                </div>

                            </div>

                        </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="ui-box">
            <div class="ui-box-item">
                <div class="ui-box-item-title" style="padding: 15px;">
                    <h4 class="fw-bold">
                        حساب کاربری شما
                    </h4>
                </div>
                <div class="ui-box-item-desc p-0">
                    <ul class="nav flex-column sidebar-menu">
                        <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
                            <a href="{{route('home.users_profile.index')}}" class="nav-link text-muted">
                                <i class="bi bi-house"></i>
                                <span>ناحیه کاربری</span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('profile/orders') ? 'active' : '' }}">
                            <a href="{{route('home.orders.users_profile.index')}}" class="nav-link text-muted">
                                <i class="bi bi-basket-fill"></i>
                                <span>سفارش ها</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('profile/wishlist') ? 'active' : '' }}">
                            <a href="{{route('home.wishlist.users_profile.index')}}" class="nav-link text-muted">
                                <i class="bi bi-heart"></i>
                                <span>علاقه مندی ها</span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('profile/addresses') ? 'active' : '' }}">
                            <a href="{{route('home.addresses.index')}}" class="nav-link text-muted">
                                <i class="bi bi-pin-map"></i>
                                <span>آدرس ها</span>
                            </a>
                        </li>
                        <li class="nav-item {{ request()->is('profile/comments') ? 'active' : '' }}">
                            <a href="{{route('home.comments.users_profile.index')}}" class="nav-link text-muted">
                                <i class="bi bi-pencil"></i>
                                <span>نظرات شما</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="notification.html" class="nav-link text-muted">
                                <i class="bi bi-chat-dots"></i>
                                <span>اطلاعیه ها</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="address.html" class="nav-link text-muted">
                                <i class="bi bi-pin-map"></i>
                                <span>آدرس ها</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="last-seen.html" class="nav-link text-muted">
                                <i class="bi bi-eye"></i>
                                <span>بازدید های اخیر</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div>
    <script>
        Swal.fire({
      icon: "warning",
      title: "توجه کنید...",
      text: "برای دسترسی به این بخش ابتدا وارد شوید !",
      footer: '<a class="text-warning fs-4 fw-bold" href="#loginModal" data-bs-toggle="modal">ورود و یا ثبت نام</a>',
      timer: 4200,
    });
    </script>
</div>
@endauth
