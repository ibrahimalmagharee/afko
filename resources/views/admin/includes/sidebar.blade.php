<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item @if(request()->url() === route('admin.dashboard')) active @endif">
                <a href="{{route('admin.dashboard')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item @if(request()->url() === route('orders')) active @endif">
                <a href="{{route('orders')}}"><i class="la la-opera"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">الطلبات </span>
                <span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Order::count()}}</span>
                </a>

            </li>

            <li class="nav-item @if(request()->url() === route('index.logo')) active @endif">
                <a href="{{route('index.logo')}}"><i class="la la-opera"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">الشعار </span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Logo::count()}}</span>
                </a>

            </li>

            <li class="nav-item @if(request()->url() === route('index.background')) active @endif">
                <a href="{{route('index.background')}}"><i class="la la-opera"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">صورة الخلفية </span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Background::count()}}</span>
                </a>

            </li>

            <li class="nav-item @if(request()->url() === route('index.contact_information')) active @endif">
                <a href="{{route('index.contact_information')}}"><i class="la la-opera"></i>
                    <span class="menu-title" data-i18n="nav.add_on_drag_drop.main">معلومات التواصل</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\ContactInformation::count()}}</span>
                </a>

            </li>









        </ul>
    </div>
</div>
