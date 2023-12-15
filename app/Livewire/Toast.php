<?php

namespace App\Livewire;

use Livewire\Component;

class Toast extends Component
{
    public $status = false;
    public $text = '';
    public function render()
    {
        $this->status = session()->has('message');
        $this->text = session('message');

        return view('livewire.components.toast');
    }
}
