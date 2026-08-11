<?php

namespace App\Livewire;

use App\Models\Certification;
use Illuminate\View\View;
use Livewire\Component;

class CertificationsSection extends Component
{
    /**
     * @var array<int, array{
     *     id: int,
     *     title: string,
     *     issuer: string,
     *     issue_date: string,
     *     url: string,
     *     back_url: string|null,
     *     description: string,
     *     credential_url: string
     * }>
     */
    public array $items = [];

    public function mount(): void
    {
        $certifications = Certification::orderBy('sort_order', 'asc')->get();

        if ($certifications->isNotEmpty()) {
            $this->items = $certifications->map(function (Certification $cert): array {
                return [
                    'id' => $cert->id,
                    'title' => $cert->title,
                    'issuer' => $cert->issuer ?? 'Official Certification',
                    'issue_date' => $cert->issue_date ?? '',
                    'url' => asset('storage/'.$cert->front_image),
                    'back_url' => $cert->back_image
                        ? asset('storage/'.$cert->back_image)
                        : null,
                    'description' => $cert->description ?? '',
                    'credential_url' => $cert->credential_url ?? '#',
                ];
            })->toArray();
        } else {
            // Dummy data jika database masih kosong
            $this->items = [
                [
                    'id' => 1,
                    'title' => 'Full-Stack Web Development Specialization',
                    'issuer' => 'Dicoding Indonesia',
                    'issue_date' => '2024',
                    'url' => 'https://images.unsplash.com/photo-1589330694653-ded6df03f754?q=80&w=1000&auto=format&fit=crop',
                    'back_url' => 'https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?q=80&w=1000&auto=format&fit=crop',
                    'description' => 'Sertifikasi kompetensi dalam pengembangan aplikasi web modern menggunakan Laravel, Filament, dan Livewire.',
                    'credential_url' => '#',
                ],
                [
                    'id' => 2,
                    'title' => 'Cloud Practitioner & Infrastructure',
                    'issuer' => 'AWS Academy',
                    'issue_date' => '2025',
                    'url' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1000&auto=format&fit=crop',
                    'back_url' => null,
                    'description' => 'Memahami arsitektur cloud, keamanan sistem, dan manajemen deployment server berbasis cloud.',
                    'credential_url' => '#',
                ],
            ];
        }
    }

    public function render(): View
    {
        return view('components.certifications-section');
    }
}
