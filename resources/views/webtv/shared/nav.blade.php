@use(App\Models\Message)
<section class="fixed w-full top-0 z-[20]" id="nav_bar" >
                <div class="navbar bg-base-300 w-full  " id="nav_menu">
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
                    <div  class="mx-2 flex-1 px-2 capitalize text-xl " >
                        <a href="{{route('home')}}" >
                            <img src="{{asset('logo.jpg')}}" class="size-8 sm:size-14 lg:size-20 object-cover mx-1 rounded-full inline-block" alt="logo de danhome info">
                            <span class="font-bold uppercase" >Danxome infos </span>
                        </a>
                    </div>
                    <div class="hidden flex-none lg:block ">
                       
                        <ul class="menu menu-horizontal capitalize text-lg font-bold items-center">
                        <!-- Navbar menu content here -->
                            @can('show_admin_interface')
                                <li>
                                    <a class="btn btn-info mx-2" href="{{route('dashboard')}}">Dashboard</a>
                                </li>
                            @endcan
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
                            <li > 
                               @include('webtv.shared.youtube_svg')
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Info section -->
                <div  id="message_slider">
                   @php
                       $messages=(new Message())->isOnline()->get();
                       
                   @endphp
                   <ul  >
                        @foreach ($messages as $message)
                            <li  >{{$message->message}}</li>
                        @endforeach
                   </ul>
                   <ul  >
                        @foreach ($messages as $message)
                            <li  >{{$message->message}}</li>
                        @endforeach
                   </ul>
                   
                </div>
            </section>