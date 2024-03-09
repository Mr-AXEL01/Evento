@extends('layouts.dashboard')

@section('content')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
            <div class="flex justify-between">
                <div class="uppercase text-sky-900 font-bold text-2xl">
                    Events
                </div>
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border  md:rounded-lg">
                            <table class="min-w-full divide-y divide-Fuchsia-900">
                                <thead class="bg-neutral-800">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        <span>Event ID</span>
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Name
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Description
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Location
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Date
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Place
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Status
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-orange-200" id="users-container">
                                @foreach($events as $event)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">{{$event->id}}</td>
                                        <td class="px-12 py-4 flex text-sm font-medium items-center justify-center whitespace-nowrap">
                                            <img src="{{ asset('storage/image/' . $event->cover) }}" alt="User Picture" class="w-12 h-10 rounded-full mr-2">
                                            <div class="text-sm font-medium">{{ $event->title }}</div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle">{{ $event->description }}</td>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">{{ $event->location }}</td>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">{{ date('d-m-Y', strtotime($event->date)) }}</td>
                                        <td class="px-4 py-4 text-sm text-center align-middle whitespace-nowrap">{{$event->place}}</td>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">
                                            @if($event->status == 'pending')
                                                <div class="text-sm text-orange-500 bg-orange-400/20 w-fit px-4 py-1 rounded-2xl">Pending</div>
                                            @elseif($event->status == 'approved')
                                                <div class="text-sm text-blue-500 bg-green-400/20 w-fit px-4 py-1 rounded-2xl">Approved</div>
                                            @else
                                                <div class="text-sm text-blue-500 bg-red-400/20 w-fit px-4 py-1 rounded-2xl">Refused</div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 text-sm text-center align-middle whitespace-nowrap">
                                            <div class="flex justify-center gap-2">
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="inline-flex items-center justify-center px-2 py-2 rounded-lg transition duration-200 focus:outline-none focus:ring focus:ring-opacity-50">
                                                        <i class="fa-solid fa-trash" style="color:red">Refuse</i>
                                                    </button>
                                                </form>

                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="inline-flex items-center justify-center px-2 py-2 rounded-lg transition duration-200 focus:outline-none focus:ring focus:ring-opacity-50">
                                                        <i class="fa-solid fa-trash" style="color:red">Refuse</i>
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
