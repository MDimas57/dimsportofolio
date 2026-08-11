<section id="contact" class="relative max-w-7xl mx-auto px-6 md:px-16 pt-16 pb-10">
    <div class="border-t border-slate-800/80 w-full mb-16"></div>

    <!-- Main Banner Box -->
    <div class="relative bg-slate-900/90 border border-slate-800/80 rounded-3xl p-6 md:p-8 lg:p-10 shadow-2xl backdrop-blur-md overflow-hidden">
        
        <!-- Ambient Glow Aksen Oranye di Kiri & Kanan -->
        <div class="absolute -left-20 -top-20 w-64 h-64 bg-orange-500/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-orange-500/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
            
            <!-- 1. Header Left Side -->
            <div class="space-y-1.5 max-w-sm lg:pr-6 lg:border-r lg:border-slate-800/80">
                <span class="text-orange-500 font-bold tracking-wider text-[11px] uppercase block">
                    {{ $contact->badge ?? "LET'S WORK TOGETHER" }}
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                    {{ $contact->title ?? 'Have a Project in Mind?' }}
                </h2>
                <p class="text-gray-400 text-xs sm:text-sm leading-relaxed">
                    Let's bring your ideas to life. I'm just a message away!
                </p>
            </div>

            <!-- 2. Middle Contacts Info (Email & Phone) -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-6 sm:gap-10 w-full lg:w-auto">
                
                <!-- Email -->
                <a href="{{ !empty($contact->email) ? 'mailto:'.$contact->email : '#' }}" class="flex items-center space-x-3.5 group">
                    <div class="p-3 rounded-2xl bg-slate-800/80 border border-slate-700/50 text-orange-400 group-hover:bg-orange-500 group-hover:text-white transition duration-300 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-[11px] font-medium">Email</p>
                        <p class="text-white font-semibold text-xs sm:text-sm group-hover:text-orange-400 transition">
                            {{ $contact->email ?? 'yourmail@example.com' }}
                        </p>
                    </div>
                </a>

                <!-- Phone -->
                <div class="flex items-center space-x-3.5">
                    <div class="p-3 rounded-2xl bg-slate-800/80 border border-slate-700/50 text-orange-400 shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-400 text-[11px] font-medium">Phone</p>
                        <p class="text-white font-semibold text-xs sm:text-sm">
                            {{ !empty($contact->phone_number) ? '+'.$contact->phone_number : '+62 812-3456-7890' }}
                        </p>
                    </div>
                </div>

            </div>

            <!-- 3. Right Action Button (Send Message / WA) -->
            @php
                $phone = $contact->phone_number ?? '6281234567890';
                $waText = urlencode($contact->whatsapp_message ?? 'Halo, saya ingin bertanya tentang layanan Anda.');
                $waUrl = "https://wa.me/{$phone}?text={$waText}";
            @endphp

            <div class="w-full sm:w-auto shrink-0">
                <a href="{{ $waUrl }}" target="_blank" class="inline-flex items-center justify-center space-x-2.5 w-full sm:w-auto bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-600 hover:to-amber-600 text-white font-bold px-7 py-3.5 rounded-2xl shadow-lg shadow-orange-500/20 hover:scale-105 active:scale-95 transition duration-300">
                    <span class="text-sm">Send Message</span>
                    <svg class="w-4 h-4 fill-current transform rotate-45" viewBox="0 0 24 24">
                        <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                    </svg>
                </a>
            </div>

        </div>

        <!-- 4. Social Media Sub-Section (Rata Tengah & Tetap Muncul Meski DB Kosong) -->
        <div class="relative z-10 mt-8 pt-6 border-t border-slate-800/80 flex flex-col items-center justify-center gap-3 text-center">
            <span class="text-gray-400 text-xs font-medium">
                Connect with me on social media
            </span>

            <div class="flex items-center justify-center flex-wrap gap-3">
                <!-- Instagram -->
                <a href="{{ $contact->instagram_url ?? '#' }}" target="_blank" title="Instagram" class="p-2.5 bg-slate-800/60 border border-slate-700/50 hover:border-orange-500/50 text-gray-400 hover:text-orange-400 rounded-xl transition duration-300 hover:scale-110">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>

                <!-- GitHub -->
                <a href="{{ $contact->github_url ?? '#' }}" target="_blank" title="GitHub" class="p-2.5 bg-slate-800/60 border border-slate-700/50 hover:border-orange-500/50 text-gray-400 hover:text-orange-400 rounded-xl transition duration-300 hover:scale-110">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                </a>

                <!-- LinkedIn -->
                <a href="{{ $contact->linkedin_url ?? '#' }}" target="_blank" title="LinkedIn" class="p-2.5 bg-slate-800/60 border border-slate-700/50 hover:border-orange-500/50 text-gray-400 hover:text-orange-400 rounded-xl transition duration-300 hover:scale-110">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.762-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>

                <!-- TikTok -->
                <a href="{{ $contact->tiktok_url ?? '#' }}" target="_blank" title="TikTok" class="p-2.5 bg-slate-800/60 border border-slate-700/50 hover:border-orange-500/50 text-gray-400 hover:text-orange-400 rounded-xl transition duration-300 hover:scale-110">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.07-1.3 1.8-.24.84-.09 1.78.35 2.52.49.85 1.37 1.44 2.33 1.6 1.17.21 2.42-.14 3.23-.98.71-.72 1.09-1.74 1.07-2.75V.02z"/></svg>
                </a>

                <!-- YouTube -->
                <a href="{{ $contact->youtube_url ?? '#' }}" target="_blank" title="YouTube" class="p-2.5 bg-slate-800/60 border border-slate-700/50 hover:border-orange-500/50 text-gray-400 hover:text-orange-400 rounded-xl transition duration-300 hover:scale-110">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
            </div>
        </div>

    </div>
</section>