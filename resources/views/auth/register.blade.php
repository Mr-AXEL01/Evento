<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- ___________image___________ -->

        <div class="flex items-center justify-center space-x-6 my-5  rounded-md">
            <label class="block">
                <span class="sr-only">Choose profile photo</span>
                <input name="picture" type="file" onchange="loadFile(event)" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-violet-50 file:text-violet-700
                                hover:file:bg-violet-100
                                hidden
                            " />
                <img id='preview_img' class="h-20 w-20 object-cover rounded-full shadow-lg cursor-pointer"
                     src="https://pics.craiyon.com/2023-07-02/a9c38719ebdd4004b7eeec1723404423.webp"
                     alt="Current profile photo" />
            </label>
        </div>

        <!-- ________check role________ -->
        <div class="flex justify-center items-center mt-10 mb-5">
            <input type="radio" id="organiser" name="role" value="organiser" class="hidden"
                   onclick="toggleColor('organiser')">
            <label for="organiser"
                   class="bg-white border-2 border-violet-500 text-violet-500 hover:bg-gray-300 rounded-md py-2 cursor-pointer transition-colors duration-300 ease-in-out px-20 mr-6">Organiser</label>

            <input type="radio" id="customer" name="role" value="customer" class="hidden"
                   onclick="toggleColor('customer')">
            <label for="customer"
                   class="bg-white border-2 border-violet-500 text-violet-500 hover:bg-gray-300 rounded-md py-2 cursor-pointer transition-colors duration-300 ease-in-out px-20">Customer</label>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script>

        //------------------------ active check role -----------------------

        function toggleColor(role) {
            // D'abord, enlever la classe "selected" de tous les labels
            document.querySelectorAll('label').forEach(label => {
                label.classList.remove('selected');
            });

            // Ensuite, ajouter la classe "selected" au label cliqué
            document.querySelector('label[for="' + role + '"]').classList.add('selected');
        }

        // ------------ download image ----------------------------

        var loadFile = function(event) {

            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            var output = document.getElementById('preview_img');


            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</x-guest-layout>
