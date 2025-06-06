    <nav x-data="{ open: false }" class="bg-white border-r border-gray-200 h-screen fixed top-0 left-0 w-64 flex flex-col shadow-lg z-50">
        <!-- Logo / Brand -->
        <div class="flex items-center justify-center h-16 border-b border-gray-200 px-6">
            <a href="{{ route('admin.manage-products.index') }}" class="flex items-center space-x-3">
                <span class="text-2xl font-extrabold text-indigo-700 tracking-wide">Admin Dashboard</span>
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-2 scrollbar-thin scrollbar-thumb-indigo-300 scrollbar-track-gray-100">
            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-indigo-100 transition-colors duration-200">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
                <span>{{ __('Dashboard') }}</span>
            </x-nav-link>

            @can('manage_products')
                <x-nav-link :href="route('admin.manage-products.index')" :active="request()->routeIs('admin.manage-products.*')" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-indigo-100 transition-colors duration-200">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M20 13V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v6" />
                        <path d="M16 17a4 4 0 1 1-8 0" />
                    </svg>
                    <span>{{ __('Manage Products') }}</span>
                </x-nav-link>
            @endcan

            @can('manage_orders')
                <x-nav-link :href="route('admin.manage-orders.index')" :active="request()->routeIs('admin.manage-orders.*')" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-indigo-100 transition-colors duration-200">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M3 10h18M3 6h18M3 14h18M3 18h18" />
                    </svg>
                    <span>{{ __('Manage Orders') }}</span>
                </x-nav-link>
            @endcan
        </div>

        <!-- User Info & Logout -->
        <div class="border-t border-gray-200 p-4 flex items-center space-x-4 bg-indigo-50">
            <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" alt="User Avatar" class="w-10 h-10 rounded-full object-cover border-2 border-indigo-600" />
            <div class="flex-1 min-w-0">
                <p class="text-indigo-900 font-semibold truncate">{{ Auth::user()->name }}</p>
                <p class="text-indigo-700 text-sm truncate">{{ Auth::user()->email }}</p>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="text-red-600 hover:text-red-800 font-semibold focus:outline-none" title="Log Out">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M17 16l4-4m0 0l-4-4m4 4H7" />
                        <path d="M7 16v-1a4 4 0 0 1 4-4h6" />
                    </svg>
                </button>
            </form>
        </div>

        <!-- Mobile Hamburger Button -->
        <div class="sm:hidden fixed top-4 left-4 z-60">
            <button @click="open = !open" class="p-2 rounded-md text-indigo-600 hover:text-indigo-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 transition">
                <svg x-show="!open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Sidebar Overlay -->
        <div 
            x-show="open" 
            @click="open = false" 
            class="fixed inset-0 bg-black bg-opacity-60 z-50 sm:hidden transition-opacity duration-300"
            style="display: none;"
        ></div>

        <!-- Mobile Sidebar -->
        <div 
            x-show="open" 
            class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 z-60 sm:hidden overflow-y-auto shadow-lg transition-transform duration-300 transform"
            :class="{'-translate-x-full': !open, 'translate-x-0': open}"
            style="display: none;"
        >
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200">
                <a href="{{ route('admin.manage-products.index') }}" class="flex items-center space-x-3">
                    <x-application-logo class="h-8 w-auto text-indigo-600" />
                    <span class="text-2xl font-extrabold text-indigo-700 tracking-wide">MyApp</span>
                </a>
                <button @click="open = false" class="p-2 rounded-md text-indigo-600 hover:text-indigo-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="py-6 px-4 space-y-2">
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-indigo-100 transition-colors duration-200">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                    </svg>
                    <span>{{ __('Dashboard') }}</span>
                </x-responsive-nav-link>

                @can('manage_products')
                    <x-responsive-nav-link :href="route('admin.manage-products.index')" :active="request()->routeIs('admin.manage-products.*')" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-indigo-100 transition-colors duration-200">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M20 13V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v6" />
                            <path d="M16 17a4 4 0 1 1-8 0" />
                        </svg>
                        <span>{{ __('Manage Products') }}</span>
                    </x-responsive-nav-link>
                @endcan

                @can('manage_orders')
                    <x-responsive-nav-link :href="route('admin.manage-orders.index')" :active="request()->routeIs('admin.manage-orders.*')" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-indigo-100 transition-colors duration-200">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M3 10h18M3 6h18M3 14h18M3 18h18" />
                        </svg>
                        <span>{{ __('Manage Orders') }}</span>
                    </x-responsive-nav-link>
                @endcan

                <div class="border-t border-gray-200 mt-6 pt-6">
                    <div class="flex items-center space-x-4">
                        <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" alt="User Avatar" class="w-10 h-10 rounded-full object-cover border-2 border-indigo-600" />
                        <div class="flex-1 min-w-0">
                            <p class="text-indigo-900 font-semibold truncate">{{ Auth::user()->name }}</p>
                            <p class="text-indigo-700 text-sm truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    {{-- <a href="{{ route('profile.edit') }}" class="block mt-4 text-indigo-700 hover:text-indigo-900 font-semibold">
                        {{ __('Profile') }}
                    </a> --}}

                    <form method="POST" action="{{ route('admin.logout') }}" class="mt-3">
                        @csrf
                        <button type="submit" class="w-full text-left text-red-600 hover:text-red-800 font-semibold focus:outline-none">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>