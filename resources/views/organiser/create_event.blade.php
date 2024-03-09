@extends('layouts.dashboard')

@section('content')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <div class="container mx-auto py-6">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4">{{ isset($event) ? 'Edit Event' : 'Create New Event' }}</h2>
                    <form method="post" action="{{ isset($event) ? route('organiser.events.update', $event) : route('organiser.event.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @if(isset($event))
                            @method('PUT')
                        @endif

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" value="{{ isset($event) ? $event->title : old('title') }}" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" class="mt-1 p-2 text-base rounded-[10px] textarea h-[100px] block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 resize-none" required>{{ isset($event) ? $event->description : old('description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="location" :value="__('Location')" />
                            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" autocomplete="location" value="{{ isset($event) ? $event->location : old('location') }}" />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" autocomplete="date" value="{{ isset($event) ? $event->date : old('date') }}" />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="place" :value="__('Place')" />
                            <x-text-input id="place" name="place" type="number" class="mt-1 block w-full" autocomplete="place" value="{{ isset($event) ? $event->place : old('place') }}" />
                            <x-input-error :messages="$errors->get('place')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="category" :value="__('Category')" />
                            <select id="category" name="category" class="mt-1 p-2 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" autocomplete="category">
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ isset($event) && $event->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-black">Image</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md cursor-pointer" onclick="document.getElementById('cover').click()">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="cover" class="relative bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span class="">Upload a file</span>
                                            <input id="cover" name="cover" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1 text-black">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-black">PNG, JPG, GIF</p>
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
