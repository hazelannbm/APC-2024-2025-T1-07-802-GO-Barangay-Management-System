<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full"
                :value="old('first_name', $user->first_name)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <!-- Middle Name (Optional) -->
        <div>
            <x-input-label for="middle_name" :value="__('Middle Name (Optional)')" />
            <x-text-input id="middle_name" name="middle_name" type="text" class="mt-1 block w-full"
                :value="old('middle_name', $user->middle_name)" />
            <x-input-error class="mt-2" :messages="$errors->get('middle_name')" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full"
                :value="old('last_name', $user->last_name)" required />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <!-- Gender -->
        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <select id="gender" name="gender" class="mt-1 block w-full">
                <option value="male" {{ old('gender', $user->gender) === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $user->gender) === 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $user->gender) === 'other' ? 'selected' : '' }}>Other</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <!-- Age -->
        <div>
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" name="age" type="number" class="mt-1 block w-full"
                :value="old('age', $user->age)" required />
            <x-input-error class="mt-2" :messages="$errors->get('age')" />
        </div>

        <!-- Birthdate -->
        <div>
            <x-input-label for="birthdate" :value="__('Birthdate')" />
            <x-text-input id="birthdate" name="birthdate" type="date" class="mt-1 block w-full"
                :value="old('birthdate', $user->birthdate)" required />
            <x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
        </div>

        <!-- Address -->
        <div>
            <x-input-label for="block_street" :value="__('Block & Street')" />
            <x-text-input id="block_street" name="block_street" type="text" class="mt-1 block w-full"
                :value="old('block_street', $user->block_street)" required />
            <x-input-error class="mt-2" :messages="$errors->get('block_street')" />
        </div>

        <div>
            <x-input-label for="barangay" :value="__('Barangay')" />
            <x-text-input id="barangay" name="barangay" type="text" class="mt-1 block w-full"
                :value="old('barangay', $user->barangay)" required />
            <x-input-error class="mt-2" :messages="$errors->get('barangay')" />
        </div>

        <div>
            <x-input-label for="district" :value="__('District')" />
            <x-text-input id="district" name="district" type="text" class="mt-1 block w-full"
                :value="old('district', $user->district)" required />
            <x-input-error class="mt-2" :messages="$errors->get('district')" />
        </div>

        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full"
                :value="old('city', $user->city)" required />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <!-- Civil Status -->
        <div>
            <x-input-label for="civil_status" :value="__('Civil Status')" />
            <select id="civil_status" name="civil_status" class="mt-1 block w-full">
                <option value="single" {{ old('civil_status', $user->civil_status) === 'single' ? 'selected' : '' }}>Single</option>
                <option value="married" {{ old('civil_status', $user->civil_status) === 'married' ? 'selected' : '' }}>Married</option>
                <option value="widowed" {{ old('civil_status', $user->civil_status) === 'widowed' ? 'selected' : '' }}>Widowed</option>
                <option value="divorced" {{ old('civil_status', $user->civil_status) === 'divorced' ? 'selected' : '' }}>Divorced</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('civil_status')" />
        </div>

        <!-- Religion (Optional) -->
        <div>
            <x-input-label for="religion" :value="__('Religion (Optional)')" />
            <x-text-input id="religion" name="religion" type="text" class="mt-1 block w-full"
                :value="old('religion', $user->religion)" />
            <x-input-error class="mt-2" :messages="$errors->get('religion')" />
        </div>

        <!-- Valid ID Upload -->
        <div>
            <x-input-label for="valid_id" :value="__('Upload Valid ID')" />
            <input id="valid_id" name="valid_id" type="file" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('valid_id')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>