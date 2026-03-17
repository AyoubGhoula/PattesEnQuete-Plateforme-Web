<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
        @extends('home')

            @section('content')
            <div class="flex flex-row space-x-3 mx-3">
                <!-- Left Sidebar for Navigation Buttons -->
                <div class="flex flex-col bg-gray-900 text-white p-4 rounded-lg shadow-md mr-6 space-y-4">
                    <h2 class="text-lg ml-1 border-b border-gray-600 pb-2  font-bold mb-4">Options</h2>
                    <x-secondary-button class="ms-0" onclick="window.location='{{ route('pets.index') }}'">
                        {{ __('Posts') }}
                    </x-secondary-button>
                    <x-secondary-button class="ms-0" onclick="window.location='{{ route('pets.my_pets') }}'">
                        {{ __('My Posts') }}
                    </x-secondary-button>
                    <x-secondary-button class="ms-0" onclick="window.location='{{ route('adoptionRequests.my_requests') }}'">
                        {{ __('My Demandes') }}
                    </x-secondary-button>
                    <x-secondary-button class="ms-0" onclick="window.location='{{ route('adoptionRequests.index') }}'">
                        {{ __('Demandes') }}
                    </x-secondary-button>
                    <!-- Add additional buttons if needed -->
                </div>

                <!-- Right Section for Post List -->
                <div class=" space-y-4 overflow-y-auto w-full flex-1 bg-gray-800 text-white p-4 rounded-lg shadow-md">
                    @yield('right-section')

            </div>
            @endsection

    <script>
        function showPetDetails(petId) {
            // Fetch pet details using AJAX or populate from existing data
            // For simplicity, using static data here
            var pet = {
                id: petId,
                name: 'Pet Name',
                type: 'Pet Type',
                health_status: 'Healthy',
                age: '2 years',
                image_path: 'https://via.placeholder.com/150'
            };

            document.getElementById('pet-modal-image').src = pet.image_path;
            document.getElementById('pet-modal-name').innerText = pet.name;
            document.getElementById('pet-modal-type').innerText = 'Type: ' + pet.type;
            document.getElementById('pet-modal-health-status').innerText = 'Health Status: ' + pet.health_status;
            document.getElementById('pet-modal-age').innerText = 'Age: ' + pet.age;

            document.getElementById('pet-modal').classList.remove('hidden');
        }

        function closePetModal() {
            document.getElementById('pet-modal').classList.add('hidden');
        }

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
