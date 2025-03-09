<div class="w-10/12 mb-6 mt-4">
    <div class="text-center text-2xl font-serif py-2">
        <span>Queues</span>
    </div>
    <div class="text-gray-700 uppercase py-3 rtl:text-right text-sm grid grid-cols-8 sm:grid-cols-12 odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
        <div class="col-span-2">
            Role
        </div>
        <div class="col-span-2">
            Ticket
        </div>
        <div class="col-span-2">
            Priority Level
        </div>
        <div class="hidden sm:block col-span-2">
            Status
        </div>
        <div class="hidden sm:block col-span-2">
            Counter
        </div>
        <div class="col-span-2">
            Action
        </div>
    </div>
    @foreach ($queues as $data)
        @livewire('admin.queues.crud.rows', ['data' => $data], key($data->id))
    @endforeach
</div>
