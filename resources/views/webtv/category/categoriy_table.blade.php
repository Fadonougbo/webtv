@use(App\Models\Category)

<div class="overflow-x-auto">
  <table class="table table-zebra-zebra table-lg">
    <!-- head -->
    <thead>
      <tr class="text-sm" >
        <th class="text-center">ID</th>
        <th class="text-center">Name</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
       @php
           $categories=(new Category())->orderByDesc('id')->get();
       @endphp

       @forelse ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td class="space-y-3" >

              <a href="{{route('category.update',['category'=>$category->id])}}" class="btn btn-success btn-sm capitalize w-full text-white">modifier</a> 

             @include('webtv.category.delete_button')
              
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