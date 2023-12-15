<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Nastavenia') }}
            </h2>
        </div>
    </x-slot>

    @livewire('settings-form')

</x-app-layout>
