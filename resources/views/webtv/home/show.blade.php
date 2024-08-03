@extends('webtv.home.base')

@section('title',$post->title)

@section('content')
  <div class="p-2 mt-24 lg:mt-28" >
    @php
        $date=now('africa/porto-novo')->setDateTimeFrom(new DateTime($post->created_at))->diffForHumans();;
        $categories=$post->categories->pluck('name','id')->toArray();
    @endphp

    <section>
        <h1 class="text-4xl uppercase font-semibold my-3 sm:text-6xl leading-tight" >{{$post->title}}</h1>
    </section>

    <section class="my-4 flex flex-col sm:flex-row" >
        <strong class=" text-sm text-slate-700 mr-4 " >Publier : <em>{{$date}}</em></strong>

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

<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/5c70ADEV27c?si=GHSYAtf0Xbx1bdHS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
    @include('webtv.home.social_network')

    <section  class="w-full my-4 max-sm:space-y-6  sm:flex justify-between sm:rounded-lg" >
 
      
        @if ($previousPost)
            <a href="{{route('home.show',['post'=>$previousPost->id,'slug'=>$previousPost->getSlug()])}}" title="{{$previousPost->title}}" class="btn btn-neutral w-full sm:w-[40%]" >
               <<< {{Str::limit($previousPost->title)}} 
            </a>
        @endif

        @if ($nextPost)
            <a href="{{route('home.show',['post'=>$nextPost->id,'slug'=>$nextPost->getSlug()])}}" title="{{$nextPost->title}}" class="btn btn-neutral w-full sm:w-[40%]" >
                {{Str::limit($nextPost->title,40)}} >>>
            </a>
        @endif

    </section>

    <section class="mb-6 mt-24" >
        <div>
            <h2 class="text-2xl text-center text-primary mt-6 uppercase font-semibold my-3 underline decoration-slate-700 sm:text-4xl" >Dans la meme rubrique</h2>
        </div>
        <div class="p-1 w-full grid sm:grid-cols-2 lg:grid-cols-3 gap-2 " >
            @include('webtv.home.card',['posts'=>$otherPosts])
        </div>
    </section>
  
    
  
  </div>
@endsection