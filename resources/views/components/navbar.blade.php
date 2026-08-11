@props(['hero' => null])

<nav 
    x-data="{ activeSection: 'home' }"
    x-init="
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    activeSection = entry.target.id;
                }
            });
        }, { 
            /* threshold disesuaikan ke 0.15 agar section pendek/layar kecil tetap terdeteksi */
            threshold: 0.15,
            /* rootMargin memotong area top setinggi navbar (-80px) agar akurat */
            rootMargin: '-80px 0px -40% 0px'
        });

        document.querySelectorAll('section[id]').forEach(section => observer.observe(section));
    "
    class="fixed top-0 left-0 right-0 z-50 bg-gray-900/80 backdrop-blur-md border-b border-gray-800/60 transition-all duration-300"
>
    <div class="max-w-7xl mx-auto px-6 md:px-16 py-4 flex justify-between items-center w-full">
        <!-- Logo & Nama -->
        <div class="flex items-center space-x-3">
            <div class="bg-gradient-to-tr from-orange-600 to-amber-500 text-black font-extrabold px-3 py-1.5 rounded-lg text-lg shadow-lg">
                {{ strtoupper(substr($hero->name ?? 'MD', 0, 2)) }}
            </div>
            <span class="text-xl font-bold tracking-wide text-white">
                {{ $hero->name ?? 'M Dimas Stiyawan' }}
            </span>
        </div>

        <!-- Nav Links -->
        <ul class="hidden md:flex space-x-8 text-gray-400 font-medium text-sm">
            @php
                $links = [
                    'home' => 'Home',
                    'about' => 'About',
                    'skills' => 'Skills',
                    'projects' => 'Projects',
                    'achievements' => 'Achievements',
                    'testimonials' => 'Testimonials',
                    'contact' => 'Contact',
                ];
            @endphp

            @foreach ($links as $id => $label)
                <li>
                    <a 
                        href="#{{ $id }}" 
                        :class="activeSection === '{{ $id }}' ? 'text-orange-500 border-b-2 border-orange-500 font-semibold' : 'hover:text-white'"
                        class="pb-1 transition-all duration-200"
                    >
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- CTA Let's Talk -->
        <a href="#contact" class="bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white px-5 py-2.5 rounded-full flex items-center space-x-2 text-sm font-semibold transition shadow-lg shadow-orange-500/20">
            <span>Let's Talk</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </a>
    </div>
</nav>

<!-- Offset Margin -->
<div class="h-20"></div>