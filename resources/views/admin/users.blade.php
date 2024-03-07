@extends('layouts.dashboard')

@section('content')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <div class=" p-5 mx-5 rounded-lg">
            <div class="uppercase text-sky-900 font-bold text-2xl">
                Users
            </div>


            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border  md:rounded-lg">
                            <table class="min-w-full divide-y divide-Fuchsia-900">
                                <thead class="bg-neutral-800 ">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-sky-500">
                                        <span>ID_user</span>
                                    </th>

                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-sky-500">
                                        Picture
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-sky-500">
                                        Name
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-sky-500">
                                        Email
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-sky-500">Role
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-sky-500">
                                        Joined at
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left
                                        rtl:text-right text-sky-500">Updated at
                                    </th>

                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-orange-200 " id="users-container">
{{--                                @foreach($users as $user)--}}
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">1</td>
                                        <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                            <div><img src="https://pics.craiyon.com/2023-07-02/a9c38719ebdd4004b7eeec1723404423.webp" alt="" class="w-8 h-8 rounded-full"></div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">userName</td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">user@test.com</td>
                                        <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
{{--                                            @if($user->hasRole('admin'))--}}
{{--                                                <div class="text-sm text-rose-500 bg-rose-500/20 w-fit px-4 py-1 rounded-2xl">admin</div>--}}
{{--                                            @elseif($user->hasRole('artisan'))--}}
{{--                                                <div class="text-sm text-green-500 bg-green-400/20 w-fit px-4 py-1 rounded-2xl">Artisan</div>--}}
{{--                                            @else--}}
                                                <div class="text-sm text-blue-500 bg-blue-400/20 w-fit px-4 py-1 rounded-2xl">Client</div>
{{--                                            @endif--}}
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">03/07/2024</td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">03/07/2024</td>
                                        <td class="flex  gap-2 px-4 py-4 text-sm whitespace-nowrap text-center">
                                            <form action="" method="POST">
                                                @csrf
{{--                                                @if ($user->isSuspended())--}}
                                                    <button type="submit" class="px-2 py-2 bg-green-600 w-fit transition-colors duration-200 rounded-lg block cursor-pointer hover:bg-green-500 confirmation-link">
                                                        <i class="fa-solid fa-user-check" style="color: #ffffff;"></i>
                                                    </button>
{{--                                                @else--}}
{{--                                                    <button type="submit" class="px-2 py-2 bg-yellow-600 w-fit transition-colors duration-200 rounded-lg block cursor-pointer hover:bg-yellow-500 confirmation-link">--}}
{{--                                                        <i class="fa-solid fa-user-slash" style="color: #ffffff;"></i>--}}
{{--                                                    </button>--}}
{{--                                                @endif--}}
                                            </form>
                                        </td>
                                    </tr>
{{--                                @endforeach--}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
