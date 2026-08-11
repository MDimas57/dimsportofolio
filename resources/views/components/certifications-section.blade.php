<!-- Container Section: Tetap presisi max-w-7xl dan px-6 md:px-16 sesuai About Me -->
<section id="certifications" class="relative max-w-7xl mx-auto px-6 md:px-16 pt-10 pb-16">
    
    <!-- Garis Pembatas Antar Section -->
    <div class="border-t border-slate-800/80 w-full mb-16"></div>

    <!-- Container Utama Alpine.js -->
    <div 
        x-data="certificationCarousel(@js($items))"
        x-init="init()"
        class="w-full mx-auto"
    >
        <!-- Grid Layout 2 Kolom (5 : 7) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

            <!-- KOLOM KIRI: Detail & Info Sertifikat (5 Kolom) -->
            <div class="lg:col-span-5 flex flex-col justify-between space-y-6">
                
                <!-- Badge (Gaya Minimalis Pils) -->
                <div>
                    <span class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-orange-500/10 border border-orange-500/30 text-orange-400 font-semibold tracking-wider text-[11px] uppercase">
                        <span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                        <span>Accomplishments</span>
                    </span>
                </div>

                <!-- Main Heading (Diperkecil ukurannya) & Deskripsi -->
                <div class="space-y-2.5">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-snug tracking-tight" x-text="items[index]?.title || 'Certifications & Credentials'">
                    </h2>
                    <p class="text-gray-400 text-xs sm:text-sm leading-relaxed" x-text="items[index]?.description || 'Lulus ujian sertifikasi kompetensi profesional. Klik card sertifikat di samping untuk melihat transkrip/tampilan belakang.'">
                    </p>
                </div>

                <!-- INFO CARD MATRIX (Desain Beda dari About Me: Style Distinct Accent Cards) -->
                <div class="space-y-2.5">
                    
                    <!-- Top Row: Issuer & Date (2 Kolom Layout) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <!-- Issuer / Organizer -->
                        <div class="bg-slate-950/70 border-l-2 border-orange-500 border-y border-r border-slate-800/80 rounded-xl p-3 flex items-center space-x-3 min-w-0 shadow-inner">
                            <div class="p-2 rounded-lg bg-orange-500/10 text-orange-400 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-slate-400 text-[10px] uppercase font-bold tracking-wider">Issuer</p>
                                <p class="text-gray-200 font-medium truncate text-xs" x-text="items[index]?.issuer || 'Teknokrat'"></p>
                            </div>
                        </div>

                        <!-- Issue Date -->
                        <div class="bg-slate-950/70 border-l-2 border-orange-500 border-y border-r border-slate-800/80 rounded-xl p-3 flex items-center space-x-3 min-w-0 shadow-inner">
                            <div class="p-2 rounded-lg bg-orange-500/10 text-orange-400 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-slate-400 text-[10px] uppercase font-bold tracking-wider">Issued Date</p>
                                <p class="text-gray-200 font-medium truncate text-xs" x-text="items[index]?.issue_date || '2026'"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Row: Credential No (Full Width & No Truncate Agar Nomor Kredensial Terbaca Jelas) -->
                    <div class="bg-slate-950/70 border-l-2 border-orange-500 border-y border-r border-slate-800/80 rounded-xl p-3 flex items-center space-x-3 shadow-inner">
                        <div class="p-2 rounded-lg bg-orange-500/10 text-orange-400 shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-slate-400 text-[10px] uppercase font-bold tracking-wider">Credential ID / No.</p>
                            <p class="text-gray-200 font-semibold font-mono text-xs break-all leading-normal" x-text="items[index]?.credential_id || '0003/G.121/IIa2.3/2026'"></p>
                        </div>
                    </div>

                </div>

                <!-- THUMBNAIL BAR -->
                <div class="pt-1 flex flex-col space-y-2">
                    <div class="flex items-center justify-between text-xs text-gray-400">
                        <span class="font-medium text-[10px] uppercase tracking-wider text-slate-400">Select Certificate</span>
                        <span class="font-mono text-xs font-bold text-orange-400" x-text="(index + 1) + ' / ' + items.length"></span>
                    </div>

                    <div
                        x-ref="thumbnails"
                        class="overflow-x-auto scrollbar-hide py-1"
                        style="scrollbar-width: none; -ms-overflow-style: none;"
                    >
                        <div class="flex gap-2.5 items-center" style="width: fit-content;">
                            <template x-for="(item, i) in items" :key="item.id">
                                <button
                                    type="button"
                                    @click="goTo(i)"
                                    :class="i === index 
                                        ? 'ring-2 ring-orange-500 opacity-100 scale-105' 
                                        : 'opacity-40 hover:opacity-80 border-slate-800'"
                                    class="relative shrink-0 h-10 w-16 rounded-xl overflow-hidden bg-slate-950 border transition-all duration-200"
                                >
                                    <img
                                        :src="item.url"
                                        :alt="item.title"
                                        class="w-full h-full object-cover pointer-events-none select-none"
                                    >
                                </button>
                            </template>
                        </div>
                    </div>
                </div>

            </div>

            <!-- KOLOM KANAN: Foto Sertifikat Landscape (7 Kolom - Melebar Persis) -->
            <!-- KOLOM KANAN: Foto Sertifikat Landscape (7 Kolom) -->
            <div class="lg:col-span-7 w-full">
                
                <div
                    class="relative w-full overflow-hidden rounded-2xl group"
                    x-ref="container"
                    @mousedown="dragStart($event)"
                    @mousemove.window="dragMove($event)"
                    @mouseup.window="dragEnd($event)"
                    @touchstart="dragStart($event)"
                    @touchmove.window="dragMove($event)"
                    @touchend.window="dragEnd($event)"
                >
                    <div
                        class="flex"
                        :class="!isDragging && 'transition-transform duration-300 ease-out'"
                        :style="`transform: translateX(${currentTranslate}px); cursor: ${isDragging ? 'grabbing' : 'grab'}`"
                    >
                        <template x-for="(item, i) in items" :key="item.id">
                            <div class="shrink-0 w-full">
                                
                                <!-- 3D Flip Card Container -->
                                <div 
                                    class="relative w-full aspect-[16/10] sm:aspect-[16/9] min-h-[280px] rounded-2xl cursor-pointer select-none [perspective:1000px] overflow-hidden bg-slate-950"
                                    @click="toggleFlip(i)"
                                >
                                    <!-- Flip Inner Wrapper -->
                                    <div 
                                        class="relative w-full h-full duration-700 transition-all [transform-style:preserve-3d]"
                                        :class="isFlipped[i] ? '[transform:rotateY(180deg)]' : ''"
                                    >
                                        <!-- FRONT FACE -->
                                        <div class="absolute inset-0 w-full h-full [backface-visibility:hidden] bg-slate-950 flex items-center justify-center overflow-hidden rounded-2xl">
                                            <img
                                                :src="item.url"
                                                :alt="item.title"
                                                class="w-full h-full object-cover pointer-events-none rounded-2xl"
                                                draggable="false"
                                            >
                                            <!-- Flip Hint Badge -->
                                            <div class="absolute bottom-3 right-3 bg-slate-950/80 border border-slate-700/60 text-orange-400 text-[10px] font-medium px-2.5 py-1 rounded-lg flex items-center space-x-1.5 backdrop-blur-md pointer-events-none shadow-md z-10">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                                <span>Klik untuk Balik</span>
                                            </div>
                                        </div>

                                        <!-- BACK FACE -->
                                        <div class="absolute inset-0 w-full h-full [backface-visibility:hidden] [transform:rotateY(180deg)] bg-slate-950 flex items-center justify-center overflow-hidden rounded-2xl">
                                            <template x-if="item.back_url">
                                                <img
                                                    :src="item.back_url"
                                                    :alt="item.title + ' Back'"
                                                    class="w-full h-full object-cover pointer-events-none rounded-2xl"
                                                    draggable="false"
                                                >
                                            </template>

                                            <template x-if="!item.back_url">
                                                <div class="max-w-md p-6 space-y-3 text-center">
                                                    <div class="w-10 h-10 rounded-xl bg-orange-500/10 border border-orange-500/30 text-orange-400 flex items-center justify-center mx-auto">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                    </div>
                                                    <h4 class="text-white font-bold text-base sm:text-lg line-clamp-2" x-text="item.title"></h4>
                                                    <p class="text-xs text-orange-400 font-medium" x-text="'Issued by: ' + item.issuer + (item.issue_date ? ' (' + item.issue_date + ')' : '')"></p>
                                                    <p class="text-gray-300 text-xs leading-relaxed line-clamp-3" x-text="item.description || 'Verified authentic credential certificate record.'"></p>
                                                </div>
                                            </template>

                                            <!-- Flip Back Hint Badge -->
                                            <div class="absolute bottom-3 right-3 bg-slate-950/80 border border-slate-700/60 text-orange-400 text-[10px] font-medium px-2.5 py-1 rounded-lg flex items-center space-x-1.5 backdrop-blur-md pointer-events-none shadow-md z-10">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                                <span>Klik untuk Depan</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </template>
                    </div>

                    <!-- Prev Button Navigasi -->
                    <button
                        type="button"
                        :disabled="index === 0"
                        @click="goTo(index - 1)"
                        :class="index === 0
                            ? 'opacity-0 pointer-events-none'
                            : 'bg-slate-900/80 hover:bg-orange-500 text-white opacity-90 hover:opacity-100'"
                        class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200 z-20 backdrop-blur-md shadow-lg"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <!-- Next Button Navigasi -->
                    <button
                        type="button"
                        :disabled="index === items.length - 1"
                        @click="goTo(index + 1)"
                        :class="index === items.length - 1
                            ? 'opacity-0 pointer-events-none'
                            : 'bg-slate-900/80 hover:bg-orange-500 text-white opacity-90 hover:opacity-100'"
                        class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200 z-20 backdrop-blur-md shadow-lg"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

            </div>

        </div>
    </div>
</section>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
</style>

<script>
    function certificationCarousel(items) {
        return {
            items,
            index: 0,
            isDragging: false,
            startX: 0,
            dragOffset: 0,
            currentTranslate: 0,
            isFlipped: {},

            init() {
                this.items.forEach((_, i) => {
                    this.isFlipped[i] = false;
                });

                this.$nextTick(() => this.updateTranslate());
                window.addEventListener('resize', () => this.updateTranslate());
            },

            toggleFlip(i) {
                if (Math.abs(this.dragOffset) > 10) return;
                this.isFlipped[i] = !this.isFlipped[i];
            },

            containerWidth() {
                return this.$refs.container?.offsetWidth || 1;
            },

            updateTranslate() {
                this.currentTranslate = -this.index * this.containerWidth();
            },

            getClientX(e) {
                return e.touches ? e.touches[0].clientX : e.clientX;
            },

            dragStart(e) {
                this.isDragging = true;
                this.startX = this.getClientX(e);
                this.dragOffset = 0;
            },

            dragMove(e) {
                if (!this.isDragging) return;
                this.dragOffset = this.getClientX(e) - this.startX;
                this.currentTranslate = -this.index * this.containerWidth() + this.dragOffset;
            },

            dragEnd() {
                if (!this.isDragging) return;
                this.isDragging = false;

                const width = this.containerWidth();
                let newIndex = this.index;

                if (Math.abs(this.dragOffset) > width * 0.2) {
                    newIndex = this.dragOffset > 0 ? this.index - 1 : this.index + 1;
                }

                newIndex = Math.max(0, Math.min(this.items.length - 1, newIndex));
                this.goTo(newIndex);
            },

            goTo(i) {
                this.index = Math.max(0, Math.min(this.items.length - 1, i));
                this.dragOffset = 0;
                this.updateTranslate();
                this.scrollThumbnails();
            },

            scrollThumbnails() {
                this.$nextTick(() => {
                    const el = this.$refs.thumbnails;
                    if (!el) return;
                    
                    const thumbWidth = 70;
                    const scrollPosition = (this.index * thumbWidth) - (el.offsetWidth / 2) + (thumbWidth / 2);

                    el.scrollTo({ left: scrollPosition, behavior: 'smooth' });
                });
            },
        };
    }
</script>