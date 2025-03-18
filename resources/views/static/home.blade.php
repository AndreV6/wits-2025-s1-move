<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Home page') }}
        </h2>
    </x-slot>

    <article class="-mx-4">
        <header class="bg-zinc-700 text-zinc-200 rounded-t-lg -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
            <h2>Welcome{{ Auth::check() ? ', ' . (Auth::user()->preferred_name ?? Auth::user()->given_name) : '' }}</h2>
            <p class="text-sm">{{ now()->format('l, F jS Y') }}</p>
        </header>

        <div class="flex flex-col flex-wrap my-4 mt-8">
            @auth
                <!-- Recent Activity Section -->
                <section class="px-4 mt-8 sm:px-8">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-xl font-semibold mb-4">Recent Activity</h3>
                        <div class="space-y-4">
                            <!-- Activity items would go here -->
                            <div class="text-gray-500 text-sm">No recent activity</div>
                        </div>
                    </div>
                </section>
            @else
                <!-- Guest Landing Content -->
                <section class="text-center py-12 px-4 sm:px-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-6">
                        Welcome to Class Roster Manager
                    </h1>
                    <p class="text-lg text-gray-600 mb-8">
                        Streamline your classroom management with visual student rosters
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="{{ route('login') }}"
                           class="bg-zinc-700 text-white px-6 py-3 rounded-lg hover:bg-zinc-800 transition-colors">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="bg-zinc-200 text-zinc-800 px-6 py-3 rounded-lg hover:bg-zinc-300 transition-colors">
                            Register
                        </a>
                    </div>
                </section>
            @endauth
        </div>
    </article>
</x-app-layout>
