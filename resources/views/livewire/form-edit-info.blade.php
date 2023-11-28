<x-form-section submit="updateReferenceInfo">
    <x-slot:title>{{ __('Informácie') }}</x-slot:title>
    <x-slot:description>{{ __('Informácie sa budú zobrazovať v detailoch referencie.') }}</x-slot:description>

    <x-slot:form>
        <!-- Title -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="title" value="{{ __('Názov') }}" />
            <x-input id="title" type="text" class="mt-1 block w-full" wire:model="title" required autocomplete="title" />
        </div>

        <!-- Description -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="{{ __('Popis') }}" />
            <x-textarea id="description" class="mt-1 block w-full" wire:model="description" required autocomplete="description" rows="4"></x-textarea>
        </div>
    </x-slot:form>

    <x-slot:actions>
        <x-action-message class="me-3" on="saved">
            {{ __('Uložené.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled">
            {{ __('Uložiť') }}
        </x-button>
    </x-slot:actions>
</x-form-section>
