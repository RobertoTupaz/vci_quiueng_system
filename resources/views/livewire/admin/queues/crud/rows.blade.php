<div class="grid grid-cols-8 sm:grid-cols-12 text-gray-600 odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
    <div class="col-span-2 py-2">
        {{$queue->role->name}}
    </div>
    <div class="col-span-2 py-2">
        {{$queue->ticket_letter}}{{addZeroes(strlen($queue->ticket_number))}}{{$queue->ticket_number}}
    </div>
    <div class="col-span-2 py-2">
        <label for="underline_select" class="sr-only">Underline select</label>
        <select id="underline_select" wire:model='priority_level' class="block py-2.5 px-0 w-1/2 text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
            <option value="normal" selected>normal</option>
            <option value="priority">priority</option>
        </select>
    </div>
    <div class="hidden sm:block col-span-2 py-2">
        {{$queue->status}}
    </div>
    <div class="hidden sm:block col-span-2 py-2">
        {{$queue->counter->number ?? null}}
    </div>
    <div class="col-span-2 py-2">
        <a wire:click='changePriorityLevel()' href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Save</a>
    </div>
</div>