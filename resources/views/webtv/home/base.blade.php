<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['./resources/css/app.css','./resources/js/app.js'])
</head>
<body>
    <main class="drawer ">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <section class="fixed w-full top-0"  >
                <div class="navbar bg-base-300 w-full">
                    <div class="flex-none lg:hidden ">
                        <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            class="inline-block h-6 w-6 stroke-current">
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        </label>
                    </div>
                    <div class="mx-2 flex-1 px-2 ">Navbar Title</div>
                    <div class="hidden flex-none lg:block ">
                        <ul class="menu menu-horizontal capitalize">
                        <!-- Navbar menu content here -->
                            <li >
                                <a  href="{{route('home')}}"  class="active" >home</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Info section -->
                <div class="bg-blue-600 h-8" >
                    okok2
                </div>
            </section>
            <!-- Page content here -->
            @yield('content')
        </div>
        <div class="drawer-side ">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>

            <section class="menu bg-base-200 min-h-full w-[90%] sm:w-80 p-4" >
                <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay text-end text-xl">
                    X
                </label>
                <ul class="uppercase">
                <!-- Sidebar content here -->
                    <li class="w-full" >
                        <a  href="{{route('home')}}" class="active">home</a>
                    </li>
                </ul>
            </section>

        </div>
    </main>
</body>
</html>