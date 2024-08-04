@extends('webtv.home.base')

@section('title',"Aficher plus de contenu")

@section('content')

    
<div class="p-2 w-full mt-32  " > 

       <div class="my-6 " >{{$allPosts->render()}}</div>
      <section class="grid  sm:grid-cols-2 lg:grid-cols-3 sm:gap-3" >
        @include('webtv.home.card',['posts'=>$allPosts])
       
      </section>
    <div class="my-6" >{{$allPosts->render()}}</div>
  </div>

@endsection