<!-- Main modal -->
<div x-cloak
     x-show="isOpen"
     @click.away="isOpen = false"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     tabindex="-1"
     class="overflow-y-auto overflow-x-hidden fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div @click.away="isOpen = false"
         x-show="isOpen"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-4">
            <div x-data={isOpen:false} class="mx-auto space-y-4 flex items-center flex-col">
                <h1 class="text-md self-center font-bold">Saved addresses</h1>
                <?php if ($addresses ?? false) : ?>
                    <?php foreach ($addresses as $address) : ?>
                        <div @click="window.location.href = '/checkout?address=<?= $address['address_id'] ?>'" class="w-full rounded-md border border-neutral-200 p-4 hover:bg-neutral-100 hover:cursor-pointer">
                            <p class="text-xs font-semibold">Address</p>
                            <p><?= htmlspecialchars($address['street_address']) . ', ' ?? '' ?>
                                <span><?= htmlspecialchars($address['city']) . ', ' ?? '' ?></span>
                                <span><?= htmlspecialchars($address['province']) . ' ' ?? '' ?></span>
                            </p>
                            <p class="text-sm italic"><?= htmlspecialchars($address['zip_code']) ?? '' ?></p>
                            <p class="text-sm"><?= htmlspecialchars($address['country']) ?? '' ?></p>
                            <p class="<?= $address['is_default'] ? 'text-orange-500' : 'opacity-75' ?> text-sm"><?= htmlspecialchars($address['is_default'] ? 'Default Address' : 'Not Default Address') ?? '' ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h1>You don't have any saved address.</h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>