@extends('layouts.dashboard')

@section('content')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <x-nav-dash/>
        <div class=" p-5 mx-5 rounded-lg">
            <div class="uppercase text-sky-900 font-bold text-2xl">
                Customers
            </div>
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border  md:rounded-lg">
                            <table class="min-w-full divide-y divide-Fuchsia-900">
                                <thead class="bg-neutral-800">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        <span>customer_ID</span>
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Name
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Email
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Event
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        reserved at
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-orange-200" id="users-container">
                                @foreach($reservations as $reservation)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">{{$reservation->id}}</td>
                                        <td class="px-12 py-4 flex text-sm font-medium items-center justify-center whitespace-nowrap">
                                            <img src="{{ asset('storage/image/' . $reservation->customer->picture) }}" alt="User Picture" class="w-8 h-8 rounded-full mr-2">
                                            <div class="text-sm font-medium">{{ $reservation->customer->name }}</div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">{{ $reservation->customer->email }}</td>
                                        <td class="px-12 py-4 flex text-sm font-medium items-center justify-center whitespace-nowrap">
                                            <img src="{{ asset('storage/image/' . $reservation->event->cover) }}" alt="User Picture" class="w-8 h-8 rounded-full mr-2">
                                            <div class="text-sm font-medium">{{ $reservation->event->title }}</div>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-center align-middle whitespace-nowrap">{{$reservation->created_at}}</td>
                                        <td class="px-4 py-4 text-sm text-center align-middle whitespace-nowrap">
                                            <div class="flex justify-center gap-2">
                                                <form action="{{ route('organiser.reservation.review', ['reservation' => $reservation, 'status' => 'approved']) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="inline-flex items-center justify-center px-3 py-2 rounded-lg transition duration-200 focus:outline-none focus:ring focus:ring-opacity-50 bg-green-500 hover:bg-green-600 text-white">
                                                        <i class="fa-solid fa-check-circle mr-1"></i>
                                                    </button>
                                                </form>

                                                <form action="{{ route('organiser.reservation.review', ['reservation' => $reservation, 'status' => 'refused']) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="inline-flex items-center justify-center px-3 py-2 rounded-lg transition duration-200 focus:outline-none focus:ring focus:ring-opacity-50 bg-red-500 hover:bg-red-600 text-white">
                                                        <i class="fa-solid fa-times-circle mr-1"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
