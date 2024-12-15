<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <!--    Reviews-->
    <section class="mb-8 lg:w-[70%] 2xl:w-[60%] p-6 font-[sans-serif] rounded-md">
        <a href="/product?id=<?= $_GET['id'] ?>" class="underline text-sm text-neutral-800 hover:no-underline">Return to Product</a>
        <h1 class="font-bold text-2xl mb-4"><?= htmlspecialchars($current_product['name'] ?? '') ?> Ratings</h1>
        <!--        Ratings List-->
        <div class="grid lg:flex lg:justify-center lg:gap-x-8 items-center gap-">
            <div class="flex flex-col items-center justify-center max-sm:mb-2 my-4">
                <h3 class="font-extrabold text-4xl"><?= round($average_rating['average_rating'] ?? 0) . '.0' ?></h3>
                <div class="mt-4 text-center">
                    <div class="flex items-center gap-1">
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <svg class="w-3 <?= $i <= round($average_rating['average_rating']) ? 'fill-[#facc15]' : 'fill-[#CED5D8]' ?>  shrink-0" viewBox="0 0 14 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z"/>
                            </svg>
                        <?php } ?>
                    </div>
                    <p class="mt-1.5 text-gray-500 text-xs"><?= number_format(count($reviews ?? [])) ?></p>
                </div>
            </div>
            <div class="space-y-1 lg:w-[50%]">
                <div class="flex items-center">
                    <p class="text-sm text-gray-500 font-bold">5.0</p>
                    <div class="bg-gray-300 rounded w-full h-3 ml-3">
                        <div class="w-[<?= htmlspecialchars(round($rating_percentage['five'] ?? 0) . '%') ?>] h-full rounded bg-[#facc15]"></div>
                    </div>
                    <p class="text-sm font-bold ml-3"><?= htmlspecialchars(round($rating_percentage['five'] ?? 0)) ?>%</p>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-500 font-bold">4.0</p>
                    <div class="bg-gray-300 rounded w-full h-3 ml-3">
                        <div class="w-[<?= htmlspecialchars(round($rating_percentage['four'] ?? 0) . '%') ?>] h-full rounded bg-[#facc15]"></div>
                    </div>
                    <p class="text-sm font-bold ml-3"><?= htmlspecialchars(round($rating_percentage['four'] ?? 0)) ?>%</p>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-500 font-bold">3.0</p>
                    <div class="bg-gray-300 rounded w-full h-3 ml-3">
                        <div class="w-[<?= htmlspecialchars(round($rating_percentage['three'] ?? 0) . '%') ?>] h-full rounded bg-[#facc15]"></div>
                    </div>
                    <p class="text-sm font-bold ml-3"><?= htmlspecialchars(round($rating_percentage['three'] ?? 0)) ?>%</p>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-500 font-bold">2.0</p>
                    <div class="bg-gray-300 rounded w-full h-3 ml-3">
                        <div class="w-[<?= htmlspecialchars(round($rating_percentage['two'] ?? 0) . '%') ?>] h-full rounded bg-[#facc15]"></div>
                    </div>
                    <p class="text-sm font-bold ml-3"><?= htmlspecialchars(round($rating_percentage['two'] ?? 0)) ?>%</p>
                </div>
                <div class="flex items-center">
                    <p class="text-sm text-gray-500 font-bold">1.0</p>
                    <div class="bg-gray-300 rounded w-full h-3 ml-3">
                        <div class="w-[<?= htmlspecialchars(round($rating_percentage['one'] ?? 0) . '%') ?>] h-full rounded bg-[#facc15]"></div>
                    </div>
                    <p class="text-sm font-bold ml-3"><?= htmlspecialchars(round($rating_percentage['one'] ?? 0)) ?>%</p>
                </div>
            </div>
        </div>
        <hr class="border my-6"/>
        <!--        Reviews List-->
        <div class="">
            <h3 class="font-bold text-base">All Reviews(<?= count($reviews ?? []) ?>)</h3>
            <div class="mt-6 space-y-8">
                <?php if ($reviews ?? false) : ?>
                    <?php foreach ($reviews as $review): ?>
                        <div class="flex items-start">
                            <img src="/public/images/default-profile.jpg" class="w-12 h-12 rounded-full border-2 border-white" alt=""/>
                            <div class="ml-3">
                                <h4 class="text-gray-800 text-sm font-bold"><?= htmlspecialchars(ucfirst(explode('@',$review['email'] ?? '')[0])) ?>
                                    <span><?= ($_SESSION['user']['user_id'] ?? '') == htmlspecialchars($review['user_id'] ?? '') ? '(me)' : '' ?></span></h4>
                                <div class="flex space-x-1 mt-1">
                                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <svg class="w-3 <?= $i <= $review['rating'] ? 'fill-[#facc15]' : 'fill-[#CED5D8]' ?>" viewBox="0 0 14 13" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z"/>
                                        </svg>
                                    <?php } ?>
                                    <span class="text-gray-500 text-xs !ml-2 font-semibold">(<?= htmlspecialchars($review['rating'] ?? 1) ?>)</span>
                                    <p class="text-gray-500 text-xs !ml-2 font-semibold"><?= htmlspecialchars((new DateTime($review['created_at']))->format('M d, Y | g:i a')) ?></p>
                                </div>
                                <p class="text-xs text-gray-500 mt-3 lg:text-md font-sans"><?= htmlspecialchars($review['comment'] ?? '') ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-sm text-neutral-700">No Reviews Available</p>
                <?php endif; ?>
                <hr class="w-full bg-neutral-600 my-1">
            </div>
        </div>
    </section>
<?php
require base_path("Http/views/partials/footer.php");
?>