<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="fixed top-0 z-50 w-full bg-primary border-b border-secondary">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-secondary rounded-lg sm:hidden hover:bg-white hover:text-primary">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/dashboard" class="flex ms-2 md:me-24">
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">DASHBOARD</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center mx-5">
                        <div>
                            <button type="button" class="flex mx-3" aria-expanded="false"
                                data-dropdown-toggle="dropdown-user">
                                <i class="fa-solid fa-user-gear fa-fw text-2xl text-secondary hover:text-white"></i>
                            </button>
                        </div>
                        <div class="z-50 hidden my-4  text-base list-none bg-secondary rounded shadow"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900" role="none">
                                    {{ auth()->user()->username }}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>
                            <ul class="py-1">
                                <li>
                                    <a href="/"
                                        class="block px-4 py-2 text-sm text-black hover:bg-white text-center">View Page</a>
                                </li>
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="block px-4 py-2 text-sm text-text-black hover:bg-red-500 hover:text-white w-full">Log
                                            Out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-primary   sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-primary">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/dashboard"
                        class="flex items-center p-2 text-secondary rounded-lg hover:bg-white hover:text-primary">
                        <i class="fa-solid fa-gauge fa-fw text-lg"></i>
                        <span class="ms-3 text-sm">Dashboard</span>
                    </a>
                </li>
                <hr>
                <li>
                    <a href="/dashboard/book"
                        class="flex items-center p-2 text-secondary rounded-lg hover:bg-white hover:text-primary">
                        <i class="fa-solid fa-book fa-fw text-lg"></i>
                        <span class="ms-3 text-sm">Data Buku</span>
                    </a>
                </li>
                <li>
                    <a href="/dashboard/rent"
                        class="flex items-center p-2 text-secondary rounded-lg hover:bg-white hover:text-primary">
                        <i class="fa-solid fa-chart-column fa-fw text-lg"></i>
                        <span class="ms-3 text-sm">Data Peminjaman</span>
                    </a>
                </li>
                <hr>
                <li>
                    @if(auth()->user()->role->name === 'admin')
                        <a href="/dashboard/user"
                            class="flex items-center p-2 text-secondary rounded-lg hover:bg-white hover:text-primary">
                            <i class="fa-solid fa-users fa-fw text-lg"></i>
                            <span class="ms-3 text-sm">Data User</span>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">

            @yield('container')
            
        </div>
    </div>


</body>

</html>
