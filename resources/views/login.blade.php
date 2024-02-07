@extends('layouts.main')

@section('container')
    <section class="h-screen flex mx-auto justify-center items-center">
        <div class="my-14 bg-primary rounded-xl shadow-sm w-full mx-10 max-w-xl md:max-w-md p-5">
            @if (session()->has('success'))
                <div id="alert-1"
                    class="flex items-center p-4 mb-4 text-green-500 rounded-lg bg-green-50">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
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
            @if (session()->has('error'))
                <div id="alert-2"
                    class="flex items-center p-4 mb-4 text-red-500 rounded-lg bg-red-50">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('error') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="p-5 text-center text-2xl text-white font-bold">
                Log In
            </div>
            <form action="/login" method="POST" class="max-w-sm mx-auto p-5">
                @csrf
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-white">Your
                        username</label>
                    <input type="text" name="username"
                        class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-white">Your
                        password</label>
                    <input type="password" name="password"
                        class="bg-white text-primary text-sm font-semibold rounded-lg block w-full p-2.5" required>
                </div>
                <div class="flex items-start mb-5">
                    <label for="remember" class="ms-2 text-sm font-medium text-secondary">Don't have an account? <a
                            href="/register" class="text-white hover:underline">Register here</a></label>
                </div>
                <button type="submit"
                    class="text-primary bg-white hover:bg-secondary font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>
    </section>
@endsection
