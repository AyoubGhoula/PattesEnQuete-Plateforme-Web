@extends('home')

@section('content')
<div class="container mx-auto p-6 max-w-2xl bg-gray-800 shadow-lg rounded-lg">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-200">Edit Pet</h1>
        <a href="{{ route('pets.index') }}" class="bg-gray-600 text-gray-200 px-4 py-2 rounded-md hover:bg-gray-700 transition duration-300">
            &larr; Return to Pets
        </a>
    </div>

    <form action="{{ route('pets.update', $pet->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('name') border-red-500 @enderror" :value="old('name', $pet->name)" required autofocus placeholder="Enter pet's name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Type Field -->
        <div>
            <x-input-label for="type" :value="__('Type')" />
            <x-text-input id="type" name="type" type="text" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('type') border-red-500 @enderror" :value="old('type', $pet->type)" required placeholder="Enter pet's type" />
            <x-input-error class="mt-2" :messages="$errors->get('type')" />
        </div>

        <!-- Age Field -->
        <div>
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" name="age" type="number" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('age') border-red-500 @enderror" :value="old('age', $pet->age)" required placeholder="Enter pet's age" />
            <x-input-error class="mt-2" :messages="$errors->get('age')" />
        </div>
        <!-- Sex Field -->
        <div>
            <x-input-label for="sex" :value="__('Sex')" />
            <select id="sex" name="sex" class="mt-1 block w-full border-gray-500 bg-gray-900 rounded-lg px-4 py-3 text-gray-200 @error('sex') border-red-500 @enderror" required>
            <option value="male" {{ old('sex', $pet->sex) == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('sex', $pet->sex) == 'female' ? 'selected' : '' }}>Female</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
        </div>

        <!-- Description Field -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea id="description" name="description" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('description') border-red-500 @enderror" rows="4" placeholder="Enter a brief description of the pet">{{ old('description', $pet->description) }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <!-- Health Status Field -->
        <div>
            <x-input-label for="health_status" :value="__('Health Status')" />
            <x-text-input id="health_status" name="health_status" type="text" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('health_status') border-red-500 @enderror" :value="old('health_status', $pet->health_status)" required placeholder="Enter health status" />
            <x-input-error class="mt-2" :messages="$errors->get('health_status')" />
        </div>

        <!-- Image Field -->
        <div>
            <x-input-label for="image_path" :value="__('Image')" />

            @if($pet->image_path)
                <!-- Display the current image as a preview -->
                <img src="{{ asset('storage/' . $pet->image_path) }}" alt="Current Image" class="mb-2 w-32 h-32 object-cover">
            @else
                <!-- Placeholder for image if none exists -->
                <p>No image uploaded.</p>
            @endif

            <!-- File Input to Upload a New Image -->
            {{-- FIXME: File Name is not showing --}}
            <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200" />

            <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
        </div>

        <!-- Position Field (if applicable) -->
        <div>
            <x-input-label for="position" :value="__('Position')" />
            <x-text-input id="position" name="position" type="text" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('position') border-red-500 @enderror" :value="old('position', $pet->position)" required placeholder="Enter pet's position" />
            <x-input-error class="mt-2" :messages="$errors->get('position')" />
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none transition duration-300">Update Pet</button>
        </div>
    </form>
</div>
@endsection
