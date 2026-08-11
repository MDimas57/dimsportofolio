@php
    $hero = \App\Models\HeroSection::first();
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hero->name ?? 'Portofolio' }} - Portfolio Website</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-[#0b101d] text-white min-h-screen flex flex-col justify-between antialiased font-sans">

    <div>
        <!-- 1. Component Navbar -->
        <x-navbar :hero="$hero" />

        <!-- 2. Livewire Component Hero Section -->
        <main>
            <livewire:hero-section />
            <livewire:tech-stack-section />
            <livewire:about-section />
            <livewire:services-section />
            <livewire:certifications-section />
            <livewire:project-section />
        </main>
    </div>

    <!-- 3. Component Footer -->
    <x-footer :hero="$hero" />

    @livewireScripts
</body>
</html>