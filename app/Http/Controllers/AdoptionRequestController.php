<?php

namespace App\Http\Controllers;

use App\Models\AdoptionRequest;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdoptionAccepted;

class AdoptionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = auth()->id();
        $adoptionRequests = AdoptionRequest::whereHas('pet', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->where('status', '=', 'pending')->get();
        return view('adoptionRequests.indexPets', compact('adoptionRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($petId)
    {
        $pet = Pet::findOrFail($petId);
        return view('adoptionRequests.create', compact('pet'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = auth()->id();


        $validatedData = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'message' => 'required|string',
        ]);


        $validatedData['user_id'] = $user_id;
        $validatedData['status'] = 'pending';


        AdoptionRequest::create($validatedData);

        return redirect()
            ->route('pets.index')
            ->with('success', 'Adoption request created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(AdoptionRequest $adoptionRequest)
    {

        $pet = $adoptionRequest->pet;

        $data = [
            'pet' => $pet,
            'adoptionRequest' => $adoptionRequest,
            'user' => auth()->user(),
        ];

        return view('adoptionRequests.show', $data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdoptionRequest $adoptionRequest)
    {
        $adoptionRequest->delete();
        return redirect()->route('adoptionRequests.index')->with('success', 'Adoption request deleted successfully.');
    }
    public function myRequests()
    {
        $user_id = auth()->id();
        $adoptionRequests = AdoptionRequest::where('user_id', $user_id)->get();
        return view('adoptionRequests.index', compact('adoptionRequests'));
    }

    public function accept(AdoptionRequest $adoptionRequest)
    {
        $adoptionRequest->status = 'approved';
        $adoptionRequest->save();

        $user = $adoptionRequest->pet->user;
        $pet = $adoptionRequest->pet;
        $details = [
            'user_name' => $user->name,
            'pet_name' => $pet->name,
            'user_phone' => $user->phone_number,
            'pet_details' => $pet->description,
            'pet_lien'=> $pet->position,
        ];

        Mail::to($adoptionRequest->user->email)->send(new AdoptionAccepted($details));


        AdoptionRequest::where('pet_id', $adoptionRequest->pet_id)->delete();
        Pet::where('id', $adoptionRequest->pet_id)->delete();
        return redirect()->route('adoptionRequests.index')->with('success', 'Adoption request accepted and other requests deleted.');
    }

    public function refuse(AdoptionRequest $adoptionRequest)
    {
        $adoptionRequest->status = 'rejected';
        $adoptionRequest->save();


        return redirect()->route('adoptionRequests.index')->with('success', 'Adoption request refused.');
    }

}
