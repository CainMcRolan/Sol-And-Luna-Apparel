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
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                              d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"></path>
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
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4"/>
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
                            <?php foreach ($orders as $order) : ?>
                                <!-- Pre-order Card -->
                                <div class="border rounded-lg p-4 space-y-4 bg-white">
                                    <div class="flex flex-col sm:flex-row justify-between gap-4">
                                        <div class="space-y-1">
                                            <div class="flex items-center gap-2">
                                                <span class="text-gray-600">Order ID:</span>
                                                <span class="font-medium">#<?= htmlspecialchars($order['order_id'] ?? '') ?></span>
                                                <?php if ($order['status'] == 'pending') : ?>
                                                    <span class="bg-red-300 text-red-900 text-sm px-2 py-0.5 rounded">Pending</span>
                                                <?php elseif ($order['status'] == 'new') : ?>
                                                    <span class="bg-blue-100 text-blue-800 text-sm px-2 py-0.5 rounded">New</span>
                                                <?php elseif ($order['status'] == 'processing') : ?>
                                                    <span class="bg-yellow-100 text-yellow-800 text-sm px-2 py-0.5 rounded">Processing</span>
                                                <?php elseif ($order['status'] == 'shipped') : ?>
                                                    <span class="bg-green-100 text-green-800 text-sm px-2 py-0.5 rounded">Shipped</span>
                                                <?php elseif ($order['status'] == 'delivered') : ?>
                                                    <span class="bg-green-100 text-green-800 text-sm px-2 py-0.5 rounded">Delivered</span>
                                                <?php elseif ($order['status'] == 'cancelled') : ?>
                                                    <span class="bg-red-300 text-red-900 text-sm px-2 py-0.5 rounded">Cancelled</span>
                                                <?php endif; ?>
                                            </div>
                                            <p class="text-gray-600 hover:underline text-sm flex items-center gap-1">
                                                <svg class="fill-black" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27998 2.3999C4.43918 2.3999 3.60558 2.4319 2.77998 2.4935C2.48005 2.51672 2.19999 2.65248 1.99598 2.87356C1.79197 3.09464 1.67909 3.38468 1.67998 3.6855V8.3999H8.87998V3.6847C8.87998 3.0679 8.40798 2.5407 7.77998 2.4935C6.94812 2.43096 6.1142 2.39973 5.27998 2.3999ZM1.67998 9.5999V11.5999C1.67998 11.9182 1.80641 12.2234 2.03145 12.4484C2.2565 12.6735 2.56172 12.7999 2.87998 12.7999H2.91278C3.00636 12.2397 3.29558 11.7308 3.72902 11.3638C4.16246 10.9968 4.71202 10.7953 5.27998 10.7953C5.84795 10.7953 6.39751 10.9968 6.83095 11.3638C7.26438 11.7308 7.5536 12.2397 7.64718 12.7999H8.27998C8.43911 12.7999 8.59172 12.7367 8.70425 12.6242C8.81677 12.5116 8.87998 12.359 8.87998 12.1999V9.5999H1.67998Z"/>
                                                    <path d="M5.27999 14.4C5.59825 14.4 5.90347 14.2736 6.12852 14.0485C6.35356 13.8235 6.47999 13.5183 6.47999 13.2C6.47999 12.8817 6.35356 12.5765 6.12852 12.3515C5.90347 12.1264 5.59825 12 5.27999 12C4.96173 12 4.6565 12.1264 4.43146 12.3515C4.20641 12.5765 4.07999 12.8817 4.07999 13.2C4.07999 13.5183 4.20641 13.8235 4.43146 14.0485C4.6565 14.2736 4.96173 14.4 5.27999 14.4ZM10.68 4C10.5209 4 10.3682 4.06322 10.2557 4.17574C10.1432 4.28826 10.08 4.44087 10.08 4.6V11.4112C10.3846 11.1389 10.7537 10.9489 11.1523 10.8591C11.5509 10.7693 11.9658 10.7827 12.3577 10.8981C12.7497 11.0134 13.1057 11.2269 13.3921 11.5183C13.6785 11.8097 13.8858 12.1693 13.9944 12.5632C14.2904 12.3432 14.4824 11.988 14.4704 11.5816C14.4012 9.2356 13.918 6.92028 13.0432 4.7424C12.9541 4.52256 12.8013 4.33438 12.6044 4.20208C12.4075 4.06978 12.1756 3.99941 11.9384 4H10.68ZM11.68 14.4C11.9982 14.4 12.3035 14.2736 12.5285 14.0485C12.7536 13.8235 12.88 13.5183 12.88 13.2C12.88 12.8817 12.7536 12.5765 12.5285 12.3515C12.3035 12.1264 11.9982 12 11.68 12C11.3617 12 11.0565 12.1264 10.8315 12.3515C10.6064 12.5765 10.48 12.8817 10.48 13.2C10.48 13.5183 10.6064 13.8235 10.8315 14.0485C11.0565 14.2736 11.3617 14.4 11.68 14.4Z"/>
                                                </svg>
                                                Tracking Number: <span class="text-black"><?= htmlspecialchars($order['tracking_number']) ?></span>
                                            </p>
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
                                            <span class="ml-2"><?= (new DateTime($order['created_at']))->format('d M Y') ?></span>
                                        </div>
                                        <div>
                                            <span class="text-gray-600">Email:</span>
                                            <span class="ml-2"><?= htmlspecialchars($order['email'] ?? '') ?></span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-gray-600">Payment method:</span>
                                            <p class="mx-2"><?= $order['payment'] == 'Cash on Delivery' ? 'Cash' : 'Card' ?></p>
                                        </div>
                                    </div>
                                    <?php if ($order['status'] == 'delivered') :?>
                                        <div class="text-sm text-green-700 bg-green-50 p-3 rounded-md flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Delivered on <?= (new DateTime($order['delivered_on']))->format('M d, Y') ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-sm text-orange-700 bg-orange-50 p-3 rounded-md flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Expected delivery on <?= (new DateTime($order['created_at']))->modify('+7 days')->format('M d, Y') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <!-- Recommendations -->
                <div x-data class="hidden xl:mt-8 xl:block ">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
                    <div class="mt-6 grid grid-cols-3 gap-4 sm:mt-8">
                        <?php foreach ($products as $product) : ?>
                            <div @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'" class="w-full cursor-pointer bg-white border border-gray-200 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                <div @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'" class="w-full">
                                    <img @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'" class="h-full w-full" src="<?= get_images($product)[0] ?>" alt=""/>
                                </div>
                                <div class="p-6 pt-0">
                                    <div class="mb-1 flex items-center justify-between gap-1">
                                        <span class="rounded bg-primary-100 px-2 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300"> Up to 10% off </span>

                                        <div class="flex items-center justify-end gap-1">
                                            <button @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'" type="button"
                                                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only"> Quick look </span>
                                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </button>

                                            <form action="/wishlist" method="POST">
                                                <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                                                <input type="hidden" name="_method" value="<?= in_array($product['product_id'], $wishlist) ? 'DELETE' : 'POST' ?>">
                                                <?php if ($user ?? false) : ?>
                                                    <button
                                                            type="submit"
                                                            class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                        <span class="sr-only"> Add to Favorites </span>
                                                        <svg class="h-5 w-5 <?= in_array($product['product_id'], $wishlist) ? 'fill-orange-500 stroke-orange-500' : 'stroke-current' ?>"
                                                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
                                                        </svg>
                                                    </button>
                                                <?php else: ?>
                                                    <button
                                                            type="button"
                                                            @click="window.location.href='/auth-redirect'"
                                                            class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                        <span class="sr-only"> Add to Favorites </span>
                                                        <svg class="h-5 w-5 <?= in_array($product['product_id'], $wishlist) ? 'fill-orange-500 stroke-orange-500' : 'stroke-current' ?>"
                                                             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z"/>
                                                        </svg>
                                                    </button>
                                                <?php endif; ?>
                                            </form>
                                        </div>
                                    </div>

                                    <a href='/product?id=<?= $product['product_id'] ?>'
                                       class="text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white"><?= htmlspecialchars($product['name'] ?? 'Product Unavailable') ?></a>

                                    <div @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'" class="mt-1 flex items-center gap-2">
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
                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">(<?= htmlspecialchars($product['quantity_sold'] ?? 0) ?>)</p>
                                    </div>

                                    <ul @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'" class="mt-2 flex items-center gap-4">
                                        <?php if (rand(0, 1) == 0) : ?>
                                            <li class="flex items-center gap-2">
                                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                                </svg>
                                                <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Fast Delivery</p>
                                            </li>
                                        <?php else: ?>
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
                                        <?php endif; ?>

                                        <li class="flex items-center gap-2">
                                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                      d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                            <p class="text-xs font-medium text-gray-500 dark:text-gray-400">Best Price</p>
                                        </li>
                                    </ul>

                                    <div @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'" class="mt-1 flex items-center justify-between gap-4">
                                        <p class="text-md font-extrabold leading-tight text-gray-900 dark:text-white"><span
                                                    class="font-medium">₱</span><?= htmlspecialchars(number_format($product['price'], 2) ?? 0) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </article>
    </section>
<?php
require base_path("Http/views/partials/footer.php");
?>