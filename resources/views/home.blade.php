@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>



<div class="bg-gray-800 fixed w-full z-10 top-0 left-0 border-b border-gray-600">
    <nav class="bg-gray-800 border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-2 px-4">

            <a href="{{ route('main') }}" class="flex items-center">
                <x-application-logo />
            </a>

            <div class="flex items-center md:order-2 flex-row space-x-8 ">
                @if (Auth::check())

                    <a href="{{ route('pets.index') }}" class="mt-2 text-sm font-medium text-gray-300">
                        Pets
                    </a>

                    <div class="relative" x-data="{ isOpen: false }">
                        <button @click="isOpen = !isOpen" class="flex items-center w-full px-4 py-2 mt-2 text-sm text-gray-300 transition duration-150 ease-in-out bg-gray-700 border border-gray-600 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="isOpen" class="absolute right-0 w-48 bg-gray-700 text-gray-300 rounded-md shadow-lg py-2 mt-2"
                            x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95">

                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md" role="menuitem">
                                Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}" x-data="{ isOpen: false }">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 rounded-md" role="menuitem">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else


                    <a href="{{ route('login') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" aria-current="page">
                        Login
                    </a>

                    <x-primary-button class="ms-4" onclick="window.location='{{ route('register') }}'">
                      {{ __('Register') }}
                  </x-primary-button>
                @endif
            </div>
        </div>
    </nav>
</div>


<div class="bg-gray-100 dark:bg-gray-900 pt-20 min-h-screen">

    @yield('content')
</div>
