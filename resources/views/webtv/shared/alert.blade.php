<section class="p-2 my-1" >

        @session('success')
            <div role="alert" class="alert alert-success my-4 text-white/90 lg:text-xl">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-9 shrink-0 stroke-current"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{session('success')}}</span>
            </div>
        @endsession

        @session('error')
            <div role="alert" class="alert alert-error my-4 text-white/90 lg:text-xl">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-9 shrink-0 stroke-current"
                    fill="none"
                    viewBox="0 0 24 24">
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{session('error')}}</span>
            </div>
        @endsession
        
    </section>