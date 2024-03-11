<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
@if(Auth::check())
    @if(Auth::user()->role == 'admin')
        <x-sidebar-admin-dash/>
    @elseif(Auth::user()->role == 'organiser')
        <x-sidebar-organiser-dash/>
    @elseif(Auth::user()->role == 'customer')
        <x-sidebar-customer-dash/>
    @endif
@else
    <x-sidebar-viewer-dash/>
@endif




@yield('content')

<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../js/admin.js"></script>
</body>
</html>
