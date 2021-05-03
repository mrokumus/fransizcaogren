<x-guest-layout>
    <style>
        .bg-image {
            /*TODO: Giriş ekran resmi dinamik*/
            background-image: url({{ url('/storage/statics/register.svg') }});
            background-repeat: no-repeat;
            background-position:left;
            background-size: 400px 400px;
        }
    </style>
    <div class="h-screen w-full flex justify-center items-center bg-gradient-to-tl from-frblue_l-300 via-frgreen_l-300 to-frred_l-300">
        <div class="bg-image w-full sm:w-1/2 md:w-9/12 lg:w-1/2 mx-3 md:mx-5 lg:mx-0 shadow-md flex flex-col md:flex-row items-center rounded z-10 overflow-hidden bg-white">
            <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-opacity-25 bg-blue-600 backdrop">
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center bg-white py-5 md:py-8 px-4">
                <h3 class="mb-4 font-bold text-3xl flex items-center text-blue-500">
                    <livewire:component.logo/>
                </h3>
                <form method="POST" action="{{ route('register') }}"
                      class="px-3 flex flex-col justify-center items-center w-full gap-3">
                    @csrf
                    <label for="name" class="mb-0 text-md w-full">
                        <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{old('name')}}"
                                placeholder="{{ __('Your Name') }}"
                                class="
                                @if ($errors->has('name')) {{ 'border-frred-500' }} @endif
                                        px-4 py-2 w-full rounded border-gray-300 shadow-sm text-base placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-blue-500"
                        >
                        @if ($errors->has('name'))
                            <div class="mt-1 text-frred-500 text-xs w-full">
                                <ul>
                                    @foreach ($errors->get('name') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </label>
                    <label for="email" class="mb-0 text-md w-full">
                        <input
                                type="email"
                                name="email"
                                value="{{ old('email')}}"
                                placeholder="{{ __('Email address') }}"
                                class="@if ($errors->has('email')) {{ 'border-frred-500' }} @endif px-4 py-2 w-full rounded  border-gray-300 shadow-sm text-base placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-blue-500"
                        >
                        @if ($errors->has('email'))
                            <div class="mt-1 text-frred-500 text-xs w-full">
                                <ul>
                                    @foreach ($errors->get('email') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </label>
                    <label for="password" class="mb-0 text-md w-full">
                        <input
                                type="password"
                                name="password"
                                placeholder="{{ __('Password') }}"
                                class="@if ($errors->has('password')) {{ 'border-frred-500' }} @endif px-4 py-2 w-full rounded border-gray-300 shadow-sm text-base placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-blue-500"
                        >
                        @if ($errors->has('password'))
                            <div class="mt-1 text-frred-500 text-xs w-full">
                                <ul>
                                    @foreach ($errors->get('password') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </label>
                    <label for="password_confirmation" class="mb-0 text-md w-full">
                        <input
                                type="password"
                                name="password_confirmation"
                                placeholder="{{ __('Password Confirmation') }}"
                                class="@if ($errors->has('password_confirmation')) {{ 'border-frred-500' }} @endif px-4 py-2 w-full rounded border-gray-300 shadow-sm text-base placeholder-gray-500 placeholder-opacity-50 focus:outline-none focus:border-blue-500"
                        >
                        @if ($errors->has('password_confirmation'))
                            <div class="mt-1 text-frred-500 text-xs w-full">
                                <ul>
                                    @foreach ($errors->get('password_confirmation') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </label>
                    <div class="flex mt-4 w-full">
                        <x-jet-button class="w-full justify-center pt-2 pb-2" type="submit">
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>
                                    <div class="ml-2 @if ($errors->has('terms')) {{ 'text-frred-500' }} @endif " >
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm  hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm  hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                                @if ($errors->has('terms'))
                                    <div class="mt-1 text-frred-500 text-xs w-full">
                                        <ul>
                                            @foreach ($errors->get('terms') as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </x-jet-label>
                        </div>
                    @endif
                </form>
                <div class="flex items-center justify-start mt-4">
                    <a class="underline text-sm text-frgreen-900 hover:text-gray-900"
                       href="{{ route('login') }}">
                        {{ __('Already have an account ?') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
