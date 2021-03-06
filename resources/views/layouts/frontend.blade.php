<!DOCTYPE html>
<html class="loading {{ session()->has('theme') ? session()->get('theme') : isset(auth()->user()->preferences->theme) }}"
      lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="{{--TODO: Description--}}">
    <meta name="keywords" content="{{--TODO: Keywords--}}">
    <meta name="author" content="{{ getenv('APP_NAME') }}">
    <title>@yield('title') | Fransızca Öğren</title>
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
<body class="vertical-layout vertical-menu-modern navbar-floating footer-static {{ session()->has('menu_collapse') ? session()->get('menu_collapse') : 'menu-expanded'}}"
      data-open="click"
      data-menu="vertical-menu-modern">
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
                        <i class="flag-icon flag-icon-{{ isset(auth()->user()->preferences->language) ? auth()->user()->preferences->language : config('app.locale') }}"></i>
                        <span class="selected-language">{{ isset(auth()->user()->preferences->language) ? ucfirst(auth()->user()->preferences->language) : ucfirst(config('app.locale')) }}</span>
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
                @if( isset(auth()->user()->id))
                    @if( auth()->user()->preferences->theme == 'light-layout')
                        <a class="nav-link nav-link-style" href="{{ route('set.theme','dark-layout') }}">
                            <svg class="ficon" data-feather="moon" stroke="gray" fill="gray"></svg>
                        </a>
                    @elseif( auth()->user()->preferences->theme == 'dark-layout')
                        <a class="nav-link nav-link-style" href="{{ route('set.theme','light-layout') }}">
                            <svg class="ficon" data-feather="sun" stroke="yellow" fill="yellow"></svg>
                        </a>
                    @endif
                @else
                    @if( session()->has('theme') AND session()->get('theme') == 'light-layout')
                        <a class="nav-link nav-link-style" href="{{ route('set.theme','dark-layout') }}">
                            <svg class="ficon" stroke="gray" fill="gray" data-feather="moon"></svg>
                        </a>
                    @else
                        <a class="nav-link nav-link-style" href="{{ route('set.theme','light-layout') }}">
                            <svg class="ficon" stroke="yellow" fill="yellow" data-feather="sun"></svg>
                        </a>
                    @endif
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
            @if(isset(auth()->user()->id))
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
                                    <img class="round"
                                         src="{{ url('storage/avatars' .'/' . auth()->user()->profile_photo_path) }}"
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
            @else
                <a class="nav-link nav-link-style  btn btn-secondary ml-1 d-none d-md-block"
                   href="{{ route('login') }}">
                    <span class=" px-1">{{ __('Login') }}</span>
                </a>
                <a class="nav-link nav-link-style  btn btn-primary ml-1" href="{{ route('register') }}">
                    <span class="d-block px-1">{{ __('Register') }}</span>
                </a>
            @endif
        </ul>
    </div>
</nav>
<!-- END: Header-->
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header" style="height:100px">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item">
                <a class="navbar-brand" href="{{ route('home') }}">
                     <span class="brand-logo ml-1">
                         <img src="{{ url('storage/statics/logo.svg') }}" style="width: 20px;" alt="Logo">
                     </span>
                    <span class="brand-text">
                        <h2 class="brand-text" style="font-size: 15px">{{ getenv('APP_NAME') }}</h2>
                    </span>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                {{-- todo:toggle oldugunda o şekilde tut --}}
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"
                   onclick="{{ !session()->has('menu_collapse') ? session()->put('menu_collapse', 'menu_collapsed') : session()->forget('menu_collapse')}}">
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
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @foreach( $menuItems as $key => $firstLevelItem)
                @if($firstLevelItem->status == 1)
                    @if( $firstLevelItem->sub_menu_level == 1 AND $firstLevelItem->has_sub_menu == 0)
                        <li class=" nav-item {{ url()->current() == rtrim( getenv('APP_URL') .'/'. $firstLevelItem->slug,'/') ? 'active' : ''}}">
                            <a class="d-flex align-items-center"
                               href="{{ '/' . $firstLevelItem->slug }}">
                                <img style="width: 30px" class="mr-1"
                                     src="{{ url('storage/statics/icons') .'/' . $firstLevelItem->icon }}" alt="Icon"/>
                                <span class="menu-title text-truncate">{{ __($firstLevelItem->title )}}</span>
                            </a>
                        </li>
                    @elseif( $firstLevelItem->has_sub_menu == 1 AND $firstLevelItem->sub_menu_level == 1)
                        <li class="nav-item">
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
                @endif
            @endforeach
            <li class="d-block d-md-none">
                <a class="nav-link nav-link-style  btn btn-primary ml-1" href="{{ route('login') }}">
                    <span class=" px-1">{{ __('Login') }}</span>
                </a>
            </li>
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
@yield('right-side-bar')
<!-- END: Content-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<!-- TODO:Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0">
        <span class="float-md-left d-block d-md-inline-block mt-25">{{ __('COPYRIGHT') }} &copy;
            <a class="ml-25" href="{{ getenv('APP_URL') }}"
               target="_blank">{{ getenv('APP_NAME') }}</a>
            <span class="d-none d-sm-inline-block">, {{ __('All rights Reserved') }}</span>
        </span>
        <span class="float-md-right d-none d-md-block">Made with
            <i data-feather="heart"></i> by
            <a href="{{ url(getenv('APP_URL') . '/@mrokumus' )  }}">mrokumus</a>
        </span>
    </p>
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
<script src="{{ url('app-assets/js/scripts/customizer.min.js') }}"></script>
<!-- END: Theme JS-->
<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14,
                'stroke-width': 1,
            });
        }
    })
</script>
</body>
</html>