<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <section class="w-full flex flex-col justify-center items-center md:p-12 gap-y-3">
        <?php require base_path("Http/views/partials/profile/nav.php") ?>
        <article class="flex gap-x-16 w-full md:w-[80%] 2xl:w-[60%]">
            <aside class="hidden lg:block pt-16">
                <?php require base_path('Http/views/partials/profile/aside.php') ?>
            </aside>
            <section class="antialiased w-full dark:bg-gray-900">
                <div class="mx-auto w-full  px-4 2xl:px-0">
                    <h1 class="hidden lg:flex font-semibold text-2xl items-center"><?= get_page_title() ?></h1>
                    <div class="container w-full pb-8">
                        <form action="/profile" method="POST" class="space-y-8">
                            <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                            <input type="hidden" name="is_social" value="<?= $user['socials'] ?? false ?>">
                            <input type="hidden" name="_method" value="PATCH">
                            <!-- Header -->
                            <div>
                                <p class="mt-1 text-sm text-gray-500">Use a permanent address where you can receive mail.
                                    <?php if ($success ?? false) : ?>
                                        <span class="mx-2 text-green-600 text-xs">(Profile Successfully Updated)</span>
                                    <?php endif; ?>
                                    <?php if ($errors ?? false) : ?>
                                        <span class="mx-2 text-red-600 text-xs">(Error in Updating Profile)</span>
                                    <?php endif; ?>
                                </p>
                            </div>

                            <!-- Avatar Section -->
                            <div class="flex items-center gap-8">
                                <img src="<?= $user_image ? $user_image : '/public/images/default-profile.jpg' ?>" alt="" class="rounded-full w-24 h-24 object-cover bg-gray-100">
                                <div class="space-y-2">

                                    <!-- Custom Button -->
                                    <p class="text-sm underline font-medium text-neutral-700 hover:text-black hover:no-underline cursor-pointer">
                                        <?= 'Welcome ' . ($user_first_name ?? '') . ' ' . ($user_last_name ?? '') ?>
                                    </p>

                                    <p class="text-xs text-gray-500">Edit your profile information here.</p>
                                    <p class="text-red-600 text-xs"><?= $errors['image'] ?? false ? 'Invalid image' : '' ?></p>
                                </div>
                            </div>

                            <!--  Personal Details Section-->
                            <div class="space-y-6">
                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <div>
                                        <label for="firstName" class="block text-sm font-medium text-gray-700">First name</label>
                                        <input type="text" value="<?= $user_first_name ?? '' ?>" id="firstName" name="first_name"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                        <p class="text-red-600 m-1 text-xs"><?= $errors['first_name'] ?? false ? 'Invalid first name' : '' ?></p>
                                    </div>

                                    <div>
                                        <label for="lastName" class="block text-sm font-medium text-gray-700">Last name</label>
                                        <input type="text" value="<?= $user_last_name ?? '' ?>" id="lastName" name="last_name"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                        <p class="text-red-600 m-1 text-xs"><?= $errors['last_name'] ?? false ? 'Invalid last name' : '' ?></p>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                        <input data-tooltip-target="tooltip-left" data-tooltip-placement="left" type="email" <?= $user['socials'] ?? false ? 'disabled' : '' ?>
                                               value="<?= $user_email ?? '' ?>" id="email" name="email"
                                               class="<?= $user['socials'] ?? false ? 'opacity-50 cursor-not-allowed' : '' ?> mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                        <p class="text-red-600 m-1 text-xs"><?= $errors['email'] ?? false ? 'Invalid Email' : '' ?></p>
                                        <div id="tooltip-left" role="tooltip"
                                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Email unavailable on social login
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                        <input type="text" value="<?= $user_phone ?>" id="phone" name="phone"
                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                        <p class="text-red-600 m-1 text-xs"><?= $errors['phone'] ?? false ? 'Invalid Phone Number' : '' ?></p>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                        <select id="country" name="country"
                                                class="cursor-pointer mt-b p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                            <option selected value="Philippines">Philippines</option>
                                            <option value="" disabled>We'll be expanding soon.</option>
                                        </select>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="timezone" class="block text-sm font-medium text-gray-700">Timezone</label>
                                        <select id="timezone" name="timezone"
                                                class="cursor-pointer mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                            <option selected value="pst">Pacific Standard Time</option>
                                            <option value="" disabled>We'll be expanding soon.</option>
                                        </select>
                                    </div>
                                </div>

                                <?php if ($user['socials'] ?? false) : ?>
                                <?php else : ?>
                                    <!-- Password Section -->
                                    <div class="space-y-6 pt-6">
                                        <div>
                                            <h2 class="text-xl font-semibold text-gray-900">Change Password</h2>
                                            <p class="mt-1 text-sm text-gray-500">Update your password to keep your account secure.</p>
                                        </div>

                                        <div class="space-y-4">
                                            <div>
                                                <label for="current-password" class="block text-sm font-medium text-gray-700">Current password</label>
                                                <input type="password" id="current-password" name="current_password"
                                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                                <p class="text-red-600 m-1 text-xs"><?= $errors['current_password'] ?? false ? 'Wrong password' : '' ?></p>
                                            </div>

                                            <div>
                                                <label for="new-password" class="block text-sm font-medium text-gray-700">New password</label>
                                                <input type="password" id="new-password" name="new_password"
                                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                                <p class="text-red-600 m-1 text-xs"><?= $errors['new_password'] ?? false ? 'Invalid password' : '' ?></p>
                                            </div>

                                            <div>
                                                <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm password</label>
                                                <input type="password" id="confirm-password" name="confirm_password"
                                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                                <p class="text-red-600 m-1 text-xs"><?= $errors['confirm_password'] ?? false ? 'Invalid password' : '' ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="pt-6">
                                    <button type="submit"
                                            class="w-full rounded-md bg-neutral-800 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </article>
    </section>
<?php
require base_path("Http/views/partials/footer.php");
?>