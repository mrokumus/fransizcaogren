<x-frontend-layout>
    @section('title') {{ __('Grammar') }} @endsection
    @section('js')@endsection
    @section('css')
        <style>
            .dropdown-menu[data-show] {
                display: flex;
            }
        </style>
    @endsection
    @section('left-side-bar')
        <div class="flex flex-col w-72 border-r border-gray-800 overflow-auto">
            <div class="flex items-center justify-between w-full h-16 min-h-16 px-4 border-b border-gray-800 hover:bg-gray-800 justify-around">
                        <span class="font-light text-2xl bg-gradient-to-r from-frblue_l-500 via-white-900 to-frred-500 bg-clip-text text-transparent select-none">
                            {{ ucwords(getenv('APP_NAME')) }}
                        </span>
            </div>
            @foreach( $grammarMenuItems as $key => $firstLevelItem)
                @if( $firstLevelItem->sub_menu_level == 1)
                    <div x-data="{ isActive: false, open: false}">
                        <a href="{{ '/grammar/' . $firstLevelItem->slug }}"
                           @click="$event.preventDefault(); open = !open"
                           class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-blue-100 dark:hover:bg-blue-300"
                           :class="{'bg-blue-300': isActive || open}"
                           role="button"
                           aria-haspopup="true"
                           :aria-expanded="(open || isActive) ? 'true' : 'false'">
                            <span class="ml-2 text-l ">{{ $firstLevelItem->title }}</span>
                            <span aria-hidden="true" class="ml-auto">
                                  <svg class="w-4 h-4 transition-transform transform"
                                       :class="{ 'rotate-180': open }"
                                       xmlns="http://www.w3.org/2000/svg"
                                       fill="none"
                                       viewBox="0 0 24 24"
                                       stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7"
                                    />
                                 </svg>
                            </span>
                        </a>
                        @foreach( $grammarMenuItems as $key => $secondLevelItem)
                            @if( $secondLevelItem->sub_menu_level == 2 AND $firstLevelItem->id == $secondLevelItem->sub_menu_id)
                                <div x-show="open" class="mt-2 space-y-2 px-7 bg-transparent" role="menu"
                                     aria-label="{{ $firstLevelItem->title }}">
                                    <a href="{{ $secondLevelItem->has_sub_menu == 0 ? '/grammar' . '/' . $secondLevelItem->slug : '#'}}"
                                       role="menuitem"
                                       class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                        {{ $secondLevelItem->title}}
                                    </a>
                                    @foreach($grammarMenuItems as $key => $thirdLevelItem)
                                        @if($secondLevelItem->id == $thirdLevelItem->sub_menu_id)
                                            <div x-show="open" class="mt-2 space-y-2 px-7" role="menu"
                                                 aria-label="{{ $thirdLevelItem->title }}">
                                                <a href="{{ $thirdLevelItem->has_sub_menu == 0 ? '/grammar' . '/' . $thirdLevelItem->slug : '#'}}"
                                                   role="menuitem"
                                                   class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                                    {{ $thirdLevelItem->title }}
                                                </a>
                                                @foreach( $grammarMenuItems as $key => $fourthLevelItem)
                                                    @if( $thirdLevelItem->id == $fourthLevelItem->sub_menu_id)
                                                        <div x-show="open"
                                                             class="mt-2 space-y-2 px-7  bg-transparent"
                                                             role="menu"
                                                             aria-label="{{ $fourthLevelItem->title }}">
                                                            <a href="{{ $fourthLevelItem->has_sub_menu == 0 ? '/grammar' . '/' . $fourthLevelItem->slug : '#'}}"
                                                               role="menuitem"
                                                               class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                                                {{ $fourthLevelItem->title }}
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>
    @endsection
    @section('content')
        @if(isset($content[0]))

            {{$content[0]->title}}
        @endif
    @endsection
</x-frontend-layout>