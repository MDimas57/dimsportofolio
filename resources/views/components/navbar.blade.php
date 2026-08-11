@props(['hero' => null])

@php
    $links = [
        'home' => 'Home',
        'about' => 'About',
        'skills' => 'Skills',
        'achievements' => 'Achievements',
        'projects' => 'Projects',
        'contact' => 'Contact',
    ];
@endphp

<nav
    x-data="{
        activeSection: 'home',
        mobileMenuOpen: false,

        init() {
            this.updateActiveSection();

            // Update ketika user melakukan scroll
            window.addEventListener('scroll', () => {
                this.updateActiveSection();
            }, { passive: true });

            // Update ketika ukuran layar berubah
            window.addEventListener('resize', () => {
                this.updateActiveSection();
                if (window.innerWidth >= 768) {
                    this.mobileMenuOpen = false;
                }
            }, { passive: true });
        },

        updateActiveSection() {
            const sections = [...document.querySelectorAll('section[id]')];

            if (!sections.length) {
                return;
            }

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

            if (!section) {
                return;
            }

            this.activeSection = id;
            this.mobileMenuOpen = false;

            const navbarHeight = 80;

            const targetPosition =
                section.getBoundingClientRect().top +
                window.scrollY -
                navbarHeight;

            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
    }"
    class="fixed top-0 left-0 right-0 z-50
           bg-gray-900/90 backdrop-blur-md
           border-b border-gray-800/60
           transition-all duration-300"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-16 py-4 flex justify-between items-center w-full">

        <!-- Logo & Nama -->
        <div class="flex items-center space-x-3 shrink-0">
            <!-- Icon Initial/Logo (Tetap Tampil) -->
            <div
                class="bg-gradient-to-tr from-orange-600 to-amber-500
                       text-black font-extrabold
                       px-3 py-1.5 rounded-lg text-base sm:text-lg
                       shadow-lg"
            >
                {{ strtoupper(substr($hero->name ?? 'MD', 0, 2)) }}
            </div>

            <!-- Nama disembunyikan di Mobile (hidden), Tampil di Tablet/Desktop (sm:inline) -->
            <span class="hidden sm:inline text-lg sm:text-xl font-bold tracking-wide text-white">
                {{ $hero->name ?? 'M Dimas Stiyawan' }}
            </span>
        </div>

        <!-- Desktop Nav Links -->
        <ul class="hidden md:flex space-x-8 text-gray-400 font-medium text-sm">
            @foreach ($links as $id => $label)
                <li>
                    <a
                        href="#{{ $id }}"
                        @click.prevent="scrollToSection('{{ $id }}')"
                        :class="
                            activeSection === '{{ $id }}'
                                ? 'text-orange-500 border-b-2 border-orange-500 font-semibold'
                                : 'hover:text-white border-b-2 border-transparent'
                        "
                        class="pb-1 transition-all duration-200"
                    >
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Desktop CTA + Mobile Hamburger Button Container -->
        <div class="flex items-center space-x-3">
            <!-- CTA Let's Talk (Desktop & Tablet) -->
            <a
                href="#contact"
                @click.prevent="scrollToSection('contact')"
                class="hidden sm:flex bg-gradient-to-r
                       from-orange-500 to-amber-600
                       hover:from-orange-600 hover:to-amber-700
                       text-white
                       px-4 sm:px-5 py-2 sm:py-2.5
                       rounded-full
                       items-center space-x-2
                       text-xs sm:text-sm font-semibold
                       transition
                       shadow-lg shadow-orange-500/20 shrink-0"
            >
                <span>Let's Talk</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>

            <!-- Mobile Hamburger Button -->
            <button
                @click="mobileMenuOpen = !mobileMenuOpen"
                type="button"
                class="md:hidden text-gray-300 hover:text-white p-2 rounded-lg bg-gray-800/50 border border-gray-700/50 focus:outline-none"
                aria-label="Toggle Menu"
            >
                <!-- Hamburger Icon -->
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <!-- Close Icon -->
                <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

    </div>

    <!-- Mobile Dropdown Menu -->
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
        class="md:hidden bg-gray-900/95 border-b border-gray-800/80 px-6 pt-2 pb-6 space-y-3"
    >
        @foreach ($links as $id => $label)
            <a
                href="#{{ $id }}"
                @click.prevent="scrollToSection('{{ $id }}')"
                :class="
                    activeSection === '{{ $id }}'
                        ? 'text-orange-500 bg-orange-500/10 border-l-4 border-orange-500 font-semibold pl-3'
                        : 'text-gray-300 hover:text-white hover:bg-gray-800/50 pl-3'
                "
                class="block py-2.5 rounded-r-lg text-base font-medium transition-all"
            >
                {{ $label }}
            </a>
        @endforeach

        <!-- Mobile CTA Inside Menu -->
        <div class="pt-2 sm:hidden">
            <a
                href="#contact"
                @click.prevent="scrollToSection('contact')"
                class="w-full bg-gradient-to-r from-orange-500 to-amber-600 text-white py-3 rounded-xl flex items-center justify-center space-x-2 font-semibold text-sm shadow-lg shadow-orange-500/20"
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