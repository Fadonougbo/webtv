@use(App\Models\Category)
@php
    $categories=(new Category())->orderByDesc('id')->paginate('10',pageName:"cp");
@endphp

{{$categories->render()}}

<div class="overflow-x-auto my-3">
  <table class="table table-zebra-zebra table-lg">
    <!-- head -->
    <thead>
      <tr class=" text-sm lg:text-xl uppercase text-slate-700" >
        <th class="text-center">ID</th>
        <th class="text-center">Name</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
       

       @forelse ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td class="max-lg:space-y-3 lg:flex justify-center" >

              <a href="{{route('category.update',['category'=>$category->id])}}" class="btn btn-success btn-sm capitalize w-full text-white lg:w-[30%] lg:mr-3">modifier</a> 

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

{{$categories->render()}}