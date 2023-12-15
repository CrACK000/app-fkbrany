<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 pt-0">

    <div class="w-full mb-8">
        {{ $references->links('livewire.components.paginate') }}
    </div>

    @foreach($references as $reference)
        <div class="flex flex-col lg:flex-row gap-6">
            <div class="lg:w-4/12">
                <x-reference-preview :reference-id="$reference->id" :reference-title="$reference->title" resolution="480x270" class="w-full"></x-reference-preview>
            </div>
            <div class="lg:w-8/12">
                <div class="text-2xl font-medium flex items-start">
                    {{ $reference->title }}
                    <div class="ms-auto">
                        <button wire:click="confirmReferenceDelete({{ $reference->id }}, '{{ $reference->title }}')" class="text-gray-600/60 hover:text-red-500/60 transition duration-200"><i class="fa-regular fa-trash-can"></i></button>
                    </div>
                </div>
                <div class="py-4">
                    <ul class="flex divide-x divide-gray-700/70 text-sm opacity-75">
                        <li><a class="py-2 px-3 font-semibold text-gray-700 hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100 transition duration-200" href="{{ route('references.edit', [ 'id' => $reference->id ]) }}"><i class="fa-regular fa-pen-to-square me-1"></i> Upraviť</a></li>
                        <li class="px-4 text-gray-600 dark:text-gray-400">Zhliadnutia: {{ $reference->views }}x</li>
                    </ul>
                </div>
                <div class="bg-gray-600/10 p-4 rounded-md w-full">
                    {{ $reference->description }}
                </div>
            </div>
        </div>

        <x-section-border />
    @endforeach

    <x-confirmation-modal wire:model.live="confirmingReferenceDelete">
        <x-slot:title>Naozaj chcete odstrániť túto referenciu?</x-slot:title>
        <x-slot:content>{{ $referenceTitle }}</x-slot:content>
        <x-slot:footer>
            <x-secondary-button wire:click="$toggle('confirmingReferenceDelete')" wire:loading.attr="disabled">
                {{ __('Zrušiť') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" wire:click="delete" wire:loading.attr="disabled">
                <i class="fa-regular fa-trash-can me-3 fa-lg"></i> Odstrániť
            </x-danger-button>
        </x-slot:footer>
    </x-confirmation-modal>

    {{ $references->links('livewire.components.paginate') }}

</div>
