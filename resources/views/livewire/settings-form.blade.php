<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <x-form-section submit="updateSettingsBasic">
            <x-slot:title>{{ __('Nastavenia') }}</x-slot:title>
            <x-slot:description>{{ __('Informácie o webovej stránke') }}</x-slot:description>
            <x-slot:form>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="title_page" value="{{ __('Názov webu') }}" />
                    <x-input id="title_page" disabled type="text" class="mt-1 block w-full" wire:model="title_page" required autocomplete="title_page" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="email_receive" value="{{ __('Email pre prijímanie ponúk') }}" />
                    <x-input id="email_receive" type="email" class="mt-1 block w-full" wire:model="email_receive" required autocomplete="email_receive" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="units_measurement" value="{{ __('Jednotka dĺžky') }}" />
                    <x-input id="units_measurement" disabled type="text" class="mt-1 block w-full" wire:model="units_measurement" required autocomplete="units_measurement" />
                </div>

            </x-slot:form>
            <x-slot:actions>
                <x-action-message class="me-3" on="savedBasic">
                    {{ __('Uložené.') }}
                </x-action-message>

                <x-button wire:loading.attr="disabled">
                    {{ __('Uložiť') }}
                </x-button>
            </x-slot:actions>
        </x-form-section>

        <x-section-border />

        <x-form-section submit="updateSettingsCompany" class="mt-6 sm:mt-0">
            <x-slot:title>{{ __('Informácie') }}</x-slot:title>
            <x-slot:description>{{ __('Kontaktné údaje. Budú sa zobrazovať v sekcií Kontaktujte nás.') }}</x-slot:description>
            <x-slot:form>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="company_email" value="{{ __('Firemný email') }}" />
                    <x-input id="company_email" type="email" class="mt-1 block w-full" wire:model="company_email" required autocomplete="company_email" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="company_mobile" value="{{ __('Firemné tel. číslo') }}" />
                    <x-input id="company_mobile" type="text" class="mt-1 block w-full" wire:model="company_mobile" required autocomplete="company_mobile" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="company_address" value="{{ __('Adresa firmy') }}" />
                    <x-textarea id="company_address" rows="4" class="mt-1 block w-full" wire:model="company_address" required autocomplete="company_address"></x-textarea>
                </div>

            </x-slot:form>
            <x-slot:actions>
                <x-action-message class="me-3" on="savedCompany">
                    {{ __('Uložené.') }}
                </x-action-message>

                <x-button wire:loading.attr="disabled">
                    {{ __('Uložiť') }}
                </x-button>
            </x-slot:actions>
        </x-form-section>

    </div>
</div>
