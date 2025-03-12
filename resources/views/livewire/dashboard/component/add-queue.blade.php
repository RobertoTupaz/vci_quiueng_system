<div class="w-1/2 mb-6 mt-4">
    <div class="text-center mb-4">
        <span class="text-2xl font-serif">VCI Queuing System</span>
    </div>
    <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <input type="text" wire:model='name' placeholder="Jhon" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose a Transaction Method</label>
    <select wire:model='selectedRole' id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected value="not set">Method</option>
        @foreach ($roles as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose a Priority Level</label>
    <select wire:model='priorityLevel' id="default" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="normal" selected>Normal</option>
        <option value="priority">Priority</option>
    </select>
    <div class="w-full flex justify-center">
        <button wire:click='addQueue' class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                Add Queue
            </span>
        </button>
    </div>
</div>

