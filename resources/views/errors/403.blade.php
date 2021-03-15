<x-app-layout>
    <x-slot name="header">
        @include('includes/header') 
    </x-slot>

    <div class="container my-12 mx-auto md:px-12">
        <div class="bg-gray-200 relative text-gray-600 border text-center text-xl p-5">
            <h1>403</h1>
            <h3>{{ $exception->getMessage() }}</h3>
        </div>
    </div>
</x-app-layout>
