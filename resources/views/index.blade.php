<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl bg-emerald-500 dark:text-green-600 leading-tight Montserrat ">
                WIRELESS GIG
            </h2>
        </div>
    </x-slot>

    
    @php( $homeGallerys = \App\Models\HomeGallerys::orderBy('id', 'asc')->get())
    @php( $homeAbouts = \App\Models\HomeAbouts::orderBy('id', 'asc')->get())
    @php( $homeServices = \App\Models\HomeServices::orderBy('id', 'asc')->get())
    @php( $partners = \App\Models\partners::orderBy('id', 'asc')->get())
    @php( $programs = \App\Models\programs::orderBy('id', 'asc')->get())
    @php( $eprograms = \App\Models\ExplorePrograms::orderBy('id', 'asc')->get())
    @php( $homeVideos = \App\Models\HomeVideos::where('publish', 1)->orderBy('id', 'asc')->get())
    @php( $events = \App\Models\Events::orderBy('created_at', 'desc')->value('id') )
    @php( $speakers = \App\Models\Speakers::orderBy('order_number', 'asc')->where('event_id', $events)->limit(8)->get() )


       
    @if(session('success'))
    <div class="absolute top-0 left-0 mt-4 mr-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"
        role="alert" id="success-message">
        <strong class="font-bold">Successful update!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var successMessage = @json(session('success'));

                // Show an alert box if there's a success message
                if (successMessage) {
                    alert(successMessage);
                }

                // Automatically hide the success message after 5 seconds
                setTimeout(function () {
                    document.getElementById('success-message').style.display = 'none';
                }, 5000); // 5000 milliseconds (5 seconds)
            });
        </script>
    @endif
    
          
        <div class="container-fluid bg-white mx-auto">
            <div class="carousel h-screen">
                <div class="carousel-inner2">
                    @foreach($homeGallerys as $gallery)
                    <div class="carousel-item2 h-screen" data-title="Slide">
                        <div class="relative overflow-hidden">
                            <img class="" src="public{{ $gallery->path }}" alt="Image">
                            <div class="absolute inset-0 bg-black opacity-50"></div>
                        </div>

                        <div class=" container-fluid lg:px-16 px-10 mx-auto lg:w-4/5 bg-transparent headCap rounded-lg">
                            @if($gallery->header)
                            <h2 class="text-white Oswald font-semibold text-sm lg:text-base py-2">{{ $gallery->header }}</h2>
                            @endif
                            @if($gallery->button)
                                <div class="pt-6">
                                    <a target="_blank" href=" {{ $gallery->embed}}" style="background-color:#006046;" class="px-4 py-2 rounded">
                                    @if($gallery->button)
                                    {{ $gallery->button }}
                                    @endif
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <button class="prev-btn2 text-3xl" style="background-color:transparent; color:white;"><span>&#8592;</span></button>
                <button class="next-btn2  text-3xl" style="background-color:transparent; color:white;"><span>&#8594;</span></button>
            </div>
        </div>

        <div class="container-fluid bg-black text-white mx-auto px-6 lg:px-20 py-6">
            <div class="text-black py-4" style="min-width: 50vw;">
                <p class="text-white text-lg Montserrat py-4">Together, we Champion</p>
                <h2 class="text-center Oswald font-black text-white text-3xl">INDIVIDUALITY, CREATIVITY AND COLLABORATION</h2>
            </div>
            <div class="my-4 lg:flex justify-between py-6">
                <div class="text-black text-left py-4 pt-12" style="min-width: 50vw;">
                    <h2 class=" Oswald font-black py-2 text-orange-500 text-4xl">CONNECT</h2>
                    <h2 class=" Oswald font-black py-2 text-green-900 text-4xl">COLLABORATE</h2>
                    <h2 class=" Oswald font-black py-2 text-white text-4xl">THRIVE</h2>
                </div>
                @foreach($homeAbouts as $about)
                <div class="text-white py-4">
                    <p class="Montserrat text-left text-sm py-4">
                        {{ $about->details }}
                    </p>
                    <div class="pt-10 pb-4">
                        <a href="{{route('about')}}" class="bg-white text-black font-black px-4 py-4">LEARN MORE &rarr;</a>
                    </div>
                </div>    
                @endforeach  
            </div>

            <!--<div class="" data-title="Slide 1">
                <img style="border-radius:2rem;" src="https://res.cloudinary.com/nieleche/image/upload/v1724786459/IMG_6449_2_mms2gb.png" alt="">
            </div>-->


        <div class="container-fluid mx-auto py-6  rounded-lg">
            <div style="border-radius:2rem;" class="bg-black">
                <div class="">
                    @foreach($homeVideos as $video)
                    <div style="border-radius:2rem;" class="relative my-2 rounded-lg overflow-hidden">
                        <iframe style="height:600px;" class="rounded-lg w-full h-full" src="{{ $video->embed }}" frameborder="0" allow="accelerometer;" allowfullscreen></iframe>
                    </div>
                    @endforeach
                  
                </div>
            </div>
        </div>

            <div class="my-4 lg:flex justify-between py-12">
                <div class="text-black text-left py-4 " style="min-width: 50vw;">
                    <h2 class=" Oswald font-black py-2 text-white text-4xl">WE CURATE <br>
                    DOPE EXPERIENCES.</h2>
                </div>
                @foreach($homeAbouts as $about)
                <div class="text-white py-4">
                    <p class="Montserrat text-left text-sm py-4">
                        At The Wireless Gig, we curate experiences that transcend time, blending standard-setting creativity with unparalleled uniqueness. From art showcases to Talent hubs and  immersive performances, our events and creative  programs are where magic happens.
                    </p>
                    <div class="pt-10 pb-4">
                        <a href="{{route('events')}}" class="bg-white text-black font-black px-4 py-4">LEARN MORE &rarr;</a>
                    </div>
                </div>    
                @endforeach  
            </div>

            <div class="" data-title="Slide 1">
                <img style="border-radius:2rem;" src="https://res.cloudinary.com/nieleche/image/upload/v1724786459/IMG_6449_2_mms2gb.png" alt="">
            </div>

            <div class="my-4 lg:flex justify-between py-6">
                <div class="text-black text-left py-4 pt-12 flex " style="min-width: 50vw; align-items:center;">
                    <div>
                          <h2 class=" Oswald font-black py-2 text-white text-4xl">LISTEN TO OUR EP</h2>
                        <div class="pt-10 pb-4">
                            <a target="_blank" href="https://audiomack.com/the-wireless-gig/song"  class="bg-white text-black font-black px-4 py-4">Here &rarr;</a>
                        </div>
                    </div>
                </div>
                @foreach($homeAbouts as $about)
                <div class="image-container pt-12">
                    <img style="border-radius:2rem;" src="https://res.cloudinary.com/nieleche/image/upload/v1724789940/Frame_1000004763_jqvare.png" alt="">
                    </div>

                @endforeach  
            </div>
        </div>


        <div class="container-fluid  bg-black mx-auto px-6 py-6 lg:px-20 lg:py-2">
            <div class="my-4 lg:flex justify-between py-6">
                <div class="text-black text-left px-4  pt-12 flex" style="min-width: 40vw; justify-content:center;">
                    <img style="width:400px; height:500px; object-fit:contain;" src="https://res.cloudinary.com/nieleche/image/upload/v1724819706/upscaled-2x-image_54_1_qwmelr.png" alt="">   
                </div>
                @foreach($homeAbouts as $about)
                <div class="text-white py-4 flex px-4" style="align-items:center;">
                    <div>
                        <h2 class=" Oswald font-black py-2 text-orange-500 text-3xl">LIFE IS WIRELESS, 
                        AND SO IS YOUR JOURNEY WITH US.</h2>
                        <p class="Montserrat text-left text-sm py-4">
                            We champion the freedom to be ourselves, the courage to express our ideas, and the joy of working together to bring them to life. We dare to be audacious and unconventional in a normal world. Here, no idea is too wild!
                        </p>
                        <div class="pt-10 pb-4">
                            <a href="{{route('contact')}}" class="bg-white text-black font-black px-4 py-4">CONNECT &rarr;</a>
                        </div>
                    </div>
                </div>    
                @endforeach  
            </div>
        </div>

        <div class="container-fluid bg-black mx-auto px-6 lg:px-20 py-12">
            <div class="container mx-auto  lg:px-20 px-6">
                <div class="py-12 lg:flex justify-between">
                    <div class="text-white py-4" style="min-width: 40vw;">
                        <h2 class="Oswald text-4xl font-black">JOIN OUR MAILING LIST</h2>
                        <p class="Montserrat text-left text-sm py-4">Sign up for priority access and be the first to know about  <br>our upcoming events.</p>
                        <form action="{{ route('subscribe') }}" method="post" enctype="multipart/form-data" class="w-full">
                            @csrf
                            
                            <div class="grid grid-cols-2 gap-4 Montserrat">
                                <div class="col-span-2">
                                    <label for="name">Name:</label><br>
                                    <input class="w-full rounded-lg" type="text" id="name" name="name"><br>
                                </div>
                                <div class="col-span-2">
                                    <label for="email">Email:</label><br>
                                    <input class="w-full rounded-lg" type="email" id="email" name="email"><br>
                                </div>
                                <div class="col-span-2">
                                    <label for="location">Location</label><br>
                                    <input class="w-full rounded-lg" type="text" id="comment" name="comment"><br>
                                </div>
                                <div class="col-span-2">
                                    <div class="form-group flex">
                                        <input class="my-2" type="checkbox" name="accept_terms" value="yes" id="accept_terms">
                                        <p class="Montserrat text-left text-xs px-2">I agree to receive marketing material and event <br> information from Thewireless gig and associated events.</p>
                                    </div>
                                </div>
                               
                            </div>
                            <button class="Montserrat bg-white text-black px-4 py-4 mt-6" type="submit">Subscribe  &rarr;</button>
                        </form>
                    </div>

                    <div class="text-black py-4 px-6">
                        <div>
                        <img style="border-radius:2rem;" src="https://res.cloudinary.com/nieleche/image/upload/v1724825001/Frame_1000005160_s7tyxl.png" alt="">
                        </div>
                    </div>      
                </div>
            </div>
            <hr>
        </div>
      

      
      
     


        <script>
            "use strict"

            // Adding scroll event listener
            document.addEventListener('scroll', horizontalScroll);

            //Selecting Elements
            let sticky = document.querySelector('.sticky');
            let stickyParent = document.querySelector('.sticky-parent');

            let scrollWidth = sticky.scrollWidth;
            let verticalScrollHeight = stickyParent.getBoundingClientRect().height-sticky.getBoundingClientRect().height;

            //Scroll function 
            function horizontalScroll(){

                //Checking whether the sticky element has entered into view or not
                let stickyPosition = sticky.getBoundingClientRect().top;
                if(stickyPosition > 1){
                    return;
                }else{
                    let scrolled = stickyParent.getBoundingClientRect().top; //how much is scrolled?
                    sticky.scrollLeft =(scrollWidth/verticalScrollHeight)*(-scrolled)*0.85;
                
                }
            }
        </script>

    
</x-app-layout>
