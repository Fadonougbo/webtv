@use(App\Models\Post)

@php
    $posts=(new Post())->orderByDesc('id')->paginate(12,pageName:'pp');
@endphp

{{$posts->render()}}
<div class="overflow-x-auto my-3">
  <table class="table table-zebra-zebra table-lg">
    <!-- head -->
    <thead>
      <tr class="text-sm lg:text-xl uppercase text-slate-700" >
        <th class="text-center">ID</th>
        <th class="text-center">Titre</th>
        <th class="text-center">Online</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
    
       @forelse ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>

            <td class="sm:text-lg" >
              @if ($post->isOnline)
                <a href="{{route('home.show',['post'=>$post->id,'slug'=>$post->getSlug()])}}" class="underline ">
                {{ Str::limit($post->title,40)}}
              </a>
              @else
                {{ Str::limit($post->title,40)}}
              @endif
              
              
            </td>

            <td class="w-full flex justify-center" >

                @if ($post->isOnline)
                    <span class="size-4 rounded-full bg-green-600 inline-block" ></span>                    
                @else
                    <span class="size-4 rounded-full bg-red-600 inline-block" ></span> 
                @endif
            </td>
            
            <td class="max-lg:space-y-3" >

              <a href="{{route('post.update',['post'=>$post->id])}}" class="btn btn-success btn-sm capitalize w-full text-white lg:w-[40%]">modifier</a> 

             @include('webtv.post.delete_button')
              
            </td>
        </tr>
       @empty
           <tr>
                <td colspan="3" class="text-center uppercase text-lg text-blue-700" >vide</td>
           </tr>
       @endforelse
     
    </tbody>
  </table>
</div> 
{{$posts->render()}}