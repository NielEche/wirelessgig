<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-black leading-tight Montserrat ">
              WIRELESS GIG
            </h2>
        </div>
    </x-slot>


    @php( $aboutGallerys = \App\Models\AboutGallerys::orderBy('id', 'asc')->get())
    @php( $aboutUs = \App\Models\AboutUs::orderBy('id', 'asc')->get())

     



    <div class="container bg-black mx-auto px-6 lg:px-20 pt-12">
        <div class="">
        @foreach($aboutUs as $about)
            <div class=" my-4 py-12">
                <h2 class="Oswald py-4 font-bold text-white text-4xl">{{ $about->title }}</h2>
                <div class="Montserrat text-sm text-white text-left aboutdata">
                    {!! $about->content  !!}
                </div>
            </div>
            <hr>
        @endforeach
        </div>
      
    </div>


    <div class="container bg-black mx-auto px-6 lg:px-20 py-10">
        <div class="">
            <div class="">
                <h2 class="Oswald py-4 font-bold text-4xl pb-6 text-center" style="color:#006046;">OUR SERVICES</h2>
                <div class="lg:grid grid-cols-3 gap-4 Montserrat text-sm text-white text-center py-6">
                    <div class="text-center py-2">
                        <h2 class="text-2xl Oswald py-4 font-bold">CREATIVE</h2>
                        <p class="center text-sm"> CAMPAIGN DEVELOPMENT <br>
                            ART DIRECTION <br>
                            COPYWRITING <br>
                            EXPERIENTIAL <br>
                            ACTIVATIONS <br>
                            BRAND STRATEGY <br>
                            WEB & DIGITAL</p>
                    </div>
                    <div class="text-center py-2">
                        <h2 class="text-2xl Oswald py-4 font-bold">SOCIAL</h2>
                        <p class="center text-sm"> ORGANIC + PAID SOCIAL <br>
                            SOCIAL STRATEGY <br>
                            INFLUENCER + BRAND PARTNERSHIPS <br>
                            CONTENT CREATION <br>
                            COMMUNITY MANAGEMENT <br>
                            MULTICULTURAL STRATEGY <br>
                        </p>
                    </div>
                    <div class="text-center py-2">
                        <h2 class="text-2xl Oswald py-4 font-bold">PRODUCTION</h2>
                        <p class="center text-sm"> PHOTO & VIDEO <br>
                            POST PRODUCTION <br>
                            EVENT PRODUCTION <br>
                            FABRICATION <br>
                            MOTION/ 3D / ANIMATION <br>
                            MUSIC PRODUCTION<br>
                        </p>
                    </div>
                    <div class="text-center py-2">
                        <h2 class="text-2xl Oswald py-4 font-bold">DESIGN</h2>
                        <p class="center text-sm"> BRANDING <br>
                            VISUAL IDENTITY <br>
                            PACKAGING <br>
                            ENVIRONMENTAL & RETAIL DESIGN <br>
                            MERCHANDISE<br>
                        </p>
                    </div>
                    <div class="text-center py-2">
                        <h2 class="text-2xl Oswald py-4 font-bold">PUBLIC RELATIONS</h2>
                        <p class="center text-sm"> COMMUNICATIONS STRATEGY <br>
                            INFLUENCER MARKETING <br>
                            PRESS PLANNING <br>
                            CRISIS MANAGEMENT <br>
                            EVENT MANAGEMENTE<br>
                        </p>
                    </div>
                </div>
            </div>
            <hr>
        </div>
      
    </div>



        <style>
            .aboutdata p , .aboutdata li {
                font-size:0.875rem;
                line-height: 1.25rem;
                font-family: Montserrat;
                text-align:left;
            }

            .caption {
                position: relative;
                bottom: 30%;
                left: 0; 
                text-align:left;
                background-color: rgba(0, 0, 0, 0.4);
                color: white;
                width:50%;
                padding: 10px 30px;
            }

           

            .carousel {
                position: relative;
                overflow: hidden;
                margin: 0 auto;
                width: 100%;
            }

            .carousel-inner2 {
                display: flex;
                transition: transform 0.5s ease;
            }

            .carousel-item {
                flex: 0 0 100%;
                width: 100%;
                height:100vh;
            }

            .carousel-item img {
                height:100vh;
                width:100%;
                object-fit: cover;
            }
            .prev-btn2, .next-btn2 {
                position: absolute;
                top: 60%;
                transform: translateY(-50%);
                padding: 10px;
                cursor: pointer;
                z-index: 1;
                background-color:rgb(16 185 129 / var(--tw-bg-opacity)) ;
            }

            .prev-btn2 {
                left: 0;
            }

                @media (max-width: 620px) {
                
                    .caption {
                        width:100%;
                        bottom: 35%;
                    }
                }

            .next-btn2 {
                right: 0;
            }


          
            .counter2 {
                display:flex;
                justify-content:space-between;
                text-align: center;
                margin-top: 10px;
                margin-bottom:20px;
            }

            .counter-number2 {
                display: inline-block;
                width: 40px;
                height: 40px;
                margin: 0 5px;
                cursor: pointer;
                border-radius: 50%;
                line-height: 20px;
                text-align: center;
                padding: 10px;
                color:black;
            }

            .counter-number2.active {
                background-color:rgb(16 185 129 / var(--tw-bg-opacity)) ;
                color: #000
            }

            .sticky-parent{
            height: 700vh;
            }

            .sticky{
            position: sticky;
            top: 0px;
            max-height: 100vh;
            overflow-x: hidden;
            overflow-y: hidden;
            }
            .dim{
            display: block;
            min-width: 70vw;
            height: 100vh;
            }
            .horizontal{
            display: flex;
            }
            .br{
            outline: solid;
            }

            @media (max-width: 620px) {
            .dim{
                display: block;
                min-width: 100vw;
                height: 100vh;
            }
            }

            p{
            font-size: 10em;
            text-align: center;
            }
            
            
        </style>



</x-app-layout>
