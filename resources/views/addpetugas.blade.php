@extends('layouts.sidebar')

@section('container')
    <div class="p-5 text-center text-2xl text-primary font-bold">
        Tambah Petugas
    </div>
    <form action="/dashboard/user/addpetugas" method="POST" class="mx-auto p-5">
        @csrf
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Name</label>
            <input type="text" name="name"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Email</label>
            <input type="email" name="email"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Username</label>
            <input type="text" name="username"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Password</label>
            <input type="password" name="password"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>
        </div>

        <button type="submit"
            class="text-white bg-primary font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
    </form>
@endsection
