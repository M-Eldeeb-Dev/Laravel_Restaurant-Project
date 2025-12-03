<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="restaurant-font text-3xl font-semibold text-gray-800 mb-2">Create Account</h2>
        <p class="text-gray-600 text-sm">Join us for an exceptional dining experience</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" class="mb-2 text-gray-700 font-medium" />
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <x-text-input id="name" 
                    class="block w-full pl-10 pr-4 py-3 restaurant-input rounded-lg focus-ring-restaurant" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    required 
                    autofocus 
                    autocomplete="name"
                    placeholder="Enter your full name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600 text-sm" />
        </div>

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
                    autocomplete="username"
                    placeholder="Enter your email address" />
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
                    autocomplete="new-password"
                    placeholder="Create a password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="mb-2 text-gray-700 font-medium" />
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <x-text-input id="password_confirmation" 
                    class="block w-full pl-10 pr-4 py-3 restaurant-input rounded-lg focus-ring-restaurant"
                    type="password"
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    placeholder="Confirm your password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600 text-sm" />
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" 
                class="w-full restaurant-bg-accent text-white py-3 px-6 rounded-lg font-semibold text-sm uppercase tracking-wider hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 shadow-lg hover:shadow-xl">
                {{ __('Create Account') }}
            </button>
        </div>
    </form>

    <!-- Login Link -->
    <div class="mt-8 text-center border-t border-gray-200 pt-6">
        <p class="text-gray-600 text-sm">
            Already have an account?
            <a href="{{ route('login') }}" class="text-restaurant-accent hover:text-restaurant-bg-accent font-semibold ml-1 transition-colors duration-200">
                {{ __('Sign In') }}
            </a>
        </p>
    </div>
</x-guest-layout>
