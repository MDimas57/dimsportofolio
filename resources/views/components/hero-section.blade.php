<section id="home" class="max-w-7xl mx-auto px-6 md:px-16 py-12 md:py-20 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
    <!-- Left Column: Text & CTA -->
    <div class="lg:col-span-7 space-y-6">
        <span class="text-orange-500 font-semibold tracking-widest text-xs uppercase bg-orange-500/10 px-3.5 py-1.5 rounded-full border border-orange-500/20 inline-block">
            {{ $hero->sub_title ?? 'SOFTWARE DEVELOPER' }}
        </span>

        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black leading-tight tracking-tight">
            <span>Halo, Saya</span>
            
            <!-- Ditambahkan mt-2 md:mt-3 untuk memberi jarak bersih -->
            <div class="mt-2 md:mt-3">
                <span class="inline-block">
                    <span x-data="{ 
                            text: '', 
                            fullText: '{{ $hero->name ?? 'Your Name' }}',
                            isDeleting: false,
                            speed: 120,
                            init() {
                                this.typeEffect();
                            },
                            typeEffect() {
                                if (!this.isDeleting && this.text.length < this.fullText.length) {
                                    this.text = this.fullText.substring(0, this.text.length + 1);
                                    setTimeout(() => this.typeEffect(), this.speed);
                                } else if (!this.isDeleting && this.text.length === this.fullText.length) {
                                    setTimeout(() => {
                                        this.isDeleting = true;
                                        this.typeEffect();
                                    }, 2000);
                                } else if (this.isDeleting && this.text.length > 0) {
                                    this.text = this.fullText.substring(0, this.text.length - 1);
                                    setTimeout(() => this.typeEffect(), this.speed / 2);
                                } else if (this.isDeleting && this.text.length === 0) {
                                    this.isDeleting = false;
                                    setTimeout(() => this.typeEffect(), 500);
                                }
                            }
                        }"
                        class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-amber-500 to-yellow-500 border-r-4 border-orange-500 "
                        x-text="text">
                    </span>
                </span>
            </div>
        </h1>

        <p class="text-gray-400 text-base md:text-lg leading-relaxed max-w-xl">
            {{ $hero->bio ?? 'I build scalable, high-performance web applications that solve real-world problems and create impact.' }}
        </p>

        <!-- Highlights / Badges -->
        @if(!empty($hero->highlights))
            @php
                $highlights = is_string($hero->highlights) ? json_decode($hero->highlights, true) : $hero->highlights;
            @endphp

            @if(is_array($highlights) && count($highlights) > 0)
                <div class="flex flex-wrap gap-3 pt-2">
                    @foreach($highlights as $highlight)
                        <div class="flex items-center space-x-2 text-xs md:text-sm text-gray-300 bg-slate-900/80 border border-slate-800 px-3.5 py-2 rounded-xl backdrop-blur-sm">
                            <span class="text-orange-500">❖</span>
                            <span>{{ $highlight }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
        @endif

        <!-- Buttons -->
        <div class="flex flex-wrap items-center gap-4 pt-4">
            <a href="{{ $hero->cta_primary_link ?? '#projects' }}" class="bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 px-6 py-3.5 rounded-xl font-bold text-sm flex items-center space-x-2 shadow-lg shadow-orange-500/20 transition">
                <span>{{ $hero->cta_primary_text ?? 'View My Work' }}</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>

            @if(!empty($hero->cv_file_path))
                <a href="{{ asset('storage/' . $hero->cv_file_path) }}" target="_blank" class="bg-slate-900/90 border border-slate-700/80 hover:bg-slate-800 px-6 py-3.5 rounded-xl font-bold text-sm flex items-center space-x-2 transition">
                    <span>Download CV</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                </a>
            @endif
        </div>
    </div>

    <!-- Right Column: Profile Image & Floating Card -->
    <div class="lg:col-span-5 relative flex flex-col items-center justify-center">
        <!-- Ambient Glow Effect di Belakang Foto -->
        <div class="absolute w-72 h-72 md:w-96 md:h-96 bg-gradient-to-tr from-orange-500/30 to-amber-500/20 rounded-full blur-3xl -z-10"></div>

        <div class="relative w-full max-w-sm flex flex-col items-center">
            @if(!empty($hero->profile_image))
                <img src="{{ asset('storage/' . $hero->profile_image) }}" 
                     alt="{{ $hero->name }}" 
                     class="w-full h-auto max-h-[520px] object-contain drop-shadow-[0_20px_35px_rgba(0,0,0,0.6)] transition duration-500 hover:scale-105">
            @else
                <div class="w-full h-[400px] bg-slate-900/50 rounded-3xl flex items-center justify-center text-gray-500">
                    Foto Profil Belum Diunggah
                </div>
            @endif

            <!-- Floating Stats Card -->
            <div class="w-[95%] -mt-6 sm:-mt-8 z-10 bg-slate-900/80 backdrop-blur-md border border-slate-800/80 p-4 rounded-2xl flex justify-around text-center shadow-2xl shadow-black/50">
                <div>
                    <h4 class="text-orange-500 text-xl sm:text-2xl font-black">{{ $hero->experience_years ?? '3+' }}</h4>
                    <p class="text-[11px] text-gray-400 font-medium">IPK</p>
                </div>
                <div class="border-r border-slate-800/80"></div>
                <div>
                    <h4 class="text-orange-500 text-xl sm:text-2xl font-black">{{ $hero->projects_completed ?? '20+' }}</h4>
                    <p class="text-[11px] text-gray-400 font-medium">Sertifikasi</p>
                </div>
                <div class="border-r border-slate-800/80"></div>
                <div>
                    <h4 class="text-orange-500 text-xl sm:text-2xl font-black">{{ $hero->happy_clients ?? '10+' }}</h4>
                    <p class="text-[11px] text-gray-400 font-medium">Project Selesai</p>
                </div>
            </div>
        </div>
    </div>
</section>