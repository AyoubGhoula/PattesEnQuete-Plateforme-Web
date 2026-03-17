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

                <h1 class="text-3xl font-bold mb-2" id="page-title">My Requests</h1>
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

                        @foreach ( $adoptionRequests as $adoptionRequest)
                        <div class="relative bg-gray-900 block p-6 border border-gray-100 rounded-lg max-w-sm mx-auto mt-24" href="#">
                            
                            <div class="my-4">
                                <h2 class="text-white text-2xl font-bold pb-2">{{ $adoptionRequest->pet->name }}</h2>
                                <p class="text-gray-300 py-1">{{ $adoptionRequest->pet->type }}</p>
                                <h2>_________________________________________________</h2>

                                <p class="text-gray-300 py-1">{{ $adoptionRequest->message }}</p>
                            </div>
                            <div class="flex  m-1">
                                <span class="inline-block bg-teal-200 text-teal-800 py-1 px-4 text-xs rounded-full uppercase  font-semibold tracking-wide text-center">{{$adoptionRequest->status  }}</span>
                            </div>
                            <div class="flex justify-end">
                                <form action="{{ route('adoptionRequests.destroy', $adoptionRequest->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Request?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-white border border-gray-200 font-semibold rounded hover:bg-gray-800">Delete</button>
                                </form></div>
                        </div>
                        @endforeach

                    </div>
                    {{-- <div class="mt-4">
                        {{ $pets->links() }}
                    </div> --}}
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
