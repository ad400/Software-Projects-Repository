<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('app.glass_title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f0f4f8 0%, #d9e2ec 100%);
            min-height: 100vh;
            font-family: 'Figtree', sans-serif;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .glass-section {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
        }

        .glass-card-accent {
            background: rgba(213, 224, 255, 0.3);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 20px;
        }

        .glass-btn-dark {
            background: rgba(32, 32, 35, 0.8);
            backdrop-filter: blur(5px);
            color: white;
            transition: all 0.3s ease;
        }

        .glass-btn-dark:hover {
            background: rgba(0, 0, 0, 0.9);
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <!-- Navbar (Glass style preserved) -->
    <nav class="glass-nav fixed top-0 w-full z-50 flex justify-between items-center px-12 py-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white/30 rounded-lg flex items-center justify-center border border-white/40">
                <i class="bi bi-gem text-blue-600 text-xl"></i>
            </div>
            <span class="text-2xl font-bold text-gray-800 tracking-tight">{{ __('app.glass_brand') }}</span>
        </div>
        <div class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
            <a href="#" class="hover:text-blue-600 transition">{{ __('app.glass_collection') }}</a>
            <a href="#" class="hover:text-blue-600 transition">{{ __('app.glass_accessories') }}</a>
            <a href="#" class="hover:text-blue-600 transition">{{ __('app.contact') }}</a>
            <a href="{{ route('login') }}" class="px-6 py-2 bg-black text-white rounded-full font-bold hover:bg-gray-800 transition">{{ __('app.login') }}</a>
        </div>
    </nav>

    <!-- Body (Exactly like the current project, but with Glass styling) -->
    <div class="container mx-auto pt-32">
        <div class="flex justify-center gap-36 flex-wrap lg:flex-nowrap" id="hero">    
            <div class="pt-10 w-full lg:w-auto">
                <p class="bg-blue-100/50 border border-blue-200 text-blue-700 text-center rounded-full py-2 px-4 w-fit mb-6">{{ __('app.glass_welcome') }}</p>
                <h1 class="text-6xl font-black pt-5 text-[#202023]">{{ __('app.glass_elevate') }}</h1>
                <h1 class="text-6xl font-black pt-2 text-[#202023]">{{ __('app.glass_with') }} <span class="italic border-blue-400 border-b-4 text-blue-600">{{ __('app.glass_premium') }}</span></h1>
                <h1 class="text-6xl font-black pt-2 text-[#202023]">{{ __('app.glass_accessories_title') }}</h1>

                <div class="buutons flex pt-10 ps-5 gap-3 flex-wrap">
                    <button class="glass-btn-dark rounded-xl px-6 py-3 font-bold">{{ __('app.glass_explore_today') }}</button>
                    <button class="text-[#202023] font-bold">{{ __('app.glass_catalog') }}</button>
                </div>

                <div class="pt-10 ps-5 flex gap-5 flex-wrap lg:flex-nowrap">
                    <div class="glass-btn-dark w-full sm:w-[45%] lg:w-[18vw] h-[36vh] rounded-lg mb-5 lg:mb-0 p-6 flex flex-col justify-between">
                        <div class="flex justify-between">
                            <p class="text-white text-sm">{{ __('app.landing_rating') }}</p>
                            <p class="text-white font-semibold text-5xl pt-4">{{ __('app.glass_rating_value') }} <span class="text-yellow-400 text-xl">★</span></p>
                        </div>
                        <p class="text-gray-400 text-sm border-t border-gray-600 pt-4">{{ __('app.glass_rating_text') }}</p>
                    </div>

                    <div class="glass-section w-full sm:w-[45%] lg:w-[18vw] h-[36vh] rounded-lg p-6">
                        <p class="text-lg font-medium text-[#202023]">{{ __('app.glass_intro') }}</p>
                        <a href="#" class="flex items-center gap-2 mt-10 text-blue-600 font-bold">
                            <span>{{ __('app.glass_watch_demo') }}</span>
                            <i class="bi bi-play-circle-fill text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-auto pt-10 lg:flex">
                <img src="{{ asset('storage/images/lnding_2_1.png') }}" class="w-full lg:w-[35vw] h-auto lg:h-[95vh] rounded-3xl" alt="Product image">
            </div>
        </div>

        <!-- Glass Accent Section (Replica of the blue section) -->
        <div class="glass-card-accent mb-20 mt-16 mx-auto w-[85vw] p-16">
            <div class="flex flex-col lg:flex-row justify-between gap-12">
                <div class="text-5xl font-black text-gray-800">{{ __('app.glass_craft_title') }}</div>
                <div class="lg:w-1/3">  
                    <p class="text-gray-600 leading-relaxed">{{ __('app.glass_craft_text') }}</p>
                    <div class="flex pt-10 gap-3">
                        <button class="bg-[#202023] text-white rounded-xl px-6 py-3 font-bold">{{ __('app.glass_our_catalog') }}</button>
                        <button class="text-[#202023] font-bold">{{ __('app.glass_contact_sales') }}</button>
                    </div>
                </div>
            </div>
            <div class="flex justify-evenly pt-16 flex-wrap gap-8">
                <div class="glass-section bg-white/40 w-[20vw] min-w-[250px] h-[40vh] p-8 flex flex-col justify-between">
                    <p class="font-bold text-xl">{{ __('app.glass_tailored') }}</p>
                    <img src="{{ asset('storage/images/note.png') }}" class="mx-auto w-40" alt="icon">
                </div>
                <div class="w-[20vw] min-w-[250px] h-[40vh] p-8 flex flex-col justify-between">
                    <p class="font-bold text-xl">{{ __('app.glass_seamless') }}</p>
                    <img src="{{ asset('storage/images/circle.png') }}" alt="icon">
                </div>
                <div class="w-[20vw] min-w-[250px] h-[40vh] p-8 flex flex-col justify-between">
                    <p class="font-bold text-xl">{{ __('app.glass_precision') }}</p>
                    <img src="{{ asset('storage/images/data.png') }}" alt="icon">
                </div>
            </div>
        </div>

        <!-- Footer (Consistent with the project) -->
        <div class="flex justify-evenly pb-10 items-center border-t border-white/30 pt-16">
            <div class="flex items-center text-xl font-bold text-gray-800">
                <div class="w-8 h-8 bg-blue-600 rounded mr-2"></div> {{ __('app.glass_brand') }}
            </div>
            <div class="text-xl text-gray-600 font-medium">{{ __('app.glass_contact_email') }}</div>
        </div>

        <footer class="bg-white/40 backdrop-blur-md py-16 mx-12 rounded-t-3xl border-t border-white/50">
            <div class="container mx-auto px-12">
                <div class="flex flex-wrap justify-between">
                    <div class="w-full lg:w-1/3 mb-10 lg:mb-0">
                        <h2 class="font-bold text-2xl text-gray-900">{{ __('app.glass_brand') }}</h2>
                        <p class="text-gray-500 mt-6 leading-relaxed">
                            CrystalGlass is the leading provider of luxury glass accessories and custom fittings for high-end architectural projects.
                        </p>
                    </div>
                    <div class="w-full lg:w-1/3 mb-10 lg:mb-0 lg:ps-20">
                        <h3 class="font-bold text-gray-900 mb-6">{{ __('app.glass_explore') }}</h3>
                        <ul class="space-y-4 text-gray-600 font-medium">
                            <li><a href="#" class="hover:text-blue-600 transition">{{ __('app.glass_panels') }}</a></li>
                            <li><a href="#" class="hover:text-blue-600 transition">{{ __('app.glass_fittings') }}</a></li>
                            <li><a href="#" class="hover:text-blue-600 transition">{{ __('app.glass_custom') }}</a></li>
                        </ul>
                    </div>
                    <div class="w-full lg:w-1/3">
                        <h3 class="font-bold text-gray-900 mb-6">{{ __('app.glass_connect') }}</h3>
                        <ul class="space-y-4 text-gray-600 font-medium">
                            <li>{{ __('app.linkedin') }}</li>
                            <li>{{ __('app.instagram') }}</li>
                            <li>{{ __('app.pinterest') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="mt-16 text-center text-gray-400 text-sm">
                    © 2026 CrystalGlass Premium. Crafted with elegance.
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
