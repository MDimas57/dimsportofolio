@props(['hero' => null])

@php
    // Fallback aman jika $siteSetting dari ViewComposer belum terdefinisi
    $setting = $siteSetting ?? \App\Models\SiteSetting::first();

    $links = [
        'home' => 'Home',
        'about' => 'About',
        'skills' => 'Skills',
        'achievements' => 'Achievements',
        'projects' => 'Projects',
        'contact' => 'Contact',
    ];

    $displayName = $setting?->site_name ?? $hero?->name ?? 'DimszProject';
    $logoUrl = $setting?->logo_url;
@endphp

<nav
    x-data="{
        activeSection: 'home',
        mobileMenuOpen: false,

        init() {
            this.updateActiveSection();

            window.addEventListener('scroll', () => {
                this.updateActiveSection();
            }, { passive: true });

            window.addEventListener('resize', () => {
                this.updateActiveSection();
                if (window.innerWidth >= 1024) {
                    this.mobileMenuOpen = false;
                }
            }, { passive: true });
        },

        updateActiveSection() {
            const sections = [...document.querySelectorAll('section[id]')];

            if (!sections.length) return;

            const navbarHeight = 80;
            const scrollPosition = window.scrollY + navbarHeight + 20;

            let currentSection = sections[0].id;

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (scrollPosition >= sectionTop) {
                    currentSection = section.id;
                }
            });

            const pageBottom = window.scrollY + window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;

            if (pageBottom >= documentHeight - 10) {
                currentSection = sections[sections.length - 1].id;
            }

            this.activeSection = currentSection;
        },

        scrollToSection(id) {
            const section = document.getElementById(id);

            if (!section) return;

            this.activeSection = id;
            this.mobileMenuOpen = false;

            const navbarHeight = 80;
            const targetPosition = section.getBoundingClientRect().top + window.scrollY - navbarHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    }"
    class="fixed top-0 left-0 right-0 z-50
           bg-gray-950/90 backdrop-blur-md
           border-b border-gray-800/60
           transition-all duration-300"
>
    <!-- Container Responsif (px-4 sm:px-6 lg:px-8) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2.5 flex justify-between items-center w-full">

        <!-- Logo Utama Saja (Responsif: h-10 sm:h-12 lg:h-14) -->
        <a href="#home" @click.prevent="scrollToSection('home')" class="flex items-center shrink-0 group">
            @if ($logoUrl)
                <!-- Logo Gambar dari Admin Filament -->
                <img 
                    src="{{ $logoUrl }}" 
                    alt="{{ $displayName }}" 
                    class="h-10 sm:h-12 lg:h-14 w-auto object-contain transition-transform duration-200 group-hover:scale-105"
                >
            @else
                <!-- Fallback Icon DP Monogram SVG Warna Biru -->
                <div class="relative w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 flex items-center justify-center shrink-0">
                    <svg class="w-full h-full drop-shadow-[0_0_18px_rgba(14,165,233,0.5)] transition-transform duration-200 group-hover:scale-105" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="dimszBlueGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#00D2FF" />
                                <stop offset="50%" stop-color="#0066FF" />
                                <stop offset="100%" stop-color="#0033CC" />
                            </linearGradient>
                        </defs>
                        <!-- Outer D / P Shape -->
                        <path d="M 20 15 L 60 15 C 80 15 90 30 85 50 C 80 70 65 85 45 85 L 20 85 Z" fill="url(#dimszBlueGrad)" />
                        <!-- Inner Cutout / P Loop -->
                        <path d="M 35 32 L 52 32 C 64 32 70 40 67 50 C 64 60 56 66 45 66 L 35 66 Z" fill="#030712" />
                        <!-- Forward Arrow Accent -->
                        <path d="M 20 50 L 50 50 L 35 68 Z" fill="#00D2FF" />
                    </svg>
                </div>
            @endif
        </a>

        <!-- Desktop Nav Links (Kembali ke Warna Cyan/Biru) -->
        <ul class="hidden lg:flex items-center space-x-5 xl:space-x-8 text-gray-400 font-medium text-sm">
            @foreach ($links as $id => $label)
                <li>
                    <a
                        href="#{{ $id }}"
                        @click.prevent="scrollToSection('{{ $id }}')"
                        :class="
                            activeSection === '{{ $id }}'
                                ? 'text-cyan-400 border-b-2 border-cyan-400 font-semibold'
                                : 'hover:text-white border-b-2 border-transparent'
                        "
                        class="pb-1 transition-all duration-200 whitespace-nowrap"
                    >
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Desktop CTA + Mobile Hamburger Button Container -->
        <div class="flex items-center space-x-3 shrink-0">
            <a
                href="#contact"
                @click.prevent="scrollToSection('contact')"
                class="hidden sm:flex bg-gradient-to-r
                       from-cyan-500 via-blue-600 to-blue-700
                       hover:from-cyan-400 hover:to-blue-600
                       text-white
                       px-4 py-2 sm:px-5 sm:py-2.5
                       rounded-full
                       items-center space-x-2
                       text-xs sm:text-sm font-semibold
                       transition duration-200
                       shadow-lg shadow-cyan-500/20 shrink-0"
            >
                <span>Let's Talk</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>

            <!-- Mobile / Tablet Hamburger Button (Tampil sampai breakpoint lg: / 1024px) -->
            <button
                @click="mobileMenuOpen = !mobileMenuOpen"
                type="button"
                class="lg:hidden text-gray-300 hover:text-white p-2 rounded-lg bg-gray-800/50 border border-gray-700/50 focus:outline-none"
                aria-label="Toggle Menu"
            >
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

    </div>

    <!-- Mobile Dropdown Menu (Untuk Mobile & Tablet < 1024px) -->
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        @click.away="mobileMenuOpen = false"
        x-cloak
        class="lg:hidden bg-gray-950/95 border-b border-gray-800/80 px-6 pt-2 pb-6 space-y-3"
    >
        @foreach ($links as $id => $label)
            <a
                href="#{{ $id }}"
                @click.prevent="scrollToSection('{{ $id }}')"
                :class="
                    activeSection === '{{ $id }}'
                        ? 'text-cyan-400 bg-cyan-500/10 border-l-4 border-cyan-400 font-semibold pl-3'
                        : 'text-gray-300 hover:text-white hover:bg-gray-800/50 pl-3'
                "
                class="block py-2.5 rounded-r-lg text-base font-medium transition-all"
            >
                {{ $label }}
            </a>
        @endforeach

        <div class="pt-2 sm:hidden">
            <a
                href="#contact"
                @click.prevent="scrollToSection('contact')"
                class="w-full bg-gradient-to-r from-cyan-500 via-blue-600 to-blue-700 text-white py-3 rounded-xl flex items-center justify-center space-x-2 font-semibold text-sm shadow-lg shadow-cyan-500/20"
            >
                <span>Let's Talk</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
    </div>
</nav>

<!-- Offset untuk fixed navbar -->
<div class="h-20"></div>