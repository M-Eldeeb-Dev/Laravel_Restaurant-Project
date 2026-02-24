<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="session-status">
            {{ session('status') }}
        </div>
    @endif

    <div class="section-title">
        <h2>Welcome Back</h2>
        <p>Sign in to access your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    autocomplete="username" placeholder="Enter your email">
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
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    placeholder="Enter your password">
            </div>
            @error('password')
                <div class="input-error">
                    <i class="fas fa-exclamation-circle"></i> {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="form-extras">
            <label for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot password?</a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-submit">
            <i class="fas fa-sign-in-alt" style="margin-right: 8px;"></i>Sign In
        </button>
    </form>

    <!-- Register Link -->
    <div class="auth-footer">
        <p>
            Don't have an account?
            <a href="{{ route('register') }}">Create Account</a>
        </p>
    </div>
</x-guest-layout>
