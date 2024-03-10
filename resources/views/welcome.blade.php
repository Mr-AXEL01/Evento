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
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-2 py-2 flex justify-between items-center">
        <div>
            <a href="/">
                <x-application-logo class="w-16 h-14 fill-current text-gray-500" />
            </a>
        </div>
        <div class="space-x-4 flex items-center">
            <ul class="flex items-center">
                @auth
                    <li class="dropdown ml-3 relative">
                        <button type="button" class="dropdown-toggle flex items-center"  id="user-menu-button">
                            <div class="flex-shrink-0 w-10 h-10 relative">
                                <div class="p-1 bg-white rounded-full focus:outline-none focus:ring">
                                    <img class="w-8 h-8 rounded-full"  src="{{asset('storage/image/' . Auth::user()->picture)}}" alt="User Profile"/>
                                    <div class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping"></div>
                                    <div class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"></div>
                                </div>
                            </div>
                            <div class="p-2 md:block text-left">
                                <h2 class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                                <p class="text-xs text-gray-500">{{ Auth::user()->role }}</p>
                            </div>
                        </button>
                    </li>
                @endauth
            </ul>
            @guest
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">Register</a>
            @endguest
        </div>
    </div>
</nav>

<!-- Dropdown Menu -->
<ul class="dropdown-menu shadow-md shadow-black/5 z-50 hidden py-1.5 rounded-md bg-white border border-gray-100 max-w-[140px]" id="user-dropdown">
    <li>
        <a href="/profile" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50">Profile</a>
    </li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            <a role="menuitem" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
               onclick="event.preventDefault();
            this.closest('form').submit();">
                {{ __('Log Out') }}
                <form >
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                    this.closest('form').submit();">

                    </x-dropdown-link>
                </form>
            </a>
        </form>
    </li>
</ul>

<!-- JavaScript to handle dropdown -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownToggle = document.getElementById('user-menu-button');
        var dropdownMenu = document.getElementById('user-dropdown');

        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault();
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function(event) {
            if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>

</body>
</html>
