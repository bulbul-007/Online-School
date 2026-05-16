<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — Online-School</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #080b1a;
            overflow: hidden;
        }

        /* ─── Animated Background ─── */
        .bg-canvas {
            position: fixed; inset: 0; z-index: 0; pointer-events: none;
            overflow: hidden;
        }
        .orb {
            position: absolute; border-radius: 50%;
            filter: blur(80px); opacity: 0.5; animation: float 8s ease-in-out infinite;
        }
        .orb-1 { width: 600px; height: 600px; background: radial-gradient(circle, #6366f1, transparent); top: -200px; left: -150px; animation-delay: 0s; }
        .orb-2 { width: 500px; height: 500px; background: radial-gradient(circle, #8b5cf6, transparent); bottom: -150px; right: -100px; animation-delay: -3s; }
        .orb-3 { width: 300px; height: 300px; background: radial-gradient(circle, #06b6d4, transparent); top: 50%; left: 40%; animation-delay: -6s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) scale(1); }
            50%       { transform: translateY(-30px) scale(1.05); }
        }

        /* ─── Left Panel ─── */
        .left-panel {
            display: none;
            flex: 1;
            position: relative;
            z-index: 1;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 3rem 2.5rem;
            text-align: center;
        }
        @media(min-width: 900px) { .left-panel { display: flex; } }

        .brand-mark {
            display: flex; align-items: center; gap: 0.75rem;
            margin-bottom: 3rem;
        }
        .brand-icon-lg {
            width: 56px; height: 56px;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #06b6d4 100%);
            border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 0 40px rgba(99,102,241,0.5), 0 0 80px rgba(139,92,246,0.3);
            animation: pulse-glow 3s ease-in-out infinite;
        }
        .brand-icon-lg svg { width: 28px; height: 28px; fill: white; }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 30px rgba(99,102,241,0.5), 0 0 60px rgba(139,92,246,0.2); }
            50%       { box-shadow: 0 0 60px rgba(99,102,241,0.8), 0 0 120px rgba(139,92,246,0.4); }
        }
        .brand-text-lg { font-size: 1.6rem; font-weight: 800; color: white; letter-spacing: -0.03em; }
        .brand-text-lg span { color: #a78bfa; }

        .hero-headline {
            font-size: 3rem; font-weight: 900; color: white;
            line-height: 1.1; letter-spacing: -0.04em;
            margin-bottom: 1.25rem;
        }
        .hero-headline .accent {
            background: linear-gradient(90deg, #6366f1, #a78bfa, #06b6d4);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .hero-sub {
            color: rgba(255,255,255,0.5); font-size: 1rem; line-height: 1.75;
            max-width: 380px; margin: 0 auto 3rem;
        }

        /* Feature pills */
        .features { display: flex; flex-direction: column; gap: 0.85rem; width: 100%; max-width: 400px; }
        .feature-item {
            display: flex; align-items: center; gap: 1rem;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px; padding: 1rem 1.25rem;
            backdrop-filter: blur(10px);
            transition: all 0.3s;
        }
        .feature-item:hover { background: rgba(99,102,241,0.1); border-color: rgba(99,102,241,0.3); transform: translateX(4px); }
        .feature-icon {
            width: 40px; height: 40px; border-radius: 12px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
        }
        .feature-icon svg { width: 18px; height: 18px; fill: white; }
        .feature-text { text-align: left; }
        .feature-text strong { display: block; color: white; font-size: 0.85rem; font-weight: 600; }
        .feature-text span { color: rgba(255,255,255,0.45); font-size: 0.76rem; }

        /* ─── Right Panel ─── */
        .right-panel {
            width: 100%;
            position: relative; z-index: 1;
            display: flex; align-items: center; justify-content: center;
            padding: 2rem 1.5rem;
        }
        @media(min-width: 900px) { .right-panel { max-width: 480px; min-width: 440px; } }

        .glass-card {
            width: 100%; max-width: 400px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 28px;
            padding: 2.5rem;
            backdrop-filter: blur(40px);
            box-shadow: 0 40px 100px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.1);
        }

        .card-badge {
            display: inline-flex; align-items: center; gap: 0.4rem;
            background: rgba(99,102,241,0.2); color: #a78bfa;
            font-size: 0.7rem; font-weight: 700; letter-spacing: 0.08em;
            padding: 0.35rem 0.85rem; border-radius: 100px;
            border: 1px solid rgba(99,102,241,0.3);
            margin-bottom: 1.5rem; text-transform: uppercase;
        }
        .card-badge .dot { width: 5px; height: 5px; background: #6366f1; border-radius: 50%; animation: blink 2s infinite; }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.3} }

        .card-title { font-size: 1.9rem; font-weight: 800; color: white; line-height: 1.15; margin-bottom: 0.4rem; }
        .card-sub { color: rgba(255,255,255,0.4); font-size: 0.88rem; margin-bottom: 2rem; }

        /* Form */
        .form-group { margin-bottom: 1.1rem; }
        .form-group label {
            display: block; font-size: 0.78rem; font-weight: 600;
            color: rgba(255,255,255,0.6); margin-bottom: 0.45rem; letter-spacing: 0.02em;
        }
        .input-wrap { position: relative; }
        .input-icon {
            position: absolute; left: 14px; top: 50%; transform: translateY(-50%);
        }
        .input-icon svg { width: 15px; height: 15px; fill: rgba(255,255,255,0.3); }
        .form-group input {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.6rem;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            font-size: 0.88rem; font-family: 'Inter', sans-serif;
            color: white; outline: none;
            transition: all 0.25s;
        }
        .form-group input::placeholder { color: rgba(255,255,255,0.25); }
        .form-group input:focus {
            background: rgba(99,102,241,0.12);
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99,102,241,0.15);
        }
        .error-text { color: #f87171; font-size: 0.73rem; margin-top: 0.3rem; }

        .remember-row { display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem; }
        .remember-row input[type="checkbox"] { accent-color: #6366f1; width: 15px; height: 15px; }
        .remember-row label { font-size: 0.82rem; color: rgba(255,255,255,0.45); cursor: pointer; }

        .btn-login {
            width: 100%; padding: 0.95rem;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #06b6d4 100%);
            background-size: 200% 200%; animation: gradient-shift 4s ease infinite;
            border: none; border-radius: 14px;
            color: white; font-size: 0.95rem; font-weight: 700;
            font-family: 'Inter', sans-serif; cursor: pointer;
            letter-spacing: 0.02em;
            box-shadow: 0 8px 30px rgba(99,102,241,0.4);
            transition: transform 0.2s, box-shadow 0.2s;
            position: relative; overflow: hidden;
        }
        .btn-login::before {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(135deg, transparent 40%, rgba(255,255,255,0.15) 50%, transparent 60%);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }
        .btn-login:hover::before { transform: translateX(100%); }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(99,102,241,0.55); }
        @keyframes gradient-shift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Credentials box */
        .creds-box {
            margin-top: 1.75rem;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px; padding: 1.1rem 1.25rem;
        }
        .creds-title {
            font-size: 0.72rem; font-weight: 700; color: rgba(255,255,255,0.35);
            letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 0.75rem;
        }
        .cred-row {
            display: flex; align-items: center; justify-content: space-between;
            padding: 0.4rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .cred-row:last-child { border-bottom: none; }
        .cred-role {
            display: flex; align-items: center; gap: 0.5rem;
            font-size: 0.78rem; font-weight: 600; color: rgba(255,255,255,0.65);
        }
        .role-dot { width: 7px; height: 7px; border-radius: 50%; }
        .cred-email { font-size: 0.75rem; color: rgba(255,255,255,0.35); font-family: monospace; }

        .footer-text { text-align: center; font-size: 0.73rem; color: rgba(255,255,255,0.2); margin-top: 1.5rem; }
    </style>
</head>
<body>

<!-- Animated background -->
<div class="bg-canvas">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
</div>

<!-- Left Panel -->
<div class="left-panel">
    <div class="brand-mark">
        <div class="brand-icon-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96H48C21.5 96 0 117.5 0 144V464c0 26.5 21.5 48 48 48H592c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48H473.7L337.8 5.4zM256 416c0-35.3 28.7-64 64-64s64 28.7 64 64v96H256V416z"/></svg>
        </div>
        <span class="brand-text-lg">Online<span>-School</span></span>
    </div>

    <h1 class="hero-headline">
        Manage your<br>school <span class="accent">smarter</span>
    </h1>
    <p class="hero-sub">
        A complete digital platform connecting admins, teachers, students, and parents in one place.
    </p>

    <div class="features">
        <div class="feature-item">
            <div class="feature-icon" style="background:linear-gradient(135deg,#6366f1,#8b5cf6)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439 44.5 448 55.9 448 69.1s-9 24.6-19.3 28.6L352 122.2V320c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V122.2L48 103.7V384H400V368c0-8.8 7.2-16 16-16s16 7.2 16 16v32c0 8.8-7.2 16-16 16H32c-8.8 0-16-7.2-16-16V96C16 82 25 70.5 35.3 66.6l184-40zM224 288a64 64 0 1 0 0-128 64 64 0 1 0 0 128z"/></svg>
            </div>
            <div class="feature-text">
                <strong>Academic Management</strong>
                <span>Classes, subjects, and timetables in one view</span>
            </div>
        </div>
        <div class="feature-item">
            <div class="feature-icon" style="background:linear-gradient(135deg,#06b6d4,#6366f1)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192z"/></svg>
            </div>
            <div class="feature-text">
                <strong>Live Attendance</strong>
                <span>Real-time tracking with instant reports</span>
            </div>
        </div>
        <div class="feature-item">
            <div class="feature-icon" style="background:linear-gradient(135deg,#8b5cf6,#ec4899)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
            </div>
            <div class="feature-text">
                <strong>Role-Based Access</strong>
                <span>Granular permissions for every user type</span>
            </div>
        </div>
    </div>
</div>

<!-- Right Panel -->
<div class="right-panel">
    <div class="glass-card">
        <div class="card-badge">
            <span class="dot"></span> Online-School Portal
        </div>
        <h1 class="card-title">Welcome<br>back 👋</h1>
        <p class="card-sub">Sign in to access your dashboard</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="emailaddress">Email Address</label>
                <div class="input-wrap">
                    <div class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                    </div>
                    <input type="email" name="email" id="emailaddress" placeholder="you@school.com" value="{{ old('email') }}" required autofocus>
                </div>
                @error('email')<p class="error-text">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <div class="input-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
                    </div>
                    <input type="password" name="password" id="password" placeholder="••••••••••••" required>
                </div>
                @error('password')<p class="error-text">{{ $message }}</p>@enderror
            </div>

            <div class="remember-row">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Keep me signed in</label>
            </div>

            <button type="submit" class="btn-login">Sign In to Online-School →</button>
        </form>

        <p class="footer-text">Online-<strong style="color:rgba(255,255,255,0.5)">BULBUL AHMED</strong> &copy; {{ date('Y') }} &middot; <a href="mailto:mbbulbuli2@gmail.com" style="color:#a78bfa;text-decoration:none;">mbbulbuli2@gmail.com</a></p>
    </div>
</div>

</body>
</html>
