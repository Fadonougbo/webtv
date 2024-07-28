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
                <div class="p-6 text-gray-900">
                    <a href="{{route('post.create')}}" class="inline-block w-full bg-slate-800 p-3 text-white rounded-lg font-semibold " >Ajouter un poste</a>
                </div>
            </div>
        </div>
    </div>

    <span>table</span>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{route('category.create')}}" class="inline-block w-full bg-slate-800 p-3 text-white rounded-lg font-semibold" >Ajouter une categorie</a>
                </div>
            </div>
        </div>
    </div>

    @include('webtv.category.categoriy_table')
    
</x-app-layout>


