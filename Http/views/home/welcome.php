<div x-show="isOpen" x-data="{ isOpen: true }"
     class="fixed inset-0 z-50 m-auto w-10/12 overflow-auto flex items-center justify-center">
    <!-- Backdrop -->
    <div x-cloak
         x-show="isOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"
         @click="isOpen = false">
    </div>

    <!-- Modal -->
    <div x-cloak
         x-show="isOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="relative rounded-lg overflow-hidden  transform transition-all sm:max-w-lg sm:w-full"
         @click.away="isOpen = false">

        <div @click="window.location.href = '/new'" class="cursor-pointer w-full h-full">
            <img class="animate-bounce-once object-cover w-full h-full rounded-md"
                 src="/public/images/promo.png"
                 alt="">
        </div>

    </div>
</div>