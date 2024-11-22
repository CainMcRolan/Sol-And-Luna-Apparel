<div @click.away="filterExpanded=false" x-cloak x-show="filterExpanded" x-anchor.bottom="$refs.filterButton" x-collapse class="z-50 w-40 mt-3 divide-gray-100 bg-white shadow dark:bg-gray-700">
    <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400" aria-labelledby="sortDropdownButton">
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                New </a>
        </li>
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                Processing </a>
        </li>
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                Shipped </a>
        </li>
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                Delivered </a>
        </li>
        <li>
            <a href="#"
               class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                Cancelled </a>
        </li>
    </ul>
</div>