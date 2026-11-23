@props(['hero' => null])

<footer class="relative overflow-hidden border-t border-slate-200/80 dark:border-slate-800/80 bg-white/70 dark:bg-[#070b14]/80 backdrop-blur-md py-8 mt-20 text-slate-500 dark:text-slate-400 text-xs sm:text-sm transition-colors duration-300">
    <!-- Galaxy Glow Accent along the top of Footer -->
    <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-full max-w-2xl h-20 bg-gradient-to-r from-purple-500/15 via-blue-500/15 to-cyan-500/15 dark:from-purple-600/25 dark:via-blue-600/25 dark:to-cyan-400/20 blur-2xl pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-16 flex flex-col md:flex-row justify-between items-center gap-4">
        <!-- Copyright Text -->
        <p class="text-center md:text-left flex items-center gap-2">
            <span>&copy; {{ date('Y') }}</span>
            <span class="text-slate-900 dark:text-white font-bold">{{ $hero->name ?? 'Your Name' }}</span>
            <span>&bull; Built with passion.</span>
        </p>

        <!-- Social / Footer Navigation -->
        <div class="flex items-center space-x-6 text-xs font-semibold">
            <a href="#home" class="hover:text-blue-600 dark:hover:text-cyan-400 transition-colors">Back to Top ↑</a>
            @if(!empty($hero->cv_file_path))
                <a href="{{ asset('storage/' . $hero->cv_file_path) }}" target="_blank" class="hover:text-blue-600 dark:hover:text-cyan-400 transition-colors">Download CV</a>
            @endif
        </div>
    </div>
</footer>
