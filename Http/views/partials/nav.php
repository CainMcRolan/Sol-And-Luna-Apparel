<!--Navigation-->
<nav x-data id="header-top"
     class="h-[60px]  w-full text-xs flex justify-center gap-x-4 text-white bg-[#1d1d1d] border-b border-white sm:grid sm:justify-items-center sm:items-center sm:grid-cols-[20%_55%_20%] md:grid-cols-[20%_40%_20%] 2xl:grid-cols-[30%_30%_30%] md:text-sm sm:justify-around">
    <!--    Aside Choices (Mobile View)-->
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
            type="button"
            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="#8f8f8f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <!--        Logo-->
    <div class="flex items-center">
        <a href="/home"><img src="/public/images/logo-white.svg" class="w-10 h-10 sm:w-12 sm:h-12" alt=""></a>
    </div>
    <!--        Choices (Desktop View)-->
    <div class="hidden sm:flex gap-x-6 items-center">
        <a href="/new" class="font-semibold hover:border-b-2 hover:border-white cursor-pointer transition text-md 2xl:text-[1rem] text-center">New & Featured🔥</a>
        <a href="/men" class="font-semibold hover:border-b-2 hover:border-white cursor-pointer transition text-md 2xl:text-[1rem]">Men</a>
        <a href="/women" class="font-semibold hover:border-b-2 hover:border-white cursor-pointer transition text-md 2xl:text-[1rem]">Women</a>
        <a href="/kids" class="font-semibold hover:border-b-2 hover:border-white cursor-pointer transition text-md 2xl:text-[1rem]">Kids</a>
        <a href="/shoes" class="font-semibold hover:border-b-2 hover:border-white cursor-pointer transition text-md 2xl:text-[1rem]">Shoes</a>
        <a href="/gifts" class="font-semibold hover:border-b-2 hover:border-white cursor-pointer transition text-md 2xl:text-[1rem]">Gifts</a>
        <a href="/jewelry" class="font-semibold hover:border-b-2 hover:border-white cursor-pointer transition text-md 2xl:text-[1rem]">Jewelry</a>
    </div>
    <!--        Search Bar n Shit-->
    <form class="flex items-center gap-x-4">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Search T-shirts, Dress..." required/>
        </div>
        <!--        Wishlist SVG-->
        <svg @click="window.location.href = '/wishlist'" class="cursor-pointer hover:fill-white" width="26px" height="26px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"
                      stroke="#ffffff" stroke-width="1.224" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
        </svg>
        <!--            Cart SVG-->
        <svg @click="window.location.href = '/cart'" class="cursor-pointer hover:fill-white" width="26px" height="26x" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                      stroke="#ffffff" stroke-width="1.104" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
        </svg>
    </form>
</nav>