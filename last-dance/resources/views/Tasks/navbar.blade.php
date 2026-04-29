   <header class="bg-white shadow-lg rounded-md mb-6">
    <nav class="flex justify-between items-center px-6 py-4">
        
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('images/fluency_logo_clean_final.png') }}" alt="{{ __('app.fluency') }}" class="w-12 h-12 object-contain">
        </div>
        
        <!-- Search Input -->
        <div class="hidden md:flex flex-1 mx-6">
            <div class="relative w-full">
                <input type="text" placeholder="{{ __('app.search') }}"
                    class="w-full px-4 py-2 rounded-full text-sm text-gray-700 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                <span class="absolute inset-y-0 right-4 flex items-center">
                    <i class="fas fa-search text-gray-400"></i>
                </span>
            </div>
        </div>




        <!-- User Profile -->
        <div class="flex items-center space-x-4">
            @php
                $authUser = Auth::user();
                $profileImage = $authUser->image
                    ? asset('storage/' . (str_contains($authUser->image, '/') ? $authUser->image : 'images/' . $authUser->image))
                    : 'https://ui-avatars.com/api/?name=' . urlencode($authUser->name) . '&color=7F9CF5&background=EBF4FF';
            @endphp
            <div class="relative">
                <img id="profile-image" class="w-12 h-12 rounded-full border-2 border-black cursor-pointer object-cover object-center"
                    src="{{ $profileImage }}"
                    alt="{{ $authUser->name }}">
                <span class="absolute top-0 right-0 w-3 h-3 bg-blue-500 border-2 border-white rounded-full"></span>
            </div>
            <div class="text-gray-700">
                <span class="text-sm font-medium">{{ $authUser->name }}</span>
            </div>
            <div class="flex items-center gap-1 text-sm font-semibold text-gray-600">
                <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() === 'en' ? 'text-blue-600' : 'hover:text-blue-600' }}">EN</a>
                <span>|</span>
                <a href="{{ route('lang.switch', 'fr') }}" class="{{ app()->getLocale() === 'fr' ? 'text-blue-600' : 'hover:text-blue-600' }}">FR</a>
            </div>
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="md:hidden text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
</header>
