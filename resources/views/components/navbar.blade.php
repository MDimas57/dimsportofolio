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
        theme: localStorage.getItem('theme') || (document.documentElement.classList.contains('dark') ? 'dark' : 'light'),
        linkIds: {{ json_encode(array_keys($links)) }},

        init() {
            this.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
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

        toggleTheme() {
            if (this.theme === 'dark') {
                this.theme = 'light';
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                this.theme = 'dark';
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        },

        updateActiveSection() {
            // Hanya deteksi section yang benar-benar ada di daftar menu navbar
            const sections = this.linkIds.map(id => document.getElementById(id)).filter(Boolean);

            if (!sections.length) return;

            // Jika scroll sudah mencapai dasar halaman, aktifkan menu Contact
            const pageBottom = window.scrollY + window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight;

            if (pageBottom >= documentHeight - 20) {
                this.activeSection = sections[sections.length - 1].id;
                return;
            }

            const navbarHeight = 85;
            // Titik acuan pandang (25% dari tinggi layar di bawah navbar)
            const viewThreshold = navbarHeight + (window.innerHeight * 0.25);

            let currentSection = sections[0].id;

            // Menggunakan getBoundingClientRect agar akurat dan tidak terpengaruh relative wrapper
            sections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top <= viewThreshold) {
                    currentSection = section.id;
                }
            });

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
           bg-white/85 dark:bg-gray-950/90 backdrop-blur-md
           border-b border-slate-200/80 dark:border-gray-800/60
           shadow-sm dark:shadow-none
           transition-all duration-300"
>
    <!-- Container Responsif (px-4 sm:px-6 lg:px-8) -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2.5 flex justify-between items-center w-full">

        <!-- Logo Utama Saja (Responsif: h-10 sm:h-12 lg:h-14) -->
        <a href="#home" @click.prevent="scrollToSection('home')" class="relative flex items-center shrink-0 group py-1">
            <!-- Ambient Glow Aksen di Belakang Logo (Hanya tampil di Light Mode, disembunyikan di Dark Mode) -->
            <div class="dark:hidden absolute -inset-1.5 sm:-inset-2 bg-gradient-to-r from-cyan-500/20 via-blue-500/15 to-indigo-500/15 rounded-2xl blur-md opacity-75 group-hover:opacity-100 transition duration-300 pointer-events-none"></div>

            @if ($logoUrl)
                <!-- Logo Gambar dari Admin Filament -->
                <img 
                    src="{{ $logoUrl }}" 
                    alt="{{ $displayName }}" 
                    class="relative h-10 sm:h-12 lg:h-14 w-auto object-contain logo-glow transition-transform duration-200 group-hover:scale-105"
                >
            @else
                <!-- Fallback Icon DP Monogram SVG Warna Biru -->
                <div class="relative w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 flex items-center justify-center shrink-0 logo-glow">
                    <svg class="w-full h-full transition-transform duration-200 group-hover:scale-105" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="dimszBlueGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#00D2FF" />
                                <stop offset="50%" stop-color="#0066FF" />
                                <stop offset="100%" stop-color="#0033CC" />
                            </linearGradient>
                        </defs>
                        <!-- Outer D / P Shape -->
                        <path d="M 20 15 L 60 15 C 80 15 90 30 85 50 C 80 70 65 85 45 85 L 20 85 Z" fill="url(#dimszBlueGrad)" />
                        <!-- Inner Cutout / P Loop (Menyesuaikan tema terang / gelap) -->
                        <path d="M 35 32 L 52 32 C 64 32 70 40 67 50 C 64 60 56 66 45 66 L 35 66 Z" class="fill-white dark:fill-[#030712] transition-colors" />
                        <!-- Forward Arrow Accent -->
                        <path d="M 20 50 L 50 50 L 35 68 Z" fill="#00D2FF" />
                    </svg>
                </div>
            @endif
        </a>

        <!-- Desktop Nav Links (DevPort Modern Pill Bar) -->
        <ul class="hidden lg:flex items-center space-x-1 xl:space-x-2 bg-slate-100/90 dark:bg-slate-900/90 border border-slate-200/80 dark:border-slate-800/80 px-2.5 py-1 rounded-full text-slate-600 dark:text-slate-400 font-medium text-xs xl:text-sm backdrop-blur-md shadow-sm">
            @foreach ($links as $id => $label)
                <li>
                    <a
                        href="#{{ $id }}"
                        @click.prevent="scrollToSection('{{ $id }}')"
                        :class="
                            activeSection === '{{ $id }}'
                                ? 'text-blue-600 dark:text-cyan-400 bg-white dark:bg-slate-800 shadow-sm font-semibold'
                                : 'hover:text-slate-900 dark:hover:text-white hover:bg-white/60 dark:hover:bg-slate-800/50'
                        "
                        class="px-3.5 py-1.5 rounded-full transition-all duration-200 inline-block whitespace-nowrap"
                    >
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Action Buttons: Theme Toggle + Desktop CTA + Mobile Hamburger -->
        <div class="flex items-center space-x-2 sm:space-x-3 shrink-0">
            <!-- Theme Toggle Button (Light / Dark Mode Switcher) -->
            <button
                @click="toggleTheme()"
                type="button"
                class="p-2 sm:p-2.5 rounded-full text-slate-600 dark:text-gray-300 hover:text-cyan-600 dark:hover:text-cyan-400 bg-slate-100 hover:bg-slate-200/80 dark:bg-slate-900/80 dark:hover:bg-slate-800 border border-slate-200 dark:border-slate-800 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-cyan-500/40 shadow-sm"
                :title="theme === 'dark' ? 'Ganti ke Mode Terang' : 'Ganti ke Mode Gelap'"
                aria-label="Toggle Theme"
            >
                <!-- Sun Icon (Tampil saat Dark Mode) -->
                <svg x-show="theme === 'dark'" class="w-5 h-5 text-amber-400 transform transition-transform duration-300 rotate-0 hover:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <!-- Moon Icon (Tampil saat Light Mode) -->
                <svg x-show="theme === 'light'" x-cloak class="w-5 h-5 text-indigo-600 transform transition-transform duration-300 rotate-0 hover:-rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                </svg>
            </button>

            <!-- Desktop CTA -->
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

            <!-- Mobile / Tablet Hamburger Button -->
            <button
                @click="mobileMenuOpen = !mobileMenuOpen"
                type="button"
                class="lg:hidden text-slate-700 dark:text-gray-300 hover:text-slate-900 dark:hover:text-white p-2 rounded-lg bg-slate-100 dark:bg-gray-800/50 border border-slate-200 dark:border-gray-700/50 focus:outline-none"
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
        class="lg:hidden bg-white/95 dark:bg-gray-950/95 border-b border-slate-200 dark:border-gray-800/80 px-6 pt-3 pb-6 space-y-3 shadow-xl"
    >
        @foreach ($links as $id => $label)
            <a
                href="#{{ $id }}"
                @click.prevent="scrollToSection('{{ $id }}')"
                :class="
                    activeSection === '{{ $id }}'
                        ? 'text-cyan-600 dark:text-cyan-400 bg-cyan-50 dark:bg-cyan-500/10 border-l-4 border-cyan-500 dark:border-cyan-400 font-semibold pl-3'
                        : 'text-slate-700 dark:text-gray-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-gray-800/50 pl-3'
                "
                class="block py-2.5 rounded-r-lg text-base font-medium transition-all"
            >
                {{ $label }}
            </a>
        @endforeach

        <!-- Mobile Quick Theme Switcher Bar -->
        <div class="pt-2 border-t border-slate-200 dark:border-slate-800/80 flex items-center justify-between text-sm text-slate-600 dark:text-gray-400">
            <span>Tampilan Web:</span>
            <button
                @click="toggleTheme()"
                type="button"
                class="inline-flex items-center space-x-2 px-3 py-1.5 rounded-lg bg-slate-100 dark:bg-slate-900 text-xs font-semibold text-slate-800 dark:text-gray-200 border border-slate-200 dark:border-slate-800"
            >
                <span x-text="theme === 'dark' ? '🌙 Dark Mode' : '☀️ Light Mode'"></span>
            </button>
        </div>

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