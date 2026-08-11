<?php

namespace App\Livewire;

use App\Models\HeroSection as HeroModel;
use Livewire\Component;

class HeroSection extends Component
{
    public $hero;

    public function mount()
    {
        // Ambil record hero section pertama dari database
        $this->hero = HeroModel::first();
    }

    public function render()
    {
        // Sesuaikan lokasinya ke folder components
        return view('components.hero-section');
    }
}