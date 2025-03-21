<div>
    

    <!-- Modal header -->
    <div class="flex items-center justify-between p-4 mb-2 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Terms of Service
        </h3>
        <button @click="add = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
    </div>
    <!-- Modal body -->
    <div class="grid gap-6 mb-6 px-4">
        <div>
            <label for="counter_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Counter No.</label>
            <input wire:model='counterNumber' type="number" id="counter_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required />
        </div>
        <div>
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input wire:model='username' type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email" required />
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <input wire:model='password' type="text" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Password" required />
        </div>
        <div>
            <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles</label>
            <div class="flex justify-end">
                <div class="flex items-center ps-3">
                    <div class="relative" x-data="{ addRole: false }">
                        <button @click="addRole = !addRole" type="button" class="py-1.5 px-2 me-2 mb-2 text-sm font-medium text-white focus:outline-none bg-green-400 rounded-full border border-green-200 hover:bg-green-500 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Add role</button>
                        <!-- Floating Component -->
                        <div x-show="addRole" @click.outside="addRole = false" class="absolute bottom-full mb-2 left-1/2 transform -translate-x-1/2 w-48 bg-white shadow-lg rounded-lg p-4">
                            <span>Role name</span>
                            <input wire:model='newRole' type="text" class="w-full rounded" placeholder="Role name">
                            <div class="w-full flex justify-evenly">
                                <button @click="addRole = false" class="mt-2 text-sm text-red-500">Close</button>
                                <button wire:click='saveRole' class="mt-2 text-sm text-green-500">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center ps-3">
                    <div class="relative" x-data="{ deleteRole: false }">
                        <button @click="deleteRole = !deleteRole" type="button" class="py-1.5 px-2 me-2 mb-2 text-sm font-medium focus:outline-none bg-rose-400 text-white rounded-full border border-gray-200 hover:bg-rose-500 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Delete role</button>
                        <!-- Floating Component -->
                        <div x-show="deleteRole" @click.outside="deleteRole = false" class="absolute bottom-full mb-2 left-1/2 transform -translate-x-1/2 w-48 bg-white shadow-lg rounded-lg p-4">
                            <span>Are you sure you want to delete selected roles?</span>
                            <div class="w-full flex justify-evenly">
                                <button wire:click='deleteRoles' class="mt-2 text-sm text-red-500">Yes</button>
                                <button @click="deleteRole = false" class="mt-2 text-sm text-green-500">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4">
                @foreach ($roles as $role)
                    <div class="flex items-center ps-3">
                        <input id="{{$role->id}}" wire:model='checkedRoles' type="checkbox" value="{{$role->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="{{$role->id}}" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$role->name}}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-full h-auto flex justify-center">
            <button wire:click='saveCounter' class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
        </div>
    </div>
</div>