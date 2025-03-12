<div class="text-gray-700 uppercase py-3 rtl:text-right text-sm grid grid-cols-12 odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
    <div class="col-span-6 sm:col-span-4 indent-6">
        {{ $queue->name ?? null }}
    </div>
    <div class="col-span-6 sm:col-span-4 indent-6">
        {{$queue->ticket_letter ?? null}}{{addZeroes(strlen($queue->ticket_number ?? null)) ?? null}}{{$queue->ticket_number ?? 0}}
    </div>
    <div class="hidden sm:block sm:col-span-4 indent-6">
        {{ $queue->priority_level ?? null }}
    </div>
</div>