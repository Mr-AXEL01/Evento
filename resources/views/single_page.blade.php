@extends('layouts.dashboard')

@section('content')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <x-nav-dash/>
        <div class="bg-gray-100 py-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row -mx-4">
                    <div class="md:flex-1 px-4">
                        <div class="h-[460px] rounded-lg overflow-hidden shadow-lg bg-white mb-4">
                            <img class="w-full h-full object-cover" src="{{ asset('storage/image/' . $event->cover) }}" alt="Event Image" class="p-2 rounded-[20px] w-full">
                        </div>
                        <div class="flex justify-between mb-4">
                            <form method="post" action="">
                                {{-- route('reservation.store', $event) --}}
                                @csrf
                                <x-primary-button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Reserve
                                </x-primary-button>
                            </form>
                        </div>
                    </div>
                    <div class="md:flex-1 px-4">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $event->title }}</h2>
                        <p class="text-gray-600 text-sm mb-4">{{ $event->description }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <span class="font-bold text-gray-700">Location:</span>
                                <span class="text-gray-600">{{ $event->location }}</span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700">Date:</span>
                                <span class="text-gray-600">{{ date('d-m-Y', strtotime($event->date)) }}</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <span class="font-bold text-gray-700">Category:</span>
                            <img class="p-2 w-[100px] h-[100px] rounded-t-lg" src="{{ asset('storage/image/' . $event->category->cover) }}" alt="category cover">
                            <span class="text-gray-600">{{ $event->category->name }}</span>
                        </div>
                        <div class="mb-4">
                            <span class="font-bold text-gray-700">Organiser:</span>
                            <img class="p-2 w-[100px] h-[100px] rounded-t-lg" src="{{ asset('storage/image/' . $event->organiser->user->picture) }}" alt="organiser image">
                            <span class="text-gray-600">{{ $event->organiser->user->name }}</span>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700">Description:</span>
                            <p class="text-gray-600 text-sm mt-2">{{ $event->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
