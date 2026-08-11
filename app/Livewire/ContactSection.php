<?php

namespace App\Livewire;

use App\Models\ContactSetting;
use Illuminate\View\View;
use Livewire\Component;

class ContactSection extends Component
{
    public ?ContactSetting $contact = null;

    public function mount(): void
    {
        $this->contact = ContactSetting::first();
    }

    public function render(): View
    {
        return view('components.contact-section');
    }
}
