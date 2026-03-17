@extends('home')

@section('content')
<div class="container mx-auto p-6 max-w-2xl bg-gray-800 shadow-lg rounded-lg">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-200">Add New Pet</h1>
        <a href="{{ route('pets.index') }}" class="bg-gray-600 text-gray-200 px-4 py-2 rounded-md hover:bg-gray-700 transition duration-300">
            &larr; Return to Pets
        </a>
    </div>

    <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Name Field -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('name') border-red-500 @enderror" :value="old('name')" required autofocus placeholder="Enter pet's name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Type Field -->
        <div>
            <x-input-label for="type" :value="__('Type')" />
            <x-text-input id="type" name="type" type="text" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('type') border-red-500 @enderror" :value="old('type')" required placeholder="Enter pet's type" />
            <x-input-error class="mt-2" :messages="$errors->get('type')" />
        </div>

        <!-- Age Field -->
        <div>
            <x-input-label for="age" :value="__('Age')" />
            <x-text-input id="age" name="age" type="number" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('age') border-red-500 @enderror" :value="old('age')" required placeholder="Enter pet's age" />
            <x-input-error class="mt-2" :messages="$errors->get('age')" />
        </div>

        <!-- Sex Field -->
        <div>
            <x-input-label for="sex" :value="__('Sex')" />
            <select id="sex" name="sex" class="mt-1 block w-full bg-gray-950 border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('sex') border-red-500 @enderror" required>
            <option value="male" >Male</option>
            <option value="female">Female</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
        </div>

        <!-- Description Field -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea id="description" name="description" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('description') border-red-500 @enderror" rows="4" placeholder="Enter a brief description of the pet">{{ old('description') }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <!-- Health Status Field -->
        <div>
            <x-input-label for="health_status" :value="__('Health Status')" />
            <x-text-input id="health_status" name="health_status" type="text" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('health_status') border-red-500 @enderror" :value="old('health_status')" required placeholder="Enter health status" />
            <x-input-error class="mt-2" :messages="$errors->get('health_status')" />
        </div>

        <!-- Image Field -->
        <div>
            <x-input-label for="image_path" :value="__('Image')" />
            <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200" />
        </div>

        <!-- position Field -->
        <div>
            <x-input-label for="position" :value="__('Position')" />
            <x-text-input id="position" name="position" type="text" class="mt-1 block w-full border-gray-500 rounded-lg px-4 py-3 text-gray-200 @error('position') border-red-500 @enderror" :value="old('position')" required placeholder="Enter pet's position" />
            <x-input-error class="mt-2" :messages="$errors->get('position')" />
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 focus:outline-none transition duration-300">Submit</button>
        </div>
    </form>
</div>
@endsection
