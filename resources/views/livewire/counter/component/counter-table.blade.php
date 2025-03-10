<div x-data="{ add: false}" class="w-10/12 mb-6 mt-4">
    <div class="text-center mb-4">
        <span class="text-2xl font-serif">VCI Queuing System</span>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="w-full flex flex-row-reverse">
            <button @click="add = ! add"
                class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                <span
                    class="relative px-5 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-transparent group-hover:dark:bg-transparent">
                    Add
                </span>
            </button>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Counter No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Roles
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Password
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($counters as $counter)
                    @livewire('counter.component.crud.row', ['counter' => $counter], key($counter->id))
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Main modal for Add Counter -->
    <div x-show="add" class="bg-opacity-30 bg-stone-200 overflow-y-auto overflow-x-hidden flex fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div @click.outside="add = false" class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                @livewire('counter.component.crud.add')
            </div>
        </div>
    </div>

</div>