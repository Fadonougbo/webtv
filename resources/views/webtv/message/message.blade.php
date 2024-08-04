<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-center uppercase text-gray-800 leading-tight">
            @if ($message->id)
                Modifier le message <mark>{{$message->content}} </mark> 
            @else
                Creer un nouveau message
            @endif
        </h2>
    </x-slot>

    <div class="w-full sm:flex justify-center  mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg" >

        <form method="POST" action="{{$message->id?route('message.update.action',['message'=>$message->id]):route('message.store') }}" class="w-ful sm:w-[80%] lg:w-[70%] xl:w-1/2" >

            @csrf

            @method($message->id?'PATCH':'POST')

            <div>
                <x-input-label class="capitalize text-[1.3rem] my-2 sm:text-[1.7rem]" for="message" :value="__('Message')" />
                <textarea name="message" class="block rounded-md h-32 mt-1 w-full border-slate-400 border-2" id="message" required>{{old('message',$message->message)}}</textarea>
                <x-input-error :messages="$errors->get('message')" class="mt-2" />
            </div>

            <div class="block my-4">
                <label for="isOnline" class="inline-flex items-center">
                    <input id="isOnline" type="checkbox" value="1" class="rounded dark:bg-gray-900 border-slate-400 border-2 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="isOnline" @checked(old('isOnline',$message?->isOnline)) >

                    <span class="ms-2  text-gray-600 dark:text-gray-400 text-lg ">{{ __('Mettre en ligne ?') }}</span>

                </label>
            </div>



            <div class="flex items-center justify-center mt-4 ">
                <button class="w-full p-2 bg-green-600 text-lg text-white uppercase font-bold rounded-lg" >
                    @if ($message->id)
                       Modifier
                    @else
                        Creer
                    @endif
                </button>
            </div>
        </form>
    </div>

</x-app-layout>


