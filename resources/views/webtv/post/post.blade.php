@use(App\Models\Category)
<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-center uppercase text-gray-800 leading-tight">
            @if ($post->id)
                Modification du poste: <mark>{{$post->title}} </mark> 
            @else
                Creer un nouveau poste
            @endif
        </h2>
    </x-slot>

    <div class="w-full  mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg sm:flex justify-center" >

        <form method="POST" action="{{$post->id?route('post.update.action',['post'=>$post->id]):route('post.create') }}" enctype="multipart/form-data" class="w-ful sm:w-[80%] lg:w-[70%] xl:w-1/2">

            @csrf

            @method($post->id?'PATCH':'POST')

            {{--@if ($errors->any())

            @dump('okok')
                @foreach ($errors->all() as $error)
                    @dump($error)
                @endforeach
            @endif--}}

            <!-- Email Address -->
            <div class="my-4 " >
                <x-input-label class="capitalize text-[1rem] my-1 sm:text-lg" for="title" :value="__('Titre')" />

                <x-text-input id="title" class="block mt-1 w-full border-slate-400 border-2" type="text" name="title" :value="old('title',$post?->title)" required  />

                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="my-4">
                <x-input-label class="capitalize text-[1rem] my-1 sm:text-lg" for="url" :value="__('Lien youtube')" />

                <x-text-input id="url" :value="old('url',$post?->url)" class="block mt-1 w-full border-slate-400 border-2" type="url" name="url" required  />

                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <div class="my-4" >
                <x-input-label class=" text-[1rem] my-1 sm:text-lg" for="categories" :value="__('Selectionner une ou plusieur rubriques')" />

                <select name="categories[]" id="categories" class="w-full  my-2 rounded-md border-slate-400 border-2" required multiple>
                    
                    @php
                        $postCategoryId=$post->categories->pluck('id')->toArray();
                    @endphp

                    @foreach ($categories as $category)
                        @php
                            $isSelected=in_array($category->id,old('categories',$postCategoryId));
                        @endphp

                        <option value="{{$category->id}}" @selected($isSelected) >{{$category->name}}</option>
                    @endforeach    

                </select>

                <x-input-error :messages="$errors->get('categories')" class="mt-2" />
            </div>

            <div class="my-4" >
                @if ($post->image)
                    <section  class="w-full h-28 my-4">
                        <img src="{{asset('storage/'.$post->image)}}" class="w-full h-full object-contain" alt="">
                    </section> 
                @endif
                <x-input-label class=" text-[1rem] my-1 sm:text-lg" for="image" :value="__('Selectionner une image')" />
                <x-text-input id="image"  class="block mt-1 w-full border-slate-400 border-2 " accept="image/*" type="file" name="image"   />

                <x-input-error :messages="$errors->get('image')" class="mt-2" />
               
            </div>

            <div class="my-4" >
                <x-input-label class="capitalize text-[1rem] my-1 sm:text-lg" for="description" :value="__('Ajouter une description')" />
                <textarea name="description" id="description" class="w-full min-h-32 my-2 rounded-md border-slate-400 border-2" >{{old('description',$post?->description)}}</textarea>

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block my-4">
                <label for="isOnline" class="inline-flex items-center">
                    <input id="isOnline" type="checkbox" value="1" class="rounded dark:bg-gray-900 border-slate-400 border-2 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="isOnline" @checked(old('isOnline',$post?->isOnline)) >

                    <span class="ms-2  text-gray-600 dark:text-gray-400 text-lg ">{{ __('Mettre en ligne ?') }}</span>

                </label>
            </div>

            <div class="flex items-center justify-center mt-4 ">

                <button class="w-full p-2 bg-green-600 text-lg text-white uppercase font-bold rounded-lg" >
                    @if ($post->id)
                        Modifier
                    @else
                       Creer 
                    @endif
                    
                </button>
            </div>
        </form>
    </div>

</x-app-layout>


