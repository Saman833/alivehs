<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            </div>
            <div class="space-x-4">
                <a href="{{ route('welcome') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    Welcome Page
                </a>
                <a href="{{ route('clubs.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    All Clubs
                </a>
                <a href="{{ route('clubs.mine') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    My Clubs
                </a>
                <a href="{{ route('clubs.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    Clubs Made By Me
                </a>
                <a href="{{ route('events.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    Events
                </a>
                <a href="{{ route('what') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                    my Events
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">{{ __("You're logged in!") }}</h3>
                    <p class="text-gray-700">Welcome to the dashboard. Use the buttons above to navigate to different sections.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

