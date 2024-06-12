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
<link rel="stylesheet" href="{{asset('assets/css/style-1.css')}}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                           <i class="fa-solid fa-pen"></i>
                        <a href="#" class="text-muted" data-bs-toggle="collapse" data-bs-target="#collapseEdit-{{auth()->user()->id}}" aria-expanded="false" aria-controls="collapseEdit">
                            ویرایش اطلاعات
                        </a>
                       </div>

                        <hr>

                        <div class="collapse" id="collapseEdit-{{auth()->user()->id}}"  style="    margin-top: 30px;">
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
