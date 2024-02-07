@extends('layouts.main')

@section('container')
    <div class="bg-primary">
        <div class="px-10 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="max-w-xl sm:mx-auto lg:max-w-2xl">
                <div class="flex flex-col my-15 sm:text-center sm:mb-0">
                    <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
                        <h2
                            class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-white sm:text-4xl md:mx-auto">
                            <span class="relative inline-block">
                                <svg viewBox="0 0 52 24" fill="currentColor"
                                    class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-deep-purple-accent-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                                    <defs>
                                        <pattern id="700c93bf-0068-4e32-aafe-ef5b6a647708" x="0" y="0" width=".135"
                                            height=".30">
                                            <circle cx="1" cy="1" r=".7"></circle>
                                        </pattern>
                                    </defs>
                                    <rect fill="url(#700c93bf-0068-4e32-aafe-ef5b6a647708)" width="52" height="24">
                                    </rect>
                                </svg>
                                <span class="relative">"Menyelami Dunia Ilmu, Menerangi Masa Depan: Sumber Pengetahuan
                                    Terbaik di Perpustakaan Kami."</span>
                            </span>

                        </h2>
                        <p class="text-base text-indigo-100 md:text-lg">
                            Inspirasi Setiap Halaman, Temukan Petualangan Baru di Dunia Buku.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="p-5">
        <h1 class="text-left text-3xl font-semibold text-primary">Rekomendasi Buku</h1>
        <div class="h-auto bg-white flex flex-wrap mx-auto justify-center p-5">
            @foreach ($books as $book)
                <div class="relative m-4">
                    <a href="/buku/{{ $book->slug }}">
                        <img src="{{ asset('storage/image/' . $book->image) }}" alt="card-image"
                            class="h-80 w-60 md:h-80 md:w-56 shadow-xl" />
                    </a>
                </div>
            @endforeach
        </div>
        <a href="/buku" class="flex justify-center">
            <button
                class="text-primary font-semibold border border-primary hover:bg-primary hover:text-white px-3 py-1">Lebih
                banyak ></button>
        </a>
    </section>
@endsection
