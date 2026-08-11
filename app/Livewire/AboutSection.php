<?php

namespace App\Livewire;

use App\Models\AboutSection as AboutModel;
use Illuminate\View\View;
use Livewire\Component;

class AboutSection extends Component
{
    public ?AboutModel $about = null;

    public function mount(): void
    {
        $this->about = AboutModel::first();
    }

    public function render(): View
    {
        return view('components.about-section');
    }
}
