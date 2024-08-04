<button class="btn btn-error btn-sm capitalize w-full text-white lg:w-[30%]" onclick="message_modal_{{$message->id}}.showModal()">
                supprimer
</button>
<dialog id="message_modal_{{$message->id}}" class="modal modal-bottom sm:modal-middle">
<div class="modal-box">
    <h3 class="text-lg font-bold text-red-600">Attention</h3>
    <p class="py-4">Voulez-vous supprimer ce message ?</p>
    <div class="modal-action w-full flex justify-between">
    
    <form action="{{route('message.delete.action',['message'=>$message->id])}}" method="POST" class="w-[40%]">
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