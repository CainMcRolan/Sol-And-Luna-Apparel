<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <!--    Individual Product Page-->
    <section x-data class="relative mt-8 lg:my-8">
        <div class="mx-auto w-full lg:w-[70%] 2xl:w-[60%] px-4 sm:px-6 lg:px-0">
            <div class="mx-auto grid grid-cols-1 lg:gap-8 2xl:gap-10 max-md:px-2 lg:grid-cols-2">
                <!-- Image Display-->
                <div class="">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                         class="mb-6 swiper product-prev">
                        <div class="swiper-wrapper">
                            <?php foreach (get_images($current_product) as $image) : ?>
                                <div class="swiper-slide">
                                    <img src="<?= $image ?>"
                                         alt="product image" class="mx-auto object-cover">
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                    <div thumbsSlider class="mx-auto overflow-auto swiper product-thumb max-w-[608px]">
                        <div class="swiper-wrapper">
                            <?php foreach (get_images($current_product) as $image) : ?>
                                <div class="swiper-slide">
                                    <img src="<?= $image ?>" alt="Travel Bag image"
                                         class="cursor-pointer border-2 border-gray-50 slide:border-orange-600 object-cover transition-all duration-500 hover:border-orange-600">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Product Information-->
                <div class="my-0 flex w-full items-center justify-center pr-0 max-lg:pb-10 data lg:my-5 lg:pr-8 xl:my-2 xl:justify-start">
                    <div x-data="{
                        open: false,
                        sizes: ['S', 'M', 'L', 'XL', 'XXL'],
                        quantity : 1,
                        size: 'S',
                        max: <?= $current_product['small_quantity'] ?>,
                        sizeReference: {
                            'S': <?= $current_product['small_quantity'] ?>,
                            'M': <?= $current_product['medium_quantity'] ?>,
                            'L': '<?= $current_product['large_quantity'] ?>',
                            'XL': '<?= $current_product['xl_quantity'] ?>',
                            'XXL': '<?= $current_product['xxl_quantity'] ?>'
                        },
                        changeMax() {
                            this.max = this.sizeReference[this.size];
                        }
                        }" class="w-full max-w-xl data">
                        <p class="mb-4 text-lg font-medium leading-8 text-neutral-800"><a href="/new" class="hover:text-orange-600">Apparel</a>&nbsp; /&nbsp; <span>Clothing</span></p>
                        <h2 class="mb-2 text-3xl font-bold capitalize leading-10 text-gray-900 font-manrope"><?= htmlspecialchars($current_product['name'] ?? 'Demo Product') ?></h2>
                        <div class="mb-6 flex flex-col sm:flex-row sm:items-center">
                            <h6 class="mr-5 border-gray-200 pr-5 text-2xl font-semibold leading-9 text-gray-900 font-manrope sm:border-r"><?= '₱' . htmlspecialchars(number_format($current_product['price'], 2)) ?></h6>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center gap-1">
                                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <svg class="<?= $i <= round($average_rating['average_rating']) ? 'fill-[#facc15]' : 'fill-[#CED5D8]' ?>" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_12029_1640)">
                                                <path
                                                        d="M9.10326 2.31699C9.47008 1.57374 10.5299 1.57374 10.8967 2.31699L12.7063 5.98347C12.8519 6.27862 13.1335 6.48319 13.4592 6.53051L17.5054 7.11846C18.3256 7.23765 18.6531 8.24562 18.0596 8.82416L15.1318 11.6781C14.8961 11.9079 14.7885 12.2389 14.8442 12.5632L15.5353 16.5931C15.6754 17.41 14.818 18.033 14.0844 17.6473L10.4653 15.7446C10.174 15.5915 9.82598 15.5915 9.53466 15.7446L5.91562 17.6473C5.18199 18.033 4.32456 17.41 4.46467 16.5931L5.15585 12.5632C5.21148 12.2389 5.10393 11.9079 4.86825 11.6781L1.94038 8.82416C1.34687 8.24562 1.67438 7.23765 2.4946 7.11846L6.54081 6.53051C6.86652 6.48319 7.14808 6.27862 7.29374 5.98347L9.10326 2.31699Z"
                                                        fill="#"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_12029_1640">
                                                    <rect width="20" height="20" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    <?php } ?>
                                    <span class="text-neutral-800"><?= round($average_rating['average_rating'] ?? 0) . '.0' ?></span>
                                </div>
                                <span class="pl-2 text-sm font-normal leading-7 text-gray-500"><?= htmlspecialchars($current_product['quantity_sold'] ?? '0') ?> sold</span>
                            </div>

                        </div>
                        <!--Product Description-->
                        <div x-cloak x-show="!open" id="product-description">
                            <?= substr(($current_product['description']), 0, 200) . ' ' ?>
                        </div>
                        <div x-cloak x-show="open" id="product-description">
                            <?= $current_product['description'] ?>
                        </div>
                        <span @click="open = !open" x-text="open ? 'Less...' : 'More...'" class="inline-block cursor-pointer text-orange-600"></span>
                        <ul class="mb-4 mt-4 grid gap-y-4">
                            <li class="flex items-center gap-3">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect width="26" height="26" rx="13" fill="#ea580c"/>
                                    <path
                                            d="M7.66669 12.629L10.4289 15.3913C10.8734 15.8357 11.0956 16.0579 11.3718 16.0579C11.6479 16.0579 11.8701 15.8357 12.3146 15.3913L18.334 9.37183"
                                            stroke="white" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                                <span class="text-sm font-normal text-gray-900">High Quality</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect width="26" height="26" rx="13" fill="#ea580c"/>
                                    <path
                                            d="M7.66669 12.629L10.4289 15.3913C10.8734 15.8357 11.0956 16.0579 11.3718 16.0579C11.6479 16.0579 11.8701 15.8357 12.3146 15.3913L18.334 9.37183"
                                            stroke="white" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                                <span class="text-sm font-normal text-gray-900">Timeless Design</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect width="26" height="26" rx="13" fill="#ea580c"/>
                                    <path
                                            d="M7.66669 12.629L10.4289 15.3913C10.8734 15.8357 11.0956 16.0579 11.3718 16.0579C11.6479 16.0579 11.8701 15.8357 12.3146 15.3913L18.334 9.37183"
                                            stroke="white" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                                <span class="text-sm font-normal text-gray-900">Comfortable Fit</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <rect width="26" height="26" rx="13" fill="#ea580c"/>
                                    <path
                                            d="M7.66669 12.629L10.4289 15.3913C10.8734 15.8357 11.0956 16.0579 11.3718 16.0579C11.6479 16.0579 11.8701 15.8357 12.3146 15.3913L18.334 9.37183"
                                            stroke="white" stroke-width="1.6" stroke-linecap="round"/>
                                </svg>
                                <span class="text-sm font-normal text-gray-900">All size is available</span>
                            </li>
                        </ul>
                        <p class="mb-4 text-base font-medium leading-8 text-gray-900">Available Sizes<span data-tooltip-target="tooltip-default"
                                                                                                           class="inline-block mx-2 bg-neutral-300 rounded-full px-3 cursor-pointer">?</span></p>
                        <div id="tooltip-default" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            <table border="1">
                                <thead>
                                <tr>
                                    <th>Size</th>
                                    <th>Chest (cm)</th>
                                    <th>Waist (cm)</th>
                                    <th>Hips (cm)</th>
                                    <th>Shoe Size</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Small (S)</td>
                                    <td>86-91</td>
                                    <td>71-76</td>
                                    <td>86-91</td>
                                    <td>5-6 (US)</td>
                                </tr>
                                <tr>
                                    <td>Medium (M)</td>
                                    <td>96-101</td>
                                    <td>81-86</td>
                                    <td>96-101</td>
                                    <td>7-8 (US)</td>
                                </tr>
                                <tr>
                                    <td>Large (L)</td>
                                    <td>106-111</td>
                                    <td>91-97</td>
                                    <td>106-111</td>
                                    <td>9-10 (US)</td>
                                </tr>
                                <tr>
                                    <td>Extra Large (XL)</td>
                                    <td>116-121</td>
                                    <td>102-107</td>
                                    <td>116-121</td>
                                    <td>11-12 (US)</td>
                                </tr>
                                <tr>
                                    <td>2X Large (2XL)</td>
                                    <td>127-132</td>
                                    <td>112-117</td>
                                    <td>127-132</td>
                                    <td>13-14 (US)</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <!-- Size Button-->
                        <div class="w-full flex-wrap border-b border-gray-100 pb-4">
                            <div class="grid max-w-md grid-cols-3 gap-3 min-[400px]:grid-cols-5">
                                <template x-for="sz in sizes">
                                    <template x-if="sizeReference[sz] != 0">
                                        <button @click="size = sz; changeMax()"
                                                x-text="sz"
                                                :class="{
                                                      'border-2 border-orange-500': sz === size,
                                                      'border border-gray-200': sz !== size,
                                                 }"
                                                class="flex w-full items-center justify-center rounded-full bg-white px-6 text-center text-base font-semibold leading-8 text-gray-900 transition-all duration-300 py-1 visited:border-orange-300 visited:bg-orange-50 hover:border-orange-300 hover:bg-orange-50 hover:shadow-sm hover:shadow-orange-100"></button>
                                    </template>
                                </template>
                            </div>
                        </div>

                        <form action="/cart" method="POST" class="grid grid-cols-1 gap-3 py-6 sm:grid-cols-2">
                            <div class="flex w-full sm:items-center sm:justify-center">
                                <input type="hidden" name="quantity" :value="quantity" x-ref="quant">
                                <input type="hidden" name="product_id" value="<?= $current_product['product_id'] ?>">
                                <input type="hidden" name="size" :value="size">
                                <button @click="quantity = quantity > 1 ? parseInt(quantity) - 1 : quantity"
                                        type="button"
                                        :class="quantity <= 1 ? 'opacity-50 cursor-not-allowed' : ''"
                                        class="rounded-l-full border border-gray-400 bg-white px-6 py-[14px] transition-all duration-300 group hover:bg-gray-50 hover:shadow-sm hover:shadow-gray-300">
                                    <svg class="stroke-gray-900 group-hover:stroke-black" width="22" height="22"
                                         viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round"/>
                                        <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                                              stroke-linecap="round"/>
                                        <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                                              stroke-linecap="round"/>
                                    </svg>
                                </button>
                                <label>
                                    <input type="text"
                                           x-model="quantity"
                                           disabled
                                           :value="quantity > max ? max : quantity"
                                           class="w-full cursor-pointer border-y border-gray-400 bg-transparent px-6 text-center text-base font-semibold text-gray-900 placeholder:text-gray-900 outline-0 py-[13px] hover:bg-gray-50 sm:max-w-[118px]"
                                           placeholder="1">
                                </label>
                                <button @click="quantity = quantity < max ? parseInt(quantity) + 1 : quantity"
                                        type="button"
                                        :class="quantity >= max ? 'opacity-50 cursor-not-allowed' : ''"
                                        class="rounded-r-full border border-gray-400 bg-white px-6 py-[14px] transition-all duration-300 group hover:bg-gray-50 hover:shadow-sm hover:shadow-gray-300">
                                    <svg class="stroke-gray-900 group-hover:stroke-black" width="22" height="22"
                                         viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="#9CA3AF" stroke-width="1.6"
                                              stroke-linecap="round"/>
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="black" stroke-opacity="0.2"
                                              stroke-width="1.6" stroke-linecap="round"/>
                                        <path d="M11 5.5V16.5M16.5 11H5.5" stroke="black" stroke-opacity="0.2"
                                              stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </div>
                            <?php if ($user ?? false) : ?>
                                <button type="submit"
                                        class="flex w-full items-center justify-center gap-2 rounded-full bg-orange-50 px-5 py-4 text-base font-semibold text-orange-600 transition-all duration-500 group hover:bg-orange-100">
                                    <svg class="stroke-orange-600" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M10.7394 17.875C10.7394 18.6344 10.1062 19.25 9.32511 19.25C8.54402 19.25 7.91083 18.6344 7.91083 17.875M16.3965 17.875C16.3965 18.6344 15.7633 19.25 14.9823 19.25C14.2012 19.25 13.568 18.6344 13.568 17.875M4.1394 5.5L5.46568 12.5908C5.73339 14.0221 5.86724 14.7377 6.37649 15.1605C6.88573 15.5833 7.61377 15.5833 9.06984 15.5833H15.2379C16.6941 15.5833 17.4222 15.5833 17.9314 15.1605C18.4407 14.7376 18.5745 14.0219 18.8421 12.5906L19.3564 9.84059C19.7324 7.82973 19.9203 6.8243 19.3705 6.16215C18.8207 5.5 17.7979 5.5 15.7522 5.5H4.1394ZM4.1394 5.5L3.66797 2.75"
                                                stroke="" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                    Add to cart
                                </button>
                            <?php else: ?>
                                <button type="button"
                                        @click="window.location.href = '/auth-redirect'"
                                        class="flex w-full items-center justify-center gap-2 rounded-full bg-orange-50 px-5 py-4 text-base font-semibold text-orange-600 transition-all duration-500 group hover:bg-orange-100">
                                    <svg class="stroke-orange-600" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M10.7394 17.875C10.7394 18.6344 10.1062 19.25 9.32511 19.25C8.54402 19.25 7.91083 18.6344 7.91083 17.875M16.3965 17.875C16.3965 18.6344 15.7633 19.25 14.9823 19.25C14.2012 19.25 13.568 18.6344 13.568 17.875M4.1394 5.5L5.46568 12.5908C5.73339 14.0221 5.86724 14.7377 6.37649 15.1605C6.88573 15.5833 7.61377 15.5833 9.06984 15.5833H15.2379C16.6941 15.5833 17.4222 15.5833 17.9314 15.1605C18.4407 14.7376 18.5745 14.0219 18.8421 12.5906L19.3564 9.84059C19.7324 7.82973 19.9203 6.8243 19.3705 6.16215C18.8207 5.5 17.7979 5.5 15.7522 5.5H4.1394ZM4.1394 5.5L3.66797 2.75"
                                                stroke="" stroke-width="1.6" stroke-linecap="round"/>
                                    </svg>
                                    Add to cart
                                </button>
                            <?php endif; ?>
                        </form>
                        <div class="flex items-center gap-3">
                            <form action="/wishlist" method="POST">
                                <input type="hidden" name="_method" value="<?= $in_wishlist ? 'DELETE' : 'POST' ?>">
                                <input type="hidden" name="product_id" value="<?= $current_product['product_id'] ?>">
                                <?php if ($user ?? false) : ?>
                                    <button type="submit"
                                            class="rounded-full bg-orange-50 p-4 transition-all duration-500 group hover:bg-orange-100 hover:shadow-sm hover:shadow-orange-300">
                                        <svg class="<?= $in_wishlist ? 'fill-orange-500' : 'fill-none' ?>" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                                            <path
                                                    d="M13 22S3 14 3 8C3 5 5 2 9 2C11 2 13 5 13 5C13 5 15 2 17 2C21 2 23 5 23 8C23 14 13 22 13 22Z"
                                                    fill="<?= $in_wishlist ? '#ea580c' : 'none' ?>" stroke="#ea580c" stroke-width="1.6" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                <?php else: ?>
                                    <button type="button"
                                            @click="window.location.href = '/auth-redirect'"
                                            class="rounded-full bg-orange-50 p-4 transition-all duration-500 group hover:bg-orange-100 hover:shadow-sm hover:shadow-orange-300">
                                        <svg class="<?= $in_wishlist ? 'fill-orange-500' : 'fill-none' ?>" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26">
                                            <path
                                                    d="M13 22S3 14 3 8C3 5 5 2 9 2C11 2 13 5 13 5C13 5 15 2 17 2C21 2 23 5 23 8C23 14 13 22 13 22Z"
                                                    fill="<?= $in_wishlist ? '#ea580c' : 'none' ?>" stroke="#ea580c" stroke-width="1.6" stroke-miterlimit="10"
                                                    stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                <?php endif; ?>
                            </form>
                            <form action="/cart" method="POST" class="w-full">
                                <input type="hidden" name="quantity" :value="quantity">
                                <input type="hidden" name="product_id" value="<?= $current_product['product_id'] ?>">
                                <input type="hidden" name="size" :value="size">
                                <?php if ($user ?? false) : ?>
                                    <button type="submit"
                                            class="flex w-full items-center justify-center bg-orange-500 px-5 py-4 text-center text-base font-semibold text-white shadow-sm transition-all duration-500 rounded-[100px] hover:bg-orange-700 hover:shadow-orange-400">
                                        Buy Now
                                    </button>
                                <?php else: ?>
                                    <button type="button"
                                            @click="window.location.href = '/auth-redirect'"
                                            class="flex w-full items-center justify-center bg-orange-500 px-5 py-4 text-center text-base font-semibold text-white shadow-sm transition-all duration-500 rounded-[100px] hover:bg-orange-700 hover:shadow-orange-400">
                                        Buy Now
                                    </button>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--    Reviews-->
    <section class="mb-8 lg:w-[70%] 2xl:w-[60%] p-6 font-[sans-serif] rounded-md">
        <h1 class="font-bold text-2xl mb-4">Product Ratings</h1>
        <!--        Ratings List-->
        <div class="grid lg:flex lg:justify-center lg:gap-x-8 items-center gap-">
            <div class="flex flex-col items-center justify-center max-sm:mb-2 my-4">
                <h3 class="font-extrabold text-4xl"><?= round($average_rating['average_rating'] ?? 0) . '.0' ?></h3>
                <div class="mt-4 text-center">
                    <div class="flex items-center gap-1">
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <svg class="w-3 <?= $i <= round($average_rating['average_rating']) ? 'fill-[#facc15]' : 'fill-[#CED5D8]' ?>  shrink-0" viewBox="0 0 14 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z"/>
                            </svg>
                        <?php } ?>
                    </div>
                    <p class="mt-1.5 text-gray-500 text-xs"><?= number_format(count($reviews_reference ?? [])) ?></p>
                </div>
            </div>
            <div class="space-y-1 lg:w-[50%]">
                <div class="flex items-center">
                    <p class="text-sm text-gray-500 font-bold">5.0</p>
                    <div class="bg-gray-300 rounded w-full h-3 ml-3">
                        <div class="w-[<?= htmlspecialchars(round($rating_percentage['five'] ?? 0) . '%') ?>] h-full rounded bg-[#facc15]"></div>
                    </div>
                    <p class="text-sm font-bold ml-3"><?= htmlspecialchars(round($rating_percentage['five'] ?? 0)) ?>%</p>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-500 font-bold">4.0</p>
                    <div class="bg-gray-300 rounded w-full h-3 ml-3">
                        <div class="w-[<?= htmlspecialchars(round($rating_percentage['four'] ?? 0) . '%') ?>] h-full rounded bg-[#facc15]"></div>
                    </div>
                    <p class="text-sm font-bold ml-3"><?= htmlspecialchars(round($rating_percentage['four'] ?? 0)) ?>%</p>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-500 font-bold">3.0</p>
                    <div class="bg-gray-300 rounded w-full h-3 ml-3">
                        <div class="w-[<?= htmlspecialchars(round($rating_percentage['three'] ?? 0) . '%') ?>] h-full rounded bg-[#facc15]"></div>
                    </div>
                    <p class="text-sm font-bold ml-3"><?= htmlspecialchars(round($rating_percentage['three'] ?? 0)) ?>%</p>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-500 font-bold">2.0</p>
                    <div class="bg-gray-300 rounded w-full h-3 ml-3">
                        <div class="w-[<?= htmlspecialchars(round($rating_percentage['two'] ?? 0) . '%') ?>] h-full rounded bg-[#facc15]"></div>
                    </div>
                    <p class="text-sm font-bold ml-3"><?= htmlspecialchars(round($rating_percentage['two'] ?? 0)) ?>%</p>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-500 font-bold">1.0</p>
                    <div class="bg-gray-300 rounded w-full h-3 ml-3">
                        <div class="w-[<?= htmlspecialchars(round($rating_percentage['one'] ?? 0) . '%') ?>] h-full rounded bg-[#facc15]"></div>
                    </div>
                    <p class="text-sm font-bold ml-3"><?= htmlspecialchars(round($rating_percentage['one'] ?? 0)) ?>%</p>
                </div>
            </div>
        </div>
        <hr class="border my-6"/>
        <!--        Reviews List-->
        <div class="">
            <h3 class="font-bold text-base">All Reviews(<?= count($reviews_reference ?? []) ?>)</h3>
            <div class="mt-6 space-y-8">
                <?php if ($reviews ?? false) : ?>
                    <?php foreach ($reviews as $review): ?>
                        <div class="flex items-start">
                            <img src="/public/images/default-profile.jpg" class="w-12 h-12 rounded-full border-2 border-white" alt=""/>
                            <div class="ml-3">
                                <h4 class="text-gray-800 text-sm font-bold"><?= htmlspecialchars(ucfirst(explode('@',$review['email'] ?? '')[0])) ?>
                                    <span><?= ($_SESSION['user']['user_id'] ?? '') == htmlspecialchars($review['user_id'] ?? '') ? '(me)' : '' ?></span></h4>
                                <div class="flex space-x-1 mt-1">
                                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <svg class="w-3 <?= $i <= $review['rating'] ? 'fill-[#facc15]' : 'fill-[#CED5D8]' ?>" viewBox="0 0 14 13" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z"/>
                                        </svg>
                                    <?php } ?>
                                    <span class="text-gray-500 text-xs !ml-2 font-semibold">(<?= htmlspecialchars($review['rating'] ?? 1) ?>)</span>
                                    <p class="text-gray-500 text-xs !ml-2 font-semibold"><?= htmlspecialchars((new DateTime($review['created_at']))->format('M d, Y | g:i a')) ?></p>
                                </div>
                                <p class="text-xs text-gray-500 mt-3 lg:text-md font-sans"><?= htmlspecialchars($review['comment'] ?? '') ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-sm text-neutral-700">No Reviews Available</p>
                <?php endif; ?>
                <hr class="w-full bg-neutral-600 my-1">
                <?php if ($reviews) : ?>
                    <a href="/reviews?id=<?= $_GET['id'] ?>" class="block mt-3 w-fit text-sm font-semibold text-neutral-700 border-b border-neutral-300 hover:text-neutral-900">Read all reviews ➥</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!--    You Might Like-->
    <div x-data="{ scrollLeft: 0 }" class="relative mb-8 w-full bg-white px-4 lg:w-[90%] 2xl:w-[60%]">
        <button @click="$refs.scrollContainer.scrollLeft = Math.max(0, $refs.scrollContainer.scrollLeft + 200); scrollLeft = $refs.scrollContainer.scrollLeft"
                class="absolute top-1/2 right-6 cursor-pointer rounded-full bg-white px-4 py-2 font-extrabold hover:bg-gray-300"> >
        </button>
        <button x-cloak x-show="scrollLeft > 0" @click="$refs.scrollContainer.scrollLeft = Math.max(0, $refs.scrollContainer.scrollLeft - 200); scrollLeft = $refs.scrollContainer.scrollLeft"
                class="absolute top-1/2 left-6 cursor-pointer rounded-full bg-white px-4 py-2 font-extrabold hover:bg-gray-300"> <
        </button>
        <h1 class="text-xl font-bold sm:text-3xl lg:mb-8"> You Might Also Like</h1>
        <div x-ref="scrollContainer" class="mt-4 grid w-full grid-flow-col gap-x-4 overflow-x-auto overflow-y-hidden scroll-smooth h-[50svh] sm:h-[40svh] lg:h-[50svh] 2xl:gap-x-8">
            <?php foreach ($hot_items as $item) : ?>
                <div @click="window.location.href= '/product?id=<?= $item['product_id'] ?>'" class="grid h-full cursor-pointer min-w-56 grid-rows-[68%_30%] 2xl:min-w-72">
                    <img src="<?= $item['cloud_url'] ?? '/public/images/demo.avif ' ?>" class="h-full w-full" alt="">
                    <div class="flex flex-col gap-y-1">
                        <p class="text-xs font-extrabold mt-1">TRENDING GIFT🔥</p>
                        <p class="text-sm font-semibold hover:underline"><?= htmlspecialchars($item['name'] ?? 'Product') ?></p>
                        <div class="flex items-center">
                            <svg class="h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="h-4 w-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="h-4 w-4 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <span class="text-sm text-neutral-600 ml-1 text-center">(<?= $item['quantity_sold'] ?? 0 ?>)</span>
                        </div>
                        <p class="text-sm font-semibold text-neutral-700"><?= '₱' . htmlspecialchars(number_format($item['price'], 2) ?? '0') ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        var swiper = new Swiper(".product-thumb", {
            loop: true,
            spaceBetween: 1,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,

        });
        var swiper2 = new Swiper(".product-prev", {
            loop: true,
            spaceBetween: 1,
            effect: "coverflow",
            thumbs: {
                swiper: swiper,
            },
            cubeEffect: {
                shadow: false,
                slideShadows: false
            }
        });
    </script>
<?php
require base_path("Http/views/partials/footer.php");
?>