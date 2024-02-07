@extends('layouts.sidebar')

@section('container')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
        <a href="/dashboard">
            <div class="bg-blue-400 p-5 rounded-xl">
                <i class="fa-solid fa-gauge fa-fw text-5xl text-white"></i>
                <p class="pt-10 font-semibold text-white text-xl">Dashboard</p>
            </div>
        </a>
        <a href="/dashboard/book">
            <div class="bg-red-400 p-5 rounded-xl">
                <i class="fa-solid fa-book fa-fw text-5xl text-white"></i>
                <p class="pt-10 font-semibold text-white text-xl">Data Buku</p>
            </div>
        </a>
        <a href="/dashboard/rent">
            <div class="bg-purple-400 p-5 rounded-xl">
                <i class="fa-solid fa-chart-column fa-fw text-5xl text-white"></i>
                <p class="pt-10 font-semibold text-white text-xl">Data Peminjaman</p>
            </div>
        </a>
        <a href="/dashboard/user">
            <div class="bg-green-400 p-5 rounded-xl">
                <i class="fa-solid fa-users fa-fw text-5xl text-white"></i>
                <p class="pt-10 font-semibold text-white text-xl">Data User</p>
            </div>
        </a>
    </div>
@endsection
