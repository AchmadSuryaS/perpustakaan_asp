@extends('layouts.sidebar')

@section('container')
    <div class="p-5 text-center text-2xl text-primary font-bold">
        Edit User
    </div>
    <form action="{{ route('edituser', ['id' => $users->id]) }}" method="POST" class="mx-auto p-5">
        @csrf
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Name</label>
            <input type="text" name="name" value="{{ $users->name }}"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5">
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Email</label>
            <input type="email" name="email"  value="{{ $users->email }}"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5">
        </div>
        <div class="mb-5">
            <label class="block mb-2 text-sm font-medium text-primary">Username</label>
            <input type="text" name="username"  value="{{ $users->username }}"
                class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" >
        </div>
      <div class="mb-5">
        <a href="/dashboard/user/edituser/edituserpassword/{{ $users->id }}" class="mb-5">Ganti Password</a>
      </div>
        <button type="submit"
            class="text-white bg-primary font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
    </form>
@endsection
