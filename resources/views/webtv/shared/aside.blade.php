<div class="drawer-side z-[40]">
            <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>

            <section class="menu bg-base-200 min-h-full w-[90%] sm:w-80 p-4 " >
                <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay cursor-pointer text-end text-4xl mb-5 p-2">
                    X
                </label>
                <ul class="uppercase text-sm ">
                <!-- Sidebar content here -->
                 @can('show_admin_interface')
                     <li>
                        <a class="btn btn-primary my-4 text-xl" href="{{route('dashboard')}}">Dashboard</a>
                     </li>
                 @endcan
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
                    <li>
                    <p class="grid grid-flow-col gap-4 w-full justify-center my-2">

                        <a href="https://www.youtube.com/@danxomeinfos4027" >
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="38"
                            height="38"
                            viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
                            </svg>
                        </a>
                        <a>
                            <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="38"
                            height="38"
                            viewBox="0 0 24 24"
                            class="fill-current">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
                            </svg>
                        </a>
                        </p>
                    </li>
                </ul>
            </section>

</div>