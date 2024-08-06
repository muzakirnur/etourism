<x-authentication-layout>
    <div class="bg-white p-4 rounded-lg">
        <h1 class="text-3xl text-slate-800 dark:text-slate-100 font-bold mb-6">{{ __('Selamat Datang!') }} ✨</h1>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-4 font-medium text-sm text-red-600">
                {{ session('error') }}
            </div>
        @endif
        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="space-y-4">
                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div>
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-login-password />
                </div>
            </div>
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <div class="mr-1">
                        <a class="text-sm underline hover:no-underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    </div>
                @endif
                <x-jet-button class="ml-3">
                    {{ __('Sign in') }}
                </x-jet-button>
                <a href="{{ route('index') }}" class="btn bg-primary text-white hover:bg-primary-hover">Guest</a>
            </div>
        </form>
        <x-jet-validation-errors class="mt-4" />
        <!-- Footer -->
        <div class="pt-5 mt-6 border-t border-slate-200">
            <div class="text-sm">
                {{ __('Belum Punya Akun ?') }} <a class="font-medium text-indigo-500 hover:text-indigo-600"
                    href="{{ route('register') }}">{{ __('Sign Up') }}</a>
            </div>
        </div>
    </div>
    <script></script>
</x-authentication-layout>
