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
                    <h1 class="hidden lg:block font-semibold text-2xl"><?= get_page_title() ?></h1>
                    <div class="container w-full pb-8">
                        <div class="space-y-8">
                            <!-- Header -->
                            <div>
                                <p class="mt-1 text-sm text-gray-500">Use a permanent address where you can receive mail.</p>
                            </div>

                            <!-- Avatar Section -->
                            <div class="flex items-center gap-8">
                                <img src="/public/images/Kuromi.jpg" alt="Profile picture" class="rounded-full w-24 h-24 object-cover bg-gray-100">
                                <div class="space-y-2">
                                    <button class="text-sm underline font-medium text-neutral-700 hover:text-black hover:no-underline">
                                        Change avatar
                                    </button>
                                    <p class="text-xs text-gray-500">JPG, GIF, AVIF or PNG. 2MB max.</p>
                                </div>
                            </div>

                            <!-- Form -->
                            <form class="space-y-6">
                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <div>
                                        <label for="firstName" class="block text-sm font-medium text-gray-700">First name</label>
                                        <input type="text" id="firstName" name="firstName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                    </div>

                                    <div>
                                        <label for="lastName" class="block text-sm font-medium text-gray-700">Last name</label>
                                        <input type="text" id="lastName" name="lastName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                        <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">example.com/</span>
                                            <input type="text" id="username" name="username" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                        <input type="tel" id="phone" name="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                        <select id="country" name="country" class="mt-b p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                            <option selected value="Philippines">Philippines</option>
                                            <option value="" disabled>We'll be expanding soon.</option>
                                        </select>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="timezone" class="block text-sm font-medium text-gray-700">Timezone</label>
                                        <select id="timezone" name="timezone" class="mt-1 p-2  block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                            <option selected value="pst">Pacific Standard Time</option>
                                            <option value="" disabled>We'll be expanding soon.</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Password Section -->
                                <div class="space-y-6 pt-6">
                                    <div>
                                        <h2 class="text-xl font-semibold text-gray-900">Change Password</h2>
                                        <p class="mt-1 text-sm text-gray-500">Update your password to keep your account secure.</p>
                                    </div>

                                    <div class="space-y-4">
                                        <div>
                                            <label for="current-password" class="block text-sm font-medium text-gray-700">Current password</label>
                                            <input type="password" id="current-password" name="current-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="new-password" class="block text-sm font-medium text-gray-700">New password</label>
                                            <input type="password" id="new-password" name="new-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                        </div>

                                        <div>
                                            <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm password</label>
                                            <input type="password" id="confirm-password" name="confirm-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-neutral-500 focus:ring-neutral-500 sm:text-sm">
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-6">
                                    <button type="submit" class="w-full rounded-md bg-neutral-800 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </section>
<?php
require base_path("Http/views/partials/footer.php");
?>