<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <section x-data="{filterExpanded:false, sortExpanded:false}" class="mb-12 flex w-full flex-col items-center justify-center gap-y-3 md:p-12">
        <?php require base_path("Http/views/partials/profile/nav.php") ?>
        <article class="flex w-full gap-x-16 md:w-[80%] 2xl:w-[60%]">
            <aside class="hidden pt-16 lg:block">
                <?php require base_path('Http/views/partials/profile/aside.php') ?>
            </aside>
            <section class="w-full antialiased dark:bg-gray-900">
                <div class="mx-auto w-full px-4 2xl:px-0">
                    <h1 class="hidden text-2xl font-semibold lg:block"><?= get_page_title() ?></h1>
                    <div class="mx-auto mt-6 space-y-4">
                        <!-- Search and Filter Header -->
                        <div class="mb-4 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
                            <div class="flex gap-2">
                                <label>
                                    <input type="text" placeholder="Search by Order ID" class="w-64 rounded-md border border-neutral-300 px-3 py-2 text-sm">
                                </label>
                                <button class="rounded-md bg-neutral-800 px-4 py-2 text-sm text-white hover:bg-neutral-700">Search</button>
                            </div>
                            <div class="flex justify-between gap-4">
                                <button @click="filterExpanded=!filterExpanded" x-ref="filterButton" type="button"
                                        class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 text-nowrap hover:text-primary-700 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 sm:w-auto dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                    <svg class="h-4 w-4 -ms-0.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                              d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z"></path>
                                    </svg>
                                    Filter By
                                    <svg class="h-4 w-4 -me-0.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <?php require base_path("Http/views/orders/filter.php") ?>
                                <button @click="sortExpanded=!sortExpanded" x-ref="sortButton" type="button"
                                        class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 text-nowrap hover:text-primary-700 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 sm:w-auto dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                    <svg class="h-4 w-4 -ms-0.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4"/>
                                    </svg>
                                    Sort
                                    <svg class="h-4 w-4 -me-0.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                    </svg>
                                </button>
                                <?php require base_path("Http/views/orders/sort.php") ?>
                            </div>
                        </div>

                        <!-- Order Cards -->
                        <div x-data="{isOpen:false, currentItem:0}" class="space-y-4">
                            <?php require base_path('Http/views/orders/delete.php')?>
                            <?php foreach ($orders as $order) : ?>
                                <!-- Pre-order Card -->
                                <div class="rounded-lg border bg-white p-4 space-y-4">
                                    <div class="flex flex-col justify-between gap-4 sm:flex-row">
                                        <div class="space-y-1">
                                            <div class="flex items-center gap-2">
                                                <span class="text-gray-600">Order ID:</span>
                                                <span class="font-medium">#<?= htmlspecialchars($order['order_id'] ?? '') ?></span>
                                                <?php if ($order['status'] == 'pending') : ?>
                                                    <span class="rounded bg-red-300 px-2 text-sm text-red-900 py-0.5">Pending</span>
                                                <?php elseif ($order['status'] == 'new') : ?>
                                                    <span class="rounded bg-blue-100 px-2 text-sm text-blue-800 py-0.5">New</span>
                                                <?php elseif ($order['status'] == 'processing') : ?>
                                                    <span class="rounded bg-yellow-100 px-2 text-sm text-yellow-800 py-0.5">Processing</span>
                                                <?php elseif ($order['status'] == 'shipped') : ?>
                                                    <span class="rounded bg-green-100 px-2 text-sm text-green-800 py-0.5">Shipped</span>
                                                <?php elseif ($order['status'] == 'delivered') : ?>
                                                    <span class="rounded bg-green-100 px-2 text-sm text-green-800 py-0.5">Delivered</span>
                                                <?php elseif ($order['status'] == 'cancelled') : ?>
                                                    <span class="rounded bg-red-300 px-2 text-sm text-red-900 py-0.5">Cancelled</span>
                                                <?php endif; ?>
                                            </div>
                                            <p class="flex items-center gap-1 text-sm text-gray-600 hover:underline">
                                                <svg class="fill-black" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27998 2.3999C4.43918 2.3999 3.60558 2.4319 2.77998 2.4935C2.48005 2.51672 2.19999 2.65248 1.99598 2.87356C1.79197 3.09464 1.67909 3.38468 1.67998 3.6855V8.3999H8.87998V3.6847C8.87998 3.0679 8.40798 2.5407 7.77998 2.4935C6.94812 2.43096 6.1142 2.39973 5.27998 2.3999ZM1.67998 9.5999V11.5999C1.67998 11.9182 1.80641 12.2234 2.03145 12.4484C2.2565 12.6735 2.56172 12.7999 2.87998 12.7999H2.91278C3.00636 12.2397 3.29558 11.7308 3.72902 11.3638C4.16246 10.9968 4.71202 10.7953 5.27998 10.7953C5.84795 10.7953 6.39751 10.9968 6.83095 11.3638C7.26438 11.7308 7.5536 12.2397 7.64718 12.7999H8.27998C8.43911 12.7999 8.59172 12.7367 8.70425 12.6242C8.81677 12.5116 8.87998 12.359 8.87998 12.1999V9.5999H1.67998Z"/>
                                                    <path d="M5.27999 14.4C5.59825 14.4 5.90347 14.2736 6.12852 14.0485C6.35356 13.8235 6.47999 13.5183 6.47999 13.2C6.47999 12.8817 6.35356 12.5765 6.12852 12.3515C5.90347 12.1264 5.59825 12 5.27999 12C4.96173 12 4.6565 12.1264 4.43146 12.3515C4.20641 12.5765 4.07999 12.8817 4.07999 13.2C4.07999 13.5183 4.20641 13.8235 4.43146 14.0485C4.6565 14.2736 4.96173 14.4 5.27999 14.4ZM10.68 4C10.5209 4 10.3682 4.06322 10.2557 4.17574C10.1432 4.28826 10.08 4.44087 10.08 4.6V11.4112C10.3846 11.1389 10.7537 10.9489 11.1523 10.8591C11.5509 10.7693 11.9658 10.7827 12.3577 10.8981C12.7497 11.0134 13.1057 11.2269 13.3921 11.5183C13.6785 11.8097 13.8858 12.1693 13.9944 12.5632C14.2904 12.3432 14.4824 11.988 14.4704 11.5816C14.4012 9.2356 13.918 6.92028 13.0432 4.7424C12.9541 4.52256 12.8013 4.33438 12.6044 4.20208C12.4075 4.06978 12.1756 3.99941 11.9384 4H10.68ZM11.68 14.4C11.9982 14.4 12.3035 14.2736 12.5285 14.0485C12.7536 13.8235 12.88 13.5183 12.88 13.2C12.88 12.8817 12.7536 12.5765 12.5285 12.3515C12.3035 12.1264 11.9982 12 11.68 12C11.3617 12 11.0565 12.1264 10.8315 12.3515C10.6064 12.5765 10.48 12.8817 10.48 13.2C10.48 13.5183 10.6064 13.8235 10.8315 14.0485C11.0565 14.2736 11.3617 14.4 11.68 14.4Z"/>
                                                </svg>
                                                Tracking Number: <span class="text-black"><?= htmlspecialchars($order['tracking_number']) ?></span>
                                            </p>
                                        </div>
                                        <div class="flex h-12 gap-2 lg:h-10">
                                            <?php if ($order['status'] == 'pending' || $order['status'] == 'new' || $order['status'] == 'processing') : ?>
                                                <button @click="isOpen = !isOpen; currentItem = <?= $order['order_id'] ?>; console.log(currentItem)" class="rounded bg-red-600 px-4 py-1 text-sm text-white hover:bg-red-800">Cancel order</button>
                                            <?php elseif ($order['status'] == 'shipped') : ?>
                                                <a href="https://www.lbcexpress.com/track/" target="_blank" class="flex cursor-pointer items-center rounded border px-4 py-1 text-sm hover:bg-gray-50">Track
                                                    order</a>
                                            <?php elseif ($order['status'] == 'cancelled') : ?>
                                                <a href="/new" class="flex cursor-pointer bg-neutral-800 text-white items-center rounded border px-4 py-1 text-sm hover:bg-neutral-900">
                                                    Order Again</a>
                                            <?php endif; ?>
                                            <a href="/order-details?id=<?= $order['order_id'] ?>" class="flex cursor-pointer items-center rounded border px-4 py-1 text-sm hover:bg-gray-50">Order
                                                details</a>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-4 text-sm sm:grid-cols-3">
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
                                            <p class="mx-2"><?= $order['payment'] == 'Cash On Delivery' ? 'Cash' : 'Card' ?></p>
                                        </div>
                                    </div>
                                    <?php if ($order['status'] == 'delivered') : ?>
                                        <div class="flex items-center gap-2 rounded-md bg-green-50 p-3 text-sm text-green-700">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Delivered on <?= (new DateTime($order['delivered_on']))->format('M d, Y') ?>
                                        </div>
                                    <?php elseif ($order['status'] == 'cancelled') : ?>
                                        <div class="flex items-center gap-2 rounded-md bg-red-50 p-3 text-sm text-red-700">
                                            <svg width="17" height="16" viewBox="0 0 17 16" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M8.5 16C10.6217 16 12.6566 15.1571 14.1569 13.6569C15.6571 12.1566 16.5 10.1217 16.5 8C16.5 5.87827 15.6571 3.84344 14.1569 2.34315C12.6566 0.842855 10.6217 0 8.5 0C6.37827 0 4.34344 0.842855 2.84315 2.34315C1.34285 3.84344 0.5 5.87827 0.5 8C0.5 10.1217 1.34285 12.1566 2.84315 13.6569C4.34344 15.1571 6.37827 16 8.5 16ZM6.78 5.22C6.63783 5.08752 6.44978 5.0154 6.25548 5.01883C6.06118 5.02225 5.87579 5.10097 5.73838 5.23838C5.60097 5.37579 5.52225 5.56118 5.51883 5.75548C5.5154 5.94978 5.58752 6.13783 5.72 6.28L7.44 8L5.72 9.72C5.64631 9.78866 5.58721 9.87146 5.54622 9.96346C5.50523 10.0555 5.48319 10.1548 5.48141 10.2555C5.47963 10.3562 5.49816 10.4562 5.53588 10.5496C5.5736 10.643 5.62974 10.7278 5.70096 10.799C5.77218 10.8703 5.85701 10.9264 5.9504 10.9641C6.04379 11.0018 6.14382 11.0204 6.24452 11.0186C6.34523 11.0168 6.44454 10.9948 6.53654 10.9538C6.62854 10.9128 6.71134 10.8537 6.78 10.78L8.5 9.06L10.22 10.78C10.2887 10.8537 10.3715 10.9128 10.4635 10.9538C10.5555 10.9948 10.6548 11.0168 10.7555 11.0186C10.8562 11.0204 10.9562 11.0018 11.0496 10.9641C11.143 10.9264 11.2278 10.8703 11.299 10.799C11.3703 10.7278 11.4264 10.643 11.4641 10.5496C11.5018 10.4562 11.5204 10.3562 11.5186 10.2555C11.5168 10.1548 11.4948 10.0555 11.4538 9.96346C11.4128 9.87146 11.3537 9.78866 11.28 9.72L9.56 8L11.28 6.28C11.4125 6.13783 11.4846 5.94978 11.4812 5.75548C11.4777 5.56118 11.399 5.37579 11.2616 5.23838C11.1242 5.10097 10.9388 5.02225 10.7445 5.01883C10.5502 5.0154 10.3622 5.08752 10.22 5.22L8.5 6.94L6.78 5.22Z"
                                                />
                                            </svg>

                                            Order Cancelled
                                        </div>
                                    <?php elseif ($order['status'] == 'pending') : ?>
                                        <div class="flex items-center gap-2 rounded-md bg-red-50 p-3 text-sm text-red-700">
                                            <svg width="14" height="16" viewBox="0 0 14 16" class="fill-current" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M12.262 9.4242C12.0121 10.3567 11.5212 11.2069 10.8386 11.8895C10.156 12.5722 9.30573 13.0631 8.37328 13.313C7.44083 13.5629 6.45903 13.563 5.52654 13.3132C4.59404 13.0635 3.74371 12.5727 3.06099 11.8902L2.74899 11.5792H5.18199C5.3809 11.5792 5.57167 11.5002 5.71232 11.3595C5.85297 11.2189 5.93199 11.0281 5.93199 10.8292C5.93199 10.6303 5.85297 10.4395 5.71232 10.2989C5.57167 10.1582 5.3809 10.0792 5.18199 10.0792H0.938992C0.740079 10.0792 0.549314 10.1582 0.408662 10.2989C0.268009 10.4395 0.188992 10.6303 0.188992 10.8292V15.0712C0.188992 15.2701 0.268009 15.4609 0.408662 15.6015C0.549314 15.7422 0.740079 15.8212 0.938992 15.8212C1.1379 15.8212 1.32867 15.7422 1.46932 15.6015C1.60997 15.4609 1.68899 15.2701 1.68899 15.0712V12.6412L1.99899 12.9512C2.86784 13.8203 3.95015 14.4453 5.13714 14.7634C6.32413 15.0816 7.57395 15.0816 8.76096 14.7636C9.94798 14.4455 11.0304 13.8206 11.8993 12.9516C12.7682 12.0827 13.393 11.0002 13.711 9.8132C13.7627 9.62105 13.736 9.41623 13.6367 9.24379C13.5374 9.07135 13.3736 8.94542 13.1815 8.8937C12.9893 8.84198 12.7845 8.86871 12.6121 8.96801C12.4396 9.06732 12.3137 9.23205 12.262 9.4242ZM13.492 5.7012C13.6323 5.56052 13.7111 5.3699 13.711 5.1712V0.929199C13.711 0.730287 13.632 0.539522 13.4913 0.398869C13.3507 0.258217 13.1599 0.179199 12.961 0.179199C12.7621 0.179199 12.5713 0.258217 12.4307 0.398869C12.29 0.539522 12.211 0.730287 12.211 0.929199V3.3602L11.901 3.0502C11.0321 2.18114 9.94983 1.55612 8.76284 1.23798C7.57586 0.91984 6.32603 0.919785 5.13902 1.23782C3.952 1.55586 2.86963 2.18078 2.00071 3.04976C1.13179 3.91874 0.506945 5.00116 0.188992 6.1882C0.160093 6.28431 0.150778 6.38524 0.161598 6.48502C0.172419 6.5848 0.203155 6.68139 0.251986 6.76907C0.300816 6.85675 0.366748 6.93374 0.445876 6.99548C0.525003 7.05721 0.615716 7.10244 0.712641 7.12848C0.809566 7.15452 0.910731 7.16084 1.01014 7.14706C1.10956 7.13329 1.20519 7.09971 1.29139 7.0483C1.37759 6.99689 1.45259 6.92871 1.51195 6.84779C1.57132 6.76687 1.61384 6.67485 1.63699 6.5772C1.88656 5.64427 2.37738 4.79351 3.06007 4.11046C3.74277 3.42741 4.59329 2.93616 5.52608 2.68611C6.45888 2.43606 7.44107 2.43602 8.37389 2.68601C9.3067 2.936 10.1572 3.42719 10.84 4.1102L11.151 4.4202H8.71899C8.52008 4.4202 8.32931 4.49922 8.18866 4.63987C8.04801 4.78052 7.96899 4.97129 7.96899 5.1702C7.96899 5.36911 8.04801 5.55988 8.18866 5.70053C8.32931 5.84118 8.52008 5.9202 8.71899 5.9202H12.962C13.1607 5.92029 13.3513 5.84153 13.492 5.7012Z"
                                                />
                                            </svg>

                                            Waiting for Order to be accepted
                                        </div>
                                    <?php else: ?>
                                        <div class="flex items-center gap-2 rounded-md bg-orange-50 p-3 text-sm text-orange-700">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Expected delivery on <?= (new DateTime($order['created_at']))->modify('+7 days')->format('M d, Y') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                            <?php if (!$orders ?? false) : ?>
                                <h1 class="font-semibold text-lg mb-5">You ordered nothing.</h1>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- Recommendations -->
                <div x-data class="hidden xl:mt-8 xl:block">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
                    <div class="mt-6 grid grid-cols-3 gap-4 sm:mt-8">
                        <?php foreach ($products as $product) : ?>
                            <div @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'"
                                 class="w-full cursor-pointer border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                <div @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'" class="w-full">
                                    <img @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'" class="h-full w-full" src="<?= get_images($product)[0] ?>" alt=""/>
                                </div>
                                <div class="p-6 pt-0">
                                    <div class="mb-1 flex items-center justify-between gap-1">
                                        <span class="rounded px-2 text-xs font-medium bg-primary-100 py-0.5 text-primary-800 dark:bg-primary-900 dark:text-primary-300"> Up to 10% off </span>

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
                                        <p class="font-extrabold leading-tight text-gray-900 text-md dark:text-white"><span
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