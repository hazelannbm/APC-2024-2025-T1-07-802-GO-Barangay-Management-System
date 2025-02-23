<div style="background-color:#111828">
    <p style="font-color:#111828">Fill out the form to create a new account</p>
</div>

<div style="background-color:#111828">
    <p style="font-color:#111828">Fill out the form to create a new account</p>
</div>

<x-guest-layout>
    <div class="my-8"> <!-- Adds top and bottom margin -->
        <form method="POST" action="{{ route('document-request') }}">
            @csrf

            <!-- Full Name -->
            <div>
                <x-input-label for="full_name" :value="__('Full Name')" />
                <x-text-input id="full_name" class="block mt-1 w-full" type="text" name="full_name" :value="old('full_name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" name="gender" class="block mt-1 w-full" required>
                    <option value="">{{ __('Select Gender') }}</option>
                    <option value="male">{{ __('Male') }}</option>
                    <option value="female">{{ __('Female') }}</option>
                    <option value="other">{{ __('Other') }}</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Age -->
            <div class="mt-4">
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            <!-- Birthdate -->
            <div class="mt-4">
                <x-input-label for="birthdate" :value="__('Birthdate')" />
                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required />
                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>

            <!-- Type of Document -->
            <div class="mt-4">
                <x-input-label for="document_type" :value="__('Type of Document')" />
                <x-text-input id="document_type" class="block mt-1 w-full" type="text" name="document_type" :value="old('document_type')" required />
                <x-input-error :messages="$errors->get('document_type')" class="mt-2" />
            </div>

            <!-- Permanent Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Permanent Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Valid ID Attachment -->
            <div class="mt-4">
                <x-input-label for="valid_id" :value="__('Valid ID (jpg or png)')" />
                <x-text-input id="valid_id" class="block mt-1 w-full" type="file" name="valid_id" accept=".jpg, .jpeg, .png" required />
                <x-input-error :messages="$errors->get('valid_id')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex justify-between mt-6">
                <x-primary-button>
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>

<div style="background-color:#111828">
    <p style="font-color:#111828">Fill out the form to create a new account</p>
</div>

<div style="background-color:#111828">
    <p style="font-color:#111828">Fill out the form to create a new account</p>
</div>