@use(App\Models\Category)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['./resources/css/app.css','./resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen bg-gray-100" >
    <main class="drawer grow">
        <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col ">
            <!-- Navbar -->
            <section class="fixed w-full top-0 z-[3]"  >
                <div class="navbar bg-base-300 w-full  ">
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
                    <div class="mx-2 flex-1 px-2 ">Danxome info tv</div>
                    <div class="hidden flex-none lg:block ">
                        @php
                            $categories=(new Category())->limit(8)->get();
                        @endphp
                        <ul class="menu menu-horizontal capitalize text-lg font-bold">
                        <!-- Navbar menu content here -->
                            <li >
                                <a  href="{{route('home')}}"  class="active " >Acceuil</a>
                            </li>
                            <li class="dropdown dropdown-hover dropdown-end mx-2  ">
                                    <span tabindex="0" role="button">Rubrique</span>
                                    <ul tabindex="0" class="dropdown-content font-normal menu bg-gray-100 rounded-box z-[1] w-52 p-2 shadow ">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{route('home.show.category',['category'=>$category->id,'name'=>$category->name])}}">{{$category->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
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
        <div class="drawer-side z-[40]">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>

            <section class="menu bg-base-200 min-h-full w-[90%] sm:w-80 p-4 " >
                <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay cursor-pointer text-end text-4xl mb-5">
                    X
                </label>
                <ul class="uppercase text-sm ">
                <!-- Sidebar content here -->
                    <li class="w-full" >
                        <a  href="{{route('home')}}" class="active  font-semibold">Acceuil</a>
                    </li>
                    <li class="w-full mt-5" >
                        <details >
                            <summary>Rubrique</summary>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{route('home.show.category',['category'=>$category->id,'name'=>$category->name])}}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </details>
                    </li>
                </ul>
            </section>

        </div>
    </main>

    @include('webtv.shared.footer')
</body>
</html>