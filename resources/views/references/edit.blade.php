<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Upraviť referenciu') }}
            </h2>
            <div class="md:ms-auto">
                {{ $title }}
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <livewire:form-edit-info :id="$referenceId" />

            <x-section-border />

            <livewire:form-edit-gallery :id="$referenceId" />

        </div>
    </div>
</x-app-layout>
