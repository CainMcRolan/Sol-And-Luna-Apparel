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
                    <div class="mx-auto mt-6 space-y-4">
                        <h1 class="mb-10">You don't have any saved payment methods.</h1>
                    </div>
                </div>
            </section>
        </article>
    </section>
<?php
require base_path("Http/views/partials/footer.php");
?>