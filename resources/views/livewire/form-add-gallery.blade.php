<x-action-section class="mt-8 sm:mt-0">
    <x-slot:title>{{ __('Galéria') }}</x-slot:title>
    <x-slot:description>{{ __('Nahrajte fotografie do galérie. Jeden z obrázkov môžete nastaviť, ako hlavný.') }}</x-slot:description>
    <x-slot:content>
        @if ($images)
        <div class="mb-8">
            <div class="text-sm opacity-75 text-center mb-4">{{ __('Vyberte jeden obrázok, ako hlavný.') }}</div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
                @foreach ($images as $key => $image)
                    <div class="flex justify-center items-center w-full h-full">
                        <img src="{{ $image->temporaryUrl() }}" @class(['rounded-lg cursor-pointer','ring-4 ring-blue-500 ring-offset-4 ring-offset-white dark:ring-offset-gray-800 shadow-lg' => $main == $key]) alt="img[#{{$key}}]" wire:click="setMainImg({{$key}})">
                    </div>
                @endforeach
            </div>
        </div>
        @endif
        <div>
            <label for="dropzone-file">
                <x-button-link class="flex gap-4 items-center cursor-pointer">
                    <i class="fa-solid fa-cloud-arrow-up fa-xl"></i>
                    {{ __('Vybrať súbory') }}
                </x-button-link>
                <input id="dropzone-file" name="images[]" type="file" multiple wire:model="images" class="hidden" />
                <input type="number" name="main" value="{{ $main }}" class="hidden">
            </label>
        </div>
    </x-slot:content>
</x-action-section>
