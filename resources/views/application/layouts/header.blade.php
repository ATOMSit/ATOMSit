<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">

    </div>
    <div class="kt-header__topbar">
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">
                        Bonjour,
                    </span>
                    <span class="kt-header__topbar-username kt-hidden-mobile">
                        {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    </span>
                    <img class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold" alt="Pic"
                         src="{{asset(Auth::user()->getFirstMedia('avatar')->getUrl('thumb'))}}"/>
                </div>
            </div>

            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{asset('application/media/misc/bg-1.jpg')}})">
                    <div class="kt-user-card__avatar">
                        <img class="kt-hidden" alt="Pic" src="{{asset('application/media/users/300_25.jpg')}}"/>
                    </div>
                    <div class="kt-user-card__name">
                        {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                    </div>
                </div>
                <div class="kt-notification">
                    <a href="{{route('admin.user.edit',['id'=>Auth::user()->id])}}" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">
                                Mon profile
                            </div>
                            <div class="kt-notification__item-time">
                                Modifier mon compte utilisateur
                            </div>
                        </div>
                    </a>
                    <div class="kt-notification__custom">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" target="_blank"
                           class="btn btn-label-brand btn-sm btn-bold">
                            Deconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>