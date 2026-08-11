<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServicesSection extends Component
{
    public function render()
    {
        $services = Service::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return view('components.services-section', [
            'services' => $services,
        ]);
    }
}