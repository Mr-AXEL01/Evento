@extends('layouts.dashboard')

@section('content')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-[#e7e5e4] min-h-screen transition-all main">
        <x-nav-dash/>
        @if(session('success'))
            <div class="bg-green-200 text-green-700 py-2 px-4 my-4 mx-auto w-3/4 rounded-md text-center">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-200 text-red-700 py-2 px-4 my-4 mx-auto w-3/4 rounded-md text-center">
                {{ session('error') }}
            </div>
        @endif

        <section class="h-[80vh] flex items-center justify-center">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:flex lg:justify-center">
                <div class="mr-auto  lg:mr-0 lg:pr-8">
                    <h1 class="max-w-2xl text-[#0a0a0a] mb-4 text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl">Discover Exciting Events Near You</h1>
                    <p class="max-w-2xl mb-6 font-light text-[#292524] lg:mb-8 md:text-lg lg:text-xl">From conferences to workshops, find and explore a wide range of events happening in your area. Our platform connects you with the latest happenings, ensuring you never miss out on networking opportunities or learning experiences.</p>
                    <a href="{{ route('register') }}">
                        <x-secondary-button>
                            Start Now
                        </x-secondary-button>
                    </a>
                </div>
                <div class="hidden w-[40%] lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="https://images.squarespace-cdn.com/content/v1/5a3984a4be42d65c69fdaf79/1516751517900-L55RLY9V3TFKLJI1LP18/171211-125503-JCC.jpg?format=2500w" alt="mockup" class="rounded-[20px]">
                </div>
            </div>
        </section>


        <section id="categories" class="flex justify-center items-center">
            <div class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
                <h2 class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 md:text-4xl">Our Categories</h2>
                <div class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 md:grid-cols-3 lg:grid-cols-6">
                    @foreach($categories as $category)
                        <a href="#" class="flex justify-center items-center">
                            <div class="flex items-center justify-center bg-gray-100 p-3 rounded-[20px] gap-2">
                                <img src="{{ asset('storage/image/' . $category->cover) }}" alt="Category Image" class="w-10 h-10 rounded-[10px] mx-auto">
                                <div class="text-Xl text-black font-large">{{ $category->title }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{---------------filter field -----------------}}
        <h2 class="mb-8 lg:mb-16 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900  md:text-4xl">Our Events</h2>
        <div class="w-[80%] p-5  mx-auto">
            <form action="{{ route('events.index') }}" method="GET" class="flex justify-between items-end">

                <div class="w-[30%] mx-4">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Select Category</label>
                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="">Choose a Category</option>
                        @foreach($allCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class='w-[30%] mx-auto'>
                    <div class="relative flex items-center w-full h-12 rounded-full focus-within:shadow-lg bg-white overflow-hidden">
                        <div class="grid place-items-center h-full w-12 text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text" id="search" name="search" placeholder="Search something.." class="peer h-full w-full outline-none rounded-full border-none focus:border-none text-sm text-gray-700 pr-2">
                    </div>
                </div>

                <div class="fit-content">
                    <button type="submit" class="block px-8 rounded-full py-2 bg-yellow-300  text-gray-800">Filter</button>
                </div>

            </form>
        </div>

        <section id="events" class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($events as $event)
                    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                        <div class="h-52 overflow-hidden rounded-t-lg">
                            <img class="object-cover w-full h-full" src="{{ asset('storage/image/' . $event->cover) }}" alt="Event Image" />
                        </div>
                        <div class="px-5 py-4">
                            <a href="{{ route('events.show', $event) }}" class="text-blue-600 hover:text-blue-800">
                                <h5 class="text-2xl font-semibold text-gray-900 leading-tight">{{ $event->title }}</h5>
                            </a>
                            <div class="flex items-center mt-2 mb-4 text-gray-600">
                                <i class="fas fa-map-marker-alt"></i>
                                <span class="ml-2">{{ $event->location }}</span>
                            </div>
                            <p class="text-gray-800">{{ $event->description }}</p>
                            <div class="flex justify-center mt-4">
                                @auth
                                    <form method="post" action="{{ route('reservations.store', $event) }}">
                                        @csrf
                                        <input type="hidden" name="customer_id" value="{{ Auth::user()->customer->id }}">
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <x-primary-button type="submit">Reserve</x-primary-button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}">
                                        <x-primary-button>Reserve</x-primary-button>
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-red-600 text-center">No events found.</p>
                @endforelse
            </div>
            <div class="mt-4 px-4 py-3 flex items-center justify-center border-t border-gray-200 bg-violet-100 sm:px-6 lg:px-8">
                {{ $events->links() }}
            </div>
        </section>
    </main>
@endsection
