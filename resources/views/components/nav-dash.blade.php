<div class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
    <button type="button"  class="text-lg  text-gray-900 font-semibold sidebar-toggle">
        <i class="fa-solid fa-bars"></i>
    </button>

    <ul class="ml-auto flex items-center">
        @auth
            <li class="dropdown ml-3">
                <button type="button" class="dropdown-toggle flex items-center"  id="user-menu-button" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
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
                <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]" id="user-dropdown">
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
            </li>
        @endauth

        @guest
            <li>
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
            </li>
            @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                </li>
            @endif
        @endguest
    </ul>
</div>


