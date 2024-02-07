@extends('layouts.sidebar')

@section('container')
    <div class="mb-5">
        <a href="/dashboard/book/addbook">
            <button class="bg-primary p-3 text-white">
                Tambah Buku <i class="fa-solid fa-plus fa-fw"></i>
            </button>
        </a>
    </div>
    <div class="mb-5">
        @if (session()->has('addbook'))
            <div id="alert-1" class="flex items-center p-4 mb-4 text-green-500 rounded-lg bg-green-50">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('addbook') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        @if (session()->has('destroybook'))
            <div id="alert-1" class="flex items-center p-4 mb-4 text-red-500 rounded-lg bg-red-50">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('destroybook') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg lg:w-full">
        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs text-white uppercase bg-primary text-center">
                <tr>
                    <th scope="col" class="px-8 py-3">
                        #
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-8 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr class="bg-white border-b hover:bg-secondary text-center">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                            {{ $loop->iteration }}
                        </th>
                        <td class=" py-4">
                            <img src="{{ asset('storage/image/' . $book->image) }}" class="h-32 w-24" alt="">
                        </td>
                        <td class="px-3 py-4">
                            {{ $book->title }}
                        </td>
                        <td class="px-3 py-4">
                            {{ $book->category->category_name }}
                        </td>
                        <td class="px-3 py-4 line-clamp-5">
                            {{ $book->description }}
                        </td>
                        <td class="px-3 py-4">
                            {{ $book->stock }}
                        </td>
                        <td class="px-3 py-4 flex justify-center">
                            <form action="{{ route('bookdelete', ['slug' => $book->slug]) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Are you sure?')">
                                    <i class="fa-solid fa-square-xmark fa-fw text-3xl text-red-600"></i>
                                </button>
                            </form>
                            <a href="/dashboard/book/editbook/{{ $book->slug }}">
                                <button type="submit">
                                    <i class="fa-solid fa-square-pen fa-fw text-3xl text-blue-600"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="m-4">
            {{ $books->links() }}
        </div>
    </div>
@endsection
