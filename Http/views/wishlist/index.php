<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <section class="mb-6 w-full flex flex-col justify-center items-center md:p-12 gap-y-3">
        <?php require base_path("Http/views/partials/profile/nav.php") ?>
        <article class="flex gap-x-16 w-full md:w-[80%] 2xl:w-[60%]">
            <aside class="hidden lg:block pt-16">
                <?php require base_path('Http/views/partials/profile/aside.php') ?>
            </aside>
            <section class="antialiased w-full dark:bg-gray-900">
                <div class="mx-auto w-full  px-4 2xl:px-0">
                    <h1 class="hidden lg:block font-semibold text-2xl"><?= get_page_title() ?> (<?= ($cart ? count($cart) : '0') . ' items'  ?>)</h1>
                    <div class="mx-auto mt-6 space-y-4">
                        <?php if ($cart ?? false): ?>
                            <?php foreach ($cart as $item) : ?>
                                <div x-data class="product rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                        <a href="<?= '/product?id=' . htmlspecialchars($item['product_id']) ?>" class="shrink-0 md:order-1">
                                            <img class="w-28 h-28 rounded-md" src="<?= htmlspecialchars($item['cloud_url']) ?>" alt=""/>
                                        </a>
                                        <div class="flex items-center justify-between md:order-3 md:justify-end">
                                            <div class="flex items-center">
                                                <label for="quantity>"></label>
                                                <select disabled name="quantity" id="quantity>" class="cursor-not-allowed product-select rounded-md p-1 px-4 opacity-50 text-sm border border-gray-300">
                                                    <option value="1" selected>1</option>
                                                </select>
                                            </div>
                                            <div class="text-end md:order-4 md:w-32">
                                                <p class="product-price text-base font-bold text-gray-900 dark:text-white">₱<?= htmlspecialchars(number_format($item['price'], 2)) ?></p>
                                            </div>
                                        </div>
                                        <div class="w-full min-w-0 flex-1 space-y-2 md:order-2 md:max-w-md">
                                            <a href="<?= '/product?id=' . htmlspecialchars($item['product_id']) ?>"
                                               class="text-base font-medium text-gray-900 hover:underline dark:text-white"><?= htmlspecialchars($item['name'] ?? 'Product') ?></a>
                                            <p class="text-neutral-500 text-xs"><?= htmlspecialchars(substr(strip_tags($item['description']), 0, 200) ?? 'Description') ?></p>
                                            <p class="text-neutral-500 text-xs flex gap-x-1 items-center">
                                                <svg class="eVNhx7m5tjSVbfYQzDdT kbeH5ty3CtPKxXm5TXph zujhCQXfQfsYXApYjSOW K1PPCJwslha8GUIvV_Cr eCx_6PNzncAD5yo7Qcic" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"></path>
                                                </svg>
                                                Delivery before <?= date('d M Y', strtotime('+7 days')) ?>
                                            </p>
                                            <div class="flex items-center gap-4">
                                                <form action="/wishlist" method="POST" class="inline-flex items-center text-sm font-medium text-orange-600 hover:text-orange-700">
                                                    <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit"
                                                            class="inline-flex items-center text-sm font-medium text-orange-600 hover:text-orange-700">
                                                        <svg class="me-1.5 h-5 w-5 fill-current" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                             viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                                                        </svg>
                                                        Remove from Favorites
                                                    </button>
                                                </form>

                                                <div class="inline-flex items-center text-sm font-medium text-green-500 dark:text-red-500">
                                                    <button @click="window.location.href = '/product?id=<?= $item['product_id'] ?>'" type="button"
                                                            class="inline-flex items-center text-sm font-medium group text-green-500 hover:text-green-700">
                                                        <svg @click="window.location.href = '/product?id=<?= $item['product_id'] ?>'" class="mr-2 cursor-pointer stroke-green-500 group-hover:fill-green-700 group-hover:stroke-green-700"
                                                             width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path class="stroke-green-500 group-hover:stroke-green-700"
                                                                      d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                                                                      stroke="" stroke-width="1.104" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </g>
                                                        </svg>
                                                        Add to Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h1 class="text-md">No Products in Cart</h1>
                        <?php endif; ?>
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
                                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                                                <svg class="h-4 w-4 text-yellow-400 <?= $i <= round($product['average_rating'] ?? 0) ? 'fill-[#facc15]' : 'fill-[#CED5D8]' ?>" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24">
                                                    <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z"/>
                                                </svg>
                                            <?php } ?>
                                        </div>
                                        <p class="text-xs font-medium text-gray-900 dark:text-white"><?= round($product['average_rating'] ?? 0) . '.0' ?></p>
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