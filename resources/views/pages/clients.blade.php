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
    @php( $partners = \App\Models\partners::orderBy('id', 'asc')->get())


        @if(!$events->isEmpty())
      
            <div class="container bg-black mx-auto px-6 pb-8 mt-20 rounded-lg">
                <h2 class="Oswald text-white text-4xl font-black pt-10"> CLIENTS</h2>
            </div>
        @endif

        <div class="container bg-black mx-auto px-6 pb-10 card-container grid grid-cols-4 gap-4">
            @foreach($partners as $partner)
                <div class="rounded-lg flex justify-center items-center "> 
                        <img class="w-50 py-4" src="{{ $partner->path }}" alt="">
                </div>
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
