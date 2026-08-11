<section id="projects" class="relative max-w-7xl mx-auto px-6 md:px-16 pt-16 pb-12">
    
    <!-- Garis Pembatas Antar Section (Sama seperti Section Skills/Services) -->
    <div class="border-t border-slate-800/80 w-full mb-16"></div>

    <!-- Header Section (Sama persis dengan Section Skills/Services) -->
    <div class="text-center space-y-2 mb-12">
        <span class="text-orange-500 font-semibold text-xs tracking-widest uppercase">
            Portfolio & Projects
        </span>
        <h2 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">
            Featured Works
        </h2>
    </div>

    @if($projects->count() > 0)
        <!-- Grid Projects (Layout Card Modern) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
            @foreach($projects as $index => $item)
                <div class="animate-project-card" style="animation-delay: {{ $index * 120 }}ms;">
                    <div class="group relative flex flex-col h-full bg-slate-900/60 backdrop-blur-xl border border-slate-800/80 rounded-2xl overflow-hidden hover:border-orange-500/50 hover:bg-slate-900/90 transition-all duration-300 shadow-lg hover:-translate-y-1">
                        
                        <!-- Thumbnail Image Container -->
                        <div class="relative w-full h-52 overflow-hidden bg-slate-950">
                            @if($item->thumbnail)
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                                     alt="{{ $item->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-300"></div>
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center bg-slate-900/50 text-slate-600 gap-2">
                                    <svg class="w-10 h-10 stroke-[1.2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-xs text-slate-500">No Preview</span>
                                </div>
                            @endif

                            @if($item->is_featured)
                                <div class="absolute top-3 right-3 bg-gradient-to-r from-orange-500 to-amber-500 text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full shadow-md border border-white/20">
                                    ★ Featured
                                </div>
                            @endif
                        </div>

                        <!-- Content Body -->
                        <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                            <div class="space-y-2">
                                <h3 class="text-lg font-bold text-white group-hover:text-orange-400 transition-colors duration-300 line-clamp-1">
                                    {{ $item->title }}
                                </h3>

                                <div class="text-slate-400 text-sm line-clamp-3 leading-relaxed">
                                    {!! $item->description !!}
                                </div>
                            </div>

                            <!-- Tech Stack Badges -->
                            @if(is_array($item->tech_stack) && count($item->tech_stack) > 0)
                                <div class="flex flex-wrap gap-1.5 pt-2">
                                    @foreach($item->tech_stack as $tech)
                                        <span class="text-[11px] font-medium px-2.5 py-1 rounded-md bg-slate-800/80 text-slate-300 border border-slate-700/60 transition-colors">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Footer Links -->
                        <div class="px-6 py-4 border-t border-slate-800/60 flex items-center justify-between mt-auto">
                            <div class="flex items-center gap-4 w-full">
                                @if($item->demo_url)
                                    <a href="{{ $item->demo_url }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-semibold text-orange-400 hover:text-orange-300 transition-colors group/link">
                                        <span>Live Demo</span>
                                        <svg class="w-3.5 h-3.5 group-hover/link:translate-x-0.5 group-hover/link:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                    </a>
                                @endif

                                @if($item->github_url)
                                    <a href="{{ $item->github_url }}" target="_blank" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-400 hover:text-white transition-colors ml-auto">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                                        <span>Code</span>
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>

<!-- CSS Animasi Card -->
<style>
    @keyframes projectCardAppear {
        0% {
            opacity: 0;
            transform: translateY(24px) scale(0.97);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .animate-project-card {
        animation: projectCardAppear 0.6s cubic-bezier(0.16, 1, 0.3, 1) backwards;
    }
</style>