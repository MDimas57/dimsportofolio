<?php

namespace App\Livewire;

use App\Models\TechStack;
use Illuminate\View\View;
use Livewire\Component;

class TechStackSection extends Component
{
    public function render(): View
    {
        $techStacks = TechStack::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return view('components.tech-stack-section', [
            'techStacks' => $techStacks,
        ]);
    }
}
