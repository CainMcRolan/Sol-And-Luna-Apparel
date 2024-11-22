<div x-show="accountExpanded"
     x-cloak
     x-collapse
     x-anchor.bottom-end="$refs.accountButton"
     @click.away="accountExpanded = false"
     class="z-10 w-fit bg-white divide-y divide-gray-100 rounded-sm shadow dark:bg-gray-700 mt-2">
    <div class="text-sm text-black flex flex-col items-center mb-4">
        <div class="flex flex-col gap-y-2 gap-x-1 my-2 mx-4 text-neutral-700">
            <p class="block py-2 font-bold">My Account</p>
            <a href="/profile" class="text-xs hover:underline">My Profile</a>
            <a href="/order-history" class="text-xs hover:underline">Order History</a>
            <a href="/payment-methods" class="text-xs hover:underline">Payment Methods</a>
            <a href="/addresses" class="text-xs hover:underline">Addresses</a>
            <a href="/wishlist" class="text-xs hover:underline">Saved Items</a>
            <form action="/logout" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="text-xs hover:underline">Log Out</button>
            </form>
        </div>
    </div>
</div>