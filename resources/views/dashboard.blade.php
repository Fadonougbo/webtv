<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center uppercase text-gray-800 leading-tight">
            Welcom
        </h2>
    </x-slot>

    
    @include('webtv.shared.alert')

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 lg:flex justify-center">
                    <a href="{{route('message.create')}}" class="inline-block w-full text-lg text-center bg-slate-800 p-3 text-white rounded-lg font-semibold hover:opacity-85 lg:w-1/2 " >Ajouter un globale message</a>
                </div>
            </div>
        </div>
    </div>

   @include('webtv.message.message_table')

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 lg:flex justify-center">
                    <a href="{{route('post.create')}}" class="inline-block w-full text-lg text-center bg-slate-800 p-3 text-white rounded-lg font-semibold hover:opacity-85 lg:w-1/2 " >Ajouter un poste</a>
                </div>
            </div>
        </div>
    </div>

   @include('webtv.post.post_table')

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 lg:flex justify-center">
                    <a href="{{route('category.create')}}" class="inline-block text-lg text-center w-full bg-slate-800 p-3 text-white rounded-lg font-semibold hover:opacity-85 lg:w-1/2" >Ajouter une rubrique</a>
                </div>
            </div>
        </div>
    </div>

    @include('webtv.category.categoriy_table')


    
</x-app-layout>


