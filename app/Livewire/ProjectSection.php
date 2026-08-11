<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectSection extends Component
{
    public function render()
    {
        $projects = Project::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return view('components.project-section', [
            'projects' => $projects,
        ]);
    }
}