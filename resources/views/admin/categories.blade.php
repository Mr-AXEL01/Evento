@extends('layouts.dashboard')

@section('content')
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-200 min-h-screen transition-all main">
        <div class=" p-5 mx-5 rounded-lg">
            <div class="flex justify-between">
                <div class="uppercase text-sky-900 font-bold text-2xl">
                    Categories
                </div>
                <div>
                    <a href="/admin/create_category" class="bg-sky-400 rounded-full p-2">
                        Add Category
                    </a>
                </div>
            </div>
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border  md:rounded-lg">
                            <table class="min-w-full divide-y divide-Fuchsia-900">
                                <thead class="bg-neutral-800">
                                <tr>
                                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        <span>ID_category</span>
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Name
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Descreption
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Created at
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-center align-middle rtl:text-right text-sky-500">
                                        Updated at
                                    </th>
                                    <th scope="col" class="relative py-3.5 px-4">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-orange-200" id="users-container">
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">{{$category->id}}</td>
                                        <td class="px-12 py-4 flex text-sm font-medium items-center justify-center whitespace-nowrap">
                                            <img src="{{ asset('storage/image/' . $category->cover) }}" alt="User Picture" class="w-12 h-12 rounded-full mr-2">
                                            <div class="text-sm font-medium">{{ $category->title }}</div>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-center align-middle whitespace-nowrap">{{ $category->description }}</td>
                                        <td class="px-4 py-4 text-sm text-center align-middle whitespace-nowrap">{{$category->created_at}}</td>
                                        <td class="px-4 py-4 text-sm text-center align-middle whitespace-nowrap">{{$category->updated_at}}</td>
                                        <td class="flex gap-2 px-4 py-4 text-sm text-center justify-center  align-middle whitespace-nowrap">
                                                <form action="" method="POST">
                                                    @csrf
                                                    <button type="submit" class="px-2 py-2 w-fit transition-colors duration-200 rounded-lg block cursor-pointer hover:bg-green-500 confirmation-link">
                                                        <i class="fa-solid fa-pen-nib"></i>
                                                    </button>
                                                </form>

                                                <form action="" method="POST">
                                                    @csrf
                                                    <button type="submit" class="px-2 py-2 bg-yellow-600 w-fit transition-colors duration-200 rounded-lg block cursor-pointer hover:bg-yellow-500 confirmation-link">
                                                        <i class="fa-solid fa-user-slash" style="color: #ffffff;"></i>
                                                    </button>
                                                </form>
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
