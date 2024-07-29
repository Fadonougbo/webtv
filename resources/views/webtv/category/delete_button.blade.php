<button class="btn btn-error btn-sm capitalize w-full text-white" onclick="my_modal_{{$category->id}}.showModal()">
                supprimer
</button>
<dialog id="my_modal_{{$category->id}}" class="modal modal-bottom sm:modal-middle">
<div class="modal-box">
    <h3 class="text-lg font-bold text-red-600">Attention</h3>
    <p class="py-4">Voulez-vous supprimer cette rubrique ?</p>
    <div class="modal-action w-full flex justify-between">
    
    <form action="{{route('category.delete.action',['category'=>$category->id])}}" method="POST" class="w-[40%]">
        @csrf
        @method('delete')
        <button class="btn btn-success btn-sm capitalize w-full  text-white mb-4">Oui</button>
    </form>

    <form method="dialog" class="w-[40%]">
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn btn-neutral btn-sm capitalize w-full text-white">Non</button>
    </form>
    </div>
</div>
</dialog>