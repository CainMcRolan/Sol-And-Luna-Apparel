<!--Header-->
<header x-data="{countryExpanded:false, accountExpanded:false}" id="header-top" class="h-[40px] w-full text-xs grid text-white bg-[#1d1d1d] border-b border-white justify-items-center sm:items-center sm:grid-cols-3 md:text-sm sm:justify-around">
    <div></div>
    <a href="#" class="underline text-center hover:no-underline">FREE P.H Standard Shipping Orders ₱75+ & FREE Returns</a>
    <div class="hidden items-center sm:flex gap-x-4">
        <a class="hover:underline cursor-pointer text-xs" href="">Need Help?</a>
        <button x-ref="countryButton" @click="countryExpanded = !countryExpanded" class="hover:border-2 hover:border-blue-500 cursor-pointer text-xs flex gap-x-1 items-center ml-1">
            <svg width="14px" height="14px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                 class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path fill="#CE1126" d="M36 27a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V9a4 4 0 0 1 4-4h28a4 4 0 0 1 4 4v18z"></path>
                    <path fill="#0038A8" d="M32 5H4a4 4 0 0 0-4 4v9h36V9a4 4 0 0 0-4-4z"></path>
                    <path fill="#EEE" d="M1.313 29.945l17.718-11.881L1.33 6.041A3.975 3.975 0 0 0 0 9v18c0 1.171.512 2.214 1.313 2.945z"></path>
                    <path fill="#FCD116"
                          d="M16.07 16.52l.043 1.153l1.115.294l-1.083.396l.065 1.152l-.712-.908l-1.075.417l.643-.957l-.73-.893l1.11.316zM1.603 7.982l.866.763l.98-.607l-.458 1.059l.88.745l-1.148-.108l-.437 1.066l-.251-1.125l-1.151-.086l.993-.586zm.431 17.213l.574 1l1.124-.257l-.774.854l.594.989l-1.052-.472l-.757.871l.123-1.148l-1.061-.45l1.128-.238zM10 18a3 3 0 1 1-6 0a3 3 0 0 1 6 0z"></path>
                    <path d="M7.595 12.597l-.157 2.648l-.244-.036l.085-3.074L7 11.953l-.279.182l.085 3.074l-.244.036l-.157-2.648l-.353.218l.329 2.697h1.238l.329-2.697zm-1.19 10.806l.157-2.648l.244.036l-.086 3.074l.28.182l.279-.182l-.085-3.074l.244-.036l.157 2.648l.353-.218l-.329-2.698H6.381l-.329 2.698zm-3.647-2.004l1.985-1.759l.146.196l-2.233 2.113l.068.327l.327.069l2.113-2.235l.197.147L3.6 22.242l.404.094l1.675-2.139l-.438-.438l-.438-.438l-2.139 1.675zm8.484-6.799l-1.985 1.761l-.146-.197l2.233-2.113l-.068-.327l-.327-.069l-2.113 2.234l-.197-.146l1.761-1.985l-.404-.094l-1.675 2.139l.438.438l.438.438l2.139-1.675zm-9.645 2.805l2.649.157l-.037.244l-3.074-.086l-.182.28l.182.279l3.074-.085l.037.244l-2.649.157l.218.353l2.697-.329V17.38l-2.697-.328zm10.806 1.19l-2.649-.157l.037-.244l3.074.085l.182-.279l-.182-.28l-3.074.086l-.037-.244l2.649-.157l-.218-.353l-2.698.328v1.239l2.698.329zM3.6 13.758l1.761 1.985l-.197.146l-2.113-2.234l-.327.069l-.068.327l2.233 2.113l-.146.197L2.758 14.6l-.094.404l2.139 1.675l.438-.438l.438-.438l-1.675-2.139zm6.8 8.484l-1.761-1.985l.197-.147l2.113 2.235l.327-.069l.068-.327l-2.233-2.113l.146-.196l1.985 1.759l.094-.403l-2.139-1.675l-.438.438l-.438.438l1.675 2.139z"
                          fill="#FCD116"></path>
                </g>
            </svg>
            <p>Phil</p>
            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.6656 13.5559L14.5131 9.70923C14.5715 9.65095 14.6113 9.57664 14.6274 9.49572C14.6436 9.41479 14.6353 9.3309 14.6037 9.25467C14.5721 9.17845 14.5186 9.11332 14.45 9.06754C14.3813 9.02177 14.3006 8.99741 14.2181 8.99756H6.22975C6.1473 8.99758 6.06672 9.02205 5.99819 9.06789C5.92966 9.11373 5.87627 9.17886 5.84477 9.25506C5.81328 9.33125 5.80509 9.41508 5.82126 9.49592C5.83742 9.57677 5.87721 9.651 5.93558 9.70923L9.78225 13.5559C9.89944 13.6729 10.0583 13.7387 10.2239 13.7387C10.3895 13.7387 10.5484 13.6729 10.6656 13.5559Z"
                      fill="#647175"/>
            </svg>
        </button>
        <?php require base_path('Http/views/partials/dropdowns/country.php')?>
        <p class="hover:underline cursor-pointer text-xs">English</p>
        <?php if ($user) : ?>
            <?php require base_path('Http/views/partials/dropdowns/account.php')?>
            <button x-ref="accountButton" @click="accountExpanded = !accountExpanded" class="hover:border-2 hover:border-blue-500 cursor-pointer text-xs flex items-center">
                <p>My Account</p>
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.6656 13.5559L14.5131 9.70923C14.5715 9.65095 14.6113 9.57664 14.6274 9.49572C14.6436 9.41479 14.6353 9.3309 14.6037 9.25467C14.5721 9.17845 14.5186 9.11332 14.45 9.06754C14.3813 9.02177 14.3006 8.99741 14.2181 8.99756H6.22975C6.1473 8.99758 6.06672 9.02205 5.99819 9.06789C5.92966 9.11373 5.87627 9.17886 5.84477 9.25506C5.81328 9.33125 5.80509 9.41508 5.82126 9.49592C5.83742 9.57677 5.87721 9.651 5.93558 9.70923L9.78225 13.5559C9.89944 13.6729 10.0583 13.7387 10.2239 13.7387C10.3895 13.7387 10.5484 13.6729 10.6656 13.5559Z"
                          fill="#647175"/>
                </svg>
            </button>
        <?php else: ?>
            <div class="flex gap-x-1">
                <a href="/register" class="hover:border-2 hover:border-blue-500 cursor-pointer text-xs flex items-center">
                    <p>Register</p>
                </a>
                <p>|</p>
                <a href="/login" class="hover:border-2 hover:border-blue-500 cursor-pointer text-xs flex items-center">
                    <p>Login</p>
                </a>
            </div>
        <?php endif; ?>
    </div>
</header>