<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Admin Gallery
        </h2>
    </x-slot>


    @if(session('success'))
        <div class="absolute top-0 left-0 mt-4 mr-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"
            role="alert" id="success-message">
            <strong class="font-bold">Successful update!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>

        <script>
            setTimeout(function () {
                document.getElementById('success-message').style.display = 'none';
            }, 5000); // 5000 milliseconds (5 seconds)

        </script>
    @endif


    <div class="container-fluid mx-auto pt-16  bg-SelectColor">
        <hr class="  border-black dark:border-black">
        <div class="text-left text-black bg-SelectColor lg:px-24 p-0  relative z-10">
            <h3 class="text-3xl leading-none py-8 font-semibold orpheusproMedium">
            Gallery Details</h3>
        </div>
        <hr class="  border-black dark:border-black">
  
    
    </div>


    <div class="container-fluid mx-auto pt-16  bg-SelectColor">
        <hr class="  border-black dark:border-black">
      
        <hr class="  border-black dark:border-black">
        <div class="flex items-center px-6 py-6">
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addEvent')" id="add-slider-button"
                class="ml-auto text-xl py-4 underline DINAlternateBold  p-6  text-black">
                Create Gallery
            </button>
        </div>
        
        <div class=" flex flex-wrap">
            @foreach($gallerys as $gallery)
              

                <div class="flex-initial w-80 pt-4 px-2">
                    <div class="relative space-y-1 pt-4 border-b  border-black dark:border-black">
                        <div class=" text-center">
                            <img src="{{ $gallery->path }}" alt="Image"
                                class="object-contain storiesBox" />
                           
                            <div class="flex justify-between border-t  border-black dark:border-black py-4">
                                <a x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ $gallery->id }}')" class="text-sm underline  text-black">EDIT</a>   
                              
                                <a x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete{{ $gallery->id }}')"
                                    class="text-sm DINAlternateBold">Delete</a>
                            </div>
                            <!--<div class="flex justify-between border-t  border-black dark:border-black py-4">
                               <a href="{{ route('event.speakers', $gallery->id) }}"
                                    class="text-sm DINAlternateBold">Add Speakers</a>
                                <a href="{{ route('event.schedule', $gallery->id) }}"
                                    class="text-sm DINAlternateBold">Add Schedule</a>
                            </div>-->
                        </div>
                    </div>
                </div>
                <x-modal name="{{ $gallery->id }}" focusable>
                    <!-- Modal Content -->
                    <form method="post"
                        action="{{ route('gallery.update', $gallery->id) }}"
                        class="p-6 bg-emerald-500" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                            {{ __('Edit Gallery Section') }} 
                        </h2>

                        <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                            {{ __('Edit the details for this section below') }}
                        </p>

                        <div class="mt-6 form-check">
                            <input type="checkbox" class="form-check-input" id="publishCheckbox" name="publish" {{ $gallery->publish ? 'checked' : '' }}>
                            <label class="form-check-label" for="publishCheckbox">Publish</label>
                        </div>

                        <div class="mt-6">
                            <p class="orpheusproMedium" for="path" :value="__('path')">Image</p>
                            <input type="file" name="path" id="path" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('path')" />
                        </div>
                      

                        <div class="mt-6 ">
                            <p class="orpheusproMedium" for="theme" :value="__('theme')">Title</p>
                            <x-text-input id="theme" name="theme" type="text" class="mt-1 block w-full"
                                :value="old('theme', $gallery->theme)" required autofocus autocomplete="theme" />
                            <x-input-error class="mt-2" :messages="$errors->get('theme')" />
                        </div>


                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-primary-button class="ml-3">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>

                </x-modal>

                <x-modal name="delete{{ $gallery->id }}" focusable>
                    <!-- Modal Content -->
                    <form method="post"
                        action="{{ route('galleryDelete.destroy', $gallery->id) }}"
                        class="p-6 bg-emerald-500">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                            {{ __('Delete Gallery') }}
                        </h2>

                        <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                            {{ __('Are you sure you want to delete') }}
                        </p>

                        <div class="mt-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ml-3">
                                {{ __('Delete Image') }}
                            </x-danger-button>
                        </div>
                    </form>

                </x-modal>
            @endforeach
        </div>
    </div>
    


       <!-- MODALS MODALS MODALS MODALS -->
       <x-modal name="addEvent" focusable>
            <!-- Modal Content -->
            <form method="post" action="{{ route('gallery.store') }}" class="p-6 bg-emerald-500"
                enctype="multipart/form-data">
                @csrf


                <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                    {{ __('Add a new Image ') }}
                </h2>


                <div class="mt-6">
                    <p class="orpheusproMedium" for="path" :value="__('path')">File*</p>
                    <input type="file" name="path" id="path" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('path')" />
                </div>

         
                <div class="mt-6 ">
                    <p class="orpheusproMedium" for="theme" :value="__('theme')">Title</p>
                    <x-text-input id="theme" name="theme" type="text" class="mt-1 block w-full"  autofocus
                        autocomplete="theme" />
                    <x-input-error class="mt-2" :messages="$errors->get('theme')" />
                </div>
            
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ml-3">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>

        </x-modal>

</x-admin-layout>