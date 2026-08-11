<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\View\View;
use Livewire\Component;

class ServicesSection extends Component
{
    public function render(): View
    {
        $services = Service::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return view('components.services-section', [
            'services' => $services,
        ]);
    }
}
