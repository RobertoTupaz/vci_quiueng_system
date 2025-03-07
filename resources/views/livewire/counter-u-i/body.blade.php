<div class="w-4/5 mb-6 mt-4">
    <div class="text-center mb-4">
        <span class="text-7xl font-serif font-medium text-gray-800 whitespace-nowrap dark:text-white">Counter {{ auth()->user()->number }}</span>
    </div>
    <div class="grid grid-cols-12 pt-10">
        <div class="col-span-6 text-center place-items-center">
            <div class="w-4/5 whitespace-nowrap dark:text-white">
                <div class="border-2 border-gray-700 text-4xl font-bold py-2 text-gray-800">Now Serving</div>
                <div class="border-2 border-gray-700 text-2xl font-bold py-6 text-gray-700">
                    <p>Transaction</p>
                    <p class="pt-6">A0001</p>
                </div>
            </div>
        </div>
        <div class="col-span-6 text-center place-items-center">
            <div>
                <button type="button" class="w-32 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex justify-center items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                    </svg>
                    Notify           
                </button>
            </div>
            <div class="flex gap-4 pt-4">
                <div>
                    <button type="button" class="w-32 text-gray-900 bg-[#F7BE38] hover:bg-[#F7BE38]/90  font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex justify-center items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                        Previous           
                    </button>
                </div>
                <div>
                    <button type="button" class="w-32 text-white bg-green-700 hover:bg-green-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex justify-center items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Next
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

