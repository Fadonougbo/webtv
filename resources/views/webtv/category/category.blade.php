<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-center uppercase text-gray-800 leading-tight">
            Creer une nouvelle categorie
        </h2>
    </x-slot>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg" >

        <form method="POST" action="{{route('category.store') }}">
            @csrf

            <div>
                <x-input-label class="capitalize text-[1rem] my-1" for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full border-slate-400 border-2" type="text" name="name" :value="old('name')" required  />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>


            <div class="flex items-center justify-center mt-4 ">
                <button class="w-full p-2 bg-green-600 text-lg text-white uppercase font-bold rounded-lg" >Creer</button>
            </div>
        </form>
    </div>

</x-app-layout>


