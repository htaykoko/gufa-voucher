<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" defer />

</head>

<body class="font-sans antialiased">
    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')
    <div class="min-h-screen bg-gray-100">

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @include('admin.layouts.footer1')
    {{-- @include('admin.layouts.footer') --}}
</body>

</html>
