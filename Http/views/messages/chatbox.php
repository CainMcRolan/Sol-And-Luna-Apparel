<div x-cloak
     x-show="chatOpen"
     x-collapse
     x-anchor.top-end.offset.10="$refs.chatButton"
     @click.away="chatOpen = false"
     class="grid h-[50svh] sm:grid grid-rows-[10%_80%_10%] w-fit max-w-md shadow-lg rounded-md bg-white border border-neutral-300">
    <!--            User Details-->
    <div class="p-3 sm:p-4 w-full flex justify-between border-b border-neutral-30">
        <div class="flex items-center ">
            <div class="flex-shrink-0">
                <img class="w-10 h-10 rounded-full"
                     src="/public/images/customer-service.svg ?>"
                     alt="">
            </div>
            <div class="flex-1 min-w-0 ms-4">
                <p class="text-md font-semibold text-gray-900 truncate dark:text-white">Sol & Luna Customer Service</p>
                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                    Online
                </p>
            </div>
            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
            </div>
        </div>
    </div>
    <!--            Message Content-->
    <div id="messages" class="message-container overflow-auto p-3 bg-white sm:p-4 w-full flex flex-col gap-2">
        <!--                Chat Mate Message-->
        <div class="flex items-start gap-2.5">
            <img class="w-8 h-8 rounded-full"
                 src="/public/images/customer-service.svg
                         ?>" alt="">
            <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">Customer Service</span>
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">00:00:00</span>
                </div>
                <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">Hello! 👋 <br></br> Welcome! I'm here to assist you. How can I help today? Whether you have a question, need support, or just want to chat, feel free to let me know!</p>
            </div>
            <button
                    class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
                    type="button">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                </svg>
            </button>
        </div>
        <!--                Your Message-->
        <div class="flex items-start gap-2.5 self-end">
            <button
                    class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
                    type="button">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                </svg>
            </button>
            <div class="flex flex-col w-full max-w-[320px] leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Me</span>
                <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white">Message Text</p>
                <div class="flex items-center space-x-2 rtl:space-x-reverse">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Delivered</span>
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">00:00:00</span>
                </div>
            </div>
        </div>
    </div>
    <!--            Chat Form-->
    <form method="POST" id="message-form" class="w-full h-full">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="chat" value="">
        <label for="chat" class="sr-only">Your message</label>
        <div class="w-full h-full flex items-center px-3 py-2 rounded-lg dark:bg-gray-700">
            <button type="button"
                    class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 20 18">
                    <path fill="currentColor"
                          d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                </svg>
                <span class="sr-only">Upload image</span>
            </button>
            <button type="button"
                    class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z"/>
                </svg>
                <span class="sr-only">Add emoji</span>
            </button>
            <input id="chat" name="message"
                   class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Your message..."></input>
            <button type="submit"
                    class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                </svg>
                <span class="sr-only">Send message</span>
            </button>
        </div>
    </form>
</div>
</div>