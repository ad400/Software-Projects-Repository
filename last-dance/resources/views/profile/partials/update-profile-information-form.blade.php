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
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden"
                        x-ref="photo"
                        name="image"
                        x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        ">

            <x-input-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&color=7F9CF5&background=EBF4FF' }}" 
                     alt="{{ $user->name }}" 
                     class="rounded-full h-20 w-20 object-cover shadow-lg border-2 border-gray-200">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center shadow-lg border-2 border-blue-500"
                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <button type="button" class="mt-2 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" 
                    x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </button>

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
