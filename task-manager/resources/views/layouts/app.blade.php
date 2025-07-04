<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-light">
    <div class="min-vh-100 d-flex flex-column">

        {{-- Show navigation only if not on homepage --}}
        @if (!request()->is('/'))
            @include('layouts.navigation')
        @endif

        <!-- Page Heading -->
        @hasSection('header')
            <header class="bg-white shadow-sm border-bottom py-3 px-4">
                <div class="container">
                    @yield('header')
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Initialize flatpickr on input with id="deadline"
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr("#deadline", {
                dateFormat: "m/d/Y",
                locale: "en"
            });
        });
    </script>
</body>
</html>
