<x-frontend-layout>
    @section('title') {{ __('Grammar') }} @endsection
    @section('js')@endsection
    @section('css')
        <style>
            .dropdown-menu[data-show] {
                display: flex;
            }

            .customizer {
                width: 260px;
                right: -260px;
            }
        </style>
    @endsection
    @section('right-side-bar')
        <div class="customizer">
            <a class="customizer-toggle d-flex align-items-center justify-content-center"
               href="javascript:void(0);">
                <i data-feather="menu"></i>
            </a>
            <div class="customizer-content" style="max-width: 260px">
                <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
                    <div class="customizer-header px-2 pt-1 pb-0 position-relative">
                        <h4 class="mb-0">Theme Customizer</h4>
                        <p class="m-0">Customize & Preview in Real Time</p>
                        <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
                    </div>
                    <div class="shadow-bottom"></div>
                    <div>
                        <ul>
                            @foreach( $grammarMenuItems as $key => $firstLevelItem)
                                @if( $firstLevelItem->sub_menu_level == 1 AND $firstLevelItem->has_sub_menu == 0)
                                    <li class="nav-item {{ url()->current() == rtrim(getenv('APP_URL') . getenv('DASH_URL') . $firstLevelItem->slug,'/') ? 'active' : ''}}">
                                        <a class="d-flex align-items-center"
                                           href="{{ getenv('DASH_URL'). $firstLevelItem->slug }}">
                                            <i data-feather="{{ $firstLevelItem->icon }}"></i>
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
                                            @foreach($grammarMenuItems as $key =>$secondLevelItem)
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
                                                            @foreach( $grammarMenuItems as $key => $thirdLevelItem)
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

            </div>
        </div>
    @endsection
    @section('content')
        @if(isset($content[0]))
            {{$content[0]->title}}
            {{$content[0]->content}}
        @endif
    @endsection
</x-frontend-layout>