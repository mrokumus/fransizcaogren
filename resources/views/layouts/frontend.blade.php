<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('storage/statics/logo.svg')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css"/>
    <livewireStyles/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    @yield('css')
    <title>@yield('title') | {{ getenv('APP_NAME') }}</title>
</head>
<body class="font-quicksand">
<div class="flex w-screen h-screen text-gray-400 bg-frblue-700 text-white">
    <!-- Mini Menu Large Screen -->
    <div class="mini-menu flex flex-col items-center w-16 pb-4 overflow-auto border-r border-gray-800 text-gray-500 select-none lg:block hidden">
        <a href="#">
            <img class="w-12 h-15 m-2" src="{{ url('storage/statics/logo.svg') }}" alt="Fransızca Öğren">
        </a>
        <div class="clearfix"></div>
        @foreach($menuItems as $menuItem)
            <a class="w-12 h-12 m-4" href="{{ $menuItem->slug }}">
                <img class="menuIcon" src="{{ url('storage/statics/icons'). '/'. $menuItem->icon }}"/>
                <span class="menuText absolute bg-frgreen-300 font-light ml-16 p-1 pl-2 pr-2 rounded-3xl text-frgreen-900 hidden">{{ $menuItem->title }}</span>
            </a>
        @endforeach
    </div>
    <!--Mini Menu Small Screen-->
    <div class="max-h-screen h-screen lg:hidden bg-gray-900 items-center items-baseline">
        <div class="relative h-full w-full">
            <div class="absolute inset-x-0 bottom-0 h-16 text-white mb-2 w-full mx-auto max-w-sm">
                <div class="flex flew-row w-full mx-auto h-full bg-gray-700 rounded-full px-3 w-screen justify-between items-baseline">
                    @foreach($menuItems as $menuItem)
                        @if($menuItem->mobile_visibility == 1)
                            <a class="w-12 h-12 m-4" href="{{ $menuItem->slug }}">
                                <span class="menuText absolute bg-frgreen-300 font-light ml-16 p-1 pl-2 pr-2 rounded-3xl text-frgreen-900 hidden">{{ $menuItem->title }}</span>
                                <img class="menuIcon" src="{{ url('storage/statics/icons'). '/'. $menuItem->icon }}"/>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--Mini Menu Small Screen End-->
    @yield('left-side-bar')
    <div class="flex flex-col flex-grow">
        <div class="flex items-center flex-shrink-0 h-16 border-b border-gray-800 justify-between">
            <!--Title-->
            <div class="hidden md:block w-1/2">
                <div class="flex items-center flex-shrink-0 h-16 px-8 border-b border-gray-800">
                    <h1 class="text-lg font-medium ml-auto">@yield('title')</h1>
                    <form action="" class="ml-auto w-100">
                        <i class="absolute fa-search fas p-3 text-gray-900"></i>
                        <input type="text"
                               class="w-96 h-100 rounded pl-10 bg-gray-300 text-gray-900 focus:outline-none ring:frblue-900"
                               placeholder="{{ __('Search') }}">
                    </form>
                </div>
            </div>
            <!--End Title-->
            <div class="flex items-center flex-shrink-0 h-16 px-8 border-b border-gray-800 block md:hidden">
                <ul class="flex flex-1 items-center">
                    <li>
                        <a href="{{ route('home') }}">
                            <img class="w-4 m-2" src="{{ url('storage/statics/logo.svg') }}" alt="Fransızca Öğren">
                        </a>
                    </li>
                    <li>
                        @yield('mobile-sub-menu')
                    </li>
                    @if( Auth::user())
                        <li class="ml-auto">
                            <a href="{{ route('profile.show') }}">
                                <img class="h-8 w-8 rounded-full object-cover"
                                     src="{{ url('storage/avatars'. '/'. Auth::user()->profile_photo_path) }}"
                                     alt="{{ Auth::user()->name }}"/>
                            </a>
                        </li>
                @endif
                <!--Not Auth Area-->
                    <li class="ml-auto">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-transparent hover:text-gray-700 focus:outline-none transition">
                                    <i data-feather="menu"></i>
                                    </button>
                                </span>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Menu') }}
                                </div>
                                <div class="border-t border-gray-100"></div>
                                @foreach($menuItems as $menuItem)
                                    @if($menuItem->mobile_visibility == 0)
                                        <x-jet-dropdown-link href="{{ url(getenv('APP_URL') . $menuItem->slug) }}">
                                            {{ __($menuItem->title) }}
                                        </x-jet-dropdown-link>
                                    @endif
                                @endforeach
                                <div class="border-t border-gray-100"></div>
                                @if(!Auth::user())
                                    <x-jet-dropdown-link href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </x-jet-dropdown-link>
                                @else
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
                                                         this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                @endif
                            </x-slot>
                        </x-jet-dropdown>
                    </li>
                </ul>
                <!--End Not Auth Area-->
            </div>
            <div class="hidden md:block">
                <ul class="nav navbar-nav float-right flex mr-1">
                    <li>
                        <div class=" relative inline-block text-left dropdown">
                             <span class="rounded-md shadow-sm">
                                   <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium
                                          leading-5 text-gray-700 transition duration-150 ease-in-out border border-gray-300 rounded-md
                                          hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800"
                                           type="button" aria-haspopup="true" aria-expanded="true"
                                           aria-controls="headlessui-menu-items-117">
                                       <span>
                                          @if( session()->has('locale'))
                                               <i class="flag-icon flag-icon-{{ session()->get('locale') == 'en' ? 'us' : session()->get('locale')  }}"></i>
                                               <span class="selected-language">{{ strtoupper(session()->get('locale')) }}</span>
                                           @else
                                               <i class="flag-icon flag-icon-{{ config('app.locale') }}"></i>
                                               <span class="selected-language">{{ strtoupper(config('app.locale')) }}</span>
                                           @endif
                                       </span>
                                   </button>
                             </span>
                            <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95">
                                <div class="absolute right-0 w-28 p-2 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md
                                shadow-lg outline-none"
                                     aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117"
                                     role="menu">
                                    @foreach( config('app.locales') as $locale)
                                        <a href="{{ route('set.locale', $locale['slug']) }}">
                                            <div class="m-1 ml-auto">
                                                <i class="flag-icon flag-icon-{{ $locale['icon'] }}"></i>
                                                <span class="selected-language">{{ $locale['name']}}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    @if( Auth::user())
                        <li class="ml-3">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                 src="{{ url('storage/avatars'. '/'. Auth::user()->profile_photo_path) }}"
                                                 alt="{{ Auth::user()->name }}"/>
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>
                                </span>
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </li>
                    @else
                        <li>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <a class="dropdown-item">
                                    <i class="feather icon-power"></i>
                                    <a href="{{ route('login') }}"
                                       class="flex items-center justify-center h-10 px-4 ml-2 text-sm font-medium bg-gray-500 rounded hover:bg-gray-700"
                                    >{{ __('Login') }}</a>
                                </a>
                            </form>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                               class="flex items-center justify-center h-10 px-4 ml-2 text-sm font-medium bg-gray-800 rounded hover:bg-gray-700">
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="flex-grow p-6 overflow-auto bg-gray-800 bg-gradient-to-tr from-frblue-500 via-frblue-700 to-frblue-900">
            <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Component End  -->
</div>
<livewireScripts/>
<script src="{{ mix('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
@yield('js')
</body>
</html>