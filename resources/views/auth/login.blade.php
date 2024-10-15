<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>   

    <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
        @csrf





        <!-- Email Address -->
        <div class="col-12">
            <x-input-label for="email" :value="__('Email')" class="form-label col-6"/>
            <div class="input-group has-validation col-6">
                <x-text-input id="email" class="form-control " type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div class="col-12">
            <x-input-label for="password" :value="__('Password')" class="form-label col-6"/>
            <div class="input-group has-validation col-6">
                <x-text-input id="password" class="form-control "
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="col-12">
            <x-primary-button class="ms-3 btn-primary w-100">
                {{ __('Log in') }}
            </x-primary-button>
            </div>

            <div class="col-12">
                      <p class="small mb-0">Don't have account? 
                    </div>
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                    {{ __('register?') }}
                </a></p>

    </form>
</x-guest-layout>
