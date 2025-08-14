<div data-active-color="black" data-background-color="white" data-image="" class="app-sidebar">
    <div class="sidebar-header">
        <div class="logo clearfix"><a href="index-2.html" class="logo-text float-right">
                <div class="logo-img"><img src="/admin/img/logo-dark.png" alt="Convex Logo" /></div><span
                    class="text align-middle">CONVEX</span>
            </a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i
                    data-toggle="expanded" class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;"
                class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-circle"></i></a></div>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                @hasanyrole('super_admin|admin|writer')
                    <li class="nav-item {{ request()->is('admin-panel/dashboard') ? 'active' : '' }}"><a
                            href="{{ route('dashboard') }}"><i class="icon-home"></i><span data-i18n=""
                                class="menu-title">داشبورد</span></a>
                    </li>
                @endhasanyrole

                @can('users_management')
                    <li class="has-sub nav-item"><a href="#"><i class="icon-users"></i><span data-i18n=""
                                class="menu-title">کاربران</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin-panel/management/users') ? 'active' : '' }}"><a
                                    href="{{ route('admin.users.index') }}" class="menu-item">لیست کاربران</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/users/create') ? 'active' : '' }}"><a
                                    href="{{ route('admin.users.create') }}" class="menu-item">ایجاد کاربر</a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @hasanyrole('super_admin|admin|writer')
                    <li class="has-sub nav-item"><a href="#"><i class="icon-shield"></i><span data-i18n=""
                                class="menu-title">مقالات</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin-panel/management/blogs') ? 'active' : '' }}"><a
                                    href="{{ route('admin.blogs.index') }}" class="menu-item">لیست مقالات</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/blogs/create') ? 'active' : '' }}"><a
                                    href="{{ route('admin.blogs.create') }}" class="menu-item">ایجاد مقاله</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub nav-item"><a href="#"><i class="icon-layers"></i><span data-i18n=""
                                class="menu-title">دسته بندی مقاله</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin-panel/management/categoryblog') ? 'active' : '' }}"><a
                                    href="{{ route('admin.categoryblog.index') }}" class="menu-item">لیست دسته بندی
                                    مقاله</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/categoryblog/create') ? 'active' : '' }}">
                                <a href="{{ route('admin.categoryblog.create') }}" class="menu-item">ایجاد دسته بندی
                                    مقاله</a>
                            </li>
                        </ul>
                    </li>
                @endhasanyrole

                @can('product_management')
                    <li class="has-sub nav-item"><a href="#"><i class="icon-users"></i><span data-i18n=""
                                class="menu-title">برند ها</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin-panel/management/brands') ? 'active' : '' }}"><a
                                    href="{{ route('admin.brands.index') }}" class="menu-item">لیست برند ها</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/brands/create') ? 'active' : '' }}"><a
                                    href="{{ route('admin.brands.create') }}" class="menu-item">ایجاد برند</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub nav-item"><a href="#"><i class="icon-users"></i><span data-i18n=""
                                class="menu-title">تگ ها</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin-panel/management/tags') ? 'active' : '' }}"><a
                                    href="{{ route('admin.tags.index') }}" class="menu-item">لیست تگ ها</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/tags/create') ? 'active' : '' }}"><a
                                    href="{{ route('admin.tags.create') }}" class="menu-item">ایجاد تگ</a>
                            </li>
                        </ul>
                    </li>


                    <li class="has-sub nav-item"><a href="#"><i class="icon-layers"></i><span data-i18n=""
                                class="menu-title">ویژگی های محصول</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin-panel/management/attributes') ? 'active' : '' }}"><a
                                    href="{{ route('admin.attributes.index') }}" class="menu-item">لیست ویژگی های
                                    محصول</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/attributes/create') ? 'active' : '' }}"><a
                                    href="{{ route('admin.attributes.create') }}" class="menu-item">ایجاد ویژگی های
                                    محصول</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub nav-item"><a href="#"><i class="icon-layers"></i><span data-i18n=""
                                class="menu-title">دسته بندی ها</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin-panel/management/categories') ? 'active' : '' }}"><a
                                    href="{{ route('admin.categories.index') }}" class="menu-item">لیست دسته بندی ها</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/categories/create') ? 'active' : '' }}"><a
                                    href="{{ route('admin.categories.create') }}" class="menu-item">ایجاد دسته بندی</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub nav-item"><a href="#"><i class="icon-shield"></i><span data-i18n=""
                                class="menu-title">محصولات</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin-panel/management/products') ? 'active' : '' }}"><a
                                    href="{{ route('admin.products.index') }}" class="menu-item">لیست محصول</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/products/create') ? 'active' : '' }}"><a
                                    href="{{ route('admin.products.create') }}" class="menu-item">ایجاد محصول</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/coupons') ? 'active' : '' }}"><a
                                    href="{{ route('admin.coupons.index') }}" class="menu-item">تخفیفات</a>
                            </li>
                        </ul>
                    </li>
                @endcan
                @role('super_admin|admin')
                    <li class="has-sub nav-item"><a href="#"><i class="icon-users"></i><span data-i18n=""
                                class="menu-title">نقش ها</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin-panel/management/roles') ? 'active' : '' }}"><a
                                    href="{{ route('admin.roles.index') }}" class="menu-item">لیست نقش ها</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/roles/create') ? 'active' : '' }}"><a
                                    href="{{ route('admin.roles.create') }}" class="menu-item">ایجاد نقش</a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub nav-item"><a href="#"><i class="icon-shield"></i><span data-i18n=""
                                class="menu-title">مجوز ها</span></a>
                        <ul class="menu-content">
                            <li class="{{ request()->is('admin-panel/management/permissions') ? 'active' : '' }}"><a
                                    href="{{ route('admin.permissions.index') }}" class="menu-item">لیست مجوز ها</a>
                            </li>
                            <li class="{{ request()->is('admin-panel/management/permissions/create') ? 'active' : '' }}">
                                <a href="{{ route('admin.permissions.create') }}" class="menu-item">ایجاد مجوز</a>
                            </li>
                        </ul>
                    </li>

                    @can('order_management')
                        <li class="has-sub nav-item"><a href="#"><i class="icon-shield"></i><span data-i18n=""
                                    class="menu-title">سفارشات</span></a>
                            <ul class="menu-content">
                                <li class="{{ request()->is('admin-panel/management/orders') ? 'active' : '' }}"><a
                                        href="{{ route('admin.orders.index') }}" class="menu-item">لیست سفارشات</a>
                                </li>
                                <li class="{{ request()->is('admin-panel/management/transactions') ? 'active' : '' }}"><a
                                        href="{{ route('admin.transactions.index') }}" class="menu-item">لیست تراکنش</a>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @role('super_admin|admin')
                        <li class="has-sub nav-item"><a href="#"><i class="icon-shield"></i><span data-i18n=""
                                    class="menu-title">بنر ها</span></a>
                            <ul class="menu-content">
                                <li class="{{ request()->is('admin-panel/management/banners') ? 'active' : '' }}"><a
                                        href="{{ route('admin.banners.index') }}" class="menu-item">لیست بنر ها</a>
                                </li>
                                <li class="{{ request()->is('admin-panel/management/banners/create') ? 'active' : '' }}">
                                    <a href="{{ route('admin.banners.create') }}" class="menu-item">ایجاد بنر</a>
                                </li>
                            </ul>
                        </li>
                    @endrole

                    <li class=" nav-item"><a href="cards.html"><i class="icon-layers"></i><span data-i18n=""
                                class="menu-title">کارت ها</span></a>
                    </li>
                    <li class="has-sub nav-item"><a href="#"><i class="icon-puzzle"></i><span data-i18n=""
                                class="menu-title">اجزاء</span></a>
                        <ul class="menu-content">
                            <li class="has-sub"><a href="#" class="menu-item">بوت استرپ</a>
                                <ul class="menu-content">
                                    <li><a href="components-lists.html" class="menu-item">لیست</a>
                                    </li>
                                    <li><a href="components-buttons.html" class="menu-item">دکمه</a>
                                    </li>
                                    <li><a href="components-alerts.html" class="menu-item">هشدار</a>
                                    </li>
                                    <li><a href="components-badges.html" class="menu-item">نشان</a>
                                    </li>
                                    <li><a href="components-dropdowns.html" class="menu-item">لیست کشویی</a>
                                    </li>
                                    <li><a href="components-inputgroups.html" class="menu-item">گروه های ورودی</a>
                                    </li>
                                    <li><a href="components-media-objects.html" class="menu-item">اشیاء رسانه ای</a>
                                    </li>
                                    <li><a href="components-pagination.html" class="menu-item">صفحه بندی</a>
                                    </li>
                                    <li><a href="components-progress.html" class="menu-item"> میله پیشرفت</a>
                                    </li>
                                    <li><a href="components-modals.html" class="menu-item">مدال</a>
                                    </li>
                                    <li><a href="components-collapse.html" class="menu-item">سقوط</a>
                                    </li>
                                    <li><a href="components-accordion.html" class="menu-item">آکاردئون</a>
                                    </li>
                                    <li><a href="components-carousel.html" class="menu-item">اسلایدر</a>
                                    </li>
                                    <li><a href="components-datepicker.html" class="menu-item">انتخاب تاریخ و زمان</a>
                                    </li>
                                    <li><a href="components-popover.html" class="menu-item">اعلان</a>
                                    </li>
                                    <li><a href="components-tooltip.html" class="menu-item">راهنمایی</a>
                                    </li>
                                    <li><a href="components-tabs.html" class="menu-item">تب</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub"><a href="#" class="menu-item">فوق العاده</a>
                                <ul class="menu-content">
                                    <li><a href="sweet-alerts.html" class="menu-item">هشدار شیرین</a>
                                    </li>
                                    <li><a href="toastr.html" class="menu-item">توستر</a>
                                    </li>
                                    <li><a href="upload.html" class="menu-item">بارگذاری</a>
                                    </li>
                                    <li><a href="editor.html" class="menu-item">ویرایشگر</a>
                                    </li>
                                    <li><a href="dragndrop.html" class="menu-item">کشیدن و انداختن</a>
                                    </li>
                                    <li><a href="tour.html" class="menu-item">تور</a>
                                    </li>
                                    <li><a href="tags-input.html" class="menu-item">برچسب ورودی</a>
                                    </li>
                                    <li><a href="switch.html" class="menu-item">تعویض</a>
                                    </li>
                                    <li><a href="rating.html" class="menu-item">رتبه بندی</a>
                                    </li>
                                    <li><a href="typeahead.html" class="menu-item">تایپ</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub nav-item"><a href="#"><i class="icon-doc"></i><span data-i18n=""
                                class="menu-title">فرم</span><span
                                class="tag badge badge-pill badge-primary mt-1">جدید</span></a>
                        <ul class="menu-content">
                            <li class="has-sub"><a href="#" class="menu-item">عناصر</a>
                                <ul class="menu-content">
                                    <li><a href="inputs.html" class="menu-item">ورودی</a>
                                    </li>
                                    <li><a href="input-groups.html" class="menu-item">گروه های ورودی</a>
                                    </li>
                                    <li><a href="input-grid.html" class="menu-item">شبکه ورودی</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub"><a href="#" class="menu-item">پوسته</a>
                                <ul class="menu-content">
                                    <li><a href="basic-forms.html" class="menu-item">فرم های پایه</a>
                                    </li>
                                    <li><a href="horizontal-forms.html" class="menu-item">فرم افقی</a>
                                    </li>
                                    <li><a href="hidden-labels.html" class="menu-item">برچسب های مخفی</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="validation-forms.html" class="menu-item">اعتبار سنجی</a>
                            </li>
                            <li><a href="wizard-forms.html" class="menu-item">جادویی</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub nav-item"><a href="#"><i class="icon-grid"></i><span data-i18n=""
                                class="menu-title">جدول</span></a>
                        <ul class="menu-content">
                            <li><a href="regular-table.html" class="menu-item">منظم</a>
                            </li>
                            <li><a href="extended-table.html" class="menu-item">گسترده</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub nav-item"><a href="#"><i class="icon-notebook"></i><span data-i18n=""
                                class="menu-title">جدول داده</span></a>
                        <ul class="menu-content">
                            <li><a href="dt-basic-initialization.html" class="menu-item">آغازگر اولیه</a>
                            </li>
                            <li><a href="dt-advanced-initialization.html" class="menu-item">آغازگر پیشرفته</a>
                            </li>
                            <li><a href="dt-styling.html" class="menu-item">ظاهر طراحی شده</a>
                            </li>
                            <li><a href="dt-data-sources.html" class="menu-item">منابع داده</a>
                            </li>
                            <li><a href="dt-api.html" class="menu-item">رابط‌ نرم‌افزار</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item"><a href="google-map.html"><i class="icon-map"></i><span data-i18n=""
                                class="menu-title">نقشه گوگل</span></a>
                    </li>
                    <li class="has-sub nav-item"><a href="#"><i class="icon-pie-chart"></i><span data-i18n=""
                                class="menu-title">نمودار</span><span
                                class="tag badge badge-pill badge-success white mt-1">2</span></a>
                        <ul class="menu-content">
                            <li><a href="chartist.html" class="menu-item">چارتیست</a>
                            </li>
                            <li><a href="chartjs.html" class="menu-item">نمودار با جاوااسکریپت</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub nav-item"><a href="#"><i class="icon-docs"></i><span data-i18n=""
                                class="menu-title">صفحات</span></a>
                        <ul class="menu-content">
                            <li><a href="forgot-password-page.html" class="menu-item">رمز عبور را فراموش کرده اید</a>
                            </li>
                            <li><a href="horizontal-timeline-page.html" class="menu-item">خط زمانی افقی</a>
                            </li>
                            <li><a href="vertical-timeline-page.html" class="menu-item">خط زمانی عمودی</a>
                            </li>
                            <li><a href="login-page.html" class="menu-item">ورود</a>
                            </li>
                            <li><a href="register-page.html" class="menu-item">ثبت نام</a>
                            </li>
                            <li><a href="user-profile-page.html" class="menu-item">مشخصات کاربر</a>
                            </li>
                            <li><a href="lock-screen-page.html" class="menu-item">قفل صفحه</a>
                            </li>
                            <li><a href="invoice-page.html" class="menu-item">فاکتور</a>
                            </li>
                            <li><a href="error-page.html" class="menu-item">خطا</a>
                            </li>
                            <li><a href="coming-soon-page.html" class="menu-item">به زودی</a>
                            </li>
                            <li><a href="maintenance-page.html" class="menu-item">نگهداری</a>
                            </li>
                            <li><a href="gallery-page.html" class="menu-item">گالری</a>
                            </li>
                            <li><a href="search.html" class="menu-item">جستجو</a>
                            </li>
                            <li><a href="faq.html" class="menu-item">سوالات متداول</a>
                            </li>
                            <li><a href="knowledge-base.html" class="menu-item">دانش محور</a>
                            </li>
                        </ul>
                    </li>
                    <li class=" nav-item"><a
                            href="http://pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/documentation"><i
                                class="icon-book-open"></i><span data-i18n="" class="menu-title">مستندات</span></a>
                    </li>
                    <li class=" nav-item"><a href="https://pixinvent.ticksy.com/"><i class="icon-support"></i><span
                                data-i18n="" class="menu-title">پشتیبانی</span></a>
                    </li>
                @endrole

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
