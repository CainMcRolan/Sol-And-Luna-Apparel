<div x-show="navOpen"
     x-cloak
     x-collapse
     x-anchor.bottom="$refs.navButton"
     @click.away="accountExpanded = false"
     class="z-10 w-full bg-white divide-y divide-gray-100 rounded-sm shadow dark:bg-gray-700 lg:hidden">
    <div class="h-[calc(100vh-100px)] text-sm w-full p-4  gap-y-2 text-black flex flex-col">
        <div class="flex py-2 gap-x-2">
            <a href="/profile" class="block  text-base hover:underline">My Profile</a>
        </div>
        <div class="flex py-2 gap-x-2">
            <a href="/order-history" class="block  text-base hover:underline">Order History</a>
        </div>
        <div class="flex py-2 gap-x-2">
            <a href="/payment-methods" class="block text-base hover:underline">Payment Methods</a>
        </div>
        <div class="flex py-2 gap-x-2">
            <a href="/addresses" class="block  text-base hover:underline">Addresses</a>
        </div>
        <div class="flex py-2 gap-x-2">
            <a href="/wishlist" class="block  text-base hover:underline">Saved Items</a>
        </div>
    </div>
</div>