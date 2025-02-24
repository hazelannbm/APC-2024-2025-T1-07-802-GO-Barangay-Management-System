<x-app-layout :title="'802-GO: Profile'">
    <!-- Custom Full-Width Header -->
    <header class="bg-[#11468F] text-white py-4 px-6">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <!-- Profile Text on the Left -->
            <h2 style="font-size: 1.5rem; font-weight: bold;">
                Profile
            </h2>

            <!-- Centered Logo -->
            <div class="flex-1 flex justify-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('logo/802-GO-LOGO.png') }}" alt="Logo" class="h-10 cursor-pointer">
                </a>
            </div>

            <!-- Logout Button on the Right -->
            <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" 
        style="color: white; padding: 8px 16px; border-radius: 6px; background-color: transparent; transition: background-color 0.3s, color 0.3s, font-weight 0.3s;"
        onmouseover="this.style.backgroundColor='white'; this.style.color='#11468F'; this.style.fontWeight='bold'" 
        onmouseout="this.style.backgroundColor='transparent'; this.style.color='white'; this.style.fontWeight='normal'">
        Logout
    </button>
</form>

        </div>
    </header>

    <!-- Profile Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>