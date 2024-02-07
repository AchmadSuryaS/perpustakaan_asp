@extends('layouts.main')

@section('container')
    <div class="p-5 text-center">
        <form action="{{ route('searchbook') }}" method="GET">
            <div class="flex space-x-4">
                <div class="flex rounded-md overflow-hidden w-full">
                    <input type="search" name="keyword" value="{{ $keyword }}" class="w-full h-10 rounded-l-full " placeholder="Cari berdasarkan judul.." />
                    <button class="bg-primary text-white px-6 text-lg font-semibold rounded-r-full">Search</button>
                </div>
                @if ($keyword)
                    <a href="{{ route('resetsearchbook') }}" class="no-underline">
                        <button type="button" class="bg-secondary text-primary px-6 text-lg font-semibold h-10 rounded-md">Reset</button>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <div class="px-5">
        <form action="{{ route('filterbook') }}" method="GET">
            <label for="category" class="mr-2">Cari berdasarkan category</label>
            <select name="category" id="category" class="p-1">
                <option value="" class="" selected>All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" class="rounded-none">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-primary px-4 py-2 text-white ml-2 font-semibold">Filter</button>
        </form>
    </div>
    

    <h1 class="text-left text-3xl font-semibold text-primary p-5">Semua Buku</h1>
    <div class="h-auto flex mx-auto justify-center p-5">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach ($books as $book)
                <div class="bg-gray-100 shadow-xl rounded-xl p-3 w-auto">
                    <a href="/buku/{{ $book->slug }}">
                        <div class="h-56 w-full md:h-auto">
                            <img src="{{ asset('storage/image/' . $book->image) }}" alt="card-image"
                                class="w-full h-full" />
                        </div>
                        <p class="text-base text-primary font-semibold mt-3">{{ $book->title }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="m-4">
        {{ $books->links() }}
    </div>
@endsection
