@use(App\Models\Message)

@php
    $messages=(new Message())->orderByDesc('id')->paginate('14',pageName:"msg");
@endphp

{{$messages->render()}}

<div class="overflow-x-auto my-3">
  <table class="table table-zebra-zebra lg:table-lg ">
    <!-- head -->
    <thead>
      <tr class=" text-sm lg:text-xl uppercase text-slate-700" >
        <th class="text-center">ID</th>
        <th class="text-center">Message</th>
        <th class="text-center">Online</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
       

       @forelse ($messages as $message)
        <tr>
            <td class="text-center" >{{$message->id}}</td>
            <td class="lg:w-1/2" >{{$message->message}}</td>
            <td class=" flex flex-col items-center" >

                @if ($message->isOnline)
                    <span class="size-4 rounded-full bg-green-600 inline-block" ></span>                    
                @else
                    <span class="size-4 rounded-full bg-red-600 inline-block" ></span> 
                @endif
            </td>
            
            <td class="max-lg:space-y-3" >

              <a href="{{route('message.update',['message'=>$message->id])}}" class="btn btn-success btn-sm capitalize w-full text-white lg:w-[40%]">modifier</a> 

             @include('webtv.message.delete_button')
              
            </td>
        </tr>
       @empty
           <tr>
                <td colspan="3" class="text-center uppercase text-lg text-blue-700" >vide</td>
           </tr>
       @endforelse
    <!-- ajoute une pagination -->
     
    </tbody>
  </table>
</div> 

{{$messages->render()}}