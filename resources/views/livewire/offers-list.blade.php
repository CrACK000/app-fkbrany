@php

@endphp

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Meno a Email
            </th>
            <th scope="col" class="px-6 py-3">
                Typ brány
            </th>
            <th scope="col" class="px-6 py-3">
                Dátum podania
            </th>
            <th scope="col" class="px-6 py-3">
                Doplnky
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
        </tr>
        </thead>
        <tbody>
         @forelse($offers as $offer)
             <tr class="bg-white border-b last:border-b-0 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                 <th scope="row" class="px-6 py-4">
                     <span class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $offer->name.' '.$offer->surname }}</span>
                     <span class="block text-xs opacity-75">{{ $offer->email }}</span>
                 </th>
                 <td class="px-6 py-4">
                     {{ $offer->gate }}
                 </td>
                 <td class="px-6 py-4">
                     {{ $offer->created_at }}
                 </td>
                 <td class="px-6 py-4">
                     {{ $offer->entryGate ? 'Vstupná bránka' : '' }}
                     {{ $offer->montage ? ', Montáž' : '' }}
                     {{ $offer->motor ? ', Motor' : '' }}
                 </td>
                 <td class="px-6 py-4">
                     <div class="flex items-center justify-end gap-6">
                         <x-secondary-button wire:click="detailsModal({{$offer->id}})">Zobraziť</x-secondary-button>
                         <x-danger-button wire:click="confirmDelete({{$offer->id}})"><i class="fa-solid fa-trash-can"></i></x-danger-button>
                     </div>
                 </td>
             </tr>
         @empty
             <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                 <td colspan="5" class="px-6 py-4 text-center">
                     Žiadne ponuky o cenu neboli nájdené.
                 </td>
             </tr>
         @endforelse
        </tbody>
    </table>

    @if($confirmDeleteModal)
        <x-confirmation-modal wire:model.live="confirmDeleteModal">

            <x-slot:title>Naozaj chcete odstrániť túto ponuku?</x-slot:title>

            <x-slot:content>
                Ponuka od {{ $deleteData->name }} {{ $deleteData->surname }} ({{ $deleteData->email }})
            </x-slot:content>

            <x-slot:footer>

                <x-secondary-button wire:click="$toggle('confirmDeleteModal')">
                    Zrušiť
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteOffer({{$deleteData->id}})">
                    Odstrániť
                </x-danger-button>

            </x-slot:footer>
        </x-confirmation-modal>
    @endif

    @if($openDetailsModal)
        <x-dialog-modal wire:model.live="openDetailsModal">
            <x-slot:title>
                Žiadosť od {{ $detailsData->name.' '.$detailsData->surname }}
            </x-slot:title>
            <x-slot:content>
                <div class="overflow-hidden sm:rounded-lg -mx-6 sm:mx-0">
                    <div class="bg-gray-50 dark:bg-gray-700/20">
                        <div class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 px-4 py-2.5">
                            <span class="opacity-75">Kontakt na záujemcu</span>
                        </div>
                        <div class="p-4 flex flex-col gap-2">
                            <div class="flex flex-col gap-4 md:flex-row items-center">
                                <div class="md:w-5/12 px-4 text-center text-base w-full uppercase">E-Mail</div>
                                <div class="md:w-7/12 w-full">
                                    <div class="bg-gray-100 dark:bg-gray-900/30 py-2 px-3 rounded-md">
                                        {{ $detailsData->email }}
                                    </div>
                                </div>
                            </div>
                            @if($detailsData->mobile)
                                <div class="flex flex-col gap-4 md:flex-row items-center">
                                    <div class="md:w-5/12 px-4 text-center text-base w-full uppercase">Tel. číslo</div>
                                    <div class="md:w-7/12 w-full">
                                        <div class="bg-gray-100 dark:bg-gray-900/30 py-2 px-3 rounded-md">
                                            {{ $detailsData->mobile }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/20">
                        <div class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 px-4 py-2.5 flex justify-between">
                            <span class="font-medium">{{ $detailsData->gate }}</span>
                            <span class="opacity-75">Typ brány</span>
                        </div>
                        <div class="p-4 flex flex-col gap-2">
                            <div class="flex flex-col gap-4 md:flex-row justify-between items-center border-b border-gray-200/75 dark:border-gray-700 pb-2">
                                <div class="md:w-5/12 px-4 text-center text-base w-full uppercase">
                                    Rozmery
                                </div>
                                <div class="md:w-7/12 w-full">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="bg-gray-100 dark:bg-gray-900/30 text-center p-3 rounded-md">
                                            <div><i class="fa-solid fa-left-right text-sm me-1"></i> Šírka</div>
                                            <div class="text-lg text-gray-700 dark:text-gray-300">{{ $detailsData->widthGate }} <i>mm</i></div>
                                        </div>
                                        <div class="bg-gray-100 dark:bg-gray-900/30 text-center p-3 rounded-md">
                                            <div><i class="fa-solid fa-up-down text-sm me-1"></i> Výška</div>
                                            <div class="text-lg text-gray-700 dark:text-gray-300">{{ $detailsData->heightGate }} <i>mm</i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col gap-4 md:flex-row items-center">
                                <div class="md:w-5/12 px-4 text-center text-base w-full uppercase">Vzor brány</div>
                                <div class="md:w-7/12 w-full">
                                    <div class="bg-gray-100 dark:bg-gray-900/30 py-2 px-3 rounded-md">
                                        {{ $detailsData->styleGate }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/20">
                        <div class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 px-4 py-2.5">
                            <span class="opacity-75">Doplnky</span>
                        </div>
                        <div class="p-4 flex flex-col gap-2">
                            @if($detailsData->entryGate)
                                <div class="flex flex-col gap-4 md:flex-row items-center">
                                    <div class="md:w-5/12 px-4 text-center text-base w-full uppercase">Vstupná bránka</div>
                                    <div class="md:w-7/12 w-full">
                                        <div class="grid grid-cols-2 gap-4">
                                            <div class="bg-gray-100 dark:bg-gray-900/30 text-center p-2 rounded">
                                                <div><i class="fa-solid fa-left-right text-sm me-1"></i> Šírka</div>
                                                <div class="text-gray-700 text-lg dark:text-gray-300">{{ $detailsData->widthEntryGate }} <i>mm</i></div>
                                            </div>
                                            <div class="bg-gray-100 dark:bg-gray-900/30 text-center p-2 rounded">
                                                <div><i class="fa-solid fa-up-down text-sm me-1"></i> Výška</div>
                                                <div class="text-gray-700 text-lg dark:text-gray-300">{{ $detailsData->heightEntryGate }} <i>mm</i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($detailsData->montage)
                                <div class="flex flex-col gap-4 md:flex-row items-center border-t border-gray-200/75 dark:border-gray-700 pt-2">
                                    <div class="md:w-5/12 px-4 text-center text-base w-full uppercase">Miesto montáže</div>
                                    <div class="md:w-7/12 w-full">
                                        <div class="bg-gray-100 dark:bg-gray-900/30 py-2 px-3 rounded-md">
                                            {{ $detailsData->montagePlace }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($detailsData->motor)
                                <div class="flex flex-col gap-4 md:flex-row items-center border-t border-gray-200/75 dark:border-gray-700 pt-2">
                                    <div class="md:w-5/12 px-4 text-center text-base w-full uppercase">Motor</div>
                                    <div class="md:w-7/12 w-full">
                                        <div class="bg-gray-100 dark:bg-gray-900/30 py-2 px-3 rounded-md">
                                            Ano
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/20">
                        <div class="text-sm text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400 px-4 py-2.5">
                            <span class="opacity-75">Poznámka</span>
                        </div>
                        <div class="p-4 flex flex-col gap-2">
                            {{ $detailsData->msg }}
                        </div>
                    </div>
                </div>
            </x-slot:content>
            <x-slot:footer>
                <x-secondary-button wire:click="$toggle('openDetailsModal')">Zatvoriť</x-secondary-button>
            </x-slot:footer>
        </x-dialog-modal>
    @endif

</div>
