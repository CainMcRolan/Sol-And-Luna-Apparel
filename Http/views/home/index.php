<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <!--    Section 1 - Introduction-->
    <?php if ($_SESSION['user'] ?? false) : ?>
        <h1 class="text-xs bg-[#1d1d1d] py-1 text-white w-full text-center"><?= "Welcome Back " . $_SESSION['user']['first_name'] ?></h1>
    <?php endif; ?>
    <div class="w-full h-[calc(100svh-100px)] sm:h-fit mb-8 sm:mb-16">
        <img src="/public/images/homepage.avif" alt="" class="sm:hidden">
        <img src="/public/images/homepage-2.avif" alt="" class="hidden sm:block">
        <div class="flex w-full flex-col items-center justify-center">
            <p class="mt-6 text-sm font-medium sm:text-md sm:mt-10 sm:font-semibold lg:mt-4 2xl:mt-6">S&L Holiday Gift Guide '24</p>
            <h1 class="text-4xl font-barlow sm:text-6xl">WE KNOW ATHLETES</h1>
            <p class="mt-4 text-sm sm:text-md sm:my-8 sm:font-semibold sm:text-gray-900 lg:my-4 2xl:my-8">Performance solution for every athlete in your list.</p>
            <div class="mt-6 flex flex-col gap-y-4 text-sm sm:mt-0 sm:flex-row sm:gap-x-4">
                <a href="/new" class="rounded-md bg-neutral-900 px-20 py-3 font-semibold text-white hover:bg-black sm:px-15 text-center">Shop Now</a>
                <a href="/gifts" class="rounded-md bg-neutral-900 px-20 py-3 font-semibold text-white hover:bg-black sm:px-15">Explore Top Gifts</a>
            </div>
        </div>
    </div>

    <!--    Gifts link-->
    <div class="mb-8 w-full bg-white px-4 sm:mb-12 lg:w-[90%] 2xl:w-[60%]" data-aos="fade-up" data-aos-duration="1000">
        <h1 class="text-xl font-bold sm:text-3xl lg:mb-8">Gifts for Everyone On Your List</h1>
        <div class="mt-4 grid grid-cols-2 gap-4 gap-y-6 sm:grid-cols-4">
            <div class="h-full w-full cursor-pointer gap-y-4 grid-rows-[70%_20%]">
                <img src="/public/images/shop-men.avif" alt="">
                <a href="/men" class="py-2 pb-2 text-sm font-semibold text-gray-500 underline hover:border-gray-800 hover:text-gray-800">Shop Men</a>
            </div>
            <div class="h-full w-full cursor-pointer gap-y-4 grid-rows-[70%_20%]">
                <img src="/public/images/shop-women.avif" alt="">
                <a href="/women" class="py-2 pb-2 text-sm font-semibold text-gray-500 underline hover:border-gray-800 hover:text-gray-800">Shop Women</a>
            </div>
            <div class="h-full w-full cursor-pointer gap-y-4 grid-rows-[70%_20%]">
                <img src="/public/images/shop-boys.avif" alt="">
                <a href="/kids" class="py-2 pb-2 text-sm font-semibold text-gray-500 underline hover:border-gray-800 hover:text-gray-800">Shop Boys</a>
            </div>
            <div class="h-full w-full cursor-pointer gap-y-4 grid-rows-[70%_20%]">
                <img src="/public/images/shop-girls.avif" alt="">
                <a href="/kids" class="py-2 pb-2 text-sm font-semibold text-gray-500 underline hover:border-gray-800 hover:text-gray-800">Shop Girls</a>
            </div>
        </div>
    </div>

    <!--    Advertisement Parallax-->
    <div class="mt-12 mb-8 w-full bg-white 2xl:w-[70%]">
        <img src="/public/images/coldgear.avif" alt="" class="sm:hidden">
        <img src="/public/images/coldgear-sm.avif" alt="" class="hidden sm:block">
        <div class="flex w-full flex-col items-center justify-center p-4 sm:my-8">
            <h1 class="text-center text-4xl font-barlow sm:text-6xl">UA COLDGEAR® BASELAYER</h1>
            <p class="mt-4 text-center text-sm sm:my-8">Second-skin feel, sweat-wicking, and just warm enough so you can keep pushing—even in the dead of Winter.</p>
            <div class="mt-6 flex flex-col gap-y-4 text-sm sm:mt-0 sm:flex-row sm:gap-x-4">
                <button class="rounded-md bg-neutral-900 px-20 py-3 font-semibold text-white hover:bg-black sm:px-15">Shop Men</button>
                <button class="rounded-md bg-neutral-900 px-20 py-3 font-semibold text-white hover:bg-black sm:px-15">Shop Women</button>
            </div>
        </div>
    </div>

    <!--    Shop Trending / Hot Apparel-->
    <div x-data="{ scrollLeft: 0 }" class="relative mb-8 w-full bg-white px-4 lg:w-[90%] 2xl:w-[60%]" data-aos="fade-left" data-aos-duration="1000">
        <button @click="$refs.scrollContainer.scrollLeft = Math.max(0, $refs.scrollContainer.scrollLeft + 200); scrollLeft = $refs.scrollContainer.scrollLeft"
                class="absolute top-1/2 right-6 cursor-pointer rounded-full bg-white px-4 py-2 font-extrabold hover:bg-gray-300"> >
        </button>
        <button x-cloak x-show="scrollLeft > 0" @click="$refs.scrollContainer.scrollLeft = Math.max(0, $refs.scrollContainer.scrollLeft - 200); scrollLeft = $refs.scrollContainer.scrollLeft"
                class="absolute top-1/2 left-6 cursor-pointer rounded-full bg-white px-4 py-2 font-extrabold hover:bg-gray-300"> <
        </button>
        <h1 class="text-xl font-bold sm:text-3xl lg:mb-8">Shop Trending Apparel</h1>
        <div x-ref="scrollContainer" class="mt-4 grid w-full grid-flow-col gap-x-4 overflow-x-auto overflow-y-hidden scroll-smooth h-[50svh] sm:h-[40svh] lg:h-[50svh] 2xl:gap-x-8">
            <template x-for="i in 10">
                <div class="grid h-full cursor-pointer min-w-56 grid-rows-[68%_30%] 2xl:min-w-72">
                    <img src="/public/images/demo.avif" class="h-full w-full" alt="">
                    <div class="flex flex-col gap-y-1">
                        <p class="text-xs font-extrabold">TOP GIFT</p>
                        <p class="text-sm font-semibold hover:underline">Product Name</p>
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
                        </div>
                        <p class="text-sm font-semibold text-gray-700">₱55</p>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!--    Advertisement Parallax 2-->
    <div class="mt-12 mb-8 w-full bg-white 2xl:w-[70%]">
        <img src="/public/images/banner-sm.avif" alt="" class="sm:hidden">
        <img src="/public/images/banner.avif" alt="" class="hidden sm:block">
        <div class="flex w-full flex-col items-center justify-center p-4">
            <h1 class="text-center text-4xl font-barlow">FOOTBALL FLYAWAY SWEEPSTAKES</h1>
            <p class="mt-4 text-center text-sm">Order worth ₱5000 to enter for a chance to win an all-expenses-paid trip to Maryland on 12/14 to see The Army-Navy Game presented by USAA, including a
                full weekend full of special experiences. </p>
            <div class="mt-6 flex flex-col gap-y-4 text-sm">
                <a href="/new" class="rounded-md bg-neutral-900 px-20 py-3 font-semibold text-white hover:bg-black text-center">Shop Now</a>
            </div>
        </div>
    </div>

    <!--    Shop Top / Hot Gifts-->
    <div x-data="{ scrollLeft: 0 }" class="relative mb-12 w-full bg-white px-4 lg:w-[90%] 2xl:w-[60%]" data-aos="fade-right" data-aos-duration="1000">
        <button @click="$refs.scrollContainer.scrollLeft = Math.max(0, $refs.scrollContainer.scrollLeft + 200); scrollLeft = $refs.scrollContainer.scrollLeft"
                class="absolute top-1/2 right-6 cursor-pointer rounded-full bg-white px-4 py-2 font-extrabold hover:bg-gray-300"> >
        </button>
        <button x-cloak x-show="scrollLeft > 0" @click="$refs.scrollContainer.scrollLeft = Math.max(0, $refs.scrollContainer.scrollLeft - 200); scrollLeft = $refs.scrollContainer.scrollLeft"
                class="absolute top-1/2 left-6 cursor-pointer rounded-full bg-white px-4 py-2 font-extrabold hover:bg-gray-300"> <
        </button>
        <h1 class="text-xl font-bold sm:text-3xl lg:mb-8">Shop Top Gifts</h1>
        <div x-ref="scrollContainer" class="mt-4 grid w-full grid-flow-col gap-x-4 overflow-x-auto overflow-y-hidden scroll-smooth h-[50svh] sm:h-[40svh] lg:h-[50svh] 2xl:gap-x-8">
            <template x-for="i in 10">
                <div class="grid h-full cursor-pointer min-w-56 grid-rows-[68%_30%] 2xl:min-w-72">
                    <img src="/public/images/demo.avif" class="h-full w-full" alt="">
                    <div class="flex flex-col gap-y-1">
                        <p class="text-xs font-extrabold">TOP GIFT</p>
                        <p class="text-sm font-semibold hover:underline">Product Name</p>
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
                        </div>
                        <p class="text-sm font-semibold text-gray-700">₱55</p>
                    </div>
                </div>
            </template>
        </div>
    </div>

<?php
require base_path("Http/views/partials/footer.php");
?>