<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Referencie') }}
            </h2>
            <div class="ms-auto">
                <x-button-link href="{{ route('references.add') }}">Pridať novú</x-button-link>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('references-list')
        </div>
    </div>
</x-app-layout>
