<header class="fixed-top z-[99]" id="{{ Route::currentRouteName() === 'home' ? 'stickyHeader' : '' }}">

@php( $events2 = \App\Models\Events::orderBy('created_at', 'desc')->value('id') )

    <nav x-data="{ open: false }" class="dark:border-gray-700" >
        <!-- Primary Navigation Menu -->
        <div class=" mx-auto px-6 lg:px-10">
            <div class="my-4 flex justify-between h-12">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a class="md:font-bold text-xl my-4"  href="/">
                            @if (Route::currentRouteName() === 'home')
                            <img class="my-10 hidden" src="https://res.cloudinary.com/nieleche/image/upload/v1724783944/logo_2_u8romc.png" alt="wireless gig" style="width:80px !important;">
                            @else
                                <img src="https://res.cloudinary.com/nieleche/image/upload/v1724783944/logo_2_u8romc.png" alt="wireless gig" style="width:80px !important;">
                            @endif
                        </a>
                    </div>

                    <style>
                        .ring-opacity-5 {
                            padding:0px;
                        }
                    </style>
                    <!-- Navigation Links -->
                    <div class="flex hidden space-x-8 px-6 sm:flex text-white ">

                        <div class="hidden space-x-4 px-0 sm:flex text-white">
                            <x-nav-link  href="{{ route('about') }}" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}"  :active="request()->routeIs('about')">
                                About
                            </x-nav-link>
                        </div>

                        <div class="hidden space-x-4 px-0 sm:flex text-white">
                            <x-nav-link  href="{{ route('events') }}" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}"  :active="request()->routeIs('events')">
                                Events
                            </x-nav-link>
                        </div>
                    

                        <div class="hidden space-x-6 px-0 sm:flex">
                            <x-nav-link href="{{ route('clients') }}" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}"  :active="request()->routeIs('clients')">
                                Clients
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-6 px-0 sm:flex">
                            <x-nav-link href="{{ route('membership') }}" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}"  :active="request()->routeIs('membership')">
                                Membership
                            </x-nav-link>
                        </div>

                        <div class="hidden space-x-6 px-0 sm:flex">
                            <x-nav-link href="{{ route('blog') }}" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}"  :active="request()->routeIs('blog')">
                                Blog
                            </x-nav-link>
                        </div>

                        <div class="hidden space-x-6 px-0 sm:flex">
                            <x-nav-link href="{{ route('gallery') }}" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}"  :active="request()->routeIs('gallery')">
                                Gallery
                            </x-nav-link>
                        </div>
                   

                        <!--<div class="hidden space-x-6 px-0 sm:flex" >
                            @auth
                                <x-nav-link href="{{ route('dashboard') }}" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}"   :active="request()->routeIs('dashboard')">
                                    Profile
                                </x-nav-link>
                            @else
                                <x-nav-link href="{{ route('register') }}"  class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}"  :active="request()->routeIs('dashboard')">
                                    Attend
                                </x-nav-link>
                            @endauth
                        </div>-->

                        <div class="hidden space-x-6 px-0 sm:flex">
                            <x-nav-link href="/" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}"   :active="request()->routeIs('contact')">
                                Shop
                            </x-nav-link>
                        </div>
                
                    </div>      

                <!-- Hamburger -->
                
                <div class="flex items-center bg-white rounded-full px-4 sm:hidden">
                
                        @if (Route::currentRouteName() === 'home')
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-black  hover:text-white dark:hover:text-black hover:bg-white-100 dark:hover:bg-white-900 focus:outline-none focus:bg-white-100 dark:focus:bg-white-900 focus:text-white-500 dark:focus:text-white-400 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        @else
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-black dark:text-black hover:text-black dark:hover:text-white-400 hover:bg-white-100 dark:hover:bg-white-900 focus:outline-none focus:bg-white-100 dark:focus:bg-white-900 focus:text-white-500 dark:focus:text-white-400 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        @endif
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open} " class="hidden sm:hidden bg-white h-screen text-center pt-10">
            <!-- Responsive Settings Options -->
            <div class="py-6 space-y-4">
                <a href="{{ route('about') }}" class="text-2xl font-bold MenloRegular">
                    About
                </a>
            </div>
           

            <div class="py-6 space-y-4">
                <a href="{{ route('events') }}"  class="text-2xl font-bold MenloRegular">
                    Events
                </a>
            </div>
                   
            <div class="py-6 space-y-4">
                <a href="{{ route('clients') }}"  class="text-2xl font-bold MenloRegular">
                    Clients
                </a>
            </div>

            <div class="py-6 space-y-4">
                <a href="{{ route('membership') }}"  class="text-2xl font-bold MenloRegular">
                    Membership
                </a>
            </div>

            <div class="py-6 space-y-4">
                <a href="{{ route('blog') }}"  class="text-2xl font-bold MenloRegular">
                    Blog
                </a>
            </div>

            <div class="py-6 space-y-4">
                <a href="{{ route('gallery') }}"  class="text-2xl font-bold MenloRegular">
                    Gallery
                </a>
            </div>
             <div class="py-6 space-y-4">
                <a href="/"  class="text-2xl font-bold MenloRegular">
                    Shop
                </a>
            </div>

            <!--<div class="py-6 space-y-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-2xl font-bold MenloRegular">
                        hello {{ auth()->user()->name }} !
                    </a>
                @else
                    <a href="{{ route('register') }}" class="text-2xl font-bold MenloRegular">
                        Attend
                    </a>
                @endauth
            </div>-->
           
        </div>
    </nav>

</header>
        