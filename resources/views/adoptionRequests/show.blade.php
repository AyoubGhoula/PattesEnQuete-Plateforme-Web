@extends('home')

@section('content')
    <div class="container mx-auto p-4 bg-gray-800 text-white rounded shadow-md">
        <h1 class="text-3xl font-bold mb-4">Adoption Request Details</h1>

        <div class="mb-4">
            <p><strong>Pet:</strong> {{ $pet->name ?? 'N/A' }}</p>
            <p><strong>User:</strong> {{ $adoptionRequest->user->name ?? 'Anonymous' }}</p>
            <p><strong>Message:</strong> {{ $adoptionRequest->message ?? 'No message provided.' }}</p>
            <p><strong>Status:</strong> <span class="capitalize">{{ $adoptionRequest->status ?? 'Pending' }}</span></p>
        </div>

        <div class="flex justify-between mt-4">
            <a href="{{ route('adoptionRequests.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded">Back to Requests</a>

            {{-- @if($adoptionRequest->status === 'pending')
                <form action="{{ route('adoptionRequests.destroy', $adoptionRequest->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded">
                        Delete Request
                    </button>
                </form>
            @endif --}}
        </div>
    </div>
@endsection
