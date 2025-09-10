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
                            <li class="{{ request()->is('admin-panel/management/trashed_users') ? 'active' : '' }}"><a
                                    href="{{ route('admin.users.trashed_user') }}" class="menu-item">لیست کاربران حذف
                                    شده</a>
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
                            <li class="{{ request()->is('admin-panel/management/trashed_blogs') ? 'active' : '' }}"><a
                                    href="{{ route('admin.blogs.trashed_blog') }}" class="menu-item">لیست مقالات حذف
                                    شده</a>
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
                            <li class="{{ request()->is('admin-panel/management/trashed_brands') ? 'active' : '' }}"><a
                                    href="{{ route('admin.brands.trashed_brand') }}" class="menu-item">لیست برند
                                    حذف شده</a>
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
                            <li class="{{ request()->is('admin-panel/management/trashed_tags') ? 'active' : '' }}"><a
                                    href="{{ route('admin.tags.trashed_tag') }}" class="menu-item">لیست تگ های حذف شده</a>
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
                            <li class="{{ request()->is('admin-panel/management/trashed_products') ? 'active' : '' }}"><a
                                    href="{{ route('admin.products.trashed_product') }}" class="menu-item">لیست محصولات
                                    حذف شده</a>
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
                                <li class="{{ request()->is('admin-panel/management/trashed_banners') ? 'active' : '' }}"><a
                                        href="{{ route('admin.banners.trashed_banner') }}" class="menu-item">لیست بنر
                                        حذف شده</a>
                                </li>
                                <li class="{{ request()->is('admin-panel/management/banners/create') ? 'active' : '' }}">
                                    <a href="{{ route('admin.banners.create') }}" class="menu-item">ایجاد بنر</a>
                                </li>
                            </ul>
                        </li>
                    @endrole
                @endrole

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
