<!-- Main modal -->
<div x-cloak
     x-show="isOpen"
     @click.away="isOpen = false"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     tabindex="-1"
     class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-black bg-opacity-50">
    <div @click.away="isOpen = false"
         x-show="isOpen"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="relative max-h-full w-full max-w-md p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b p-4 dark:border-gray-600 md:p-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add a review
                </h3>
                <button @click="isOpen=false" type="button"
                        class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 ms-auto hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                >
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" action="/reviews" class="p-4 md:p-5">
                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
                <input type="hidden" name="product_id" :value="currentProduct">
                <input type="hidden" name="rating" :value="selectedIndex">
                <input type="hidden" name="order_item_id" :value="orderId">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="col-span-2 flex flex-col gap-y-2 w-full items-center justify-center">
                        <div>
                            <p class="text-md font-semibold text-neutral-800">Rating</p>
                        </div>
                        <div>
                            <template x-for="i in totalStars" :key="i">
                                <button class="p-1" type="button"
                                        x-on:mouseover="hoverIndex = i"
                                        x-on:mouseleave="hoverIndex = null"
                                        x-on:click="selectedIndex = i"
                                >
                                    <svg :class="{'fill-[#facc15]': i <= (hoverIndex || selectedIndex), 'fill-[#CED5D8]': i > (hoverIndex || selectedIndex)}"
                                         class="h-10 w-10 cursor-pointer text-yellow-400"
                                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                    </svg>
                                </button>
                            </template>
                        </div>
                    </div>

                    <div class="col-span-2 w-full flex flex-col justify-center items-center">
                        <label for="comment" class="text-md font-semibold text-neutral-800 mb-2">Comment</label>
                        <textarea name="comment" id="comment" rows="5"
                                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 p-2.5 focus:ring-primary-600 focus:border-primary-600 dark:placeholder-gray-400 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                  placeholder="" required></textarea>
                    </div>
                </div>
                <button type="submit"
                        class="inline-flex w-full items-center justify-center rounded-lg bg-neutral-800 px-5 text-center text-sm font-medium text-white py-2.5 hover:bg-black focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="h-5 w-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                              clip-rule="evenodd"></path>
                    </svg>
                    Add review
                </button>
            </form>
        </div>
    </div>
</div>