<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Fluency - Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        body {
            background: #f6f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        button {
            border-radius: 20px;
            border: 1px solid #1c1c1c;
            background-color: #1c1c1c;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            cursor: pointer;
        }

        button:active {
            transform: scale(0.95);
        }

        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #f9f9f9;
            border: 1px solid #e1e1e1;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus {
            background-color: #ffffff;
            border-color: #1c1c1c;
            outline: none;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        .container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
                    0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 95%;
            min-height: 520px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.active .sign-in-container {
            transform: translateX(100%);
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {
            0%, 49.99% {
                opacity: 0;
                z-index: 1;
            }
            
            50%, 100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.active .overlay-container{
            transform: translateX(-100%);
        }

        .overlay {
            background: #1c1c1c;
            background: linear-gradient(to right, #1c1c1c, #2d2d2d);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.active .overlay-right {
            transform: translateX(20%);
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        .illustration-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.2;
            z-index: -1;
        }
    </style>
</head>
<body>

<div class="container active" id="container">
    <!-- Sign Up Form -->
    <div class="form-container sign-up-container">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <img src="{{ asset('images/fluency_logo_clean_final.png') }}" alt="Fluency" class="w-32 mb-4">
            
            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required />
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
            
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
            
            <input type="password" name="password" placeholder="Password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
            
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
            
            <!-- Profile Image Upload -->
            <div class="w-full text-left mt-2" x-data="{ photoName: null, photoPreview: null }">
                <input type="file" class="hidden"
                    x-ref="photo"
                    name="image"
                    accept="image/*"
                    x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => { photoPreview = e.target.result; };
                        reader.readAsDataURL($refs.photo.files[0]);
                    ">

                <!-- Preview -->
                <div x-show="photoPreview" style="display:none;" class="mb-2 flex justify-center">
                    <span class="block w-14 h-14 rounded-full bg-cover bg-no-repeat bg-center border-2 border-[#1c1c1c]"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <button type="button"
                    x-on:click.prevent="$refs.photo.click()"
                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-full font-bold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 hover:border-gray-400 transition duration-200">
                    <span x-show="! photoName">Add your profile</span>
                    <span x-show="photoName" x-text="photoName" class="truncate max-w-[180px]"></span>
                </button>
            </div>

            <button type="submit" class="mt-4">Sign Up</button>
        </form>
    </div>

    <!-- Sign In Form -->
    <div class="form-container sign-in-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img src="{{ asset('images/fluency_logo_clean_final.png') }}" alt="Fluency" class="w-32 mb-4">
            
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            
            <a href="{{ route('password.request') }}">Forgot your password?</a>
            <button type="submit">Sign In</button>
        </form>
    </div>

    <!-- Overlay Panels -->
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <img src="{{ asset('storage/images/flymen.png') }}" class="illustration-img" alt="">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <img src="{{ asset('storage/images/flywmn.png') }}" class="illustration-img" alt="">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("active");
    });
</script>

</body>
</html>
