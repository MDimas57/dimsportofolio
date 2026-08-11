<section id="skills" class="relative max-w-7xl mx-auto px-6 md:px-16 pt-16 pb-6">
    
    <!-- Garis Pembatas Antar Section -->
    <div class="border-t border-slate-800/80 w-full mb-16"></div>

    <!-- Header Section -->
    <div class="text-center space-y-2 mb-12">
        <span class="text-orange-500 font-semibold text-xs tracking-widest uppercase">
            Skills & Services
        </span>
        <h2 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">
            What I Do Best
        </h2>
    </div>

    <!-- Cards Layout (Flexbox Rata Tengah) -->
    <div class="flex flex-wrap justify-center gap-4">
        @foreach($services as $item)
            <div class="w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1rem)] xl:w-[calc(16.666%-1rem)] min-w-[180px] bg-slate-900/60 border border-slate-800/80 rounded-2xl p-6 flex flex-col items-center text-center hover:border-orange-500/50 hover:bg-slate-900/90 transition-all duration-300 group shadow-lg">
                <div class="p-3.5 rounded-xl bg-orange-500/10 text-orange-500 mb-5 group-hover:scale-110 transition-transform duration-300">
                    @if($item->icon)
                        {!! $item->icon !!}
                    @else
                        <!-- Default Fallback Icon (Code Icon) -->
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    @endif
                </div>
                <h3 class="text-white font-bold text-base mb-2">{{ $item->title }}</h3>
                <p class="text-slate-400 text-xs leading-relaxed">
                    {{ $item->description }}
                </p>
            </div>
        @endforeach
    </div>
</section>