@extends('layouts.main')

@section('container')
    <section class="h-screen flex mx-auto justify-center items-center">
        <div class="my-14 bg-primary rounded-xl shadow-sm w-full mx-10 max-w-xl md:max-w-md">
            <div class="p-5 text-center text-2xl text-white font-bold">
                Register
            </div>
            <form action="/register" method="POST" class="max-w-sm mx-auto p-5">
                @csrf
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-white">Your
                        name</label>
                    <input type="text" name="name" class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5"
                        required>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-white">Your
                        email</label>
                    <input type="email" name="email" class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5"
                        required>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-white">Your
                        username</label>
                    <input type="text" name="username" class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5"
                        required>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-white">Your
                        password</label>
                    <input type="password" name="password" class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5"
                        required>
                </div>
                <div class="flex items-start mb-5">
                    <label for="remember" class="ms-2 text-sm font-medium text-secondary">Already have an account? <a href="/login" class="text-white hover:underline">Log In here</a></label>
                </div>
                <button type="submit"
                    class="text-primary bg-white hover:bg-secondary font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </section>
@endsection
