<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form enctype="multipart/form-data" method="POST" action="{{ route('profile.update', auth()->user()->id) }}"
        class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="col-span-full" x-data="{ imagePreview: '{{ $profilePictureUrl }}' }">
            <label for="profile_picture" class="block text-sm font-medium leading-6 text-gray-900">Photo
                <div class="mt-2 flex items-center gap-x-3 cursor-pointer">
                    <template x-if="imagePreview">
                        <img :src="imagePreview" class="h-16 w-16 rounded-full" alt="Profile picture preview">
                    </template>
                    <template x-if="!imagePreview">
                        <svg class="h-16 w-16 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </template>
                    <input @change="imagePreview = URL.createObjectURL($event.target.files[0])" type="file"
                        id="profile_picture"
                        name="profile_picture"accept="image/png, image/jpeg, image/jpg, image/gif, image/svg+xml"
                        class="block w-full text-sm text-gray-900
           file:mr-4 file:py-2 file:px-4 sr-only
           file:border-0 file:text-sm file:font-semibold
           file:bg-white file:text-gray-700
           hover:file:bg-gray-50" />
                    Change Photo
                </div>
            </label>
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="h-40 col-span-full" x-data="{ inputValue: '{{ old('bio', $user->profile->bio) }}' }">
            <div class="mt-2">
                <x-input-label for="bio" :value="__('Bio')" />
                <textarea id="bio" x-model="inputValue" name="bio" rows="4"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-md sm:leading-6">{{ old('bio', $user->profile->bio) }}</textarea>
            </div>
            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    function bio() {
        return {
            inputValue: @json($user->profile->bio)
        }
    }
</script>
