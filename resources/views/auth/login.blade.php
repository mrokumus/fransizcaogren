<x-guest-layout>
    <style>
        .bg-image {
            /*TODO: Giriş ekran resmi dinamik*/
            background-image: url({{ url('/storage/statics/login.svg') }});
            background-repeat: no-repeat;
            background-position:left;
            background-size: 400px 400px;
        }
    </style>
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <div class="h-screen w-full flex justify-center items-center bg-gradient-to-tl from-frblue_l-300 via-frgreen_l-300 to-frred_l-300">
        <div class="bg-image w-full sm:w-1/2 md:w-9/12 lg:w-1/2 mx-3 md:mx-5 lg:mx-0 shadow-md flex flex-col md:flex-row items-center rounded z-10 overflow-hidden bg-white">
            <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-opacity-25 bg-blue-600 backdrop">
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center bg-white py-5 md:py-8 px-4">
                <h3 class="mb-4 font-bold text-3xl flex items-center text-blue-500">
                   <livewire:component.logo/>
                </h3>
                <form action="{{ route('login') }}" method="POST"
                      class="px-3 flex flex-col justify-center items-center w-full gap-3">
                    @csrf
                    @if ($errors->has('email'))
                        <div class="bg-frred-100 m-0 p-0 p-2 rounded text-frred-500 text-xs w-full">
                            <ul>
                                @foreach ($errors->get('email') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input
                            type="email"
                            name="email"
                            placeholder="{{ __('Email address') }}"
                            class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-blue-500"
                    >
                    @if ($errors->has('password'))
                        <div class="bg-frred-100  m-0 p-0 p-2 rounded text-frred-500 text-xs w-full">
                            <ul>
                                @foreach ($errors->get('password') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <input
                            type="password"
                            name="password"
                            placeholder="{{ __('Password') }}"
                            class="px-4 py-2 w-full rounded border border-gray-300 shadow-sm text-base placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-blue-500"
                    >
                    <div class="flex mt-4 w-full">
                        <x-jet-button class="w-full justify-center pt-2 pb-2" type="submit">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>
                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                </div>
                <div class="flex items-center justify-start mt-4">
                    @endif
                    <a class="underline text-sm text-frgreen-900 hover:text-gray-900"
                       href="{{ route('register') }}">
                        {{ __('Don\'t have an account?') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-guest-layout>
