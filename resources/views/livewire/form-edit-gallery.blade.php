<x-form-section submit="updateGallery" enctype="multipart/form-data" class="mt-6 sm:mt-0">
    <x-slot:title>{{ __('Galéria') }}</x-slot:title>
    <x-slot:description>{{ __('Nahrajte fotografie do galérie. Jeden z obrázkov môžete nastaviť, ako hlavný.') }}</x-slot:description>
    <x-slot:form>
        @if ($gallery)
            <div class="col-span-12">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($gallery as $key => $image)
                        <div class="relative flex justify-center items-stretch w-full h-full dark:bg-white/5 bg-black/5 rounded-lg">
                            <x-reference-image :img-id="$image->id" :img-alt="$image->reference_id" resolution="200x200" @class(['rounded-lg object-contain','ring-4 ring-blue-500 ring-offset-4 ring-offset-white dark:ring-offset-gray-800 shadow-lg' => $main == $image->id ]) />

                            <div class="absolute top-0 left-0 m-1">
                                <x-dropdown align="left" width="w-40">
                                    <x-slot:trigger>
                                        <button class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white/50 rounded-md hover:bg-gray-100 focus:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800/50 dark:hover:bg-gray-700 dark:focus:bg-gray-700 dark:focus:ring-gray-600 backdrop-blur" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                        </button>
                                    </x-slot:trigger>
                                    <x-slot:content>
                                        <x-dropdown-link class="cursor-pointer" wire:click="setMainImg({{$image->id}})">
                                            Nastaviť ako hlavný
                                        </x-dropdown-link>
                                        <x-dropdown-link class="cursor-pointer" wire:click="deleteImg({{$image->id}})">
                                            Odstrániť
                                        </x-dropdown-link>
                                    </x-slot:content>
                                </x-dropdown>
                            </div>

                        </div>
                    @endforeach
                    @if($images)
                        @foreach ($images as $key => $img)
                            <div class="relative flex justify-center items-stretch w-full h-full dark:bg-white/5 bg-black/5 rounded-lg">
                                <img src="{{ url('storage/app/livewire-tmp/' . $img->getFilename()) }}" class="rounded-lg object-contain" alt="#{{ $key }}">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endif
    </x-slot:form>
    <x-slot:actions>
        <div class="me-auto">
            <label for="dropzone-file">
                <label for="dropzone-file" class="flex cursor-pointer gap-4 px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                    <i class="fa-solid fa-cloud-arrow-up fa-lg"></i>
                    {{ __('Pridať súbory') }}
                </label>
                <input id="dropzone-file" name="images[]" type="file" multiple wire:model="images" class="hidden" />
            </label>
        </div>
        <x-action-message class="me-3" on="saved">
            {{ __('Galéria bola aktualizovaná.') }}
        </x-action-message>
        <x-button class="flex items-center gap-3">
            <span wire:loading><i class="fa-solid fa-circle-notch fa-lg fa-spin"></i></span>
            {{ __('Uložiť') }}
        </x-button>
    </x-slot:actions>
</x-form-section>
