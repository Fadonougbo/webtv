@extends('webtv.home.base')

@section('title',$category->name)

@section('content')

    
<div class="p-2 w-full mt-32" >

    <div class="text-lg">
        <ul class="flex items-center font-bold" >
            <li class="uppercase" ><em>Rubrique</em></li>
            <li class="mx-2 text-2xl text-slate-400" >></li>
            <li class="text-primary" >{{$category->name}}</li>
        </ul>
    </div>
      <div class="my-6 " >{{$allPosts->render()}}</div>

      <section class="grid  sm:grid-cols-2 lg:grid-cols-3 sm:gap-3" >
       @include('webtv.home.card',['posts'=>$allPosts])
      </section>

    <div class="my-6" >{{$allPosts->render()}}</div>
  </div>

@endsection