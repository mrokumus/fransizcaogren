<!DOCTYPE html>
<html class="loading {{ session()->has('theme') ? session()->get('theme') : auth()->user()->preferences->theme }}"
      lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="{{--TODO: Description--}}">
    <meta name="keywords" content="{{--TODO: Keywords--}}">
    <meta name="author" content="{{ getenv('APP_NAME') }}">
    <title>@yield('title') | BETA | Fransızca Öğren</title>
    <link rel="apple-touch-icon" href="{{ url('storage/statics/logo.svg') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('storage/statics/logo.svg') }}">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/vendors.min.css')}}">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/themes/semi-dark-layout.css')}}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <livewireStyles/>
@yield('css')
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
      data-menu="vertical-menu-modern" data-col="">
<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-none d-xl-block ">
                <li class="nav-item">
                    <h5>@yield('title')</h5>
                </li>
            </ul>
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);">
                        <i class="ficon" data-feather="menu"></i>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            @if( session()->has('locale'))
                <li class="nav-item dropdown dropdown-language">
                    <a class="nav-link dropdown-toggle" id="dropdown-flag"
                       href="javascript:void(0);" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="flag-icon flag-icon-{{ session()->get('locale') == 'en' ? 'us' : session()->get('locale')  }}"></i>
                        <span class="selected-language">{{ ucfirst(session()->get('locale')) }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                        @foreach( config('app.locales') as $locale)
                            <a class="dropdown-item" href="{{ route('set.locale', $locale['slug']) }}">
                                <i class="flag-icon flag-icon-{{ $locale['icon'] }}"></i>
                                {{ $locale['name']}}
                            </a>
                        @endforeach
                    </div>
                </li>
            @else
                <li class="nav-item dropdown dropdown-language">
                    <a class="nav-link dropdown-toggle" id="dropdown-flag"
                       href="javascript:void(0);" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="flag-icon flag-icon-{{ config('app.locale') }}"></i>
                        <span class="selected-language">{{ strtoupper(config('app.locale')) }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                        @foreach( config('app.locales') as $locale)
                            <a class="dropdown-item" href="{{ route('set.locale', $locale['slug']) }}">
                                <i class="flag-icon flag-icon-{{ $locale['icon'] }}"></i>
                                {{ $locale['name']}}
                            </a>
                        @endforeach
                    </div>
                </li>
            @endif
            <li class="nav-item">
                @if( auth()->user()->preferences->theme == 'light-layout')
                    <a class="nav-link nav-link-style" href="{{ route('set.theme','dark-layout') }}">
                        <i class="ficon" data-feather="moon"></i>
                    </a>
                @elseif( auth()->user()->preferences->theme == 'dark-layout')
                    <a class="nav-link nav-link-style" href="{{ route('set.theme','light-layout') }}">
                        <i class="ficon" data-feather="moon"></i>
                    </a>
                @endif
            </li>
            {{--Todo:Search in Admin--}}
            <li class="nav-item nav-search">
                <a class="nav-link nav-link-search">
                    <i class="ficon" data-feather="search"></i>
                </a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="{{ __('Search') }}..." tabindex="-1"
                           data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            {{--todo:notification --}}
            <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);"
                                                                         data-toggle="dropdown"><i class="ficon"
                                                                                                   data-feather="bell"></i><span
                            class="badge badge-pill badge-danger badge-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                    <li class="dropdown-menu-header">
                        <div class="dropdown-header d-flex">
                            <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                            <div class="badge badge-pill badge-light-primary">6 New</div>
                        </div>
                    </li>
                    <li class="scrollable-container media-list"><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar"><img
                                                src="../../../app-assets/images/portrait/small/avatar-s-15.jpg"
                                                alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span
                                                class="font-weight-bolder">Congratulation Sam 🎉</span>winner!</p><small
                                            class="notification-text"> Won the monthly best seller badge.</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar"><img
                                                src="../../../app-assets/images/portrait/small/avatar-s-3.jpg"
                                                alt="avatar" width="32" height="32"></div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">New message</span>&nbsp;received
                                    </p><small class="notification-text"> You have 10 unread messages</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content">MD</div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Revised Order 👋</span>&nbsp;checkout
                                    </p><small class="notification-text"> MD Inc. order updated</small>
                                </div>
                            </div>
                        </a>
                        <div class="media d-flex align-items-center">
                            <h6 class="font-weight-bolder mr-auto mb-0">System Notifications</h6>
                            <div class="custom-control custom-control-primary custom-switch">
                                <input class="custom-control-input" id="systemNotification" type="checkbox" checked="">
                                <label class="custom-control-label" for="systemNotification"></label>
                            </div>
                        </div>
                        <a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-danger">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Server down</span>&nbsp;registered
                                    </p><small class="notification-text"> USA Server is down due to hight CPU
                                        usage</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-success">
                                        <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">Sales report</span>&nbsp;generated
                                    </p><small class="notification-text"> Last month sales report generated</small>
                                </div>
                            </div>
                        </a><a class="d-flex" href="javascript:void(0)">
                            <div class="media d-flex align-items-start">
                                <div class="media-left">
                                    <div class="avatar bg-light-warning">
                                        <div class="avatar-content"><i class="avatar-icon"
                                                                       data-feather="alert-triangle"></i></div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="media-heading"><span class="font-weight-bolder">High memory</span>&nbsp;usage
                                    </p><small class="notification-text"> BLR Server using high memory</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">Read
                            all notifications</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link"
                   id="dropdown-user" href="javascript:void(0);"
                   data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{ auth()->user()->name }}</span>
                        <span class="user-status">{{ auth()->user()->preferences->username }}</span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="{{ url('storage/avatars' .'/' . auth()->user()->profile_photo_path) }}"
                             alt="avatar" height="40" width="40">
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('profile.render') }}">
                        <i class="mr-50" data-feather="user"></i>
                        {{ __('Profile') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('profile.setting.render')}}">
                        <i class="mr-50" data-feather="settings"></i>
                        {{ __('Settings') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item"
                           onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="mr-50" data-feather="power"></i>
                            {{ __('Logout') }}
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span class="brand-logo">{{--Todo:Logo ayarlaması yap--}}
                         <h2 class="brand-text">{{ getenv('APP_NAME') }}</h2>
                    </span>
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-x d-block d-xl-none text-primary toggle-icon font-medium-4">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-disc d-none d-xl-block collapse-toggle-icon primary font-medium-4">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @foreach( $menuItems as $key => $firstLevelItem)
                @if($firstLevelItem->nav_id == 1)
                    <li class=" navigation-header">
                        <span>{{ __('Dashboard') }}</span>
                        <i data-feather="more-horizontal"></i>
                    </li>
                @elseif($firstLevelItem->nav_id == 2)
                    <li class=" navigation-header">
                        <span>{{ __('Learn') }}</span>
                        <i data-feather="more-horizontal"></i>
                    </li>
                @elseif($firstLevelItem->nav_id == 3))
                <li class=" navigation-header">
                    <span>{{ __('Social') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                @endif
                @if( $firstLevelItem->sub_menu_level == 1 AND $firstLevelItem->has_sub_menu == 0)
                    <li class=" nav-item {{ url()->current() == rtrim(getenv('APP_URL') . getenv('DASH_URL') . $firstLevelItem->slug,'/') ? 'active' : ''}}">
                        <a class="d-flex align-items-center"
                           href="{{ getenv('DASH_URL'). $firstLevelItem->slug }}">
                            <i data-feather="{{ $firstLevelItem->icon }}"></i>
                            <span class="menu-title text-truncate">{{ __($firstLevelItem->title )}}</span>
                        </a>
                    </li>
                @elseif( $firstLevelItem->has_sub_menu == 1 AND $firstLevelItem->sub_menu_level == 1)
                    <li class=" nav-item">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="{{ $firstLevelItem->icon }}"></i>
                            <span class="menu-title text-truncate">{{ __($firstLevelItem->title)  }}</span>
                        </a>
                        <ul class="menu-content">
                            @foreach($menuItems as $key =>$secondLevelItem)
                                @if($secondLevelItem->has_sub_menu == 0 AND $firstLevelItem->id == $secondLevelItem->submenu_id)
                                    <li class="{{ url()->current() == rtrim(getenv('APP_URL') . getenv('DASH_URL') .  $firstLevelItem->slug . '/' . $secondLevelItem->slug ,'/') ? 'active' : ''}}">
                                        <a class="d-flex align-items-center"
                                           href="{{ getenv('DASH_URL') .  $firstLevelItem->slug . '/' . $secondLevelItem->slug  }}">
                                            <i data-feather="{{ $secondLevelItem->icon }}"></i>
                                            <span class="menu-item text-truncate">
                                                 {{ __($secondLevelItem->title) }}
                                            </span>
                                        </a>
                                    </li>
                                @elseif($secondLevelItem->has_sub_menu == 1 AND $firstLevelItem->id == $secondLevelItem->submenu_id)
                                    <li>
                                        <a class="d-flex align-items-center" href="#">
                                            <i data-feather="{{ $secondLevelItem->icon }}"></i>
                                            <span class="menu-item text-truncate">
                                                {{ $secondLevelItem->title }}
                                            </span>
                                        </a>
                                        <ul class="menu-content">
                                            @foreach( $menuItems as $key => $thirdLevelItem)
                                                @if($thirdLevelItem->submenu_id == $secondLevelItem->id)
                                                    <li class="{{ url()->current() == rtrim(getenv('APP_URL') . getenv('DASH_URL') .  $firstLevelItem->slug . '/' . $secondLevelItem->slug . $thirdLevelItem->slug ,'/') ? 'active' : ''}}">
                                                        <a class="d-flex align-items-center"
                                                           href="{{ getenv('DASH_URL') .  $firstLevelItem->slug . '/' . $secondLevelItem->slug . $thirdLevelItem->slug }}">
                                                        <span class="menu-item text-truncate">
                                                            {{ __($thirdLevelItem->title )}}
                                                        </span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<!-- TODO:Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a
                    class="ml-25" href="https://1.envato.market/pixinvent_portfolio"
                    target="_blank">Fransizcaogren</a><span
                    class="d-none d-sm-inline-block">, All rights Reserved</span></span><span
                class="float-md-right d-none d-md-block">Made with<i data-feather="heart"></i> by <a
                    href="">mrokumus</a></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->
<!-- BEGIN: Vendor JS-->
<livewireScripts/>
<script src="{{ url('app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ url('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ url('app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->
<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
</html>