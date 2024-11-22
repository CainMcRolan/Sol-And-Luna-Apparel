<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <section x-data="{filterExpanded:false, sortExpanded:false}" class="w-full flex flex-col justify-center items-center md:p-12 gap-y-3 mb-12">
        <?php require base_path("Http/views/partials/profile/nav.php") ?>
        <article class="flex gap-x-16 w-full md:w-[80%] 2xl:w-[60%]">
            <aside class="hidden lg:block pt-16">
                <?php require base_path('Http/views/partials/profile/aside.php') ?>
            </aside>
            <section class="antialiased w-full dark:bg-gray-900">
                <div class="mx-auto w-full px-4 2xl:px-0">
                    <h1 class="hidden lg:block font-semibold text-2xl"><?= get_page_title() ?></h1>
                    <div class="mx-auto mt-6 space-y-4">
                        <!-- Search and Filter Header -->
                        <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between mb-4">
                            <div class="flex gap-2">
                                <label>
                                    <input type="text" placeholder="Search by Order ID" class="px-3 py-2 text-sm border border-neutral-300 rounded-md w-64">
                                </label>
                                <button class="bg-neutral-800 text-white px-4 py-2 text-sm rounded-md hover:bg-neutral-700">Search</button>
                            </div>
                            <div class="flex gap-4 justify-between">
                                <button @click="filterExpanded=!filterExpanded" x-ref="filterButton" type="button"
                                        class="text-nowrap flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                                    <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"></path>
                                    </svg>
                                    Filter By
                                    <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <?php require base_path("Http/views/orders/filter.php") ?>
                                <button @click="sortExpanded=!sortExpanded" x-ref="sortButton" type="button"
                                        class="text-nowrap flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                                    <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4"/>
                                    </svg>
                                    Sort
                                    <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <?php require base_path("Http/views/orders/sort.php") ?>
                            </div>
                        </div>

                        <!-- Order Cards -->
                        <div class="space-y-4">
                            <!-- Pre-order Card -->
                            <div class="border rounded-lg p-4 space-y-4 bg-white">
                                <div class="flex flex-col sm:flex-row justify-between gap-4">
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-2">
                                            <span class="text-gray-600">Order ID:</span>
                                            <span class="font-medium">#FWB1273643</span>
                                            <span class="bg-blue-100 text-blue-800 text-sm px-2 py-0.5 rounded">New</span>
                                        </div>
                                        <a href="#" class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                            Download invoice
                                        </a>
                                    </div>
                                    <div class="flex gap-2 h-12 lg:h-10">
                                        <button class=" text-sm px-4 py-1 bg-red-600 text-white rounded hover:bg-red-800">Cancel order</button>
                                        <button class=" text-sm px-4 py-1 border rounded hover:bg-gray-50">Track order</button>
                                        <button class=" text-sm px-4 py-1 border rounded hover:bg-gray-50">Order details</button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                    <div>
                                        <span class="text-gray-600">Order date:</span>
                                        <span class="ml-2">24 January 2024</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Email:</span>
                                        <span class="ml-2">name@example.com</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-gray-600">Payment method:</span>
                                        <div class="ml-2 w-8 h-5 bg-[#FF5F00] rounded"></div>
                                    </div>
                                </div>
                                <div class="text-sm text-orange-700 bg-orange-50 p-3 rounded-md flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Expected delivery on Monday 16 Jul 2024
                                </div>
                            </div>

                            <!-- In Transit Card -->
                            <div class="border rounded-lg p-4 space-y-4 bg-white">
                                <div class="flex flex-col sm:flex-row justify-between gap-4">
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-2">
                                            <span class="text-gray-600">Order ID:</span>
                                            <span class="font-medium">#FWB1273722</span>
                                            <span class="bg-yellow-100 text-yellow-800 text-sm px-2 py-0.5 rounded">Processing</span>
                                        </div>
                                        <a href="#" class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                            Download invoice
                                        </a>
                                    </div>
                                    <div class="flex gap-2 h-12 lg:h-10">
                                        <button class="text-sm px-4 py-1 bg-red-600 text-white rounded hover:bg-red-800">Cancel order</button>
                                        <button class="text-sm px-4 py-1 border rounded hover:bg-gray-50">Track order</button>
                                        <button class="text-sm px-4 py-1 border rounded hover:bg-gray-50">Order details</button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                    <div>
                                        <span class="text-gray-600">Order date:</span>
                                        <span class="ml-2">01 May 2024</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Email:</span>
                                        <span class="ml-2">name@example.com</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-gray-600">Payment method:</span>
                                        <div class="ml-2 w-8 h-5 bg-[#1A1F71] rounded"></div>
                                    </div>
                                </div>
                                <div class="text-sm text-orange-700 bg-orange-50 p-3 rounded-md flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Expected delivery Today
                                </div>
                            </div>

                            <!-- Completed Card -->
                            <div class="border rounded-lg p-4 space-y-4 bg-white">
                                <div class="flex flex-col sm:flex-row justify-between gap-4">
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-2">
                                            <span class="text-gray-600">Order ID:</span>
                                            <span class="font-medium">#FWB1273756</span>
                                            <span class="bg-green-100 text-green-800 text-sm px-2 py-0.5 rounded">Delivered</span>
                                        </div>
                                        <a href="#" class="text-blue-600 hover:underline text-sm flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                            Download invoice
                                        </a>
                                    </div>
                                    <div class="flex gap-2 h-12 lg:h-10">
                                        <button class="text-sm px-4 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Order again</button>
                                        <button class="text-sm px-4 py-1 border rounded hover:bg-gray-50">Order details</button>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                                    <div>
                                        <span class="text-gray-600">Order date:</span>
                                        <span class="ml-2">01 May 2024</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Email:</span>
                                        <span class="ml-2">name@example.com</span>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-gray-600">Payment method:</span>
                                        <div class="ml-2 w-8 h-5 bg-[#1A1F71] rounded"></div>
                                    </div>
                                </div>
                                <div class="text-sm text-green-700 bg-green-50 p-3 rounded-md flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Delivered on Friday 04 May 2024
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden xl:mt-8 xl:block">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
                    <div class="mt-6 grid grid-cols-3 gap-4 sm:mt-8">
                        <div @click="window.location.href = '/product?id=1'" class="w-full cursor-pointer bg-white border border-gray-200 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class="w-full">
                                <img class="h-full w-full" src="/public/images/product-1.avif" alt=""/>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="mb-1 flex items-center justify-between gap-1">
                                    <span class="rounded bg-primary-100 px-2 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300"> Up to 35% off </span>

                                    <div class="flex items-center justify-end gap-1">
                                        <button type="button" data-tooltip-target="tooltip-quick-look"
                                                class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only"> Quick look </span>
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </button>
                                        <div id="tooltip-quick-look" role="tooltip"
                                             class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                             data-popper-placement="top">
                                            Quick look
                                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                                        </div>

                                        <button type="button" data-tooltip-target="tooltip-add-to-favorites"
                                                class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only"> Add to Favorites </span>
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
                                            </svg>
                                        </button>
                                        <div id="tooltip-add-to-favorites" role="tooltip"
                                             class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                             data-popper-placement="top">
                                            Add to favorites
                                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                                        </div>
                                    </div>
                                </div>

                                <a href="#" class="text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Curry 12 'Wardell Mode' Basketball Shoes</a>

                                <div class="mt-1 flex items-center gap-2">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>
                                    </div>

                                    <p class="text-xs font-medium text-gray-900 dark:text-white">5.0</p>
                                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">(455)</p>
                                </div>

                                <ul class="mt-2 flex items-center gap-4">
                                    <li class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                        </svg>
                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Fast Delivery</p>
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                  d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                        </svg>
                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Best Price</p>
                                    </li>
                                </ul>

                                <div class="mt-1 flex items-center justify-between gap-4">
                                    <p class="text-md font-extrabold leading-tight text-gray-900 dark:text-white">$1,699</p>
                                </div>
                            </div>
                        </div>
                        <div @click="window.location.href = '/product?id=1'" class="w-full cursor-pointer bg-white border border-gray-200 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class="w-full">
                                <img class="h-full w-full" src="/public/images/product-2.avif" alt=""/>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="mb-1 flex items-center justify-between gap-1">
                                    <span class="rounded bg-primary-100 px-2 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300"> Up to 35% off </span>

                                    <div class="flex items-center justify-end gap-1">
                                        <button type="button" data-tooltip-target="tooltip-quick-look"
                                                class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only"> Quick look </span>
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </button>
                                        <div id="tooltip-quick-look" role="tooltip"
                                             class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                             data-popper-placement="top">
                                            Quick look
                                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                                        </div>

                                        <button type="button" data-tooltip-target="tooltip-add-to-favorites"
                                                class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only"> Add to Favorites </span>
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
                                            </svg>
                                        </button>
                                        <div id="tooltip-add-to-favorites" role="tooltip"
                                             class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                             data-popper-placement="top">
                                            Add to favorites
                                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                                        </div>
                                    </div>
                                </div>

                                <a href="#" class="text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Curry 12 'Wardell Mode' Basketball Shoes</a>

                                <div class="mt-1 flex items-center gap-2">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>
                                    </div>

                                    <p class="text-xs font-medium text-gray-900 dark:text-white">5.0</p>
                                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">(455)</p>
                                </div>

                                <ul class="mt-2 flex items-center gap-4">
                                    <li class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                             viewBox="0 0 24 24">
                                            <path
                                                    stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="m7.171 12.906-2.153 6.411 2.672-.89 1.568 2.34 1.825-5.183m5.73-2.678 2.154 6.411-2.673-.89-1.568 2.34-1.825-5.183M9.165 4.3c.58.068 1.153-.17 1.515-.628a1.681 1.681 0 0 1 2.64 0 1.68 1.68 0 0 0 1.515.628 1.681 1.681 0 0 1 1.866 1.866c-.068.58.17 1.154.628 1.516a1.681 1.681 0 0 1 0 2.639 1.682 1.682 0 0 0-.628 1.515 1.681 1.681 0 0 1-1.866 1.866 1.681 1.681 0 0 0-1.516.628 1.681 1.681 0 0 1-2.639 0 1.681 1.681 0 0 0-1.515-.628 1.681 1.681 0 0 1-1.867-1.866 1.681 1.681 0 0 0-.627-1.515 1.681 1.681 0 0 1 0-2.64c.458-.361.696-.935.627-1.515A1.681 1.681 0 0 1 9.165 4.3ZM14 9a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"
                                            />
                                        </svg>
                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Best Seller</p>
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                  d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                        </svg>
                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Best Price</p>
                                    </li>
                                </ul>

                                <div class="mt-1 flex items-center justify-between gap-4">
                                    <p class="text-md font-extrabold leading-tight text-gray-900 dark:text-white">$1,699</p>
                                </div>
                            </div>
                        </div>
                        <div @click="window.location.href = '/product?id=1'" class="w-full cursor-pointer bg-white border border-gray-200 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class="w-full">
                                <img class="h-full w-full" src="/public/images/product-1.avif" alt=""/>
                            </div>
                            <div class="p-6 pt-0">
                                <div class="mb-1 flex items-center justify-between gap-1">
                                    <span class="rounded bg-primary-100 px-2 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300"> Up to 35% off </span>

                                    <div class="flex items-center justify-end gap-1">
                                        <button type="button" data-tooltip-target="tooltip-quick-look"
                                                class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only"> Quick look </span>
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                            </svg>
                                        </button>
                                        <div id="tooltip-quick-look" role="tooltip"
                                             class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                             data-popper-placement="top">
                                            Quick look
                                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                                        </div>

                                        <button type="button" data-tooltip-target="tooltip-add-to-favorites"
                                                class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                            <span class="sr-only"> Add to Favorites </span>
                                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
                                            </svg>
                                        </button>
                                        <div id="tooltip-add-to-favorites" role="tooltip"
                                             class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                             data-popper-placement="top">
                                            Add to favorites
                                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                                        </div>
                                    </div>
                                </div>

                                <a href="#" class="text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Curry 12 'Wardell Mode' Basketball Shoes</a>

                                <div class="mt-1 flex items-center gap-2">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>

                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                        </svg>
                                    </div>

                                    <p class="text-xs font-medium text-gray-900 dark:text-white">5.0</p>
                                    <p class="text-xs font-medium text-gray-500 dark:text-gray-400">(455)</p>
                                </div>

                                <ul class="mt-2 flex items-center gap-4">
                                    <li class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                        </svg>
                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Fast Delivery</p>
                                    </li>

                                    <li class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                  d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                        </svg>
                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Best Price</p>
                                    </li>
                                </ul>

                                <div class="mt-1 flex items-center justify-between gap-4">
                                    <p class="text-md font-extrabold leading-tight text-gray-900 dark:text-white">$1,699</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </section>
<?php
require base_path("Http/views/partials/footer.php");
?>