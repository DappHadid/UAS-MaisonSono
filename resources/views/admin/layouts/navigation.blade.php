<div>
    <nav 
        :class="sidebarOpen ? 'w-64' : 'w-20'" 
        class="bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 h-screen fixed top-0 left-0 flex-col shadow-lg z-20 transition-all duration-300 ease-in-out hidden sm:flex"
    >
        <div class="flex items-center h-16 border-b border-gray-200 dark:border-gray-700 px-6 shrink-0">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center w-full overflow-hidden">
                <i class="fa-solid fa-rocket text-3xl text-indigo-600 dark:text-indigo-400" x-show="!sidebarOpen"></i>
                <span x-show="sidebarOpen" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 tracking-wide whitespace-nowrap">MAISON SONO</span>
            </a>
        </div>

        <div class="flex-1 overflow-y-auto overflow-x-hidden py-4 px-4 space-y-2">
            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" :title="__('Dashboard')">
                <i class="fa-solid fa-chart-pie fa-fw text-xl" :class="!sidebarOpen && 'mx-auto'"></i>
                <span x-show="sidebarOpen" class="ml-3 flex-1">{{ __('Dashboard') }}</span>
            </x-nav-link>

            @can('manage_products')
                <x-nav-link :href="route('admin.manage-products.index')" :active="request()->routeIs('admin.manage-products.*')" :title="__('Manage Products')">
                    <i class="fa-solid fa-box-archive fa-fw text-xl" :class="!sidebarOpen && 'mx-auto'"></i>
                    <span x-show="sidebarOpen" class="ml-3 flex-1">{{ __('Manage Products') }}</span>
                </x-nav-link>
            @endcan

            @can('manage_orders')
                <x-nav-link :href="route('admin.manage-orders.index')" :active="request()->routeIs('admin.manage-orders.*')" :title="__('Manage Orders')">
                    <i class="fa-solid fa-receipt fa-fw text-xl" :class="!sidebarOpen && 'mx-auto'"></i>
                    <span x-show="sidebarOpen" class="ml-3 flex-1">{{ __('Manage Orders') }}</span>
                </x-nav-link>
            @endcan
        </div>

        <div class="px-4 py-2 border-t border-gray-200 dark:border-gray-700 shrink-0">
             <button @click="sidebarOpen = !sidebarOpen" class="w-full flex items-center justify-center p-2 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700" title="Toggle Sidebar">
                <i class="fa-solid fa-chevron-left transition-transform duration-300" :class="!sidebarOpen && 'rotate-180'"></i>
            </button>
        </div>

        <div class="border-t border-gray-200 dark:border-gray-700 p-4 shrink-0">
            <div class="flex items-center justify-between">
                <a href="#" class="flex items-center space-x-3 group flex-1 min-w-0">
                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=4f46e5&color=fff' }}" alt="User Avatar" class="w-10 h-10 rounded-full object-cover shrink-0" />
                    <div x-show="sidebarOpen" class="flex-1 min-w-0 transition-opacity duration-200">
                        <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 truncate group-hover:text-indigo-600 dark:group-hover:text-indigo-400">{{ Auth::user()->name }}</p>
                    </div>
                </a>
                <div x-show="sidebarOpen" class="flex items-center space-x-1 transition-opacity duration-200">
                    <button id="theme-toggle" type="button" class="p-2 rounded-full text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-600" title="Toggle Theme">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm-1.414 8.486a1 1 0 011.414 0l.707.707a1 1 0 11-1.414 1.414l-.707-.707a1 1 0 010-1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="p-2 rounded-full text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-600" title="Log Out">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="sm:hidden">
        <div class="fixed top-4 left-4 z-40">
            <button @click="open = !open" class="p-2 rounded-md text-gray-600 dark:text-gray-300 bg-white dark:bg-gray-800 shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-900 transition-colors duration-300">
                <svg x-show="!open" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                <svg x-show="open" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>

        <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false" class="fixed inset-0 bg-black bg-opacity-50 z-30" style="display: none;"></div>

        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 z-40 flex flex-col transition-colors duration-300" style="display: none;">
            
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200 dark:border-gray-700">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <span class="text-xl font-bold text-indigo-600 dark:text-indigo-400">MAISON SONO</span>
                </a>
            </div>

            <div class="flex-1 overflow-y-auto py-4 px-4 space-y-1">
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    <span class="text-base font-medium">{{ __('Dashboard') }}</span>
                </x-responsive-nav-link>
                @can('manage_products')
                    <x-responsive-nav-link :href="route('admin.manage-products.index')" :active="request()->routeIs('admin.manage-products.*')">
                        <span class="text-base font-medium">{{ __('Manage Products') }}</span>
                    </x-responsive-nav-link>
                @endcan
                @can('manage_orders')
                    <x-responsive-nav-link :href="route('admin.manage-orders.index')" :active="request()->routeIs('admin.manage-orders.*')">
                        <span class="text-base font-medium">{{ __('Manage Orders') }}</span>
                    </x-responsive-nav-link>
                @endcan
            </div>
            
            <div class="border-t border-gray-200 dark:border-gray-700 p-4">
                <div class="flex items-center space-x-3 mb-4">
                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=4f46e5&color=fff' }}" alt="User Avatar" class="w-10 h-10 rounded-full object-cover" />
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <x-responsive-nav-link as="button" type="submit" class="w-full text-left">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</div>