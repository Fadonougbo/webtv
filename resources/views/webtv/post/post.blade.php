<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-center uppercase text-gray-800 leading-tight">
            Creer un nouveau poste
        </h2>
    </x-slot>


    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg" >

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label class="capitalize text-[1rem] my-1" for="title" :value="__('Titre')" />
                <x-text-input id="title" class="block mt-1 w-full border-slate-400 border-2" type="text" name="title" :value="old('title')" required  />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="my-4">
                <x-input-label class="capitalize text-[1rem] my-1" for="url" :value="__('Lien youtube')" />

                <x-text-input id="url" class="block mt-1 w-full border-slate-400 border-2"
                                type="url"
                                name="url"
                                required  />

                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <div class="my-3" >
                <x-input-label class="capitalize text-[1rem] my-1" for="category" :value="__('Selectionner une categorie')" />
                <select name="category" id="category" class="w-full  my-2 rounded-md border-slate-400 border-2">
                    <option value="www">essai</option>
                </select>
            </div>

            <div class="my-3" >
                <x-input-label class="capitalize text-[1rem] my-1" for="description" :value="__('Ajouter une description')" />
                <textarea name="description" id="description" class="w-full min-h-32 my-2 rounded-md border-slate-400 border-2" ></textarea>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="isOnline" class="inline-flex items-center">
                    <input id="isOnline" type="checkbox" class="rounded dark:bg-gray-900 border-slate-400 border-2 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="isOnline">
                    <span class="ms-2  text-gray-600 dark:text-gray-400 text-lg ">{{ __('Mettre en ligne ?') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-4 ">

                <button class="w-full p-2 bg-green-600 text-lg text-white uppercase font-bold rounded-lg" >Creer</button>
            </div>
        </form>
    </div>

</x-app-layout>


