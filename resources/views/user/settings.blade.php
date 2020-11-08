<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Settings account
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(session('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <div>
                                <p class="font-bold">Success!</p>
                                <p class="text-sm">{{session('message')}}</p>
                            </div>
                        </div>
                    </div>
                @endif
                <x-guest-layout>
                    <x-jet-authentication-card>
                        <x-slot name="logo">
                            <x-jet-authentication-card-logo />
                        </x-slot>

                        <x-jet-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-jet-label for="name" value="{{ __('Name') }}" />
                                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="Auth::user()->name" required autofocus autocomplete="name" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="surname" value="{{ __('Surname') }}" />
                                <x-jet-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="Auth::user()->surname" required autofocus autocomplete="surname" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="nick" value="{{ __('Nick') }}" />
                                <x-jet-input id="nick" class="block mt-1 w-full" type="text" name="nick" :value="Auth::user()->nick" required autofocus autocomplete="nick" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="Auth::user()->email" required />
                            </div>

                            <div class="mt-4">
                                @include('includes.avatar')
                                <x-jet-label for="profile_image" value="{{ __('Profile Image') }}" />
                                <x-jet-input id="profile_image" class="block mt-1 w-full" type="file" name="profile_image" />
                            </div>
                            <!--
                            <div class="mt-4">
                                <x-jet-label for="password" value="{{ __('Password') }}" />
                                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            </div>

                            <div class="mt-4">
                                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                            -->
                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button class="ml-4">
                                    Save changes
                                </x-jet-button>
                            </div>
                        </form>
                    </x-jet-authentication-card>
                </x-guest-layout>
            </div>
        </div>
    </div>
</x-app-layout>
