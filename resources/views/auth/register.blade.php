<x-guest-layout>
    <div class="flex justify-center py-4">
        <a href="/"> <img class="w-12"
                src="https://res.cloudinary.com/nieleche/image/upload/v1724783944/logo_2_u8romc.png" style="width:80px !important;" alt=""></a>
    </div>



    <form id="registrationForm" class="MenloRegular " method="POST" action="{{ route('register') }}">
        @csrf

        <div id="section1">
            <!-- Section 1: First Name, Last Name, Email, and Job Title -->
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Your Full Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Preferred Email Address')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

        

            <script>
                function toggleBoothSizeSelect() {
                    var roleSelect = document.getElementById('role');
                    var boothSizeSelect = document.getElementById('boothSizeSelect');

                    if (roleSelect.value === 'exhibitor') {
                        boothSizeSelect.style.display = 'block';
                    } else {
                        boothSizeSelect.style.display = 'none';
                    }
                }
            </script>

        <script>
            function toggleAgeAndGender() {
                var roleSelect = document.getElementById('role');
                var ageSelect = document.getElementById('age');
                var genderSelect = document.getElementById('gender');
                var ageSelect2 = document.getElementById('age1');
                var genderSelect2 = document.getElementById('gender1');

                // Check if exhibitor is selected
                if (roleSelect.value === 'exhibitor') {
                    // Hide age and gender fields
                    ageSelect.style.display = 'none';
                    genderSelect.style.display = 'none';
                    ageSelect2.style.display = 'none';
                    genderSelect2.style.display = 'none';
                    // Set their values to null
                    ageSelect.value = null;
                    genderSelect.value = null;
                } else {
                    // Show age and gender fields
                    ageSelect.style.display = 'block';
                    genderSelect.style.display = 'block';
                    ageSelect2.style.display = 'block';
                    genderSelect2.style.display = 'block';
                }
            }
        </script>

    


            <div class="mt-4">
                <x-input-label for="address" :value="__(' Where do you currently live')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone" :value="__('What is your mobile number')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div id="gender1"  class="mt-4">
                <x-input-label for="gender" :value="__('Gender')" />
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                <select class="block mt-1 w-full rounded-lg text-white bg-black border-black focus:border-black focus:ring-black" id="gender" name="gender" autofocus >
                    <option value="" selected disabled>Your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div id="age1" class="mt-4">
                <x-input-label for="age" :value="__('Age range')" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
                <select class="block mt-1 w-full rounded-lg text-white bg-black border-black focus:border-black focus:ring-black" id="age" name="age" autofocus >
                    <option value="" selected disabled>Select Age Range</option>
                    <option value="13 - 17 Years">13 - 17 Years</option>
                    <option value="18 - 29 Years">18 - 29 Years</option>
                    <option value="30 - 39 Years">30 - 39 Years</option>
                    <option value="40 - 49 Years">40 - 49 Years</option>
                    <option value="50 - 59 Years">50 - 59 Years</option>
                    <option value="60 and Above">60 and Above</option>
                </select>
            </div>

               <!-- Password -->


               <div class="mt-4 relative">
                <x-input-label for="password" :value="__('Password')" />
                <div class="flex items-center">
                    <x-text-input id="password" class="block pr-10 mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                    <!-- Eye icon for toggling password visibility -->
                    <div class="absolute right-0 pr-3 flex items-center">
                        <button id="togglePassword" type="button"
                            class="text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <p class="text-xs text-white">The password field must be at least 8 characters</p>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 relative">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <div class="flex items-center">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <!-- Eye icon for toggling password visibility -->
                    <div class="absolute right-0 pr-3 flex items-center">
                        <button id="toggleConPassword" type="button"
                            class="text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
              
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
           
           <x-primary-button class="ms-4">
               {{ __('Register') }}
           </x-primary-button>
       </div>

            <script>
                const togglePassword = document.getElementById('togglePassword');
                const passwordField = document.getElementById('password');

                togglePassword.addEventListener('click', function () {
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);
                });

            </script>

            <script>
                const toggleConPassword = document.getElementById('toggleConPassword');
                const conPasswordField = document.getElementById('password_confirmation');

                toggleConPassword.addEventListener('click', function () {
                    const type = conPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    conPasswordField.setAttribute('type', type);
                });

            </script>

        </div>


         <!-- Loader element -->
         <div id="loader" class="hidden animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-gray-900"></div>
    </form>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white dark:text-white hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>



    <script>
        const section1 = document.getElementById('section1');
        const section2 = document.getElementById('section2');
        const nextButton = document.getElementById('nextButton');
        const prevButton = document.getElementById('prevButton');
        const navigationButtons = document.getElementById('navigationButtons');

        nextButton.addEventListener('click', () => {
            section1.style.display = 'none';
            section2.style.display = 'block';
            prevButton.style.display = 'block';
            nextButton.style.display = 'none';
        });

        prevButton.addEventListener('click', () => {
            section1.style.display = 'block';
            section2.style.display = 'none';
            prevButton.style.display = 'none';
            nextButton.style.display = 'block';
        });

    </script>

    <script>
        // Get form, button, and loader elements
        const registerForm = document.getElementById('registrationForm');
        const registerButton = document.getElementById('registerButton');
        const loader = document.getElementById('loader');

        // Add event listener to form submit
        registerForm.addEventListener('submit', function(event) {
            // Prevent default form submission
            event.preventDefault();

            // Show loader and disable button
            loader.classList.remove('hidden');
            registerButton.disabled = true;

            // Submit the form
            this.submit();
        });
    </script>

</x-guest-layout>
