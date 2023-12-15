<?php

namespace App\Livewire;

use App\Models\Settings;
use Hamcrest\Core\Set;
use Livewire\Component;

class SettingsForm extends Component
{
    public $title_page;
    public $email_receive;
    public $units_measurement;
    public $company_email;
    public $company_mobile;
    public $company_address;

    public function updateSettingsBasic(): void
    {
        $settings = Settings::first();
        $settings->title_page = $this->title_page;
        $settings->email_receive = $this->email_receive;
        $settings->units_measurement = $this->units_measurement;
        $settings->save();
        $this->dispatch('savedBasic');
    }

    public function updateSettingsCompany(): void
    {
        $settings = Settings::first();
        $settings->company_email = $this->company_email;
        $settings->company_mobile = $this->company_mobile;
        $settings->company_address = $this->company_address;
        $settings->save();
        $this->dispatch('savedCompany');
    }

    public function render()
    {
        $settings = Settings::first();

        $this->title_page = $settings->title_page;
        $this->email_receive = $settings->email_receive;
        $this->units_measurement = $settings->units_measurement;
        $this->company_email = $settings->company_email;
        $this->company_mobile = $settings->company_mobile;
        $this->company_address = $settings->company_address;

        return view('livewire.settings-form');
    }
}
