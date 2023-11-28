<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Pridať novú referenciu') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form enctype="multipart/form-data" action="{{ route('references.post') }}" method="post">

                <x-action-section>
                    <x-slot:title>Informácie</x-slot:title>
                    <x-slot:description>Informácie sa budú zobrazovať v detailoch referencie.</x-slot:description>
                    <x-slot:content>
                        <div class="flex flex-col gap-6 lg:w-8/12">
                            <div>
                                <x-label for="title" value="{{ __('Názov') }}" />
                                <div class="w-full">
                                    <x-input id="title" type="text" class="mt-1 block w-full" name="title" required autocomplete="title" />
                                </div>
                            </div>
                            <div>
                                <x-label for="description" value="{{ __('Popis') }}" />
                                <x-textarea id="description" class="mt-1 block w-full" name="description" required autocomplete="description" rows="4"></x-textarea>
                            </div>
                        </div>
                    </x-slot:content>
                </x-action-section>

                <x-section-border />

                <livewire:form-add-gallery/>

                <x-section-border />

                @csrf

                <div class="flex w-full mt-6 sm:mt-0">
                    <x-button type="submit" class="ms-auto">Pridať</x-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
