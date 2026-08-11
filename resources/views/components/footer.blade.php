@props(['hero' => null])

<footer class="border-t border-gray-800/60 bg-[#070b14] py-8 mt-20 text-gray-400 text-sm">
    <div class="max-w-7xl mx-auto px-6 md:px-16 flex flex-col md:flex-row justify-between items-center gap-4">
        <!-- Copyright Text -->
        <p class="text-center md:text-left">
            &copy; {{ date('Y') }} <span class="text-white font-semibold">{{ $hero->name ?? 'Your Name' }}</span>. All rights reserved.
        </p>

        <!-- Social / Footer Navigation -->
        <div class="flex space-x-6 text-xs">
            <a href="#home" class="hover:text-orange-500 transition">Back to Top ↑</a>
            <a href="{{ asset('storage/' . ($hero->cv_file_path ?? '#')) }}" target="_blank" class="hover:text-orange-500 transition">Download CV</a>
        </div>
    </div>
</footer>