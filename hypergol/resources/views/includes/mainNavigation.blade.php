<div class="antialiased">
    <div class="lg:px-16 container px-8 bg-white flex flex-wrap items-center py-2 shadow-md">
        <div class="flex-1 flex justify-between items-center">
            <a href="/" style="text-decoration:none;" class="text-2xl uppercase font-bold text-gray-800 lg:text-3xl hover:text-gray-700">Hypergol</a>
        </div>

        <label for="menu-toggle" class="pointer-cursor md:hidden block">
            <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </label>
        <input class="hidden" type="checkbox" id="menu-toggle" />

        <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
            <nav>
                <div class=" flex flex-col md:flex-row py-2 md:mx-6">
                    <a style="text-decoration:none;" class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0" href="/launches">Launches</a>
                    <a style="text-decoration:none;" class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0" href="#">Rockets</a>
                    <a style="text-decoration:none;" class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0" href="#">Rocket motors</a>
                    <a style="text-decoration:none;" class="my-1 text-sm font-medium text-gray-700 dark:text-gray-200 hover:text-indigo-500 dark:hover:text-indigo-400 md:mx-4 md:my-0" href="#">Wiki</a>
                </div>
            </nav>
        </div>
    </div>
</div>

<style>
    #menu-toggle:checked+#menu {
        display: block;
    }
</style>