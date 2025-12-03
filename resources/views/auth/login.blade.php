<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded" :status="session('status')" />

    <div class="text-center mb-8">
        <h2 class="restaurant-font text-3xl font-semibold text-gray-800 mb-2">Welcome Back</h2>
        <p class="text-gray-600 text-sm">Sign in to access your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email Address')" class="mb-2 text-gray-700 font-medium" />
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
                <x-text-input id="email" 
                    class="block w-full pl-10 pr-4 py-3 restaurant-input rounded-lg focus-ring-restaurant" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username"
                    placeholder="Enter your email" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" class="mb-2 text-gray-700 font-medium" />
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <x-text-input id="password" 
                    class="block w-full pl-10 pr-4 py-3 restaurant-input rounded-lg focus-ring-restaurant"
                    type="password"
                    name="password"
                    required 
                    autocomplete="current-password"
                    placeholder="Enter your password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" 
                    type="checkbox" 
                    class="rounded border-gray-300 text-restaurant-accent focus:ring-restaurant-accent focus:ring-2" 
                    name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm text-restaurant-accent hover:text-restaurant-bg-accent font-medium transition-colors duration-200" 
                   href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" 
                class="w-full restaurant-bg-accent text-white py-3 px-6 rounded-lg font-semibold text-sm uppercase tracking-wider hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 shadow-lg hover:shadow-xl">
                {{ __('Sign In') }}
            </button>
        </div>
    </form>

    <!-- Register Link -->
    <div class="mt-8 text-center border-t border-gray-200 pt-6">
        <p class="text-gray-600 text-sm">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-restaurant-accent hover:text-restaurant-bg-accent font-semibold ml-1 transition-colors duration-200">
                {{ __('Create Account') }}
            </a>
        </p>
    </div>
</x-guest-layout>
