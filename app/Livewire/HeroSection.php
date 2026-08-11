<?php

namespace App\Livewire;

use App\Models\HeroSection as HeroModel;
use Illuminate\View\View;
use Livewire\Component;

class HeroSection extends Component
{
    public ?HeroModel $hero = null;

    public function mount(): void
    {
        // Ambil record hero section pertama dari database
        $this->hero = HeroModel::first();
    }

    public function render(): View
    {
        // Sesuaikan lokasinya ke folder components
        return view('components.hero-section');
    }
}
