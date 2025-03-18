<div>
    <div class="grid grid-cols-3 text-gray-900 dark:text-white">
        <div class="text-center">
            <span class="hidden sm:block text-sm sm:text-md md:text-xl lg:text-2xl font-serif font-black ">
                {{ $role->name }}
            </span>
            <span class="block sm:hidden text-sm sm:text-md md:text-xl lg:text-2xl font-serif font-black ">
                {{ $role->name }}
            </span>
        </div>
        <div class="text-center">
            <span class="text-sm sm:text-md md:text-xl lg:text-2xl font-serif font-black">
                {{ $queue->ticket_letter ?? null }}{{ addZeroes(strlen($queue->ticket_number ?? null)) ?? null }}{{ $queue->ticket_number ?? null }}
            </span>
        </div>
        <div class="text-center">
            <span class="text-sm sm:text-md md:text-xl lg:text-2xl font-serif font-black">
                {{$queue->counter->number ?? null}}
            </span>
        </div>
    </div>
</div>
