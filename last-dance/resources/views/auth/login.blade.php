<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login | Fluency</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <!-- Login Container -->
    <div class="bg-white w-full max-w-4xl flex flex-col md:flex-row rounded-3xl overflow-hidden shadow-2xl border border-gray-100">

        <!-- Left Section (Form) -->
        <div class="w-full md:w-1/2 bg-black p-10 flex flex-col justify-center">
            <div class="flex items-center justify-center mb-10">
                <div class="bg-white p-4 rounded-2xl shadow-sm">
                    <img src="{{ asset('storage/images/fluency_logo.png') }}" alt="Fluency Logo"
                        class="w-[180px] h-auto object-contain">
                </div>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-6" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-300 mb-2">Email Address</label>
                    <div class="relative">
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="block w-full px-4 py-4 bg-gray-900 text-white border border-gray-800 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-600"
                            placeholder="name@example.com" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-semibold text-gray-300">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-blue-400 hover:text-blue-300 transition">
                                Forgot password?
                            </a>
                        @endif
                    </div>
                    <div class="relative">
                        <input id="password" type="password" name="password" required
                            class="block w-full px-4 py-4 bg-gray-900 text-white border border-gray-800 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 placeholder-gray-600"
                            placeholder="••••••••" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="w-5 h-5 text-blue-600 border-gray-800 bg-gray-900 rounded-lg focus:ring-blue-500" />
                    <label for="remember_me" class="ml-3 text-sm text-gray-400">Keep me logged in</label>
                </div>

                <!-- Action Buttons -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-full py-4 bg-white text-black font-bold rounded-2xl hover:bg-blue-500 hover:text-white transition duration-300 shadow-xl">
                        Log In
                    </button>
                </div>

                <p class="text-center text-gray-500 text-sm mt-8">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-blue-400 font-semibold hover:underline">Sign up</a>
                </p>
            </form>
        </div>

        <!-- Right Section (Illustration) -->
        <div class="hidden md:block md:w-1/2 bg-gray-50 relative">
            <div class="h-full flex items-center justify-center p-12">
                <img src="{{ asset('storage/images/flywmn.png') }}" alt="Fluency Illustration" class="max-w-full h-auto object-contain">
            </div>
            <!-- Subtle branding -->
            <div class="absolute bottom-8 right-8">
                <p class="text-gray-300 text-xs font-bold tracking-widest uppercase">Fluency Productivity</p>
            </div>
        </div>
    </div>

</body>

</html>
