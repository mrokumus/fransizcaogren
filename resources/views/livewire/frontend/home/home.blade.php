<x-frontend-layout>
    @section('title') {{ __('Home')}} @endsection
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css">
        <style>
            .mini-menu {
                display: none;
            }
        </style>
    @endsection
    @section('js')  @endsection
    @section('left-side-bar')
        <div class="w-72 flex flex-col w-16 pb-4 overflow-auto border-r border-gray-800 text-gray-500 select-none">
            <a href="#" class="flex items-center  justify-around">
                <img class="m-1 w-5" src="{{ url('storage/statics/logo.svg') }}" alt="Fransızca Öğren">
                <p class="text-2xl"> Fransızca Öğren</p>
            </a>
            <div class="border-b border-gray-800 ml-0"></div>
            <div class="clearfix"></div>
            @foreach( $menuItems as $menuItem)
                <a class="w-12 h-12 m-3 ml-9" href="{{ $menuItem->slug }}">
                    <div>
                        <p class="hover:bg-frblue-500 items-center p-3 text-xl hover:text-white rounded w-screen active:bg-frblue-500 active:border-r-3 active:border-frblue-700">{{ $menuItem->title }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endsection
    @section('content')
        <section class="flex flex-row items-center justify-center px-4">
            <div class="w-screen rounded-lg shadow-lg p-4 flex justify-start" style="background-color: #1da1f2">
                <div>
                    <i class="fab fa-twitter text-gray-100 text-9xl mr-16"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-lg text-gray-100 tracking-wide text-2xl">Twitter'da @frogrencom</h3>
                    <p class="text-gray-200 my-1 text-xl font-light">
                        Son gelişmelrden anında haberdar olmak için twitter hesabımızı takip etmeyi unutma!
                    </p>
                    <div class="mt-6">
                        <a href="https://twitter.com/frogrencom" target="_blank"
                           class="select-none font-semibold tracking-wide bg-gray-100 pl-4 pr-4 text-blue-500 px-4 py-2 rounded-lg focus:outline-none hover:bg-frblue-800 hover:text-gray-100">
                            Takip Et
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <div class="mt-3"></div>
        <section class="flex flex-row items-center justify-center px-4">
            <div class="w-screen rounded-lg shadow-lg p-4 flex justify-start"
                 style="background:linear-gradient(to left, #405de6, #5851db, #833ab4, #e1306c)">
                <div>
                    <i class="fab fa-instagram text-gray-100 text-9xl mr-16"></i>
                </div>
                <div>
                    <h3 class="font-semibold text-lg text-gray-100 tracking-wide text-2xl">Instagram'da @frogrencom</h3>
                    <p class="text-gray-200 my-1 text-xl font-light">
                        Son gelişmelrden anında haberdar olmak için instagram hesabımızı takip etmeyi unutma!
                    </p>
                    <div class="mt-6">
                        <a href="https://instagram.com/frogrencom" target="_blank"
                           class="select-none font-semibold tracking-wide bg-gray-100 pl-4 pr-4 text-blue-500 px-4 py-2 rounded-lg focus:outline-none hover:bg-frblue-800 hover:text-gray-100">
                            Takip Et
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endsection
</x-frontend-layout>