<x-guest-layout>
    <div class="w-full h-base-body grid grid-cols-12 gap-2">
        <div class="col-span-12 sm:col-span-8 bg-green-100 text-white text-center shadow-xl rounded-2xl border">{{-- transform hover:scale-105 transition-all duration-300 --}}
            <div class="w-full text-center text-yellow-400 bg-green-100 py-2">
                <span class="text-7xl font-serif font-black">Now Serving</span>
            </div>
            <div class="w-full pt-2">

                <div class="grid grid-cols-3 text-green-600">
                    <div class="text-center">
                        <span class="text-5xl font-serif font-black dark:text-white">
                            Transaction
                        </span>
                    </div>
                    <div class="text-center">
                        <span class="text-5xl font-serif font-black dark:text-white">
                            Ticket
                        </span>
                    </div>
                    <div class="text-center">
                        <span class="text-5xl font-serif font-black dark:text-white">
                            Counter
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-3 mt-8 text-gray-900 dark:text-white">
                    @php
                        $collection = [1, 2, 3, 4, 5];
                    @endphp
                    @foreach ($collection as $item)
                        <div class="text-center mt-8">
                            <span class="text-4xl font-serif font-black ">
                                Transaction  {{ $loop->index + 1 }}
                            </span>
                        </div>
                        <div class="text-center mt-8">
                            <span class="text-4xl font-serif font-black">
                                A0001
                            </span>
                        </div>
                        <div class="text-center mt-8">
                            <span class="text-4xl font-serif font-black">
                                1
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-4">
            test
        </div>
    </div>
</x-guest-layout>