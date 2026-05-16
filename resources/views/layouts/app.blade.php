<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EduManage') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            margin: 0;
        }
        #app { min-height: 100vh; }
        .main-layout {
            display: flex;
            padding-top: 64px;
        }
        .main-content {
            flex: 1;
            margin-left: 0;
            min-height: calc(100vh - 64px);
            background: #f1f5f9;
            transition: margin-left 0.2s;
        }
        @media(min-width: 640px) {
            .main-content { margin-left: 220px; }
        }
        .content-inner {
            padding: 1.75rem;
        }
        /* Card Overrides for consistency */
        .card, .bg-white {
            border-radius: 14px !important;
            box-shadow: 0 1px 8px rgba(0,0,0,0.06) !important;
            border: 1px solid rgba(0,0,0,0.05) !important;
        }
        /* Table styling */
        table { border-collapse: separate; border-spacing: 0; }
        thead th {
            background: #f8fafc !important;
            color: #64748b !important;
            font-size: 0.75rem !important;
            font-weight: 600 !important;
            letter-spacing: 0.05em !important;
            text-transform: uppercase !important;
        }
        /* Button accents */
        .btn-primary, [class*="bg-blue-5"] {
            background: linear-gradient(135deg, #6366f1, #8b5cf6) !important;
            border: none !important;
            box-shadow: 0 4px 15px rgba(99,102,241,0.3) !important;
        }
        .btn-primary:hover, [class*="bg-blue-5"]:hover {
            background: linear-gradient(135deg, #4f46e5, #7c3aed) !important;
            box-shadow: 0 6px 20px rgba(99,102,241,0.45) !important;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.navbar')

        <div class="main-layout">
            @include('layouts.sidebar')
            <div class="main-content">
                <div class="content-inner">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>