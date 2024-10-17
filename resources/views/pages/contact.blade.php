<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl bg-emerald-500 dark:text-green-600 leading-tight MenloRegular ">
                PH TECH EXPO
            </h2>
        </div>
    </x-slot>

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

    <div class="container-fluid lg:flex bg-black justify-between py-36 px-12" >
        <div class="text-white py-4 MenloRegular text-left" style="min-width: 50vw;">
            <h2 class="text-4xl py-2 upercase">Contact Us Today</h2>
            <br>
            <a href="tel:+44 7587 118250" class="text-xl text-white py-2">T: +44 7587 118250</a> <br>
            <a href="mailto:thewirelessgig@gmail.com" class="text-xl text-white py-2">E: thewirelessgig@gmail.com</a>
        </div>

       <!-- <div class="text-black py-4">
            <div>
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'contactform')" id="add-feature-button"
                    class=" bg-white  MenloRegular text-black px-4 py-2 rounded">
                    Get in touch
                </button>
            </div>
        </div> -->
        
    </div>


    <x-modal name="contactform" focusable>
                <!-- Modal Content -->
                <div class="p-12 bg-emerald-500">
                    <form action="{{ route('subscribe') }}" method="post" enctype="multipart/form-data" class="w-full">
                        @csrf
                        
                        <div class="grid grid-cols-2 gap-4 MenloRegular">
                            <div>
                                <label for="name">Name:</label><br>
                                <input class="w-full rounded-lg" type="text" id="name" name="name"><br>
                            </div>
                            <div>
                                <label for="email">Email:</label><br>
                                <input class="w-full rounded-lg" type="email" id="email" name="email"><br>
                            </div>
                            <div class="col-span-2">
                                <label for="phone">Phone Number:</label><br>
                                <input class="w-full rounded-lg" type="text" id="phone" name="phone"><br>
                            </div>
                            <div class="col-span-2">
                                <label for="message">Question/Comment:</label><br>
                                <textarea class="w-full rounded-lg" id="comment" name="comment"></textarea><br>
                            </div>
                        </div>
                        <button class="MenloRegular bg-black text-white px-4 py-2 mt-3 rounded-lg" type="submit">Submit</button>
                    </form>
                </div>
            </x-modal>

</x-app-layout>
