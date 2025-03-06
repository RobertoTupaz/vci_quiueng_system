<div class="w-full h-base-body grid grid-cols-12 gap-2">
    <div class="col-span-12 sm:col-span-8 bg-green-100 text-white text-center shadow-xl rounded-2xl border">{{-- transform hover:scale-105 transition-all duration-300 --}}
        <div class="w-full text-center text-yellow-400 bg-green-100 py-2">
            <span class="text-7xl font-serif font-black">Now Serving</span>
        </div>
        <div class="w-full pt-2">

            <div class="grid grid-cols-3 text-green-600">
                <div class="text-center">
                    <span class="text-5xl font-serif font-black dark:text-white">
                        Transaction
                    </span>
                </div>
                <div class="text-center">
                    <span class="text-5xl font-serif font-black dark:text-white">
                        Ticket
                    </span>
                </div>
                <div class="text-center">
                    <span class="text-5xl font-serif font-black dark:text-white">
                        Counter
                    </span>
                </div>
            </div>

            <div class="grid grid-cols-3 mt-8 text-gray-900 dark:text-white">
                @php
                    $collection = [1, 2, 3, 4, 5];
                @endphp
                @foreach ($queues as $data)
                    <div class="text-center mt-8">
                        <span class="text-4xl font-serif font-black ">
                            Transaction  {{ $loop->index + 1 }}
                        </span>
                    </div>
                    <div class="text-center mt-8">
                        <span class="text-4xl font-serif font-black">
                            {{ $data->ticker_letter }} {{ $data->ticket_number }}
                        </span>
                    </div>
                    <div class="text-center mt-8">
                        <span class="text-4xl font-serif font-black">
                            {{ $data->user_id }}
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
        <div>
            <video id="video" class="rounded-lg h-full" controls autoplay muted>
                <source src="videos/vci.mp4" type="video/mp4">

                Your browser does not support the video tag.
            </video>
            <style>
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
            </style>
        </div>
        <div>
            <div class="text-center outline font-bold text-4xl">
                <span>Waiting</span>
            </div>
            <div class="grid grid-cols-12">
                @foreach ($queues as $data)
                    <span class="py-2 text-3xl col-span-4 text-center font-bold">{{ $data->ticker_letter }} {{ $data->ticket_number }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>