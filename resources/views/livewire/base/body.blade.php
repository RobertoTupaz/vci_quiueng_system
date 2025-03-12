<div class="w-full h-base-body grid grid-cols-12 gap-2">
    <div class="col-span-12 sm:col-span-8 bg-green-100 text-white text-center shadow-xl rounded-2xl border">{{-- transform hover:scale-105 transition-all duration-300 --}}
        <div class="border-b-2 rounded-md w-full text-center text-yellow-400 bg-green-100 py-2">
            <span class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-serif font-black">Now Serving</span>
        </div>
        <div class="w-full pt-2">

            <div class="grid grid-cols-3 text-green-600">
                <div class="text-center">
                    <span class="hidden sm:block text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-black dark:text-white">
                        Transaction
                    </span>
                    <span class="block sm:hidden text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-black dark:text-white">
                        Trans..
                    </span>
                </div>
                <div class="text-center">
                    <span class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-black dark:text-white">
                        Ticket
                    </span>
                </div>
                <div class="text-center">
                    <span class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-black dark:text-white">
                        Counter
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-3 mt-8 text-gray-900 dark:text-white">
                
                @foreach ($ongoingQeues as $data)
                    <div class="text-center mt-8">
                        <span class="hidden sm:block text-xl sm:text-2xl md:text-3xl lg:text-4xl font-serif font-black ">
                            {{ $data->role->name }}
                        </span>
                        <span class="block sm:hidden text-xl sm:text-2xl md:text-3xl lg:text-4xl font-serif font-black ">
                            Trans..  {{ $loop->index + 1 }}
                        </span>
                    </div>
                    <div class="text-center mt-8">
                        <span class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-serif font-black">
                            {{ $data->ticket_letter }}{{ addZeroes(strlen($data->ticket_number)) }}{{ $data->ticket_number }}
                        </span>
                    </div>
                    <div class="text-center mt-8">
                        <span class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-serif font-black">
                            {{ $data->counter->number ?? null }}
                        </span>
                    </div>
                    @if ($loop->index + 1 == 5)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-span-12 sm:col-span-4 grid">
        <div class="flex justify-center">
            <video id="video" class="rounded-lg h-full" controls autoplay muted>
                <source src="videos/vci.mp4" type="video/mp4">

                Your browser does not support the video tag.
            </video>
            {{-- <style>
                #video-bg {
                position: fixed;
                top: 0; right: 0; bottom: 0; left: 0;
                overflow: hidden;
                }
                #video-bg > video {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                }
                /* 1. No object-fit support: */
                @media (min-aspect-ratio: 16/9) {
                #video-bg > video { height: 300%; top: -100%; }
                }
                @media (max-aspect-ratio: 16/9) {
                #video-bg > video { width: 300%; left: -100%; }
                }
                /* 2. If supporting object-fit, overriding (1): */
                @supports (object-fit: cover) {
                #video-bg > video {
                    top: 0; left: 0;
                    width: 100%; height: 100%;
                    object-fit: cover;
                }
                }
            </style> --}}
        </div>
        <div>
            <div class="text-center outline font-bold text-xl sm:text-2xl md:text-3xl lg:text-4xl">
                <span>Waiting</span>
            </div>
            <div class="grid grid-cols-12">
                @foreach ($queues as $data)
                    <span class="py-2 text-md sm:text-xl md:text-2xl lg:text-3xl col-span-4 text-center font-bold">{{ $data->ticket_letter }}{{ addZeroes(strlen($data->ticket_number)) }}{{ $data->ticket_number }}</span>
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
                console.log(data);
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