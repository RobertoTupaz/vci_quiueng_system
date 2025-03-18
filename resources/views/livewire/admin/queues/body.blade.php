<div class="w-10/12 mb-6 mt-4">
    <div class="grid text-center py-6">
        <div>
            <form action="{{ route('save_video') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="block mb-2 text-2xl font-serif text-gray-900 dark:text-white" for="file_input">Upload Video</label>
                @if (session('success'))
                    <p class="text-green-600 font-semibold">Video uploaded successfully!</p>
                @endif
                <input wire:model='video' name="video" type="file" class="my-2 text-md text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
            </form>
        </div>
    </div>

    <div class="text-center text-2xl font-serif py-2 mt-10">
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
