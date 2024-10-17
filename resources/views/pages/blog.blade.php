<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl bg-emerald-500 dark:text-green-600 leading-tight Montserrat ">
               WIRELESS GIG
            </h2>
        </div>
    </x-slot>

    @php
        $blogs = \App\Models\Blogs::where('publish', 1)->orderBy('id', 'asc')->get();
        $eventsmain = \App\Models\EventsMains::orderBy('id', 'asc')->get();
        $lastBlog = \App\Models\Blogs::where('publish', 1)->orderBy('id', 'desc')->first();

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



        <div class="container-fluid bg-white mx-auto">
            <div>
                <div class="relative overflow-hidden">
                    <img class=" h-96 object-cover w-full" src="{{ $lastBlog->path }}" alt="Image">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>

               
                <div class="absolute container-fluid lg:px-16 px-10 mx-auto lg:w-4/5 bg-transparent headCap rounded-lg">
                    <p class="text-left w-full mt-10 ">Featured</p>
                    <h2 class="text-white MenloRegular font-semibold text-2xl lg:text-3xl py-2">{{ $lastBlog->theme }}</h2>
                    <p class="text-sm text-left py-4 leading-2 Montserrat">{{ Str::limit($lastBlog->about, 50) }}
                    </p>

                    <div class="pt-6">
                        <a href="{{ route('contact') }}" class="bg-white text-black font-black px-4 py-4">READ &rarr;</a>
                    </div>
                
                </div>
            </div> 
        </div>

        @if(!$blogs->isEmpty())
            <div class="container mx-auto px-6  py-8">
                <h2 class="Oswald text-white text-4xl font-black py-2"> BLOG</h2>
            </div>
        @endif

        <div class="container lg:grid grid-cols-3 gap-4  bg-black mx-auto px-6 pb-16 card-container">
            @foreach($blogs as $blog)
            <a href="{{ route('blogdetails.view', ['blogdetails' => $blog->id]) }}">
                    <div class=""> 
                            <img style="width:100%; height:300px; object-fit:cover;" class="pt-4" src="{{ $blog->path }}" alt="">
                            <div class="text-black bg-white text-left px-4 py-2 h-52">
                                 <h2 class="Oswald text-xl pt-4">{{ $blog->theme }}</h2>
                                 <p class="text-sm text-left py-4 leading-6 Montserrat">{{ Str::limit($blog->about, 100) }}</p>
                                <p class="text-sm text-left py-4 leading-6 Montserrat">Read &rarr;</p>
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
