@extends('layouts.sidebar')

@section('container')
    <div class="mb-5">
        <a href="/dashboard/rent/pdf">
            <button class="bg-primary p-3 text-white">
                Download PDF <i class="fa-solid fa-file-pdf fa-fw"></i>
            </button>
        </a>
    </div>
    <div class="mb-5">
        @if (session()->has('return'))
            <div id="alert-1" class="flex items-center p-4 mb-4 text-green-500 rounded-lg bg-green-50">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('return') }}
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
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-xs text-white uppercase bg-primary text-center">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            User Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Book
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rent Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Return Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rents as $rent)
                        <tr class="bg-white border-b hover:bg-secondary text-center">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $rent->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $rent->user_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $rent->book->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $rent->rent_date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $rent->return_date }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if ($rent->status === 'Return')
                                    <button class="bg-green-600 px-1 rounded-md text-white font-semibold cursor-default">
                                        {{ $rent->status }}
                                    </button>
                                @elseif($rent->status === 'Reject')
                                    <button class="bg-red-600 px-1 rounded-md text-white font-semibold cursor-default">
                                        {{ $rent->status }}
                                    </button>
                                    @else
                                    <button class="bg-blue-600 px-1 rounded-md text-white font-semibold cursor-default">
                                        {{ $rent->status }}
                                    </button>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex justify-center">
                                @if ($rent->status === 'Rent')
                                    <form action="{{ route('returnbook', ['rentId' => $rent->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            onclick="return confirm('Apakah user sudah mengembalikan buku?')">
                                            <i class="fa-solid fa-square-check fa-fw text-3xl text-purple-500"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('rentreject', ['rentId' => $rent->id]) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Apakah ingin menolak peminjaman?')">
                                            <i class="fa-solid fa-square-xmark fa-fw text-3xl text-red-500"></i>
                                        </button>
                                    </form>
                                @else
                                @endif
                            </td>
                    @endforeach
                </tbody>
            </table>
            <div class="m-4">
                {{ $rents->links() }}
            </div>
        </div>
    @endsection
