@extends('webtv.home.base')

@section('title','webtv')

@section('content')
  <div class="p-2 mt-28 lg:flex" >
    <section class="w-full bg-gray-500 h-96 flex-none lg:w-[45%] lg:h-full" >

    </section>
    <div>
      <section class="w-full" >
        <h2 class="text-xl my-6 text-primary uppercase text-center  font-semibold  underline decoration-slate-700 sm:text-2xl" >Nos Dernières Publications</h2>
      </section>

      <section class="grid  sm:grid-cols-2 lg:grow" >

        @foreach ($lastPosts as $post)
            @php
              $categories=$post->categories->pluck('name')->toArray();
              $date=(new DateTime($post->created_at))->format('d-m-Y');
            @endphp

            <div class="" >
              <a href="{{route('home.show',['post'=>$post->id,'slug'=>$post->getSlug()])}}" class="text-lg block   w-full  h-[25rem] mt-4  sm:mx-2 lg:mt-0 lg:mb-14 sm:w-auto lg:h-52 hover:opacity-85 hover:text-primary " >
                <img src="{{asset('storage/'.$post->image)}}" class="w-full h-[70%] mb-5 object-cover ]" alt="">
                 <strong class="block text-sm lg:hidden" ><em>{{$date}}</em></strong>
                {{Str::limit($post->title,60)}} 
              </a>

              @foreach ($categories as $category)
                <div class="badge badge-neutral lg:hidden ">{{$category}}</div>
              @endforeach

            </div>

        @endforeach
        
       
      </section>
    </div>
    
  </div>
  
 
  <div class="p-2" >
      <section>
        <h2 class="text-xl text-center text-primary mt-6 uppercase font-semibold my-3 underline decoration-slate-700 sm:text-2xl" >Ces postes pourraient vous intéresser</h2>
      </section>
      <section class="grid  sm:grid-cols-2 lg:grow" >

        @foreach ($oldPosts as $post)
            @php
              $categories=$post->categories->pluck('name')->toArray();
              $date=(new DateTime($post->created_at))->format('d-m-Y');
            @endphp

            <div>
              <a href="{{route('home.show',['post'=>$post->id,'slug'=>$post->getSlug()])}}" class="text-lg block   w-full  h-[25rem] my-4  sm:mx-2 lg:my-0 lg:mb-2 sm:w-auto lg:h-52  hover:opacity-85 hover:text-primary" >

                <img src="{{asset('storage/'.$post->image)}}" class="w-full h-[70%] mb-5 object-cover" alt="">
                 <strong class="block text-sm font-semibold" ><em>{{$date}}</em></strong>

                {{Str::limit($post->title,60)}} 

              </a>

              @foreach ($categories as $category)
                 
              <div class="badge badge-neutral">{{$category}}</div>
              @endforeach

            </div>

        @endforeach
        
       
      </section>
  </div>

  <div class="my-4 p-2"  >
    <p class="text-xl sm:text-2xl sm:text-center my-3" >Choisissez la rubrique qui vous convient</p>
    <section class="w-full flex flex-wrap gap-2 my-3 justify-center " >
      
      @foreach ($allCategories as $category)
        <a role="button" href="" class="btn btn-outline btn-primary shadow-xl text-lg">{{$category->name}}</a>
      @endforeach
      @foreach ($allCategories as $category)
        <a role="button" class="btn btn-outline btn-primary shadow-xl text-lg">{{$category->name}}</a>
      @endforeach
      @foreach ($allCategories as $category)
        <a role="button" class="btn btn-outline btn-primary shadow-xl text-lg">{{$category->name}}</a>
      @endforeach
      @foreach ($allCategories as $category)
        <a role="button" class="btn btn-outline btn-primary shadow-xl text-lg">{{$category->name}}</a>
      @endforeach
    </section>
  </div>

  
@endsection