@extends('webtv.home.base')

@section('title','webtv')

@section('content')
  <div class="p-2 mt-24" >
    @php
        $date=(new DateTime($post->created_at))->format('d/m/Y');
        $categories=$post->categories->pluck('name')->toArray();
    @endphp

    <section>
        <h1 class="text-2xl uppercase font-semibold my-3 sm:text-4xl" >{{$post->title}}</h1>
    </section>

    <section class="my-3" >
        <strong class=" text-sm text-slate-700 mr-4" ><em>{{$date}}</em></strong>
        @foreach ($categories as $category)
            <div class="badge badge-neutral sm:badge-lg">{{$category}}</div>
        @endforeach
    </section>

    <section>

    </section>

    <section class="text-lg leading-8" >
        {{$post->description}}
    </section>


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
    
  
  </div>
@endsection