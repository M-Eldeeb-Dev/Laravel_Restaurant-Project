<x-guest-layout>
    <div class="section-title">
        <h2>Create Account</h2>
        <p>Join us for an exceptional dining experience</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">Full Name</label>
            <div class="input-wrapper">
                <i class="fas fa-user input-icon"></i>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    autocomplete="name" placeholder="Enter your full name">
            </div>
            @error('name')
                <div class="input-error">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    autocomplete="username" placeholder="Enter your email address">
            </div>
            @error('email')
                <div class="input-error">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-wrapper">
                <i class="fas fa-lock input-icon"></i>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    placeholder="Create a password">
            </div>
            @error('password')
                <div class="input-error">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <div class="input-wrapper">
                <i class="fas fa-shield-alt input-icon"></i>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Confirm your password">
            </div>
            @error('password_confirmation')
                <div class="input-error">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-submit" style="margin-top: 0.5rem;">
            <i class="fas fa-user-plus" style="margin-right: 8px;"></i>Create Account
        </button>
    </form>

    <!-- Login Link -->
    <div class="auth-footer">
        <p>
            Already have an account?
            <a href="{{ route('login') }}">Sign In</a>
        </p>
    </div>
</x-guest-layout>
