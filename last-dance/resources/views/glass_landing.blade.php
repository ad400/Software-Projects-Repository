<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CrystalGlass - Premium Accessories</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            min-height: 100vh;
            font-family: 'Figtree', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-btn {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
        }

        .glass-btn:hover {
            background: rgba(255, 255, 255, 0.4);
            transform: translateY(-2px);
        }

        .hero-section {
            padding-top: 120px;
            padding-bottom: 80px;
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="glass-nav fixed top-0 w-full z-50 flex justify-between items-center px-12 py-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-white/30 rounded-lg flex items-center justify-center border border-white/40">
                <i class="bi bi-gem text-blue-600 text-xl"></i>
            </div>
            <span class="text-2xl font-bold text-gray-800 tracking-tight">CrystalGlass</span>
        </div>
        <div class="hidden md:flex items-center gap-8 text-gray-700 font-medium">
            <a href="#" class="hover:text-blue-600 transition">Collection</a>
            <a href="#" class="hover:text-blue-600 transition">Accessories</a>
            <a href="#" class="hover:text-blue-600 transition">About Us</a>
            <a href="#" class="glass-btn px-6 py-2 rounded-full text-blue-700 font-bold border-blue-200">Catalog</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mx-auto px-6 hero-section flex flex-col lg:flex-row items-center justify-between gap-12">
        <div class="lg:w-1/2">
            <div class="inline-block px-4 py-1 rounded-full bg-blue-100/50 border border-blue-200 text-blue-700 text-sm font-bold mb-6">
                ✨ Premium Glass Craftsmanship
            </div>
            <h1 class="text-6xl font-black text-gray-900 leading-tight mb-6">
                Elegant Glass <span class="text-blue-600">Solutions</span> For Your Space
            </h1>
            <p class="text-xl text-gray-600 mb-10 leading-relaxed max-w-lg">
                Discover our exclusive collection of high-quality glass accessories designed to bring clarity, light, and modern elegance to your home or office.
            </p>
            <div class="flex gap-4">
                <button class="bg-blue-600 text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 transition">
                    Explore Collection
                </button>
                <button class="glass-btn text-gray-800 px-8 py-4 rounded-2xl font-bold">
                    Learn More
                </button>
            </div>
            
            <div class="mt-12 flex items-center gap-6">
                <div class="flex -space-x-4">
                    <div class="w-12 h-12 rounded-full border-2 border-white bg-gray-200 overflow-hidden"><img src="https://i.pravatar.cc/100?u=1" alt=""></div>
                    <div class="w-12 h-12 rounded-full border-2 border-white bg-gray-200 overflow-hidden"><img src="https://i.pravatar.cc/100?u=2" alt=""></div>
                    <div class="w-12 h-12 rounded-full border-2 border-white bg-gray-200 overflow-hidden"><img src="https://i.pravatar.cc/100?u=3" alt=""></div>
                </div>
                <div class="text-sm">
                    <p class="font-bold text-gray-900">500+ Happy Customers</p>
                    <p class="text-gray-500">★★★★★ (4.9 Rating)</p>
                </div>
            </div>
        </div>

        <div class="lg:w-1/2 relative">
            <div class="glass-card p-4 relative z-10 floating">
                <img src="{{ asset('storage/images/note.png') }}" class="w-full h-auto rounded-xl shadow-2xl" alt="Product">
            </div>
            <!-- Decorative shapes -->
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-400/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-10 -left-10 w-60 h-60 bg-purple-400/20 rounded-full blur-3xl"></div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mx-auto px-6 py-20">
        <div class="glass-card p-12 flex flex-col md:flex-row justify-between items-center gap-12">
            <div class="md:w-1/3">
                <h2 class="text-3xl font-bold mb-4">Why Choose Our Glass?</h2>
                <p class="text-gray-600">We combine traditional craftsmanship with modern technology to create stunning glass accessories.</p>
            </div>
            <div class="flex flex-wrap md:flex-nowrap gap-8 md:w-2/3">
                <div class="flex-1">
                    <div class="w-12 h-12 bg-white/40 rounded-xl flex items-center justify-center mb-4"><i class="bi bi-shield-check text-blue-600 text-2xl"></i></div>
                    <h3 class="font-bold text-lg mb-2">High Durability</h3>
                    <p class="text-sm text-gray-500">Tempered and reinforced for maximum safety.</p>
                </div>
                <div class="flex-1">
                    <div class="w-12 h-12 bg-white/40 rounded-xl flex items-center justify-center mb-4"><i class="bi bi-palette text-blue-600 text-2xl"></i></div>
                    <h3 class="font-bold text-lg mb-2">Custom Designs</h3>
                    <p class="text-sm text-gray-500">Tailored to fit your unique aesthetic needs.</p>
                </div>
                <div class="flex-1">
                    <div class="w-12 h-12 bg-white/40 rounded-xl flex items-center justify-center mb-4"><i class="bi bi-lightning text-blue-600 text-2xl"></i></div>
                    <h3 class="font-bold text-lg mb-2">Quick Installation</h3>
                    <p class="text-sm text-gray-500">Professional setup in record time.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="container mx-auto px-6 py-20 mb-20">
        <div class="glass-card bg-blue-600/10 border-blue-200/50 p-16 text-center">
            <h2 class="text-5xl font-black mb-6">Ready to Transform Your space?</h2>
            <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto">
                Join hundreds of architects and homeowners who trust CrystalGlass for their premium accessory needs.
            </p>
            <a href="#" class="inline-flex items-center gap-3 bg-gray-900 text-white px-10 py-5 rounded-2xl font-bold hover:bg-black transition">
                Contact Our Experts <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>

    <footer class="container mx-auto px-6 py-12 border-t border-white/30 text-center text-gray-500">
        <p>© 2026 CrystalGlass Premium Accessories. All rights reserved.</p>
    </footer>

</body>

</html>
