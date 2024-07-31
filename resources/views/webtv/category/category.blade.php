<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-center uppercase text-gray-800 leading-tight">
            @if ($category->id)
                Modifier le rubrique <mark>{{$category->name}} </mark> 
            @else
                Creer une nouvelle rubrique
            @endif
        </h2>
    </x-slot>

    <div class="w-full sm:flex justify-center  mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg" >

        <form method="POST" action="{{$category->id?route('category.update.action',['category'=>$category->id]):route('category.store') }}" class="w-ful sm:w-[80%] lg:w-[70%] xl:w-1/2" >

            @csrf

            @method($category->id?'PATCH':'POST')

            <div>
                <x-input-label class="capitalize text-[1rem] my-1" for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full border-slate-400 border-2" type="text" name="name" :value="old('name',$category->name)" required  />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            <div class="flex items-center justify-center mt-4 ">
                <button class="w-full p-2 bg-green-600 text-lg text-white uppercase font-bold rounded-lg" >
                    @if ($category->id)
                       Modifier
                    @else
                        Creer
                    @endif
                </button>
            </div>
        </form>
    </div>

</x-app-layout>


