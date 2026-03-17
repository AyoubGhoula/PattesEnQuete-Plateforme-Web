@extends('home')

@section('content')
<div class="container mx-auto p-6 max-w-2xl bg-gray-800 shadow-lg rounded-lg">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-200">Create Adoption Request</h1>
        <a href="{{ route('adoptionRequests.index') }}" class="bg-gray-600 text-gray-200 px-4 py-2 rounded-md hover:bg-gray-700 transition duration-300">
            &larr; Return to Pets
        </a>
    </div>

    <form action="{{ route('adoptionRequests.store') }}" method="POST" class="space-y-6">
        @csrf
        <!-- Pet ID (Hidden) -->
        <input type="hidden" name="pet_id" value="{{ $pet->id }}">
        
        <!-- Pet Information Section -->
        <div class="bg-gray-700 p-6 rounded-lg mb-6 shadow-lg flex items-center space-x-6">
            <!-- Pet Image -->
            <div class="w-24 h-24 flex-shrink-0">
                <img src="{{ $pet->image_path ? asset('storage/'.$pet->image_path) : 'https://via.placeholder.com/150' }}" alt="{{ $pet->name }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300 ease-in-out">
            </div>
            {{-- <div class="relative w-32 h-32 md:w-48 md:h-48 mb-4 md:mb-0 rounded-lg overflow-hidden shadow-lg">
                <img src="{{ $pet->image_path ? asset('storage/'.$pet->image_path) : 'https://via.placeholder.com/150' }}" alt="{{ $pet->name }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300 ease-in-out">
            </div> --}}
            <!-- Pet Details -->
            <div class="flex-1">
                <h2 class="text-2xl font-bold text-gray-200 mb-2">Pet Information</h2>
                <p class="text-lg text-gray-300"><strong>Name:</strong> {{ $pet->name }}</p>
                <p class="text-lg text-gray-300"><strong>Type:</strong> {{ $pet->type }}</p>
                <p class="text-lg text-gray-300"><strong>Age:</strong> {{ $pet->age }}</p>
                <p class="text-lg text-gray-300"><strong>Description:</strong> {{ $pet->description }}</p>
            </div>
        </div>


        <!-- Message Field -->
        <div>
            <x-input-label for="message" :value="__('Message')" />
            <x-textarea id="message" name="message" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('message') border-red-500 @enderror" rows="4" placeholder="Enter your message" required>{{ old('message') }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('message')" />
        </div>

        <!-- User Selection -->
        {{-- <div>
            <x-input-label for="user_id" :value="__('User')" />
            <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('user_id') border-red-500 @enderror" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
        </div> --}}

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none transition duration-300">Submit Request</button>
        </div>
    </form>
</div>
@endsection
