<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Upload new image
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-guest-layout>
                    <x-jet-authentication-card>
                        <x-slot name="logo">
                            <x-jet-authentication-card-logo />
                        </x-slot>
                        <x-jet-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-jet-label for="image_path" />
                                <x-jet-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" required/>
                            </div>
                            <div class="mt-4">
                                <x-jet-label for="description" />
                                <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" required autofocus autocomplete="description" />
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button class="ml-4">
                                    Upload Image
                                </x-jet-button>
                            </div>
                        </form>
                    </x-jet-authentication-card>
                </x-guest-layout>
            </div>
        </div>
    </div>
</x-app-layout>
