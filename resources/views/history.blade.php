@extends('layouts.main')

@section('container')
<div class="p-5 text-center text-2xl text-primary font-bold">
    History
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg lg:w-full p-5 ">
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
                    Rent Date
                </th>
                <th scope="col" class="px-8 py-3">
                    Return Date
                </th>
                <th scope="col" class="px-8 py-3">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rents as $rent)
                <tr class="bg-white border-b hover:bg-secondary text-center">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        {{ $loop->iteration }}
                    </th>
                    <td class=" py-4">
                        <img src="{{ asset('storage/image/' . $rent->book->image) }}" class="h-32 w-24" alt="">
                    </td>
                    <td class="px-3 py-4">
                        {{ $rent->book->title }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $rent->book->category->category_name }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $rent->rent_date }}
                    </td>
                    <td class="px-3 py-4">
                        {{ $rent->return_date }}
                    </td>
                    <td class="px-3 py-4">
                        <button class="bg-primary px-3 text-white font-bold cursor-default">
                            {{ $rent->status }}
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="m-4">
        {{ $rents->links() }}
    </div>
</div>
@endsection