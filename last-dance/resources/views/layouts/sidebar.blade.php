<nav class="shadow-sm shadow-gray-400 bg-[#1c1c1c] w-56  flex flex-col p-6 lg:w-56 lg:block hidden">
    <div class="flex items-center justify-center mb-6">
        <img src="{{ asset('storage/images/fluency_logo_clean_final.png') }}" alt="Fluency Logo"
            class="w-[160px] h-auto object-contain" style="filter: brightness(0) invert(1);">
    </div>

    <!-- Navigation Links -->
    <div class="flex-1 space-y-4">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg bg-white text-black shadow-md transition duration-300">
            <i class="fas fa-th-large "></i>
            <span class="font-semibold">Dashboard</span>
        </a>

        <a href="{{ route('team.index') }}" class="flex items-center space-x-3 p-3 rounded-lg text-white hover:bg-white hover:text-black transition duration-300">
            <i class="fas fa-users"></i>
            <span class="font-semibold">Teams</span>
        </a>

        <a href="{{ route('calender.index') }}" class="flex items-center space-x-3 p-3 rounded-lg text-white hover:bg-white hover:text-black transition duration-300">
            <i class="fas fa-calendar-alt"></i>
            <span class="font-semibold">Calendar</span>
        </a>

        <a href="{{ route('teamCal') }}" class="flex items-center space-x-3 p-3 rounded-lg text-white hover:bg-white hover:text-black transition duration-300">
            <i class="fas fa-calendar-alt"></i>
            <span class="font-semibold">Team Calendar</span>
        </a>

        <a href="{{ route('tasks.todo') }}" class="flex items-center space-x-3 p-3 rounded-lg text-white hover:bg-white hover:text-black transition duration-300">
            <i class="fas fa-list-ul"></i>
            <span class="font-semibold">To-Do</span>
        </a>
        
        <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 p-3 rounded-lg text-white hover:bg-white hover:text-black transition duration-300">
            <i class="fas fa-cog"></i>
            <span class="font-semibold">Settings</span>
        </a>
    </div>

    <!-- Logout Button -->
    <div class="mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center space-x-3 p-3 w-full rounded-lg text-white hover:bg-red-600 transition duration-300">
                <i class="fas fa-sign-out-alt"></i>
                <span class="font-semibold">Logout</span>
            </button>
        </form>
    </div>
</nav>

<!-- Mobile Navigation -->
<div class="lg:hidden bg-[#1c1c1c] shadow-sm shadow-gray-400 fixed top-0 left-0 w-full z-50">
    <div class="flex items-center justify-between p-4">
        <div>
            <img src="{{ asset('storage/images/fluency_logo_clean_final.png') }}" alt="Fluency Logo" class="w-[120px]" style="filter: brightness(0) invert(1);">
        </div>
        <button id="mobileMenuButton" class="text-white text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div id="mobileMenu" class="hidden flex-col p-6 space-y-4 bg-[#1c1c1c]">
        <ul class="flex-grow space-y-4">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 {{ request()->routeIs('dashboard') ? 'bg-white text-black' : 'text-gray-300 hover:bg-gray-800' }}">
                    <i class="fas fa-tachometer-alt text-lg mr-3"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('team.index') }}" class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 {{ request()->routeIs('team.index') ? 'bg-white text-black' : 'text-gray-300 hover:bg-gray-800' }}">
                    <i class="fas fa-users text-lg mr-3"></i>
                    <span class="font-medium">Teams</span>
                </a>
            </li>
            <li>
                <a href="{{ route('calender.index') }}" class="flex items-center py-3 px-4 rounded-lg transition border border-gray-300 {{ request()->routeIs('calender.index') ? 'bg-white text-black' : 'text-gray-300 hover:bg-gray-800' }}">
                    <i class="fas fa-calendar-alt text-lg mr-3"></i>
                    <span class="font-medium">Calendar</span>
                </a>
            </li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center w-full py-3 px-4 rounded-lg transition duration-200 bg-red-600 text-white">
                <i class="fas fa-sign-out-alt text-lg mr-3"></i>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</div>

<script>
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
