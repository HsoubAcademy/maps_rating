<x-app-layout>
    <x-slot name="header">
    @include('includes/header')
    </x-slot>

    <div class="container my-12 mx-auto px-4">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">            
            @foreach($places as $place)
            <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                <article class="overflow-hidden rounded-lg shadow-lg bg-white">
                    <a href="{{ route('place.show', [$place->id, $place->slug]) }}">
                        <img alt="Placeholder" class="block h-auto w-full" src="{{ $place->image }}">
                    </a>
                    <header class="items-center justify-between leading-tight p-2 md:p-4">
                        <h1 class="text-base mb-3">
                            <a class="no-underline hover:underline text-black" href="">
                                {{ $place->name }}
                            </a>
                        </h1>
                        <h4 class="text-xs"> {{ $place->address }}</h4>
                    </header>
                </article>
            </div>  
            @endforeach
        </div>
    </div>
</x-app-layout>