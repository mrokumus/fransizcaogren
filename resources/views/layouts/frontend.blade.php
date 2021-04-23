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
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <title>Document</title>
</head>
<body>
<div class="flex w-screen h-screen text-gray-400 bg-gray-900">

    <!-- Component Start -->
    <div class="flex flex-col items-center w-16 pb-4 overflow-auto border-r border-gray-800 text-gray-500">
        <a href="#">
            <img class="w-10 h-10 m-4" src="{{ url('storage/statics/logo.svg') }}" alt="Fransızca Öğren">
        </a>
        <!--TODO: DASHBOARD MENU-->
    </div>
    <div class="flex flex-col w-56 border-r border-gray-800">
        <div class="flex items-center justify-between w-full h-16 px-4 border-b border-gray-800 hover:bg-gray-800">
                        <span class="font-medium">
                            <!--Todo: Current Page Title-->
                        </span>
        </div>
        <div class="flex flex-col flex-grow p-4 overflow-auto">
            <a class="flex items-center flex-shrink-0 h-10 px-2 text-sm font-medium rounded hover:bg-gray-800" href="#">
                <span class="leading-none">
                    <!--Todo: Current page sub menus-->
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
</body>
</html>