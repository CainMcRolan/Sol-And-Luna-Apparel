<div @click.away="sortExpanded=false" x-cloak x-show="sortExpanded" x-anchor.bottom="$refs.sortButton" x-collapse class="z-50 w-40 mt-3 divide-gray-100 bg-white shadow dark:bg-gray-700">
    <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400" aria-labelledby="sortDropdownButton">
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                Today </a>
        </li>
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                Yesterday </a>
        </li>
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                Last 7 Days </a>
        </li>
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                Last Month </a>
        </li>
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                Last Year </a>
        </li>
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                All Time </a>
        </li>
    </ul>
</div>