<section id="about" class="relative max-w-7xl mx-auto px-6 md:px-16 pt-12 pb-12 section-reveal">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
        
        <!-- Container Konten Utama -->
        <div class="lg:col-span-7 flex flex-col items-center lg:items-start text-center lg:text-left space-y-6 lg:order-2">
            
            <!-- 1. Badge / About Me (DevPort Style) -->
            <div>
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold tracking-widest uppercase bg-blue-500/10 text-blue-600 dark:text-cyan-400 border border-blue-500/20 shadow-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 dark:bg-cyan-400"></span>
                    {{ $about->badge ?? 'ABOUT ME' }}
                </span>
            </div>

            <!-- 2. Workspace / Profile Image (TAMPIL DI MOBILE SAJA) -->
            <div class="block lg:hidden w-full relative">
                <div class="absolute -inset-2 bg-gradient-to-tr from-blue-500/20 to-cyan-500/20 dark:from-blue-600/30 dark:to-cyan-400/20 rounded-3xl blur-2xl -z-10 opacity-75"></div>
                <div class="bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-slate-800/80 rounded-3xl p-3 shadow-xl dark:shadow-2xl backdrop-blur-sm overflow-hidden group">
                    @if(!empty($about->image))
                        <img src="{{ asset('storage/' . $about->image) }}" 
                             alt="About Me Workspace" 
                             class="w-full h-[360px] sm:h-[420px] object-cover rounded-2xl transition duration-500 group-hover:scale-105">
                    @else
                        <div class="w-full h-[360px] sm:h-[420px] bg-slate-100 dark:bg-slate-950/80 rounded-2xl flex items-center justify-center text-gray-500 border border-slate-200 dark:border-slate-800">
                            Workspace / Developer Illustration
                        </div>
                    @endif
                </div>
            </div>

            <!-- 3. Title -->
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 dark:text-white leading-tight tracking-tight">
                {{ $about->title ?? 'Crafting Digital Experiences with Code' }}
            </h2>

            <!-- 4. Deskripsi -->
            <p class="text-slate-600 dark:text-slate-300 text-sm md:text-base leading-relaxed">
                {{ $about->description ?? "Lulusan S1 Informatika Universitas Teknokrat Indonesia yang antusias dan hobi merancang aplikasi web fungsional." }}
            </p>

            <!-- 5. Modern Bento Matrix Info Grid (DevPort Style) -->
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 gap-3.5 text-xs pt-1">
                
                <!-- Name Tile -->
                <div class="bg-white/80 dark:bg-slate-900/80 border border-slate-200/90 dark:border-slate-800/90 rounded-2xl p-4 flex items-center space-x-3.5 shadow-sm hover:shadow-md hover:border-blue-500/40 transition-all duration-200">
                    <div class="p-2.5 rounded-xl bg-blue-500/10 text-blue-600 dark:text-cyan-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-slate-400 dark:text-slate-500 text-[10px] font-bold uppercase tracking-wider">Name</p>
                        <p class="text-slate-900 dark:text-white font-semibold truncate text-xs sm:text-sm">{{ $about->name ?? 'M Dimas Stiyawan' }}</p>
                    </div>
                </div>

                <!-- Location Tile -->
                <div class="bg-white/80 dark:bg-slate-900/80 border border-slate-200/90 dark:border-slate-800/90 rounded-2xl p-4 flex items-center space-x-3.5 shadow-sm hover:shadow-md hover:border-blue-500/40 transition-all duration-200">
                    <div class="p-2.5 rounded-xl bg-blue-500/10 text-blue-600 dark:text-cyan-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-slate-400 dark:text-slate-500 text-[10px] font-bold uppercase tracking-wider">Location</p>
                        <p class="text-slate-900 dark:text-white font-semibold truncate text-xs sm:text-sm" title="{{ $about->location ?? 'Bandar Lampung, Indonesia' }}">
                            {{ $about->location ?? 'Bandar Lampung, Indonesia' }}
                        </p>
                    </div>
                </div>

                <!-- Email Tile -->
                <div class="bg-white/80 dark:bg-slate-900/80 border border-slate-200/90 dark:border-slate-800/90 rounded-2xl p-4 flex items-center space-x-3.5 shadow-sm hover:shadow-md hover:border-blue-500/40 transition-all duration-200">
                    <div class="p-2.5 rounded-xl bg-blue-500/10 text-blue-600 dark:text-cyan-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-slate-400 dark:text-slate-500 text-[10px] font-bold uppercase tracking-wider">Email</p>
                        <p class="text-slate-900 dark:text-white font-semibold truncate text-xs sm:text-sm" title="{{ $about->email ?? 'stiyawan.dimas756@gmail.com' }}">
                            {{ $about->email ?? 'stiyawan.dimas756@gmail.com' }}
                        </p>
                    </div>
                </div>

                <!-- Availability Tile -->
                <div class="bg-white/80 dark:bg-slate-900/80 border border-slate-200/90 dark:border-slate-800/90 rounded-2xl p-4 flex items-center space-x-3.5 shadow-sm hover:shadow-md hover:border-emerald-500/40 transition-all duration-200">
                    <div class="relative flex h-3 w-3 items-center justify-center ml-1 mr-1 shrink-0">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </div>
                    <div class="min-w-0">
                        <p class="text-slate-400 dark:text-slate-500 text-[10px] font-bold uppercase tracking-wider">Availability</p>
                        <p class="text-emerald-600 dark:text-emerald-400 font-semibold truncate text-xs sm:text-sm">{{ $about->availability_status ?? 'Open to Work' }}</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- Workspace / Profile Image (TAMPIL DI DESKTOP SAJA) -->
        <div class="hidden lg:block lg:col-span-5 relative lg:order-1">
            <div class="absolute -inset-3 bg-gradient-to-tr from-blue-500/20 to-cyan-500/20 dark:from-blue-600/30 dark:to-cyan-400/20 rounded-3xl blur-2xl -z-10 opacity-75"></div>
            <div class="bg-white/80 dark:bg-slate-900/60 border border-slate-200/80 dark:border-slate-800/80 rounded-3xl p-3 shadow-xl dark:shadow-2xl backdrop-blur-sm overflow-hidden group">
                @if(!empty($about->image))
                    <img src="{{ asset('storage/' . $about->image) }}" 
                         alt="About Me Workspace" 
                         class="w-full h-[380px] sm:h-[450px] object-cover rounded-2xl transition duration-500 group-hover:scale-105">
                @else
                    <div class="w-full h-[380px] sm:h-[450px] bg-slate-100 dark:bg-slate-950/80 rounded-2xl flex items-center justify-center text-gray-500 border border-slate-200 dark:border-slate-800">
                        Workspace / Developer Illustration
                    </div>
                @endif
            </div>
        </div>

    </div>
</section>
