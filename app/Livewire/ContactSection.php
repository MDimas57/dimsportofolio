<?php

namespace App\Livewire;

use App\Models\ContactSetting;
use Livewire\Component;

class ContactSection extends Component
{
    public $contact;

    public function mount()
    {
        $this->contact = ContactSetting::first();
    }

    public function render()
    {
        return view('components.contact-section');
    }
}