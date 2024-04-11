<x-app-layout>
<x-slot name="header">
<h2 class="text-xl font-semibold leading-tight text-gray-800">
    {{ __('Estado de Compra') }}
</h2>
</x-slot>

<div class=" sm:px-10 my-5 sm:my-16">
    <div class="flex flex-col gap-3">
        <div
            class="flex bg-white dark:bg-gray-900 items-center px-6 py-4 text-sm border-t-2 rounded-b shadow-sm border-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500 stroke-current" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <div class="ml-3">
                <div class="font-bold text-left text-black dark:text-gray-50">Your entry has been saved</div>
                <div class="w-full text-gray-900 dark:text-gray-300 mt-1">You can continue browsing.</div>
            </div>
        </div>

        <div
            class="flex bg-white dark:bg-gray-900 items-center px-6 py-4 text-sm border-t-2 rounded-b shadow-sm border-red-500">
            <svg viewBox="0 0 24 24" class="w-8 h-8 text-red-500 stroke-current" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 8V12V8ZM12 16H12.01H12ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <div class="ml-3">
                <div class="font-bold text-left text-black dark:text-gray-50">Error en la Compra</div>
                <div class="w-full text-gray-900 dark:text-gray-300 mt-1">fds</div>
            </div>
        </div>
    </div>
</div>

<x-commons.footer />
</x-app-layout>