<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl bg-black dark:text-green-600 leading-tight MenloRegular ">
                WIRELESS GIG
            </h2>
        </div>
    </x-slot>

        <div class="container bg-black mx-auto px-6 lg:px-20 pt-16">
            <div class="py-12" style="font-family:Menlo;">
                <h2 class="Oswald text-white text-3xl py-4"> {{ $blog->theme }}</h2>
                <div class="flex justify-left">
                    <img class="w-full object-cover h-[36rem] py-10" src="{{ $blog->path }}" alt="">
                </div>
          
                <p class="Montserrat text-base text-white text-left pb-6">
                    {{ $blog->about }}
                </p>

                    <hr>
            </div>
        </div>


   
    <style>
        .card-container {
            perspective: 1000px;
        }

        main{
            background-color:rgb(16 185 129 / var(--tw-bg-opacity));
        }

        .card {
            width: 350px;
            height: 500px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.5s;
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

        header{
            position: fixed;
            width:100%;
        }

        footer{
            font-family:Menlo !important;
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
