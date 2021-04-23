<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>
    <livewireStyles/>
    <title>Document</title>
</head>
<body>
<header class="h-14 bg-frblue_l-500 min-h-14 d-flex justify-between align-text-center pl-1 pr-1">
    <div class="logo d-flex items-center">
        <img class="max-h-14" src="{{ url('storage/statics/logo.svg') }}" alt="{{ getenv('APP_NAME') }}">
    </div>
    <div class="search">
        <form action="" class="w-100 max-w-24 relative z-10">
            <label for="search"></label>
            <input type="text" id="search" placeholder="{{ __('Search') }}" name="search"/>
        </form>
    </div>
    <div class="auth">

    </div>
</header>

<script src="{{ mix('js/app.js')}}"></script>
<livewireScripts/>
</body>
</html>