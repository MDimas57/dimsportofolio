<section id="tech-stack" class="relative w-full pt-2 pb-2 section-reveal">
    <!-- Style Keyframe untuk Infinite Scroll Smooth -->
    <style>
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 25s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>

    <!-- Garis Pembatas Atas Full Width -->
    <div class="border-t border-slate-200 dark:border-slate-800/80 w-full mb-6"></div>

    @if($techStacks->count() > 0)
        <!-- Label Minimalis Khas DevPort -->
        <div class="text-center mb-4">
            <span class="text-[11px] font-bold tracking-widest uppercase text-slate-400 dark:text-slate-500">
                Technologies & Tools Powering My Work
            </span>
        </div>

        <!-- Slider Wrapper Full Width dengan Fade Edge di Ujung Layar -->
        <div class="relative w-full overflow-hidden py-3 before:absolute before:left-0 before:top-0 before:z-10 before:h-full before:w-16 sm:before:w-32 before:bg-gradient-to-r before:from-slate-50 dark:before:from-[#0b101d] before:to-transparent after:absolute after:right-0 after:top-0 after:z-10 after:h-full after:w-16 sm:after:w-32 after:bg-gradient-to-l after:from-slate-50 dark:after:from-[#0b101d] after:to-transparent">
            
            <!-- Menggunakan gap konsisten untuk seluruh item -->
            <div class="animate-marquee flex items-center gap-8 sm:gap-12">
                
                <!-- LOOP SET 1 -->
                @foreach($techStacks as $item)
                    <div class="flex items-center justify-center shrink-0 cursor-pointer group">
                        <div class="p-3 sm:p-3.5 rounded-2xl bg-white/90 dark:bg-slate-900/80 border border-slate-200/90 dark:border-slate-800/80 shadow-sm group-hover:shadow-md group-hover:scale-105 group-hover:border-blue-500/50 transition-all duration-300 flex items-center justify-center">
                            @if($item->icon)
                                <img src="{{ asset('storage/' . $item->icon) }}" 
                                     alt="{{ $item->name }}" 
                                     width="48"
                                     height="48"
                                     loading="lazy"
                                     decoding="async"
                                     class="h-10 sm:h-12 w-auto object-contain">
                            @else
                                <div class="h-10 sm:h-12 w-10 sm:w-12 rounded-xl bg-orange-500/20 text-orange-500 flex items-center justify-center font-bold text-lg">
                                    {{ substr($item->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

                <!-- LOOP SET 2 (DUPLIKASI AGAR MARQUEE SEAMLESS TANPA JEDA) -->
                @foreach($techStacks as $item)
                    <div class="flex items-center justify-center shrink-0 cursor-pointer group" aria-hidden="true">
                        <div class="p-3 sm:p-3.5 rounded-2xl bg-white/90 dark:bg-slate-900/80 border border-slate-200/90 dark:border-slate-800/80 shadow-sm group-hover:shadow-md group-hover:scale-105 group-hover:border-blue-500/50 transition-all duration-300 flex items-center justify-center">
                            @if($item->icon)
                                <img src="{{ asset('storage/' . $item->icon) }}" 
                                     alt="{{ $item->name }}" 
                                     width="48"
                                     height="48"
                                     loading="lazy"
                                     decoding="async"
                                     class="h-10 sm:h-12 w-auto object-contain">
                            @else
                                <div class="h-10 sm:h-12 w-10 sm:w-12 rounded-xl bg-orange-500/20 text-orange-500 flex items-center justify-center font-bold text-lg">
                                    {{ substr($item->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endif

    <!-- Garis Pembatas Bawah Full Width -->
    <div class="border-b border-slate-200 dark:border-slate-800/80 w-full mt-4"></div>
</section>