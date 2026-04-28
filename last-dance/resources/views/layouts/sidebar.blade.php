<nav class="shadow-md border-r border-gray-100 bg-white w-64 flex flex-col p-6 lg:w-64 lg:block hidden h-screen sticky top-0">
    <!-- Logo Section -->
    <div class="flex items-center justify-center mb-10 mt-2">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('storage/images/fluency_logo.png') }}" alt="Fluency Logo"
                class="w-[180px] h-auto object-contain">
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="flex-1 space-y-2">
        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4 px-3">Main Menu</p>
        
        <a href="{{ route('dashboard') }}"
            class="flex items-center space-x-3 p-3 rounded-xl transition duration-300 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600 shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600' }}">
            <i class="fas fa-th-large w-5"></i>
            <span class="font-bold">Dashboard</span>
        </a>

        <a href="{{ route('team.index') }}"
            class="flex items-center space-x-3 p-3 rounded-xl transition duration-300 {{ request()->routeIs('team.index') ? 'bg-blue-50 text-blue-600 shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600' }}">
            <i class="fas fa-users w-5"></i>
            <span class="font-bold">Teams</span>
        </a>

        <a href="{{ route('calender.index') }}"
            class="flex items-center space-x-3 p-3 rounded-xl transition duration-300 {{ request()->routeIs('calender.index') ? 'bg-blue-50 text-blue-600 shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600' }}">
            <i class="fas fa-calendar-alt w-5"></i>
            <span class="font-bold">My Calendar</span>
        </a>

        <a href="{{ route('teamCal') }}"
            class="flex items-center space-x-3 p-3 rounded-xl transition duration-300 {{ request()->routeIs('teamCal') ? 'bg-blue-50 text-blue-600 shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600' }}">
            <i class="fas fa-users-cog w-5"></i>
            <span class="font-bold">Team Calendar</span>
        </a>

        <a href="{{ route('tasks.todo') }}"
            class="flex items-center space-x-3 p-3 rounded-xl transition duration-300 {{ request()->routeIs('tasks.todo') ? 'bg-blue-50 text-blue-600 shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600' }}">
            <i class="fas fa-check-circle w-5"></i>
            <span class="font-bold">Tasks List</span>
        </a>

        <div class="pt-6">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4 px-3">System</p>
            <a href="{{ route('profile.edit') }}"
                class="flex items-center space-x-3 p-3 rounded-xl transition duration-300 {{ request()->routeIs('profile.edit') ? 'bg-blue-50 text-blue-600 shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-blue-600' }}">
                <i class="fas fa-cog w-5"></i>
                <span class="font-bold">Settings</span>
            </a>
        </div>
    </div>

    <!-- User Information -->
    <div class="mt-auto pt-6 border-t border-gray-100">
        <div class="flex items-center space-x-3 mb-6 p-2 bg-gray-50 rounded-2xl">
            <img src="{{ asset('storage/images/' . Auth::user()->image) }}" alt="Profile"
                class="w-10 h-10 rounded-full border-2 border-white shadow-sm object-cover">
            <div class="overflow-hidden">
                <p class="text-sm font-bold text-gray-800 truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] text-gray-500 truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center space-x-3 p-3 rounded-xl text-red-500 hover:bg-red-50 transition duration-300 group">
                <i class="fas fa-sign-out-alt w-5 group-hover:transform group-hover:translate-x-1 transition-transform"></i>
                <span class="font-bold">Logout</span>
            </button>
        </form>
    </div>
</nav>

<!-- Mobile Navigation -->
<div class="lg:hidden bg-white shadow-md border-b border-gray-100 fixed top-0 left-0 w-full z-50">
    <div class="flex items-center justify-between p-4">
        <img src="{{ asset('storage/images/fluency_logo.png') }}" alt="Fluency Logo" class="h-8">
        <button id="mobileMenuButton" class="text-gray-800 text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <div id="mobileMenu" class="hidden flex-col p-6 space-y-2 bg-white border-b border-gray-100 shadow-inner">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-4 rounded-xl text-gray-600 hover:bg-gray-50">
            <i class="fas fa-th-large w-5"></i>
            <span class="font-bold">Dashboard</span>
        </a>
        <a href="{{ route('team.index') }}" class="flex items-center space-x-3 p-4 rounded-xl text-gray-600 hover:bg-gray-50">
            <i class="fas fa-users w-5"></i>
            <span class="font-bold">Teams</span>
        </a>
        <!-- Add other mobile links as needed -->
        <form method="POST" action="{{ route('logout') }}" class="pt-4 mt-4 border-t border-gray-100">
            @csrf
            <button type="submit" class="flex items-center space-x-3 p-4 w-full rounded-xl text-red-500 hover:bg-red-50">
                <i class="fas fa-sign-out-alt w-5"></i>
                <span class="font-bold">Logout</span>
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
