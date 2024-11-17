<?php
require base_path("Http/views/partials/head.php");
require base_path("Http/views/partials/header.php");
require base_path("Http/views/partials/nav.php");
require base_path("Http/views/partials/aside.php");
?>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <?php require base_path("Http/views/partials/progress.php") ?>

            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                <div class="min-w-0 flex-1 space-y-8">
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <!-- Name-->
                            <div class="col-span-2 sm:col-span-1">
                                <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Name </label>
                                <input type="text" id="your_name"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                       placeholder="" required/>
                            </div>

                            <!-- Email-->
                            <div class="col-span-2 sm:col-span-1">
                                <label for="your_email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Email* </label>
                                <input type="email" id="your_email"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                       placeholder="" required/>
                            </div>

                            <!-- Country-->
                            <div class="col-span-2 sm:col-span-1">
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="select-country-input-3" class="block text-sm font-medium text-gray-900 dark:text-white"> Country* </label>
                                </div>
                                <select id="select-country-input-3"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                    <option selected>Philippines</option>
                                </select>
                            </div>

                            <!-- Province-->
                            <div class="col-span-2 sm:col-span-1">
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="select-city-input-3" class="block text-sm font-medium text-gray-900 dark:text-white"> Province* </label>
                                </div>
                                <input id="select-city-input-3"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">

                            </div>

                            <!-- Phone Number-->
                            <div class="col-span-2 sm:col-span-1">
                                <label for="phone-input-3" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Phone Number* </label>
                                <div class="flex items-center">
                                    <button id="dropdown-phone-button-3" data-dropdown-toggle="dropdown-phone-3"
                                            class="z-10 inline-flex shrink-0 items-center rounded-s-lg border border-gray-300 bg-gray-100 px-4 py-2.5 text-center text-sm font-medium text-gray-900 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-700"
                                            type="button">
                                        <svg width="14px" height="14px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                             class="me-2 iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet" fill="#000000">
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
                                        +63
                                        <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                                        </svg>
                                    </button>
                                    <div id="dropdown-phone-3" class="z-10 hidden w-56 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700">
                                        <ul class="p-2 text-sm font-medium text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-phone-button-2">
                                            <li>
                                                <button type="button"
                                                        class="inline-flex w-full rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                                        role="menuitem">
                                                            <span class="inline-flex items-center">
                                                              <svg width="14px" height="14px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                   aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet" fill="#000000">
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
                                                              Philippines (+63)
                                                            </span>
                                                </button>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="relative w-full">
                                        <label for="phone-input"></label>
                                        <input type="text" id="phone-input"
                                               class="z-20 block w-full rounded-e-lg border border-s-0 border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:border-s-gray-700  dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500"
                                               pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required/>
                                    </div>
                                </div>
                            </div>

                            <!-- City-->
                            <div class="col-span-2 sm:col-span-1">
                                <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">City*</label>
                                <label>
                                    <input type="text"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           placeholder="" required/>
                                </label>
                            </div>

                            <!-- Zip Code-->
                            <div class="col-span-2 sm:col-span-1">
                                <label for="" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Zip Code*</label>
                                <label>
                                    <input type="number"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           placeholder="" required/>
                                </label>
                            </div>

                            <!-- Street Address-->
                            <div class="col-span-2 sm:col-span-1">
                                <label for="" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Street Address*</label>
                                <label>
                                    <input type="text"
                                           class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                           placeholder="" required/>
                                </label>
                            </div>

                            <!-- Customer Notes-->
                            <div class="col-span-2">
                                <label for="" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Your Notes</label>
                                <textarea name="" id="" cols="30" rows="5"
                                          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">

                                </textarea>
                            </div>

                            <div class="col-span-2">
                                <button type="submit"
                                        class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                    </svg>
                                    Add new address
                                </button>
                            </div>

                            <p class="col-span-2 flex justify-center items-center text-neutral-500 my-[-10px]">or</p>

                            <div class="col-span-2">
                                <button type="submit"
                                        class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">
                                    Pick from existing address
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment</h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="credit-card" aria-describedby="credit-card-text" type="radio" name="payment-method" value=""
                                               class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                               checked/>
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="credit-card" class="font-medium leading-none text-gray-900 dark:text-white"> Credit Card </label>
                                        <p id="credit-card-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Pay with your credit card</p>
                                    </div>
                                </div>

                                <div class="mt-4 flex items-center gap-2">
                                    <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                                    <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                                    <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
                                </div>
                            </div>

                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="pay-on-delivery" aria-describedby="pay-on-delivery-text" type="radio" name="payment-method" value=""
                                               class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"/>
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="pay-on-delivery" class="font-medium leading-none text-gray-900 dark:text-white"> E-wallet - Gcash </label>
                                        <p id="pay-on-delivery-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">+₱15 payment processing fee</p>
                                    </div>
                                </div>

                                <div class="mt-4 flex items-center gap-2">
                                    <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                                    <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                                    <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
                                </div>
                            </div>

                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="paypal-2" aria-describedby="paypal-text" type="radio" name="payment-method" value=""
                                               class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"/>
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="paypal-2" class="font-medium leading-none text-gray-900 dark:text-white"> Paypal account </label>
                                        <p id="paypal-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Connect to your account</p>
                                    </div>
                                </div>

                                <div class="mt-4 flex items-center gap-2">
                                    <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Delete</button>

                                    <div class="h-3 w-px shrink-0 bg-gray-200 dark:bg-gray-700"></div>

                                    <button type="button" class="text-sm font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Methods</h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="dhl" aria-describedby="dhl-text" type="radio" name="delivery-method" value=""
                                               class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                               checked/>
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="dhl" class="font-medium leading-none text-gray-900 dark:text-white"> ₱60 - J&T Express Fast Delivery </label>
                                        <p id="dhl-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Delivery in Nov. 18, 2024</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="dhl" aria-describedby="dhl-text" type="radio" name="delivery-method" value=""
                                               class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600"
                                               checked/>
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="dhl" class="font-medium leading-none text-gray-900 dark:text-white"> ₱80 - LBC Courier Slow Delivery </label>
                                        <p id="dhl-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Delivery in Nov. 24, 2024</p>
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
                                <dd class="text-base font-medium text-gray-900 dark:text-white">₱8,094.00</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                <dd class="text-base font-medium  text-gray-900">₱0</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Delivery Fee</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">₱60</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">₱199</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">₱8,392.00</dd>
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <a href="/summary"
                           class="flex w-full items-center justify-center rounded-lg px-5 text-sm font-medium text-white bg-primary-700 py-2.5 hover:bg-primary-800 focus:ring-primary-300 focus:outline-none focus:ring-4 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Place Order
                        </a>

                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Did you know? It's very difficult to integrate these APIs? <a href="/new" title=""
                                                                                                                                                      class="font-medium underline text-primary-700 hover:no-underline dark:text-primary-500">Continue
                                Shopping.</a></p>
                    </div>
                </div>
            </div>
        </form>
    </section>
<?php
require base_path("Http/views/partials/footer.php");
?>