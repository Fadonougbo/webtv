@extends('webtv.home.base')

@section('title','Danxome infos')

@section('specifique_resources')
  @vite(['resources/webtv_frontend/home/HomeCarousel.tsx'])
@endsection

@section('content')
  <div class="p-2 mt-28 lg:mt-36 lg:flex" >

    <section class="w-full  h-[44rem] flex-none lg:w-[45%] lg:h-full flex flex-col" >
      <home-carousel class="h-[22rem] lg:h-[58%] w-full  block" data="{{$carouselData}}" ></home-carousel>
      <div class="  w-full my-4 p-2" >
        
        @if ($lastPosts->isNotEmpty())
          <iframe class="w-full h-[18rem] lg:h-[18rem] " src="{{$lastPosts->first()->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        @endif

      </div>
    </section>


    @if($lastPosts->isNotEmpty())
      <section>
        <section class="w-full" >
          <h2 class="text-lg my-6 text-primary uppercase text-center w-full font-semibold  underline decoration-slate-700 sm:text-2xl" >Nos Dernières Publications</h2>
        </section>

        <section class="grid  sm:grid-cols-2 lg:grow sm:gap-2 min-h-96" >

          @foreach ($lastPosts as $post)
              @php
                $categories=$post->categories->pluck('name','id');
                $date=now('africa/porto-novo')->setDateTimeFrom(new DateTime($post->created_at))->translatedFormat('d M Y');
                
              @endphp

              <div class=" my-5 shadow-black/10 shadow-lg rounded-lg p-2 bg-gray-50" >

                <a href="{{route('home.show',['post'=>$post->id,'slug'=>$post->getSlug()])}}" class="text-lg block   w-full mt-4  sm:mx-2 lg:mt-0 min-h-[16rem] sm:w-auto p-1  hover:opacity-85 hover:text-blue-800 " title="{{$post->title}}">

                  @if ($post->image)
                    <img src="{{asset('storage/'.$post->image)}}" class="w-full h-44 object-contain " alt="">
                  @else
                    <img src="{{asset('logo.jpg')}}" class="w-full h-44 object-contain" alt="">
                  @endif
                  
                  <strong class="block text-sm my-2" ><em>{{$date}}</em></strong>

                  <p class="font-bold" >{{Str::limit($post->title,60)}} </p>

                </a>

                @foreach ($categories as $id=>$category)
                  <a class="badge badge-neutral my-4 lg:hidden lg:mt-2" href="{{route('home.show.category',['category'=>$id,'name'=>$category])}}" >{{$category}}</a>
                @endforeach

              </div>

          @endforeach
          
        
        </section>
      </section>
  @endif
    
</div>

  @if ($bigPosts->isNotEmpty())
    <div class="p-2 w-full grid lg:grid-cols-2 gap-2" >
      @include('webtv.home.card',['posts'=>$bigPosts])      
    </div>
  @endif
  
  
 
  @if ($oldPosts->isNotEmpty()) 
    <div class="p-2" >
        <section>
          <h2 class="text-xl text-center text-primary mt-6 uppercase font-semibold my-3 underline decoration-slate-700 sm:text-2xl" >Ces postes pourraient vous intéresser</h2>
        </section>
        <section class="grid  sm:grid-cols-2 lg:grid-cols-3 sm:gap-2" >

          @include('webtv.home.card',['posts'=>$oldPosts])
          
        
        </section>

        <section class="flex w-full justify-center my-6 hover:opacity-85" >
            <a href="{{route('home.show.plus')}}" class="btn btn-primary text-lg" >Afficher plus de contenu</a>
        </section>
    </div>
  @endif

  @if ($allCategories->isNotEmpty())
    
    <div class="my-4 p-2"  >
      <p class="text-xl sm:text-2xl text-center my-4" >Choisissez la rubrique qui vous convient</p>
      <section class="w-full flex flex-wrap gap-2 my-3 justify-center " >
        
        @foreach ($allCategories as $category)
          <a role="button" href="{{route('home.show.category',['category'=>$category->id,'name'=>$category->name])}}" class="btn btn-outline btn-primary shadow-xl text-lg">{{$category->name}}</a>
        @endforeach

      </section>
    </div>
  @endif

  
@endsection