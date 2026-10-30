<x-guest-layout>

    {{-- ERRORES GENERALES --}}
    @if ($errors->any())
        <div class="mb-4 text-red-600 text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- NAME -->
        <div>
            <x-input-label for="name" value="Nom" />
            <x-text-input id="name" class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- EMAIL -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- PASSWORD -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- CONFIRM PASSWORD -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirm Password" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- DNI -->
        <div class="mt-4">
            <x-input-label for="dni" value="DNI" />
            <x-text-input id="dni" class="block mt-1 w-full"
                type="text"
                name="dni"
                :value="old('dni')"
                required />
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div>

        <!-- DATA NAIXEMENT -->
        <div class="mt-4">
            <x-input-label for="data_naixement" value="Data Naixement" />
            <x-text-input id="data_naixement" class="block mt-1 w-full"
                type="date"
                name="data_naixement"
                :value="old('data_naixement')"
                required />
            <x-input-error :messages="$errors->get('data_naixement')" class="mt-2" />
        </div>

        <!-- TELEFON -->
        <div class="mt-4">
            <x-input-label for="telefon" value="Telèfon" />
            <x-text-input id="telefon" class="block mt-1 w-full"
                type="text"
                name="telefon"
                :value="old('telefon')"
                required />
            <x-input-error :messages="$errors->get('telefon')" class="mt-2" />
        </div>

        <!-- BOTONES -->
        <div class="flex items-center justify-between mt-6">

            <a href="{{ route('login') }}"
               class="text-sm text-blue-600 hover:underline">
                Ja estàs registrat?
            </a>

            <x-primary-button>
                Registrar-me
            </x-primary-button>

        </div>
    </form>

</x-guest-layout>