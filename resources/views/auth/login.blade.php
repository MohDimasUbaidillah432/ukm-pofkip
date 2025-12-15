<x-guest-layout>
             
            {{-- Bagian Header yang Ditingkatkan --}}
            <div class="text-center mb-6">
                {{-- Logo Aplikasi --}}
                <a href="/">
                    <img class="w-32 h-32 mx-auto" src="{{ asset("img/logoo.png") }}" alt="">
                </a>
                <h1 class="text-3xl font-bold text-indigo-700 mt-3">UKM POFKIP</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400">Sistem Manajemen Internal</p>
                <hr class="mt-4 border-indigo-100">
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat Saya') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-indigo-600 hover:bg-indigo-700">
                        {{ __('Masuk') }}
                    </x-primary-button>
                </div>
            </form>
            
            {{-- Footer Opsional untuk Register --}}
            <div class="text-center mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-800 underline">Daftar sekarang</a>
                </p>
            </div>
            
        </div>
    </div>
</x-guest-layout>