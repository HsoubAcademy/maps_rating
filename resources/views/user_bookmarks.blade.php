<x-app-layout>
    <x-slot name="header">
        @include('includes/header') 
    </x-slot>

    <div class="container mx-auto md:px-12 p-5">
        <h3 class="mb-4 mt-4 text-2xl">الإشارات المرجعية  </h3><hr/>
         @if(!count($bookmarks))
            <x-alert color="blue" message="لا توجد أي إشارات مرجعية بعد" />
         @endif 

         @foreach($bookmarks as $place)
            <div class="flex mt-5 bg-white border">
                <div class="flex-none w-48 relative">
                    <img src="{{ $place->image }}" alt="" class="absolute inset-0 w-full h-full object-cover" />
                </div>
                <div class="flex-auto p-6">
                    <div class="flex flex-wrap">
                        <h1 class="flex-auto text-xl font-semibold">
                            {{ $place->name }}
                        </h1>
                        <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">
                            {{ $place->address }}
                        </div>
                    </div>
                    <div class="flex space-x-3 mb-4 text-sm font-medium mt-5">
                        <div class="flex-auto flex space-x-3">
                            <a href="{{ route('place.show', [$place->id, $place->slug]) }}" class="w-15 h-8 flex items-center justify-center rounded-md border border-gray-300">عرض</a>
                        </div>
                    </div>
                </div>
            </div>
         @endforeach  
    </div>
</x-app-layout>
