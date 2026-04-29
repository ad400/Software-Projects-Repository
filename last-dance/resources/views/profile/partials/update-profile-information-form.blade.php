<section class="bg-white shadow-md rounded-lg p-6">
    <header class="mb-6">
        <h2 class="text-xl font-semibold text-black font-semibold">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-sm text-gray-700">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Profile Image -->
        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
            <!-- Hidden File Input -->
            <input type="file" class="hidden"
                        x-ref="photo"
                        name="image"
                        accept="image/*"
                        x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        ">

            <label class="block text-sm font-semibold text-gray-700 mb-2">Add your profile</label>

            <!-- Upload Zone -->
            <div 
                class="mt-1 flex items-center gap-4 px-4 py-3 bg-[#151516] border border-gray-700 rounded-lg cursor-pointer hover:border-blue-500 transition duration-200"
                x-on:click="$refs.photo.click()">

                <!-- Avatar Preview or Default Icon -->
                <div class="flex-shrink-0">
                    <div x-show="! photoPreview">
                        <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&color=7F9CF5&background=2d2d2d' }}" 
                             alt="{{ $user->name }}" 
                             class="w-12 h-12 rounded-full object-cover border-2 border-gray-600">
                    </div>
                    <div x-show="photoPreview" style="display: none;">
                        <span class="block w-12 h-12 rounded-full bg-cover bg-no-repeat bg-center border-2 border-blue-500"
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>
                </div>

                <!-- Text -->
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-400" x-show="! photoName">Click to upload a photo</p>
                    <p class="text-sm text-blue-400 truncate" x-show="photoName" x-text="photoName"></p>
                    <p class="text-xs text-gray-600 mt-0.5">PNG, JPG, GIF up to 2MB</p>
                </div>

                <!-- Upload Icon -->
                <div class="flex-shrink-0">
                    <i class="fas fa-camera text-gray-500 hover:text-blue-400 transition"></i>
                </div>
            </div>

            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>


        <!-- Name Input -->
        <div>
            <x-input-label 
                for="name"  
            />
            Name
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                class="mt-1 block w-full bg-[#151516] text-gray-300 border border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email Input -->
        <div>
            <x-input-label 
                for="email" 
            />
            Email
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                class="mt-1 block w-full bg-[#151516] text-gray-300 border border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username" 
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4">
                    <p class="text-sm text-gray-300">
                        {{ __('Your email address is unverified.') }}

                        <button 
                            form="send-verification" 
                            class="underline text-blue-500 hover:text-blue-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-500">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <button 
                type="submit" 
                class="bg-black text-white hover:text-white hover:bg-black font-semibold px-4 py-2 rounded-lg  focus:ring-2  focus:ring-offset-2"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p 
                    x-data="{ show: true }" 
                    x-show="show" 
                    x-transition 
                    x-init="setTimeout(() => show = false, 2000)" 
                    class="text-sm text-green-500"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
