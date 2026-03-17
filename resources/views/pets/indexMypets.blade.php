<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
        @extends('Left_Sidebar')

            @section('right-section')

                    <h1 class="text-3xl font-bold mb-2" id="page-title">MY Pets</h1>
                    <x-primary-button class="ms-4" onclick="window.location='{{ route('pets.create') }}'">
                        {{ __('Add New Pet') }}
                    </x-primary-button>


                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 p-8 rounded mb-4 relative" id="success-message">
                            <button onclick="closeSuccessMessage()" class="absolute top-[35%] right-2 text-green-700 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 text-red-700 p-8 rounded mb-4 relative" id="error-message">
                            <button onclick="closeErrorMessage()" class="absolute top-[35%] right-2 text-red-700 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Grid Layout for Pet Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="post-list">
                        {{-- @forelse($pets as $pet)
                        @if(request()->has('my_demands') && request()->get('my_demands') == true)
                            @include('adoptionRequests.show', ['adoptionRequest' => $pet->adoptionRequest, 'pet' => $pet])
                        @else
                                @include('pets.show', ['pet' => $pet])
                            @endif --}}
                        @foreach ( $pets as $pet )
                        <a href="{{ route('pets.show',$pet) }}" onclick="showPetDetails('{{ $pet->id }}')" class="max-w-sm bg-white border hover:scale-105 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <img src="{{ $pet->image_path ? asset('storage/'.$pet->image_path) : 'https://via.placeholder.com/150' }}" alt="{{ $pet->name }}" class=" h-48 w-full object-cover object-end rounded-lg transition-transform duration-300 ease-in-out">
                            <div class="p-2">
                              <div class="flex items-baseline"></div>

                              <h4 class=" text-3xl font-bold leading-tight truncate uppercase text-center">{{ $pet->name }}</h4>
                            <div class="flex justify-center m-2">
                                <span class="inline-block bg-teal-200 text-teal-800 py-1 px-4 text-xs rounded-full uppercase items-center font-semibold tracking-wide text-center">{{ $pet->type }}</span>
                            </div>

                              <div class="mt-1 items-center">
                                <div class="flex items-center justify-center bg-violet-400 mx-7 rounded-full bg-opacity-5 ">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" class="w-6 h-6">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M18.5 9.00002H16.5M16.5 9.00002L14.5 9.00002M16.5 9.00002L16.5 7M16.5 9.00002L16.5 11" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M8.96173 19.3786L9.43432 18.7963L8.96173 19.3786ZM12 5.57412L11.4522 6.08635C11.594 6.23803 11.7923 6.32412 12 6.32412C12.2077 6.32412 12.406 6.23803 12.5478 6.08635L12 5.57412ZM15.0383 19.3787L15.5109 19.961L15.0383 19.3787ZM12 21L12 20.25L12 21ZM2.65159 13.6821C2.86595 14.0366 3.32705 14.1501 3.68148 13.9358C4.03591 13.7214 4.14946 13.2603 3.9351 12.9059L2.65159 13.6821ZM6.53733 16.1707C6.24836 15.8739 5.77352 15.8676 5.47676 16.1566C5.18 16.4455 5.17369 16.9204 5.46267 17.2171L6.53733 16.1707ZM2.75 9.3175C2.75 6.41289 4.01766 4.61731 5.58602 4.00319C7.15092 3.39043 9.34039 3.82778 11.4522 6.08635L12.5478 5.06189C10.1598 2.50784 7.34924 1.70187 5.0391 2.60645C2.73242 3.50967 1.25 5.99209 1.25 9.3175H2.75ZM15.5109 19.961C17.0033 18.7499 18.7914 17.1268 20.2127 15.314C21.6196 13.5196 22.75 11.4354 22.75 9.31747H21.25C21.25 10.9289 20.3707 12.6814 19.0323 14.3884C17.7084 16.077 16.0156 17.6197 14.5657 18.7963L15.5109 19.961ZM22.75 9.31747C22.75 5.99208 21.2676 3.50966 18.9609 2.60645C16.6508 1.70187 13.8402 2.50784 11.4522 5.06189L12.5478 6.08635C14.6596 3.82778 16.8491 3.39042 18.414 4.00319C19.9823 4.6173 21.25 6.41287 21.25 9.31747H22.75ZM8.48914 19.961C9.76058 20.9928 10.6423 21.75 12 21.75L12 20.25C11.2771 20.25 10.8269 19.9263 9.43432 18.7963L8.48914 19.961ZM14.5657 18.7963C13.1731 19.9263 12.7229 20.25 12 20.25L12 21.75C13.3577 21.75 14.2394 20.9928 15.5109 19.961L14.5657 18.7963ZM3.9351 12.9059C3.18811 11.6708 2.75 10.455 2.75 9.3175H1.25C1.25 10.8297 1.82646 12.3179 2.65159 13.6821L3.9351 12.9059ZM9.43432 18.7963C8.51731 18.0521 7.49893 17.1582 6.53733 16.1707L5.46267 17.2171C6.47548 18.2572 7.53996 19.1908 8.48914 19.961L9.43432 18.7963Z" fill="#ffffff"></path>
                                    </g>
                                    </svg>
                                    <h5 class="ml-2 font-bold pb-1">{{ $pet->health_status }}</h5>
                                </div>
                                <div class="flex items-center justify-center">
                                    <h4 class=" font-bold pb-1">Age :</h4>
                                    <h5 class="ml-2 font-bold pb-1">{{ $pet->age }}</h5>
                                </div>
                                <div class="flex items-center justify-center">
                                    <svg height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.982 511.982" xml:space="preserve" fill="#ffffff" stroke="#ffffff">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path style="fill:#ffffff;" d="M170.65,396.658v104.669c0,5.89,4.781,10.655,10.672,10.655c5.89,0,10.671-4.766,10.671-10.655V396.658H170.65z"></path>
                                        <polygon style="fill:#ffffff;" points="370.846,92.231 355.769,77.137 428.829,4.078 443.906,19.155 "></polygon>
                                        <g>
                                            <path style="fill:#ffffff;" d="M181.322,170.666c-64.795,0-117.324,52.529-117.324,117.324c0,64.81,52.529,117.339,117.324,117.339c64.794,0,117.324-52.529,117.324-117.339C298.646,223.195,246.116,170.666,181.322,170.666z M249.21,355.878c-18.14,18.125-42.249,28.109-67.888,28.109c-25.64,0-49.749-9.984-67.873-28.109c-18.14-18.14-28.124-42.232-28.124-67.888c0-25.64,9.984-49.748,28.124-67.873c18.125-18.124,42.233-28.124,67.873-28.124s49.748,10,67.888,28.124c18.125,18.125,28.108,42.233,28.108,67.873C277.318,313.645,267.335,337.738,249.21,355.878z"></path>
                                            <path style="fill:#ffffff;" d="M213.305,479.983h-63.966c-5.891,0-10.656-4.766-10.656-10.656s4.766-10.671,10.656-10.671h63.966c5.891,0,10.672,4.78,10.672,10.671S219.196,479.983,213.305,479.983z"></path>
                                        </g>
                                        <g>
                                            <path style="fill:#ffffff;" d="M447.984,10.671c0-5.89-4.781-10.655-10.671-10.655V0h-42.327v0.031C394.877,0.015,394.767,0,394.642,0c-5.891,0.016-10.655,4.781-10.655,10.671c0,5.891,4.765,10.672,10.655,10.672c0.125,0,0.234-0.016,0.344-0.016v0.016h31.656v31.655h0.016c0,0.125-0.016,0.234-0.016,0.344c0,5.891,4.78,10.656,10.671,10.656c5.89,0,10.671-4.766,10.671-10.656c0-0.109-0.016-0.219-0.016-0.344h0.016V10.671z"></path>
                                            <path style="fill:#ffffff;" d="M369.441,78.559c-22.922-22.921-52.937-34.374-82.967-34.374s-60.061,11.453-82.966,34.374c-45.827,45.811-45.827,120.105,0,165.916c20.453,20.469,46.592,31.78,73.341,33.968c-0.734-7.562-2.375-14.937-4.812-21.999c-20.17-3.031-38.764-12.359-53.451-27.046c-18.125-18.125-28.108-42.233-28.108-67.873c0-25.655,9.984-49.748,28.108-67.888c18.14-18.125,42.249-28.109,67.888-28.109c25.641,0,49.748,9.984,67.873,28.109c18.14,18.14,28.124,42.232,28.124,67.888c0,25.64-9.984,49.748-28.124,67.873c-16.203,16.218-37.202,25.905-59.795,27.78c1.844,6.797,3.109,13.843,3.703,21.077c25.983-2.609,51.264-13.858,71.186-33.78C415.252,198.665,415.252,124.37,369.441,78.559z"></path>
                                        </g>
                                    </g>
                                    </svg>
                                    <h5 class="ml-2 font-bold pb-1">{{ $pet->sex }}</h5>
                                </div>

                              </div>
                            </div>


                        </a>



                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $pets->links()}}
                    </div>
                    @yield('POPUP_pets')
            @endsection

    <script>


        // Close the success message
        function closeSuccessMessage() {
            var message = document.getElementById('success-message');
            message.style.display = 'none'; // Hide the success message
        }

        // Close the error message
        function closeErrorMessage() {
            var message = document.getElementById('error-message');
            message.style.display = 'none'; // Hide the error message
        }

    </script>
</body>
</html>
