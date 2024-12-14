<nav x-data="{navOpen:false}" x-ref="navButton" class="lg:hidden w-full flex justify-center items-center p-4 border-b border-neutral-300">
    <div class="group flex justify-center items-center lg:hidden">
        <button @click="navOpen=!navOpen" class="text-base font-semibold cursor-pointer group-hover:text-neutral-700">
            <?= str_replace('-',' ',ucfirst(substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1))) ; ?>
        </button>
        <svg class="cursor-pointer group-hover:fill-neutral-700" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="none" viewBox="0 0 24 24" data-testid="svg_IconCaretDown">
            <path fill="#191A1B" d="m12.53 15.47 4.617-4.616a.5.5 0 0 0-.354-.854H7.207a.5.5 0 0 0-.353.854l4.616 4.616a.75.75 0 0 0 1.06 0"></path>
        </svg>
    </div>
    <?php require base_path("Http/views/partials/profile/dropdown.php") ?>
</nav>