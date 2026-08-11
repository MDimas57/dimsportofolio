<section id="about" class="relative max-w-7xl mx-auto px-6 md:px-16 pt-10 pb-10">

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        
        <!-- Container Konten Utama -->
        <div class="lg:col-span-7 flex flex-col items-center lg:items-start text-center lg:text-left space-y-6 lg:order-2">
            
            <!-- 1. Badge / About Me -->
            <div>
                <span class="text-orange-500 font-bold tracking-widest text-xs uppercase border-b-2 border-orange-500 pb-1 inline-block">
                    {{ $about->badge ?? 'ABOUT ME' }}
                </span>
            </div>

            <!-- 2. Workspace / Profile Image (TAMPIL DI MOBILE SAJA - Ukuran Asli Dipertahankan) -->
            <div class="block lg:hidden w-full relative">
                <div class="bg-slate-900/60 border border-slate-800/80 rounded-3xl p-3 shadow-2xl backdrop-blur-sm overflow-hidden group">
                    @if(!empty($about->image))
                        <img src="{{ asset('storage/' . $about->image) }}" 
                             alt="About Me Workspace" 
                             class="w-full h-[380px] sm:h-[450px] object-cover rounded-2xl transition duration-500 group-hover:scale-105">
                    @else
                        <div class="w-full h-[380px] sm:h-[450px] bg-slate-950/80 rounded-2xl flex items-center justify-center text-gray-500 border border-slate-800">
                            Workspace / Developer Illustration
                        </div>
                    @endif
                </div>
            </div>

            <!-- 3. Title -->
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight">
                {{ $about->title ?? 'Crafting Digital Experiences with Code' }}
            </h2>

            <!-- 4. Deskripsi -->
            <p class="text-gray-400 text-sm md:text-base leading-relaxed">
                {{ $about->description ?? "Lulusan S1 Informatika Universitas Teknokrat Indonesia yang antusias dan hobi merancang aplikasi web fungsional." }}
            </p>

            <!-- 5. Matrix Info Card -->
            <div class="w-full bg-slate-900/90 border border-slate-800/90 rounded-2xl p-5 grid grid-cols-1 sm:grid-cols-2 gap-5 text-xs backdrop-blur-md text-left">
                
                <!-- Name -->
                <div class="flex items-center space-x-3.5 min-w-0">
                    <div class="p-2.5 rounded-xl bg-slate-800/80 text-orange-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-gray-400 text-[11px] font-medium">Name</p>
                        <p class="text-white font-semibold truncate text-xs sm:text-sm">{{ $about->name ?? 'M Dimas Stiyawan' }}</p>
                    </div>
                </div>

                <!-- Location -->
                <div class="flex items-center space-x-3.5 min-w-0 sm:border-l sm:border-slate-800/80 sm:pl-5">
                    <div class="p-2.5 rounded-xl bg-slate-800/80 text-orange-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-gray-400 text-[11px] font-medium">Location</p>
                        <p class="text-white font-semibold truncate text-xs sm:text-sm" title="{{ $about->location ?? 'Bandar Lampung, Indonesia' }}">
                            {{ $about->location ?? 'Bandar Lampung, Indonesia' }}
                        </p>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-center space-x-3.5 min-w-0 border-t sm:border-t-0 border-slate-800/80 pt-3 sm:pt-0">
                    <div class="p-2.5 rounded-xl bg-slate-800/80 text-orange-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-gray-400 text-[11px] font-medium">Email</p>
                        <p class="text-white font-semibold truncate text-xs sm:text-sm" title="{{ $about->email ?? 'stiyawan.dimas756@gmail.com' }}">
                            {{ $about->email ?? 'stiyawan.dimas756@gmail.com' }}
                        </p>
                    </div>
                </div>

                <!-- Availability -->
                <div class="flex items-center space-x-3.5 min-w-0 sm:border-l sm:border-slate-800/80 sm:pl-5 border-t sm:border-t-0 border-slate-800/80 pt-3 sm:pt-0">
                    <div class="relative flex h-3 w-3 items-center justify-center ml-2 mr-1 shrink-0">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </div>
                    <div class="min-w-0">
                        <p class="text-gray-400 text-[11px] font-medium">Availability</p>
                        <p class="text-emerald-400 font-semibold truncate text-xs sm:text-sm">{{ $about->availability_status ?? 'Open to Work' }}</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- Workspace / Profile Image (TAMPIL DI DESKTOP SAJA) -->
        <div class="hidden lg:block lg:col-span-5 relative lg:order-1">
            <div class="bg-slate-900/60 border border-slate-800/80 rounded-3xl p-3 shadow-2xl backdrop-blur-sm overflow-hidden group">
                @if(!empty($about->image))
                    <img src="{{ asset('storage/' . $about->image) }}" 
                         alt="About Me Workspace" 
                         class="w-full h-[380px] sm:h-[450px] object-cover rounded-2xl transition duration-500 group-hover:scale-105">
                @else
                    <div class="w-full h-[380px] sm:h-[450px] bg-slate-950/80 rounded-2xl flex items-center justify-center text-gray-500 border border-slate-800">
                        Workspace / Developer Illustration
                    </div>
                @endif
            </div>
        </div>

    </div>
</section>