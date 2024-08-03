@extends('webtv.home.base')

@section('title','Danxome info tv')

@section('content')
  <div class="p-2 mt-28 lg:flex" >
    <section class="w-full bg-gray-500 h-96 flex-none lg:w-[45%] lg:h-full" >

    </section>
    <div>
      <section class="w-full" >
        <h2 class="text-xl my-6 text-primary uppercase text-center  font-semibold  underline decoration-slate-700 sm:text-2xl" >Nos Dernières Publications</h2>
      </section>

      <section class="grid  sm:grid-cols-2 lg:grow sm:gap-2" >

        @foreach ($lastPosts as $post)
            @php
              $categories=$post->categories->pluck('name','id');
              $date=now('africa/porto-novo')->setDateTimeFrom(new DateTime($post->created_at))->diffForHumans();
            @endphp

            <div class=" my-5 shadow-black/10 shadow-lg rounded-lg p-2 bg-gray-50" >

              <a href="{{route('home.show',['post'=>$post->id,'slug'=>$post->getSlug()])}}" class="text-lg block   w-full mt-4  sm:mx-2 lg:mt-0 min-h-[16rem] sm:w-auto p-1  hover:opacity-85 hover:text-blue-800 " title="{{$post->title}}">

                <img src="{{asset('storage/'.$post->image)}}" class="w-full h-44 object-cover " alt="">
                
                <strong class="block text-sm my-2" ><em>{{$date}}</em></strong>

                <p class="font-bold" >{{Str::limit($post->title,60)}} </p>

              </a>

              @foreach ($categories as $id=>$category)
                <a class="badge badge-neutral my-4 lg:hidden lg:mt-2" href="{{route('home.show.category',['category'=>$id,'name'=>$category])}}" >{{$category}}</a>
              @endforeach

            </div>

        @endforeach
        
       
      </section>
    </div>
    
  </div>

  <div class="p-2 w-full grid lg:grid-cols-2 gap-2" >
    @include('webtv.home.card',['posts'=>$bigPosts])      
  </div>
  
 
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

  <div class="my-4 p-2"  >
    <p class="text-xl sm:text-2xl text-center my-4" >Choisissez la rubrique qui vous convient</p>
    <section class="w-full flex flex-wrap gap-2 my-3 justify-center " >
      
      @foreach ($allCategories as $category)
        <a role="button" href="{{route('home.show.category',['category'=>$category->id,'name'=>$category->name])}}" class="btn btn-outline btn-primary shadow-xl text-lg">{{$category->name}}</a>
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