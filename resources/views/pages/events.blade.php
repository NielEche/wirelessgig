<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl bg-emerald-500 dark:text-green-600 leading-tight Montserrat ">
               WIRELESS GIG
            </h2>
        </div>
    </x-slot>

    @php
        $events = \App\Models\Events::where('publish', 1)->orderBy('id', 'asc')->get();
        $eventsmain = \App\Models\EventsMains::orderBy('id', 'asc')->get();
    @endphp


        <div class="container bg-black mx-auto px-6 lg:px-20 py-6 mt-20 rounded-lg">
        
        @foreach($eventsmain as $main)
            <div class="py-12 lg:flex justify-between gap-6">
                <div class="text-black py-4 lg:w-2/5">
                    <h2 class="Montserrat text-4xl font-black py-2">{{ $main->header }}<span class="blink" style="color:rgb(16 185 129 / var(--tw-bg-opacity));">|</span></h2>
                    <p class="Montserrat text-left phtech-para ">
                        {{ $main->caption }}
                    </p>
                </div>

                <div class="text-black py-4 lg:w-1/2 flex-extend">
                    <img class="w-auto object-contain" src="public{{ $main->path }}" alt=""> 
                </div>      
            
            </div>
        @endforeach
        </div>

        @if(!$events->isEmpty())
            <div class="container mx-auto px-6  pb-8">
                <h2 class="Oswald text-white text-4xl font-black py-2"> Events</h2>
            </div>
        @endif

        <div class="container bg-black mx-auto px-6 pb-16 card-container">
            @foreach($events as $event)
            <a href="{{ route('schedule.view', ['schedule' => $event->id]) }}">
                    <div class=" rounded-lg lg:flex justify-center items-center "> 
                            <img class="w-50 py-10" src="{{ $event->path }}" alt="">
                            <div class="text-white text-left  px-12 lg:px-12 py-4">
                                 <h2 class="Oswald text-2xl">{{ $event->theme }}</h2>
                                <p class="text-sm text-left py-4 leading-6 Montserrat">{{ $event->about }}</p>
                            </div>
                    </div>
            </a> 
            @endforeach
        
        
        </div>

    <style>
        .card-container {
            perspective: 1000px;
        }

        main{
            background-color:rgb(16 185 129 / var(--tw-bg-opacity));
        }

        .card {
            height: 450px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.5s;
            margin:20px;
        }

        .card:hover {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .card-front {
            background-color: #fff;
        }

        .card-back {
            background-color: #000;
            transform: rotateY(180deg);
        }

    </style>

    <script>
        $(document).ready(function() {
            $('.card').on('click', function() {
                $(this).toggleClass('flipped');
            });
        });

    </script>


</x-app-layout>
