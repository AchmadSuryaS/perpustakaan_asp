<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PERPUSTAKAAN | {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="no-scrollbar">
    <nav class="bg-primary">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="images/logo.png" class="w-14" alt="">
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                @auth
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-primary font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                        type="button">{{ auth()->user()->username }}<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdown" class="z-10 hidden bg-white rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            @if (Auth::user()->role_id != 3)
                                <li>
                                    <a href="/dashboard"
                                        class="w-full text-center block px-4 py-2 font-semibold text-primary hover:bg-secondary">Dashboard</a>
                                </li>
                            @endif
                            <li>
                                <a href="/history"
                                class="w-full text-center block px-4 py-2 font-semibold text-primary hover:bg-secondary">History</a>
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full block px-4 py-2 font-semibold text-primary hover:bg-secondary">Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="/login">
                        <button type="button"
                            class="text-white bg-primary border-2 border-white hover:bg-white hover:text-primary font-bold text-sm px-4 py-2 text-center">Log
                            In</button>
                    </a>

                @endauth
                <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white md:hidden hover:bg-secondary hover:text-primary"
                    aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-xl bg-white md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-primary">
                    <li>
                        <a href="/"
                            class="block py-2 px-3 md:p-0 text-primary md:text-secondary hover:bg-primary hover:text-white md:hover:text-white rounded">Beranda</a>
                    </li>
                    <li>
                        <a href="/buku"
                            class="block py-2 px-3 md:p-0 text-primary md:text-secondary hover:bg-primary hover:text-white md:hover:text-white rounded">Buku</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('container')

    <footer class="bg-primary">
        <div class="px-4 py-5 bg-primary md:flex md:items-center md:justify-between">
            <span class="text-sm text-white sm:text-center">© 2024 <a href="/"
                    class="hover:underline">PERPUSTAKAAN</a>. All Rights Reserved.
            </span>
            <div class="flex mt-4 sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse">
                <a href="https://instagram.com/ach13_" target="_blank" class="text-secondary hover:text-white">
                    <i class="fa-brands fa-instagram fa-fw text-2xl"></i>
                </a>
                <a href="https://github.com/AchmadSuryaS" target="_blank" class="text-secondary hover:text-white">
                    <i class="fa-brands fa-github fa-fw text-2xl"></i>
                </a>
            </div>
        </div>
    </footer>


</body>

</html>
