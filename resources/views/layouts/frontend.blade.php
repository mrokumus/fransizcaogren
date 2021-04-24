<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <livewireStyles/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <title>Document</title>
</head>
<body class="font-quicksand">
<div class="flex w-screen h-screen text-gray-400 bg-gray-900">
    <!-- Component Start -->
    <div class="flex flex-col items-center w-16 pb-4 overflow-auto border-r border-gray-800 text-gray-500 select-none">
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
    <div class="flex flex-col w-72 border-r border-gray-800">
        <div class="flex items-center justify-between w-full h-16 px-4 border-b border-gray-800 hover:bg-gray-800">
                        <span class="font-medium">
                            Üst Başlık
                            <!--Todo: Current Page Title-->
                        </span>
        </div>
        <div class="flex flex-col flex-grow p-4 overflow-auto">
            <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-800" href="#">
                <span class="leading-none">
                    <!--Todo: Current page sub menus-->
                    Alt Başlık
                </span>
            </a>
            <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-800" href="#">
                <span class="leading-none">
                    <!--Todo: Current page sub menus-->
                    Alt Başlık
                </span>
            </a>
            <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-800" href="#">
                <span class="leading-none">
                    <!--Todo: Current page sub menus-->
                    Alt Başlık
                </span>
            </a>
            <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-800" href="#">
                <span class="leading-none">
                    <!--Todo: Current page sub menus-->
                    Alt Başlık
                </span>
            </a>
        </div>
    </div>
    <div class="flex flex-col flex-grow">
        <div class="flex items-center flex-shrink-0 h-16 px-8 border-b border-gray-800">
            <h1 class="text-lg font-medium">Page Title</h1>
            <button class="flex items-center justify-center h-10 px-4 ml-auto text-sm font-medium rounded hover:bg-gray-800">
                login
            </button>
            <button class="flex items-center justify-center h-10 px-4 ml-2 text-sm font-medium bg-gray-800 rounded hover:bg-gray-700">
                Register
            </button>
        </div>
        <div class="flex-grow p-6 overflow-auto bg-gray-800">
            <div class="grid grid-cols-3 gap-6">
                <div class="h-24 col-span-3 bg-gray-700">
                    Content
                </div>
            </div>
        </div>
    </div>
    <!-- Component End  -->
</div>
<script src="{{ mix('js/app.js')}}"></script>
<livewireScripts/>
<style>
    .menuIcon:hover + .menuText {
        display: block;
    }
</style>
</body>
</html>