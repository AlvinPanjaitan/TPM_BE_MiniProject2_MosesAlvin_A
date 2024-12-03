<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold leading-tight text-gray-900">
            {{ __('You are logged in as ') }} {{ Auth::user()->name }}.
        </h2>

        <div class="mt-6">
            <a href="{{ route('museums.index') }}" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                {{ __('Lihat Daftar Museum') }}
            </a>
        </div>
    </div>
</x-app-layout>