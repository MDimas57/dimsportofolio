<?php

namespace App\Livewire;

use App\Models\AboutSection as AboutModel;
use Livewire\Component;

class AboutSection extends Component
{
    public $about;

    public function mount()
    {
        $this->about = AboutModel::first();
    }

    public function render()
    {
        return view('components.about-section');
    }
}