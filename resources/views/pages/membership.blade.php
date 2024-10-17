<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl bg-emerald-500 dark:text-green-600 leading-tight Montserrat ">
               WIRELESS GIG
            </h2>
        </div>
    </x-slot>

    @php( $homeGallerys = \App\Models\HomeGallerys::orderBy('id', 'asc')->get())



            <div class="container bg-black mx-auto px-6 pb-8 mt-20 rounded-lg">
                <h2 class="Oswald text-white text-4xl font-black pt-10">MEMBERSHIP</h2>
            </div>
       

        <div class="container-fluid bg-white mx-auto">
            <div>
                <div class="relative overflow-hidden">
                    <img class=" h-96 object-cover w-full" src="{{ asset('image/wire.png') }}" alt="Image">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>

                <div class="absolute container-fluid lg:px-16 px-10 mx-auto lg:w-4/5 bg-transparent headCap rounded-lg">
                 
                    <h2 class="text-white MenloRegular font-semibold text-3xl lg:text-3xl py-2">JOIN THE FUTURE OF CREATIVITY</h2>
                  

                    <div class="pt-6">
                        <a href="{{ route('contact') }}" class="bg-white text-black font-black px-4 py-4">SIGN UP &rarr;</a>
                    </div>
                
                </div>
            </div> 
        </div>

        <div class="container bg-black mx-auto px-6 pb-10 card-container ">

            <div class="container bg-black mx-auto pb-8 mt-20 rounded-lg">
                <h2 class="Oswald text-white text-4xl font-black pt-10">MEMBERS BENEFITS</h2>
            </div>
           
                <div class="rounded-lg lg:grid grid-cols-3 gap-4 "> 
                    <div>
                        <img class="w-full  object-cover py-4" style="border-radius:50px;" src="{{ asset('image/MB1.png') }}" alt="">
                        <div class="  mx-auto lg:w-4/5 headCap rounded-lg">
                            <h2 class="text-white Oswald font-semibold text-xl lg:text-2xl py-2 uppercase">Exclusive Access</h2>
                            <p class="Montserrat text-left text-sm py-4">First to hear new music and exclusive content.
                            Premium Articles: Access in-depth articles and interviews on music and technology.</p>
                        </div>
                    </div>

                    <div>
                        <img class="w-50 py-4 rounded-lg" style="border-radius:50px;" src="{{ asset('image/MB2.png') }}" alt="">
                        <div class="  mx-auto lg:w-4/5 headCap rounded-lg">
                            <h2 class="text-white Oswald font-semibold text-xl lg:text-2xl py-2 uppercase">Networking</h2>
                            <p class="Montserrat text-left text-sm py-4">
                            Connect with music enthusiasts and professionals.
                            Participatein Exclusive sessions with top artists and industry experts.
                            </p>
                        </div>
                    </div>

                    <div>
                        <img class="w-50 py-4 rounded-lg" style="border-radius:50px;" src="{{ asset('image/MB3.png') }}" alt="">
                        <div class="  mx-auto lg:w-4/5 headCap rounded-lg">
                            <h2 class="text-white Oswald font-semibold text-xl lg:text-2xl py-2 uppercase">Discounts and Offer</h2>
                            <p class="Montserrat text-left text-sm py-4">
                            Special ticket discounts for gigs and festivals.
                            Merchandise Offers: Exclusive deals on merchandise and music equipment. free shipping on all orders.
                            </p>
                        </div>
                    </div>
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
