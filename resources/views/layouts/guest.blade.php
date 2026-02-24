<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Fine Dining</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            *, *::before, *::after {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', sans-serif;
                min-height: 100vh;
                background: linear-gradient(135deg, #1a1a1a 0%, #2d1b1b 50%, #1a1a1a 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem 1rem;
                position: relative;
                overflow-x: hidden;
            }

            /* Decorative floating circles */
            body::before,
            body::after {
                content: '';
                position: fixed;
                border-radius: 50%;
                border: 1px solid rgba(201, 169, 97, 0.08);
                pointer-events: none;
            }
            body::before {
                width: 500px;
                height: 500px;
                top: -150px;
                right: -100px;
                animation: floatCircle 20s ease-in-out infinite;
            }
            body::after {
                width: 400px;
                height: 400px;
                bottom: -100px;
                left: -80px;
                animation: floatCircle 25s ease-in-out infinite reverse;
            }

            @keyframes floatCircle {
                0%, 100% { transform: translate(0, 0); }
                50% { transform: translate(30px, -20px); }
            }

            /* Subtle animated particle dots */
            .bg-particles {
                position: fixed;
                inset: 0;
                overflow: hidden;
                pointer-events: none;
                z-index: 0;
            }
            .bg-particles span {
                position: absolute;
                width: 3px;
                height: 3px;
                border-radius: 50%;
                background: rgba(201, 169, 97, 0.15);
                animation: drift 12s linear infinite;
            }
            .bg-particles span:nth-child(1) { left: 10%; animation-delay: 0s; animation-duration: 14s; }
            .bg-particles span:nth-child(2) { left: 25%; animation-delay: 2s; animation-duration: 18s; }
            .bg-particles span:nth-child(3) { left: 45%; animation-delay: 4s; animation-duration: 16s; }
            .bg-particles span:nth-child(4) { left: 65%; animation-delay: 1s; animation-duration: 20s; }
            .bg-particles span:nth-child(5) { left: 80%; animation-delay: 3s; animation-duration: 15s; }
            .bg-particles span:nth-child(6) { left: 90%; animation-delay: 5s; animation-duration: 17s; }

            @keyframes drift {
                0% { transform: translateY(100vh) scale(0); opacity: 0; }
                10% { opacity: 1; }
                90% { opacity: 1; }
                100% { transform: translateY(-10vh) scale(1.5); opacity: 0; }
            }

            .restaurant-font {
                font-family: 'Playfair Display', serif;
            }

            /* -------- Auth Wrapper -------- */
            .auth-wrapper {
                width: 100%;
                max-width: 460px;
                position: relative;
                z-index: 1;
            }

            /* -------- Brand Header -------- */
            .brand-header {
                text-align: center;
                margin-bottom: 2rem;
            }
            .brand-header h1 {
                font-family: 'Playfair Display', serif;
                font-size: 2.75rem;
                font-weight: 700;
                color: #ffffff;
                letter-spacing: 1px;
                margin-bottom: 0.5rem;
                text-shadow: 0 2px 20px rgba(0,0,0,0.3);
            }
            .brand-header .accent-line {
                width: 60px;
                height: 3px;
                background: linear-gradient(90deg, transparent, #c9a961, transparent);
                margin: 0 auto 0.75rem;
                border-radius: 2px;
            }
            .brand-header .tagline {
                color: rgba(201, 169, 97, 0.8);
                font-size: 0.8rem;
                text-transform: uppercase;
                letter-spacing: 4px;
                font-weight: 400;
            }

            /* -------- Glass Card -------- */
            .auth-card {
                background: rgba(255, 255, 255, 0.97);
                backdrop-filter: blur(20px);
                border-radius: 20px;
                padding: 2.5rem 2.25rem;
                box-shadow:
                    0 25px 60px rgba(0, 0, 0, 0.35),
                    0 0 0 1px rgba(255, 255, 255, 0.05),
                    inset 0 1px 0 rgba(255, 255, 255, 0.8);
                position: relative;
                overflow: hidden;
            }
            .auth-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, #c9a961, #e8d5a3, #c9a961);
            }

            /* -------- Section Title -------- */
            .auth-card .section-title {
                text-align: center;
                margin-bottom: 1.75rem;
            }
            .auth-card .section-title h2 {
                font-family: 'Playfair Display', serif;
                font-size: 1.75rem;
                color: #1a1a1a;
                font-weight: 600;
                margin-bottom: 0.35rem;
            }
            .auth-card .section-title p {
                color: #888;
                font-size: 0.875rem;
            }

            /* -------- Form Group -------- */
            .form-group {
                margin-bottom: 1.25rem;
            }
            .form-group label {
                display: block;
                font-size: 0.8rem;
                font-weight: 600;
                color: #555;
                margin-bottom: 0.4rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            .input-wrapper {
                position: relative;
            }
            .input-wrapper .input-icon {
                position: absolute;
                left: 14px;
                top: 50%;
                transform: translateY(-50%);
                color: #b0b0b0;
                font-size: 0.9rem;
                transition: color 0.3s ease;
                pointer-events: none;
                z-index: 2;
            }
            .input-wrapper input {
                width: 100%;
                padding: 0.8rem 1rem 0.8rem 2.75rem;
                border: 2px solid #e8e8e8;
                border-radius: 12px;
                font-size: 0.95rem;
                font-family: 'Inter', sans-serif;
                color: #1a1a1a;
                background: #fafafa;
                transition: all 0.3s ease;
                outline: none;
            }
            .input-wrapper input::placeholder {
                color: #b0b0b0;
                font-weight: 300;
            }
            .input-wrapper input:focus {
                border-color: #c9a961;
                background: #fff;
                box-shadow: 0 0 0 4px rgba(201, 169, 97, 0.1);
            }
            .input-wrapper input:focus ~ .input-icon,
            .input-wrapper input:focus + .input-icon {
                color: #c9a961;
            }
            /* When icon is before input, use CSS sibling selector differently */
            .input-wrapper:focus-within .input-icon {
                color: #c9a961;
            }

            .input-error {
                color: #e74c3c;
                font-size: 0.8rem;
                margin-top: 0.35rem;
                display: flex;
                align-items: center;
                gap: 0.25rem;
            }

            /* -------- Remember & Forgot -------- */
            .form-extras {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 1.5rem;
                margin-top: -0.25rem;
            }
            .form-extras label {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                font-size: 0.85rem;
                color: #666;
                cursor: pointer;
            }
            .form-extras label input[type="checkbox"] {
                width: 16px;
                height: 16px;
                accent-color: #c9a961;
                cursor: pointer;
                border-radius: 4px;
            }
            .form-extras a {
                font-size: 0.85rem;
                color: #c9a961;
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s;
            }
            .form-extras a:hover {
                color: #b08a3e;
                text-decoration: underline;
            }

            /* -------- Submit Button -------- */
            .btn-submit {
                display: block;
                width: 100%;
                padding: 0.9rem;
                background: linear-gradient(135deg, #c9a961 0%, #b8964f 100%);
                color: #fff;
                border: none;
                border-radius: 12px;
                font-family: 'Inter', sans-serif;
                font-size: 0.9rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(201, 169, 97, 0.35);
                position: relative;
                overflow: hidden;
            }
            .btn-submit::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                transition: left 0.5s ease;
            }
            .btn-submit:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(201, 169, 97, 0.45);
                background: linear-gradient(135deg, #d4b56e 0%, #c9a961 100%);
            }
            .btn-submit:hover::before {
                left: 100%;
            }
            .btn-submit:active {
                transform: translateY(0);
            }

            /* -------- Divider + Alt Link -------- */
            .auth-footer {
                text-align: center;
                margin-top: 1.5rem;
                padding-top: 1.25rem;
                border-top: 1px solid #eee;
            }
            .auth-footer p {
                color: #888;
                font-size: 0.875rem;
            }
            .auth-footer a {
                color: #c9a961;
                font-weight: 600;
                text-decoration: none;
                margin-left: 0.25rem;
                transition: color 0.2s;
            }
            .auth-footer a:hover {
                color: #b08a3e;
                text-decoration: underline;
            }

            /* -------- Copyright -------- */
            .copyright {
                text-align: center;
                margin-top: 1.75rem;
                color: rgba(255,255,255,0.35);
                font-size: 0.8rem;
            }

            /* -------- Session Status -------- */
            .session-status {
                background: #ecfdf5;
                border-left: 4px solid #10b981;
                color: #065f46;
                padding: 0.75rem 1rem;
                border-radius: 8px;
                font-size: 0.875rem;
                margin-bottom: 1.25rem;
            }

            /* -------- Responsive -------- */
            @media (max-width: 480px) {
                .brand-header h1 { font-size: 2rem; }
                .auth-card { padding: 2rem 1.5rem; border-radius: 16px; }
            }
        </style>
    </head>
    <body>
        <!-- Background particles -->
        <div class="bg-particles">
            <span></span><span></span><span></span>
            <span></span><span></span><span></span>
        </div>

        <div class="auth-wrapper">
            <!-- Brand -->
            <div class="brand-header">
                <a href="/" style="text-decoration: none;">
                    <h1>Gourmet Haven</h1>
                    <div class="accent-line"></div>
                    <p class="tagline">Fine Dining Experience</p>
                </a>
            </div>

            <!-- Card -->
            <div class="auth-card">
                {{ $slot }}
            </div>

            <!-- Copyright -->
            <div class="copyright">
                &copy; {{ date('Y') }} {{ config('app.name', 'Restaurant') }}. All rights reserved.
            </div>
        </div>
    </body>
</html>
