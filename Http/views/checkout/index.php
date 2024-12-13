<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <form action="/checkout" method="POST" class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <?php require base_path("Http/views/partials/progress.php") ?>

            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                <div x-data={isOpen:false} class="min-w-0 flex-1 space-y-8">
                    <?php require base_path("Http/views/checkout/create.php") ?>
                    <!-- Delivery Address-->
                    <form class="space-y-4">
                        <input type="hidden" name="user_id" value="<?= $_SESSION['user']['user_id'] ?>">
                        <input type="hidden" name="primary" value="0">
                        <input type="hidden" name="shipping_address_id" value="<?= $selected_address['address_id'] ?? 0 ?>">
                        <input type="hidden" name="total" value="<?= round($cart['total'], 2) ?>">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details
                            <?php if ($success ?? false) : ?>
                                <span class="text-green-600 text-xs">(Address successfully modified)</span>
                            <?php endif; ?>
                            <?php if ($errors ?? false) : ?>
                                <span class="text-red-600 text-xs">(Invalid address)</span>
                            <?php endif; ?>
                        </h2>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <!-- Name-->
                            <div class="col-span-2 sm:col-span-1">
                                <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Name </label>
                                <input type="text" id="name" name="name"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                       value="<?= ($_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']) ?? '' ?>"
                                       placeholder="" required/>
                            </div>

                            <!-- Email-->
                            <div class="col-span-2 sm:col-span-1">
                                <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Email<span class="text-red-500">*</span> </label>
                                <input type="email" id="email" name="email"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                       value="<?= $_SESSION['user']['email'] ?? '' ?>"
                                       placeholder="" required/>
                            </div>

                            <!-- Country-->
                            <div class="col-span-2 sm:col-span-1">
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="country" class="block text-sm font-medium text-gray-900 dark:text-white"> Country<span class="text-red-500">*</span> </label>
                                </div>
                                <select id="country" name="country"
                                        class="<?= $selected_address ? 'bg-neutral-200' : '' ?> block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                >
                                    <option selected>Philippines</option>
                                    <option value="" disabled>We are working on expanding soon.</option>
                                </select>
                            </div>

                            <!-- Province-->
                            <div class="col-span-2 sm:col-span-1">
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="province" class="block text-sm font-medium text-gray-900 dark:text-white"> Province<span class="text-red-500">*</span> </label>
                                </div>
                                <input id="province" name="province"
                                       class="<?= $selected_address ? 'bg-neutral-200' : '' ?> block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                       value="<?= htmlspecialchars($selected_address['province'] ?? '') ?>"
                                    <?= $selected_address ? 'readonly' : '' ?>
                                       required>
                            </div>

                            <!-- City-->
                            <div class="col-span-2 sm:col-span-1">
                                <label for="city" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">City<span class="text-red-500">*</span></label>
                                <label>
                                    <input type="text" name="city"
                                           class="<?= $selected_address ? 'bg-neutral-200' : '' ?> block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           value="<?= htmlspecialchars($selected_address['city'] ?? '') ?>"
                                        <?= $selected_address ? 'readonly' : '' ?>
                                           placeholder="" required/>
                                </label>
                            </div>

                            <!-- Zip Code-->
                            <div class="col-span-2 sm:col-span-1">
                                <label for="zip_code" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Zip Code<span class="text-red-500">*</span></label>
                                <label>
                                    <input type="number" name="zip_code"
                                           class="<?= $selected_address ? 'bg-neutral-200' : '' ?> block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           value="<?= htmlspecialchars($selected_address['zip_code'] ?? '') ?>"
                                        <?= $selected_address ? 'readonly' : '' ?>
                                           placeholder="" required/>
                                </label>
                            </div>

                            <!-- Street Address-->
                            <div class="col-span-2">
                                <label for="street_address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Street Address*</label>
                                <label>
                                    <input type="text" name="street_address"
                                           class="<?= $selected_address ? 'bg-neutral-200' : '' ?> block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           value="<?= htmlspecialchars($selected_address['street_address'] ?? '') ?>"
                                        <?= $selected_address ? 'readonly' : '' ?>
                                           placeholder="" required/>
                                </label>
                            </div>

                            <!-- Customer Notes-->
                            <div class="col-span-2">
                                <label for="" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Your Notes</label>
                                <textarea name="notes" id="" cols="30" rows="5"
                                          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                </textarea>
                            </div>

                            <div class="col-span-2">
                                <button @click="isOpen=!isOpen; console.log('bruh')" type="button"
                                        class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                    Pick from existing address
                                </button>
                            </div>
                        </div>
                    </form>

                    <!--  Payment-->
                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <!-- Credit Card-->
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="credit-card" aria-describedby="credit-card-text" type="radio" name="payment-method" value="credit_card"
                                               class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                               checked/>
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="credit-card" class="font-medium leading-none text-gray-900 dark:text-white"> Credit Card </label>
                                        <p id="credit-card-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Pay with your credit card</p>
                                    </div>
                                </div>

                                <div class="mt-4 flex items-center gap-2">
                                    <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">VISA</button>

                                    <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                                    <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Mastercard</button>
                                </div>
                            </div>
                            <!-- Cash on Delivery-->
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="paypal-2" aria-describedby="paypal-text" type="radio" name="payment-method" value="cash_on_delivery"
                                               class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"/>
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="paypal-2" class="font-medium leading-none text-gray-900 dark:text-white"> Cash on Delivery </label>
                                        <p id="paypal-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400"> Payment during the delivery </p>
                                    </div>
                                </div>

                                <div class="mt-4 flex items-center gap-2">
                                    <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">CASH</button>

                                    <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                                    <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Courier</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  Courier -->
                    <div class="space-y-4">
                        <h3 class="flex items-center text-xl font-semibold text-gray-900 dark:text-white">Delivery Methods <span class="text-xs text-neutral-500 mx-1">(Note: Delivery price is subject to change)</span>
                        </h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="dhl" aria-describedby="dhl-text" type="radio" name="delivery-method" value=""
                                               class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                               checked/>
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="dhl" class="font-medium leading-none text-gray-900 dark:text-white"> ₱150 - LBC Courier </label>
                                        <p id="dhl-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Delivery before <?= date("F j, Y", strtotime("+7 days")) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--  Order Summary-->
                <div class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                    <div class="flow-root">
                        <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">₱<?= number_format($cart['subtotal'] ?? '0', 2) ?></dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                <dd class="text-base font-medium  text-gray-900">₱0</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Delivery Fee</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">₱150</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">₱<?= number_format($cart['tax'] ?? '0', 2) ?></dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">₱<?= number_format($cart['total'] ?? '0', 2) ?></dd>
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button type="submit"
                                class="flex w-full items-center justify-center rounded-lg px-5 text-sm font-medium text-white bg-primary-700 py-2.5 hover:bg-primary-800 focus:ring-primary-300 focus:outline-none focus:ring-4 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Place Order
                        </button>

                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Missed something? Check out more exclusive items <a href="/new" title=""
                                                                                                                                            class="font-medium underline text-primary-700 hover:no-underline dark:text-primary-500">Continue
                                Shopping.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php
require base_path("Http/views/partials/footer.php");
?>