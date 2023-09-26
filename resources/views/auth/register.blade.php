<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom complet : ')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Registre Social -->
        <div class="mt-4">
            <x-input-label for="rs" :value="__('Registre Social :')" />
            <x-text-input id="rs" class="block mt-1 w-full" type="text" name="rs" :value="old('rs')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('rs')" class="mt-2" />
        </div>

        <!-- Registre Commerce -->
        <div class="mt-4">
            <x-input-label for="rc" :value="__('Registre Commerce :')" />
            <x-text-input id="rc" class="block mt-1 w-full" type="text" name="rc" :value="old('rc')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('rc')" class="mt-2" />
        </div>

        <!-- ICE -->
        <div class="mt-4">
            <x-input-label for="ice" :value="__('ICE :')" />
            <x-text-input id="ice" class="block mt-1 w-full" type="text" name="ice" :value="old('ice')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('ice')" class="mt-2" />
        </div>

        <!-- Forme Juridique -->
        <div class="mt-4">
            <x-input-label for="fj" :value="__('Forme Juridique :')" />
            <x-text-input id="fj" class="block mt-1 w-full" type="text" name="fj" :value="old('fj')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('fj')" class="mt-2" />
        </div>

        <!-- Ville -->
        <div class="mt-4">
            <x-input-label for="ville" :value="__('Ville :')" />
            <x-text-input id="ville" class="block mt-1 w-full" type="text" name="ville" :value="old('ville')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('ville')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
