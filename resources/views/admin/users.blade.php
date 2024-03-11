@extends('layouts.dashboard')

@section('content')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <x-nav-dash/>
        <div class=" p-5 mx-5 rounded-lg">
            <div class="uppercase text-sky-900 font-bold text-2xl">
                Users
            </div>
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border  md:rounded-lg">
                            <table class="min-w-full divide-y divide-Fuchsia-900">
                                <thead class="bg-neutral-800">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        <span>ID_user</span>
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Name
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Email
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Role
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Joined at
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Updated at
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-orange-200" id="users-container">
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">{{$user->id}}</td>
                                        <td class="px-12 py-4 flex text-sm font-medium items-center justify-center whitespace-nowrap">
                                            <img src="{{ asset('storage/image/' . $user->picture) }}" alt="User Picture" class="w-8 h-9 rounded-full mr-2">
                                            <div class="text-sm font-medium">{{ $user->name }}</div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">{{ $user->email }}</td>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">
                                            @if($user->role == 'organiser')
                                                <div class="text-sm text-orange-500 bg-orange-400/20 w-fit px-4 py-1 rounded-2xl">Organiser</div>
                                            @else
                                                <div class="text-sm text-blue-500 bg-blue-400/20 w-fit px-4 py-1 rounded-2xl">Customer</div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 text-sm text-center align-middle whitespace-nowrap">{{$user->created_at}}</td>
                                        <td class="px-4 py-4 text-sm text-center align-middle whitespace-nowrap">{{$user->updated_at}}</td>
                                        <td class="flex gap-2 px-4 py-4 text-sm text-center align-middle whitespace-nowrap">
                                                @if ($user->status == 'banned')
                                                <form action="{{ route('users.unsuspend', $user) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="px-2 py-2 bg-green-600 w-fit transition-colors duration-200 rounded-lg block cursor-pointer hover:bg-green-500 confirmation-link">
                                                        <i class="fa-solid fa-user-check" style="color: #ffffff;"></i>
                                                    </button>
                                                </form>
                                                @else
                                                <form action="{{ route('users.suspend', $user) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="px-2 py-2 bg-red-600 w-fit transition-colors duration-200 rounded-lg block cursor-pointer hover:bg-red-500 confirmation-link">
                                                        <i class="fa-solid fa-user-slash" style="color: #ffffff;"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 lg:px-8">
                {{ $users->links() }}
            </div>
        </div>
    </main>
@endsection
