<div id="{{ $role?->id }}">
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
    <div class="hidden bg-green-300"></div>
    <style>
        .bad{
            padding:30px;
            animation: blink 300ms infinite;
        }

        @keyframes blink{
            0%, 49.9% {
                background: white;
            }
            50%, 99.9% {
                background: red;
            }
        }
    </style>
    @script
        <script>
            Livewire.on('blink-ready', data => {
                let row = document.getElementById(data);
                if(row.id == data && !row.classList.contains("bg-green-300")) {
                    console.log('test')
                    row.classList.add("bg-green-300");
                    console.log(row)
                    row..style.cssText = "background-color: #86efac;"
                    setTimeout(() => {
                        row.classList.remove("bg-green-300");
                    }, 3000);
                }

                 //'#86efac' : '#dcfce7' ;
            });
        </script>
    @endscript
</div>
