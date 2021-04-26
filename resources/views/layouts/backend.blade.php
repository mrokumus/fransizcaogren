<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ url('storage/statics/logo.svg')}}"/>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"><!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
    @yield('css')
</head>
<body class="font-sans antialiased">
<div class="flex w-screen h-screen text-gray-400 bg-frblue-700 text-white">
    <div class="w-72 flex flex-col w-16 pb-4 overflow-auto border-r border-gray-800 text-gray-500 select-none">
        <a href="#" class="flex items-center  justify-around">
            <img class="m-1 w-5" src="{{ url('storage/statics/logo.svg') }}" alt="Fransızca Öğren">
            <p class="text-2xl"> Fransızca Öğren</p>
        </a>
        <div class="border-b border-gray-800 ml-0"></div>
        <div class="clearfix"></div>
            <a class="w-12 h-12 m-3 ml-9" href="#">
                <div>
                    <p class="hover:bg-frblue-500 items-center p-3 text-xl hover:text-white rounded w-screen active:bg-frblue-500 active:border-r-3 active:border-frblue-700">dede</p>
                </div>
            </a>
    </div>
    <div class="flex flex-col flex-grow">
        <div class="flex items-center flex-shrink-0 h-16 px-8 border-b border-gray-800">
            <h1 class="text-lg font-medium">@yield('title')</h1>
            <form action="" class="ml-auto mr-auto w-100">
                <i class="absolute fa-search fas p-3 text-gray-900"></i>
                <input type="text"
                       class="w-96 h-100 rounded pl-10 bg-gray-300 text-gray-900 focus:outline-none ring:frblue-900"
                       placeholder="{{ __('Search') }}">
            </form>
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
@yield('js')
<script src="{{ mix('js/app.js') }}" defer></script>
@livewireScripts
</body>
</html>
