@foreach ($posts as $post)
    @php
        $categories=$post->categories->pluck('name','id')->toArray();
        $date=now('africa/porto-novo')->setDateTimeFrom(new DateTime($post->created_at))->diffForHumans();
    @endphp

    <div class=" my-5 shadow-black/10 shadow-lg rounded-lg p-2 bg-gray-50" >
        <a href="{{route('home.show',['post'=>$post->id,'slug'=>$post->getSlug()])}}" class="text-lg block   w-full   my-2  sm:mx-2 lg:my-0 min-h-[16rem] sm:w-auto lg:h-56  hover:opacity-85 hover:text-blue-800 " title="{{$post->title}}">

        <img src="{{asset('storage/'.$post->image)}}" class="w-full h-44  object-cover " alt="">
            <strong class="block text-sm font-semibold my-2" ><em>{{$date}}</em></strong>

        <p>{{Str::limit($post->title,60)}}</p> 

        </a>

        <section class="flex flex-wrap" >
            @foreach ($categories as $id=>$category)
            <a class="badge badge-neutral lg:mt-4 mx-1" href="{{route('home.show.category',['category'=>$id,'name'=>$category])}}" >{{$category}}</a>
            @endforeach
        </section>

    </div>

@endforeach