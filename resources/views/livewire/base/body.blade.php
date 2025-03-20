<div class="w-full h-base-body grid grid-cols-12 gap-2">
    <div class="col-span-12 sm:col-span-8 flex flex-col bg-green-100 text-white text-center shadow-xl rounded-2xl border">{{-- transform hover:scale-105 transition-all duration-300 --}}
        <div class="h-auto border-b-2 rounded-md w-full text-center text-yellow-400 bg-green-100 py-2">
            <span class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-black">Now Serving</span>
        </div>
        <div class="flex-1 w-full pt-2 h-full flex flex-col justify-evenly">
            <div class="grid grid-cols-3 text-green-600">
                <div class="text-center">
                    <span class="hidden sm:block text-2xl text-md sm:text-xl md:text-2xl lg:text-3xl font-serif font-black dark:text-white">
                        Transaction
                    </span>
                    <span class="block sm:hidden text-2xl text-md sm:text-xl md:text-2xl lg:text-3xl font-serif font-black dark:text-white">
                        Trans..
                    </span>
                </div>
                <div class="text-center">
                    <span class="text-md sm:text-xl md:text-2xl lg:text-3xl font-serif font-black dark:text-white">
                        Ticket
                    </span>
                </div>
                <div class="text-center">
                    <span class="text-md sm:text-xl md:text-2xl lg:text-3xl font-serif font-black dark:text-white">
                        Counter
                    </span>
                </div>
            </div>

            @foreach ($roles as $role)
                @livewire('base.body.transaction', ['role' => $role], key($role->id))
            @endforeach
        </div>
    </div>
    <div class="col-span-12 sm:col-span-4 flex flex-col">
        <div class="flex-1 flex justify-center h-3/5">
            <video id="video" class="rounded-lg h-full" controls autoplay muted>
                <source src="{{asset('storage/videos/vci.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <script>
                let video = document.getElementById("video");
            
                video.addEventListener("ended", function() {
                    this.currentTime = 0; // Reset to the beginning
                    this.play(); // Play again
                });
            </script>
        </div>
        <div class="h-auto my-6">
            <div class="text-center outline font-bold text-md sm:text-xl md:text-2xl lg:text-3xl">
                <span>Waiting</span>
            </div>
            <div class="grid grid-cols-12">
                @foreach ($queues as $data)
                    <span class="py-2 text-sm sm:text-md md:text-xl lg:text-2xl col-span-4 text-center font-bold">{{ $data->ticket_letter }}{{ addZeroes(strlen($data->ticket_number)) }}{{ $data->ticket_number }}</span>
                @endforeach
            </div>
        </div>
    </div>
    <audio class="absolute bottom-0 z-0" id="userAudio" src="{{$audio}}">
        Your browser does not support the audio element.
    </audio>

    @script
        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
        
            var pusher = new Pusher('b5da84cc28f6c1737da5', {
                cluster: 'ap3'
            });
        
            var channel = pusher.subscribe('queues');
            channel.bind('queues-updated', function(data) {
                Livewire.dispatch('queues-updated', {data: data});
            });

            Livewire.on('play-audio', data => {
                let audio = document.getElementById("userAudio");

                audio.oncanplaythrough = () => {
                    audio.play().catch(error => console.error("Playback failed:", error));
                };
            });
        </script>
    @endscript
</div>