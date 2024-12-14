<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <section class="flex w-full flex-col items-center justify-center gap-y-3 md:p-12">
        <?php require base_path("Http/views/partials/profile/nav.php") ?>
        <article class="flex w-full gap-x-16 md:w-[80%] 2xl:w-[60%]">
            <aside class="hidden pt-16 lg:block">
                <?php require base_path('Http/views/partials/profile/aside.php') ?>
            </aside>
            <section class="w-full antialiased dark:bg-gray-900">
                <div class="mx-auto w-full px-4 2xl:px-0">
                    <h1 class="hidden text-2xl font-semibold lg:block"><?= get_page_title() ?></h1>
                    <div x-data={isOpen:false} class="mx-auto mt-6 space-y-4">
                        <?php if ($success ?? false) : ?>
                            <span class="text-green-600 text-xs">(Address successfully modified)</span>
                        <?php endif; ?>
                        <?php if ($errors ?? false) : ?>
                            <span class="text-red-600 text-xs">(Invalid address)</span>
                        <?php endif; ?>
                        <?php if ($addresses ?? false) : ?>
                            <?php foreach ($addresses as $address) : ?>
                                <div class="w-full rounded-md border border-neutral-200 p-4 hover:bg-neutral-100 hover:cursor-pointer">
                                    <p class="text-xs font-semibold"><?= 'Address ' . htmlspecialchars($address['address_id']) ?? '' ?></p>
                                    <p><?= htmlspecialchars($address['street_address']) . ', ' ?? '' ?>
                                        <span><?= htmlspecialchars($address['city']) . ', ' ?? '' ?></span>
                                        <span><?= htmlspecialchars($address['province']) . ' ' ?? '' ?></span>
                                    </p>
                                    <p class="text-sm italic"><?= htmlspecialchars($address['zip_code']) ?? '' ?></p>
                                    <p class="text-sm"><?= htmlspecialchars($address['country']) ?? '' ?></p>
                                    <p class="<?= $address['is_default'] ? 'text-orange-500' : 'opacity-75' ?> text-sm"><?= htmlspecialchars($address['is_default'] ? 'Default Address' : 'Not Default Address') ?? '' ?></p>
                                    <?php if ($address['order_count'] == 0) : ?>
                                        <form action="/addresses" method="POST" class="">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="address_id" value="<?= htmlspecialchars($address['address_id']) ?>">
                                            <button type="submit" class="underline text-sm text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    <?php else: ?>
                                        <h1 class="text-xs text-neutral-600">Address in use</h1>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; ?>
                            <?php if (count($addresses) < 3) : ?>
                                <?php require base_path("Http/views/addresses/create.php") ?>
                                <button @click="isOpen = !isOpen" class="text-sm text-neutral-800 underline">Add New Address</button>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php require base_path("Http/views/addresses/create.php") ?>
                            <h1>You don't have any saved address.</h1>
                            <button @click="isOpen = !isOpen" class="text-sm text-neutral-800 underline">Add New Address</button>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </article>
    </section>
<?php
require base_path("Http/views/partials/footer.php");
?>