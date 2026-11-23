<section id="skills" class="relative max-w-7xl mx-auto px-6 md:px-16 pt-16 pb-8 section-reveal">
    
    <!-- Garis Pembatas Antar Section -->
    <div class="border-t border-slate-200 dark:border-slate-800/80 w-full mb-16"></div>

    <!-- Header Section (DevPort Style) -->
    <div class="text-center space-y-3 mb-12">
        <div>
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold tracking-widest uppercase bg-blue-500/10 text-blue-600 dark:text-cyan-400 border border-blue-500/20 shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 dark:bg-cyan-400"></span>
                Skills & Services
            </span>
        </div>
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 dark:text-white tracking-tight">
            What I Do Best
        </h2>
        <p class="text-slate-500 dark:text-slate-400 text-sm max-w-lg mx-auto">
            Delivering robust end-to-end digital solutions, from scalable backend architecture to interactive frontend interfaces.
        </p>
    </div>

    <!-- Cards Layout (DevPort Modern Bento Grid) -->
    <div class="flex flex-wrap justify-center gap-5">
        @foreach($services as $item)
            <div class="w-full sm:w-[calc(50%-1.25rem)] lg:w-[calc(33.333%-1.25rem)] xl:w-[calc(16.666%-1.25rem)] min-w-[200px] bg-white/85 dark:bg-slate-900/80 border border-slate-200/90 dark:border-slate-800/90 rounded-2xl p-6 flex flex-col items-center text-center hover:border-blue-500/50 hover:bg-white dark:hover:bg-slate-900 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group shadow-sm">
                <div class="p-4 rounded-2xl bg-blue-500/10 text-blue-600 dark:text-cyan-400 mb-5 group-hover:scale-110 group-hover:bg-blue-500/20 transition-all duration-300">
                    @if($item->icon)
                        {!! $item->icon !!}
                    @else
                        <!-- Default Fallback Icon (Code Icon) -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    @endif
                </div>
                <h3 class="text-slate-900 dark:text-white font-bold text-base mb-2 group-hover:text-blue-600 dark:group-hover:text-cyan-400 transition-colors">{{ $item->title }}</h3>
                <p class="text-slate-600 dark:text-slate-400 text-xs sm:text-[13px] leading-relaxed">
                    {{ $item->description }}
                </p>
            </div>
        @endforeach
    </div>
</section>
