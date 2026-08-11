<section id="tech-stack" class="relative max-w-7xl mx-auto px-6 md:px-16 pt-2 pb-2">
    <!-- Style Keyframe untuk Infinite Scroll -->
    <style>
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 20s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>

    <!-- Garis Pembatas Atas -->
    <div class="border-t border-slate-800/80 w-full mb-4"></div>

    @if($techStacks->count() > 0)
        <!-- Slider Wrapper dengan Fade Edge -->
        <div class="relative w-full overflow-hidden py-3 before:absolute before:left-0 before:top-0 before:z-10 before:h-full before:w-16 sm:before:w-24 before:bg-gradient-to-r before:from-slate-950 before:to-transparent after:absolute after:right-0 after:top-0 after:z-10 after:h-full after:w-16 sm:after:w-24 after:bg-gradient-to-l after:from-slate-950 after:to-transparent">
            
            <div class="animate-marquee flex items-center gap-12 sm:gap-16">
                
                <!-- LOOP SET 1 -->
                <div class="flex items-center gap-12 sm:gap-16">
                    @foreach($techStacks as $item)
                        <div class="flex items-center justify-center shrink-0 cursor-pointer group">
                            @if($item->icon)
                                <img src="{{ asset('storage/' . $item->icon) }}" 
                                     alt="{{ $item->name }}" 
                                     class="h-12 sm:h-16 w-auto object-contain group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="h-12 sm:h-16 w-12 sm:w-16 rounded-xl bg-orange-500/20 text-orange-500 flex items-center justify-center font-bold text-xl group-hover:scale-105 transition-transform duration-300">
                                    {{ substr($item->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- LOOP SET 2 (DUPLIKASI AGAR MARQUEE SEAMLESS TANPA JEDA) -->
                <div class="flex items-center gap-12 sm:gap-16" aria-hidden="true">
                    @foreach($techStacks as $item)
                        <div class="flex items-center justify-center shrink-0 cursor-pointer group">
                            @if($item->icon)
                                <img src="{{ asset('storage/' . $item->icon) }}" 
                                     alt="{{ $item->name }}" 
                                     class="h-12 sm:h-16 w-auto object-contain group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="h-12 sm:h-16 w-12 sm:w-16 rounded-xl bg-orange-500/20 text-orange-500 flex items-center justify-center font-bold text-xl group-hover:scale-105 transition-transform duration-300">
                                    {{ substr($item->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @endif

    <!-- Garis Pembatas Bawah -->
    <div class="border-b border-slate-800/80 w-full mt-4"></div>
</section>