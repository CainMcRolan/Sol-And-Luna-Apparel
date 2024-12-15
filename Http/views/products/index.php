<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <section x-data="{sortExpanded:false}" class="w-full flex flex-col justify-center items-center p-6 md:p-12 gap-y-3">
        <header class="w-full max-w-screen-2xl ">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="/home" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2"><?= get_url()['name'] ?? 'Section' ?></span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl md:text-3xl"><?= get_url()['name'] ?? 'Section' ?> Products</h2>
        </header>
        <article class="flex gap-x-6">
            <aside class="hidden md:block w-1/5 pt-16">
                <?php require base_path('Http/views/products/accordion.php') ?>
            </aside>
            <section class="antialiased dark:bg-gray-900">
                <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                    <!-- Heading & Filters -->
                    <?php require base_path('Http/views/products/heading.php') ?>

                    <!-- Products Section -->
                    <?php if ($products) : ?>
                        <div x-data class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                            <?php foreach ($products as $product) : ?>
                                <div class="w-full cursor-pointer bg-white border border-gray-200 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                    <div @click="window.location.href = '/product?id=<?= $product['product_id'] ?>'" class="w-full">
                                        <img class="h-full w-full" src="<?= get_images($product)[0] ?>" alt=""/>
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
                                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                    <svg class="h-4 w-4 text-yellow-400 <?= $i <= floor($product['average_rating'] ?? 0) ? 'fill-[#facc15]' : 'fill-[#CED5D8]' ?>" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24">
                                                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                                    </svg>
                                                <?php } ?>
                                            </div>
                                            <p class="text-xs font-medium text-gray-900 dark:text-white"><?= round($product['average_rating'] ?? 0, 1) ?></p>
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
                    <?php else: ?>
                        <div class="mb-4 grid gap-4 w-screen md:w-[50vw] 2xl:w-screen">
                            <h1 class="text-center my-5 md:mb-32 md:text-left md:my-0 font-semibold text-xl text-nowrap">No Products Available</h1>
                        </div>
                    <?php endif; ?>

                    <!-- Pagination-->
                    <div class="flex flex-col items-center">
                        <span class="text-sm text-gray-700 dark:text-gray-400">Showing <span
                                    class="font-semibold text-gray-900 dark:text-white"><?= min($product_count, max(0, $page * 8 + 1)) ?></span> to <span
                                    class="font-semibold text-gray-900 dark:text-white"><?= min($product_count, max(0, ($page + 1) * 8)) ?></span> of <span
                                    class="font-semibold text-gray-900 dark:text-white"><?= $product_count ?></span> Entries</span>
                        <div class="inline-flex mt-2 xs:mt-0 gap-x-1">
                            <button @click="window.location.href = '<?= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . '?page=' . $page - 1 ?>'" <?= $_GET['page'] ?? false ? '' : 'disabled' ?>
                                    class="<?= $_GET['page'] ?? false ? 'hover:bg-gray-300' : 'opacity-25 cursor-not-allowed' ?> bg-neutral-200 flex items-center justify-center px-5 h-10 text-sm rounded-sm font-medium text-neutral-800">
                                Prev
                            </button>
                            <button @click="window.location.href = '<?= parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) . '?page=' . $page + 1 ?>'" <?= checkPage($product_count) ? '' : 'disabled' ?>
                                    class="<?= checkPage($product_count) ? 'hover:bg-gray-300' : 'opacity-25 cursor-not-allowed' ?> flex items-center justify-center px-5 h-10 text-sm rounded-sm font-medium text-neutral-800 bg-neutral-200 hover:bg-gray-300">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </article>
        <script>
        </script>
    </section>
<?php
require base_path("Http/views/partials/footer.php");
?>