<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
    @if ($isEditing)
    <td class="px-6 py-4" colspan="4">
        <div class="grid grid-cols-12 gap-2">
            <div class="col-span-4 grid">
                <label for="counter_no" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Counter Number</label>
                <input wire:model='number' type="number" id="counter_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required />
            </div>
            <div class="col-span-4 grid">
                <label for="username" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
                <input wire:model='email' type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Username" required />
            </div>
            <div class="col-span-4 grid">
                <label for="password" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                <input wire:model='password2' type="text" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Password" required />
            </div>
            <div class="col-span-12">
                @foreach ($allRoles as $allrole)
                    <div class="flex items-center ps-3">
                        <input id="{{$allrole->id}}" wire:model='checkedRoles' type="checkbox" value="{{$allrole->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="{{$allrole->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$allrole->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </td>
        {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            
        </th>
        <td class="px-6 py-4">

        </td>
        <td class="px-6 py-4">
            
        </td>
        <td class="px-6 py-4">
            
        </td> --}}
        <td>
            <div class="w-full h-auto grid">
                <button wire:click='saveCounter' class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
                <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Cancel</button>
            </div>
        </td>
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
        <td class="px-6 py-4">
            <button wire:click='edit()' href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
            |
            <a href="#" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
        </td>
    @endif
</tr>
