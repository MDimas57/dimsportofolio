@php
    $hero = \App\Models\HeroSection::first();
@endphp

<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $hero->name ?? 'Portofolio' }} - Portfolio Website</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">
    
    <!-- Google Fonts: Plus Jakarta Sans (Modern DevPort Typography) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Script Anti-Flicker / Preload Theme -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                    colors: {
                        darkBg: '#0b101d',
                        lightBg: '#f8fafc',
                    }
                }
            }
        }
    </script>

    <!-- Custom CSS untuk Smooth Scroll, Transisi Tema, dan Efek Animasi Section -->
    <style>
        html {
            scroll-behavior: smooth;
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        /* Subtle modern grid pattern for DevPort aesthetic */
        .devport-bg-grid {
            background-image: radial-gradient(rgba(148, 163, 184, 0.22) 1px, transparent 1px);
            background-size: 28px 28px;
        }
        .dark .devport-bg-grid {
            background-image: radial-gradient(rgba(51, 65, 85, 0.35) 1px, transparent 1px);
            background-size: 28px 28px;
        }

        /* Transisi warna yang halus saat pergantian tema */
        body, nav, footer, section, div, button, a, p, h1, h2, h3, h4, span {
            transition-property: background-color, border-color, color, fill, stroke, box-shadow;
            transition-duration: 250ms;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Animasi Muncul Halus (Smooth Section Reveal) */
        .section-reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
            will-change: opacity, transform;
        }

        .section-reveal.is-revealed {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .section-reveal {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
        }

        /* Pulse glow animation aksen */
        @keyframes subtlePulse {
            0%, 100% { transform: scale(1); opacity: 0.15; }
            50% { transform: scale(1.05); opacity: 0.25; }
        }
        .animate-subtle-pulse {
            animation: subtlePulse 8s ease-in-out infinite;
        }

        /* Logo Glow Effects agar terlihat jelas di Light & Dark Mode */
        .logo-glow {
            filter: drop-shadow(0 0 10px rgba(14, 165, 233, 0.75)) drop-shadow(0 1px 2px rgba(15, 23, 42, 0.35));
            transition: filter 0.3s ease, transform 0.2s ease;
        }
        .group:hover .logo-glow {
            filter: drop-shadow(0 0 16px rgba(14, 165, 233, 0.95)) drop-shadow(0 1px 3px rgba(15, 23, 42, 0.4));
        }
        .dark .logo-glow {
            filter: drop-shadow(0 0 16px rgba(6, 182, 212, 0.8));
        }
        .dark .group:hover .logo-glow {
            filter: drop-shadow(0 0 22px rgba(6, 182, 212, 1));
        }

        /* Animated Galaxy Cosmic Mesh Gradient Keyframes */
        @keyframes galaxyFloat1 {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            50% { transform: translate(40px, 50px) scale(1.1); }
        }
        @keyframes galaxyFloat2 {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            50% { transform: translate(-45px, -35px) scale(1.15); }
        }
        @keyframes galaxyFloat3 {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            50% { transform: translate(30px, -45px) scale(0.92); }
        }

        .galaxy-orb-1 {
            animation: galaxyFloat1 20s ease-in-out infinite;
            will-change: transform;
        }
        .galaxy-orb-2 {
            animation: galaxyFloat2 24s ease-in-out infinite;
            will-change: transform;
        }
        .galaxy-orb-3 {
            animation: galaxyFloat3 22s ease-in-out infinite;
            will-change: transform;
        }
    </style>

    @livewireStyles
</head>
<body class="bg-slate-50 dark:bg-[#0b101d] text-slate-800 dark:text-white min-h-screen flex flex-col justify-between antialiased font-sans devport-bg-grid selection:bg-cyan-500 selection:text-white">

    <div>
        <!-- 1. Component Navbar -->
        <x-navbar :hero="$hero" />

        <!-- 2. Main Sections -->
        <main class="space-y-4">
            <!-- Hero Section (Dikecualikan dari background galaxy sesuai permintaan) -->
            <livewire:hero-section />

            <!-- Wrapper Khusus Galaxy Cosmic Gradient untuk Semua Section Selain Hero -->
            <div class="relative overflow-hidden w-full">
                <!-- Cosmic Galaxy Mesh Gradient Glow Elements (Violet, Cyan, Blue, Fuchsia Nebula) -->
                <div class="absolute top-[3%] left-[-12%] w-[60vw] h-[60vw] max-w-[700px] max-h-[700px] rounded-full bg-gradient-to-tr from-purple-600/20 via-indigo-600/20 to-transparent dark:from-purple-600/35 dark:via-indigo-600/30 blur-[130px] pointer-events-none -z-10 galaxy-orb-1"></div>
                <div class="absolute top-[20%] right-[-10%] w-[55vw] h-[55vw] max-w-[650px] max-h-[650px] rounded-full bg-gradient-to-bl from-cyan-500/20 via-blue-600/20 to-transparent dark:from-cyan-400/30 dark:via-blue-600/30 blur-[130px] pointer-events-none -z-10 galaxy-orb-2"></div>
                <div class="absolute top-[42%] left-[-8%] w-[50vw] h-[50vw] max-w-[600px] max-h-[600px] rounded-full bg-gradient-to-r from-fuchsia-600/18 via-purple-600/20 to-transparent dark:from-fuchsia-600/30 dark:via-purple-600/30 blur-[140px] pointer-events-none -z-10 galaxy-orb-3"></div>
                <div class="absolute top-[65%] right-[-8%] w-[55vw] h-[55vw] max-w-[650px] max-h-[650px] rounded-full bg-gradient-to-tl from-blue-600/20 via-cyan-500/20 to-transparent dark:from-blue-600/30 dark:via-cyan-400/25 blur-[130px] pointer-events-none -z-10 galaxy-orb-1"></div>
                <div class="absolute bottom-[2%] left-[15%] w-[50vw] h-[50vw] max-w-[600px] max-h-[600px] rounded-full bg-gradient-to-t from-indigo-600/20 via-purple-600/20 to-transparent dark:from-indigo-600/35 dark:via-purple-600/30 blur-[130px] pointer-events-none -z-10 galaxy-orb-2"></div>

                <!-- Sections yang Mendapatkan Background Gradient Galaxy -->
                <livewire:tech-stack-section />
                <livewire:about-section />
                <livewire:services-section />
                <livewire:certifications-section />
                <livewire:project-section />
                <livewire:contact-section />
            </div>
        </main>
    </div>

    <!-- 3. Component Footer -->
    <x-footer :hero="$hero" />

    <!-- Script IntersectionObserver untuk Scroll Reveal Animation yang Smooth -->
    <script>
        function setupScrollReveal() {
            const reveals = document.querySelectorAll('.section-reveal');
            
            if ('IntersectionObserver' in window) {
                const observerOptions = {
                    root: null,
                    rootMargin: '0px 0px -40px 0px',
                    threshold: 0.05
                };

                const revealObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-revealed');
                            observer.unobserve(entry.target);
                        }
                    });
                }, observerOptions);

                reveals.forEach(el => {
                    // Jika elemen sudah berada dalam viewport saat dibuka, langsung tampilkan
                    const rect = el.getBoundingClientRect();
                    if (rect.top < window.innerHeight && rect.bottom >= 0) {
                        el.classList.add('is-revealed');
                    } else {
                        revealObserver.observe(el);
                    }
                });
            } else {
                reveals.forEach(el => el.classList.add('is-revealed'));
            }
        }

        document.addEventListener('DOMContentLoaded', setupScrollReveal);
        document.addEventListener('livewire:navigated', setupScrollReveal);
    </script>

    @livewireScripts
</body>
</html>