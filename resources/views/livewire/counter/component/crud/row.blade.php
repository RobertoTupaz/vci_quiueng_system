<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
    @if ($isEditing)
        @livewire('counter.component.crud.edit', ['counter' => $counter], key($counter->id))
    @else
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{$number}}
        </th>
        <td class="px-6 py-4">
            {{$roles}}
        </td>
        <td class="px-6 py-4">
            {{$email}}
        </td>
        <td class="px-6 py-4">
            {{$password2}}
        </td>
        <td class="px-6 py-4" >
            <a wire:click='edit()' href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            |
            <a wire:click='isDeleting' href="#" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>

            @if ($showDelete)
                <div class="relative">
                    <div class="absolute bottom-full mb-2 left-1/2 transform -translate-x-1/2 w-48 bg-white shadow-lg rounded-lg p-4">
                        <span>Are you sure you want to delete Counter {{$number}}?</span>
                        <div class="w-full flex justify-evenly">
                            <button wire:click='deleteCounter()' class="mt-2 text-sm text-red-500">Yes</button>
                            <button wire:click='isDeleting' class="mt-2 text-sm text-green-500">No</button>
                        </div>
                    </div>
                </div>
            @endif
        </td>
    @endif
</tr>
