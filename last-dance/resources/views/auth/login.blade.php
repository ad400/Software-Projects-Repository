<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white w-full md:w-[60vw] h-auto flex flex-col md:flex-row rounded-xl overflow-hidden shadow-2xl ">
        <!-- Left Part (Form) -->
        <div class="w-full md:w-1/2 bg-black flex flex-col justify-center items-center p-8 md:p-12">
            <div class="mb-8">
                <img src="{{ asset('storage/images/fluency_logo_white.png') }}" alt="Fluency Logo" class="w-40">
            </div>
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-white font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-white font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex items-center mb-6">
                    <input type="checkbox" id="remember_me" name="remember" class="mr-2">
                    <label for="remember_me" class="text-white">Remember me</label>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="rounded-full px-6 py-2 text-white border-[2px] border-white hover:bg-white hover:text-black font-semibold transition duration-300 ">
                        Log in
                    </button>
                </div>
            </form>
        </div>

        <!-- Right Part (Illustration) -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8 md:p-12">
            <img src="{{ asset('storage/images/flywmn.png') }}" alt="Illustration" class="w-full max-w-sm">
        </div>
    </div>
</body>
</html>
