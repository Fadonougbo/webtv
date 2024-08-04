@extends('webtv.home.base')

@section('title',$post->title)

@section('content')
  <div class="p-2 mt-24 lg:mt-36" >
    @php
        $date=now('africa/porto-novo')->setDateTimeFrom(new DateTime($post->created_at))->translatedFormat('d M Y');
        $categories=$post->categories->pluck('name','id')->toArray();
    @endphp

    <section>
        <h1 class="text-4xl uppercase font-semibold my-3 sm:text-6xl leading-tight" >{{$post->title}}</h1>
    </section>

    <section class="my-4 flex flex-col sm:flex-row" >
        <strong class=" text-sm text-slate-700 mr-4 " ><em>Publier le {{$date}}</em></strong>

        <div class="flex max-sm:mt-2 flex-wrap" >
        @foreach ($categories as $id=>$category)
            <a class="badge badge-neutral  badge-lg mx-1" href="{{route('home.show.category',['category'=>$id,'name'=>$category])}}" >{{$category}}</a>
        @endforeach
        </div>
        
    </section>

    <section class="mb-8 mt-6" >

        <iframe class="w-full min-h-96 lg:min-h-[30rem] " src="{{$post->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
       
    </section>
    
    <section class="text-lg leading-8 break-all" >
        {{$post->description}}
    </section>

    <!-- https://www.youtube.com/@danxomeinfos4027 -->
    <!-- UCmeME6FHtsN0bNrfElwb7yw -->

    <!-- <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/xpdYXyG40zs?si=k3blaMBfDNrpnRhb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->

    <!-- <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/8HiAP1Vz13M?si=D7_3DepcH7opVpTX" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->

    <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/8HiAP1Vz13M?si=MXLODNGHGXi86Uby" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
        
<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/5c70ADEV27c?si=GHSYAtf0Xbx1bdHS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
    @include('webtv.home.social_network')

    <section  class="w-full my-4 max-sm:space-y-6  sm:flex justify-between sm:rounded-lg" >
 
      
        @if ($previousPost)
            <a href="{{route('home.show',['post'=>$previousPost->id,'slug'=>$previousPost->getSlug()])}}" title="{{$previousPost->title}}" class="btn btn-neutral w-full sm:w-[40%] h-auto pb-2 lg:pb-0" >
                
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7071 4.29289C12.0976 4.68342 12.0976 5.31658 11.7071 5.70711L6.41421 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H6.41421L11.7071 18.2929C12.0976 18.6834 12.0976 19.3166 11.7071 19.7071C11.3166 20.0976 10.6834 20.0976 10.2929 19.7071L3.29289 12.7071C3.10536 12.5196 3 12.2652 3 12C3 11.7348 3.10536 11.4804 3.29289 11.2929L10.2929 4.29289C10.6834 3.90237 11.3166 3.90237 11.7071 4.29289Z" class=" fill-gray-400"/>
                </svg>
                {{Str::limit($previousPost->title,40)}} 
            </a>
        @endif

        @if ($nextPost)
            <a href="{{route('home.show',['post'=>$nextPost->id,'slug'=>$nextPost->getSlug()])}}" title="{{$nextPost->title}}" class="btn btn-neutral w-full sm:w-[40%] h-auto pt-2 lg:pt-0" >
                {{Str::limit($nextPost->title,40)}}
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class=" fill-gray-400">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z" />
                </svg>
            </a>
        @endif

    </section>

    @if ($otherPosts->isNotEmpty())
        <section class="mb-6 mt-10 lg:mt-16" >
            <div>
                <h2 class="text-2xl text-center text-primary mt-6 uppercase font-semibold my-3 underline decoration-slate-700 sm:text-4xl" >Dans la meme rubrique</h2>
            </div>
            <div class="p-1 w-full grid sm:grid-cols-2 lg:grid-cols-3 gap-2 " >
                @include('webtv.home.card',['posts'=>$otherPosts])
            </div>
        </section>
    @endif
  
  </div>
@endsection