<div x-show="accountExpanded"
     x-cloak
     x-collapse
     x-anchor.bottom-end="$refs.accountButton"
     @click.away="accountExpanded = false"
     class="z-10 w-fit bg-white divide-y divide-gray-100 rounded-sm shadow dark:bg-gray-700 mt-2">
    <div class="text-sm text-black flex flex-col items-center mb-4">
        <div class="flex flex-col gap-y-2 gap-x-1 my-2 mx-4 text-neutral-700">
            <p class="block py-2 font-bold">My Account</p>
            <a href="" class="text-xs hover:underline">My Dashboard</a>
            <a href="" class="text-xs hover:underline">Order History</a>
            <a href="" class="text-xs hover:underline">Profile</a>
            <a href="" class="text-xs hover:underline">Payment Methods</a>
            <a href="" class="text-xs hover:underline">Addresses</a>
            <a href="" class="text-xs hover:underline">Saved Items</a>
            <a href="" class="text-xs hover:underline">Log Out</a>
        </div>
    </div>
</div>