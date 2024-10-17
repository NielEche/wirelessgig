<footer class="bg-black">
    <div class="lg:flex container justify-between bg-black mx-auto px-12 py-10" style="align-items:flex-end;">
        <div class="MenloRegular text-white" style="">
            <div class="flex justify-center lg:justify-start">
                <img class="w-40" src="https://res.cloudinary.com/nieleche/image/upload/v1724783944/logo_2_u8romc.png" alt="logo">  
            </div>
            
            <div class="mx-auto py-8">
                <p class="text-xs font-bold lg:text-left text-center">&copy; {{ date('Y') }} THE WIRELESS GIG ALL RIGHTS RESERVED</p>
            </div> 
        </div>
        <div class="MenloRegular text-white lg:text-left text-center pb-6">
            <a href="{{ route('about') }}"  class="text-sm font-bold">ABOUT</a><br><br>
            <a href="{{ route('clients') }}" class="text-sm font-bold">CLIENT</a><br><br>
            <a href="{{ route('events') }}"class="text-sm font-bold">EVENTS</a><br><br>
            <a href="{{ route('blog') }}"class="text-sm font-bold">BLOG</a><br><br>
            <a href="/"class="text-sm font-bold">SHOP</a><br><br>
            <a href="{{ route('gallery') }}"class="text-sm font-bold">GALLERY</a><br><br>
            <a href="{{ route('contact') }}" class="text-sm font-bold">MEMBERSHIP</a>
        </div>
    </div>
</footer>