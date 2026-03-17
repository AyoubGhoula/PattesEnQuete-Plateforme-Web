<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\AdoptionRequest;
use DB;
use Exception; 

class PetController extends Controller
{
    public function index(Request $request)
    {
            $pets = Pet::paginate(6);
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'health_status' => 'nullable|string|max:255',
            'image_path' => 'nullable|image|max:2048',
            'sex' => 'required|string|max:255',
            'position' => 'nullable|string',
        ]);

        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('image_path')) {
            $filePath = $request->file('image_path')->store('images/pets', 'public');
            $data['image_path'] = $filePath;
        }

        Pet::create($data);
        return redirect()->route('pets.index')->with('success', 'Pet created successfully.');
    }

    public function show(Pet $pet)
    {
        $pet = Pet::lockForUpdate()->findOrFail($pet->id);
        if ($pet->user_id === auth()->user()->id) {
            return view('pets.showMypets', compact('pet'));
        }
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        $pet = Pet::lockForUpdate()->findOrFail($pet->id);
        if ($pet->user_id !== auth()->user()->id) {
            return redirect()->route('pets.index')->with('error', 'You do not have permission to edit this pet.');
        }
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'health_status' => 'nullable|string|max:255',
            'sex' => 'required|string|max:255',
            'image_path' => 'nullable|image|max:2048',
            'position' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $lockedPet = Pet::where('id', $pet->id)->lockForUpdate()->first();

            if (!$lockedPet) {
                return redirect()->route('pets.index')->with('error', 'Pet not found or inaccessible.');
            }

            if ($request->hasFile('image_path')) {
                $filePath = $request->file('image_path')->store('images/pets', 'public');
                $validatedData['image_path'] = $filePath;
            }

            $lockedPet->update($validatedData);

            DB::commit();

            return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('pets.index')->with('error', 'Error updating pet: ' . $e->getMessage());
        }
    }

    public function destroy(Pet $pet)
    {
        DB::beginTransaction();

        try {
            $lockedPet = Pet::where('id', $pet->id)->lockForUpdate()->first();

            if (!$lockedPet) {
                return redirect()->route('pets.index')->with('error', 'Pet not found.');
            }

            $lockedPet->delete();

            DB::commit();

            return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('pets.index')->with('error', 'Error deleting pet: ' . $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        $key = trim($request->input('key'));

        $pets = Pet::where('name', 'like', "%{$key}%")

        ->orWhere('type', 'like', "%{$key}%")

        ->orderBy('created_at', 'desc')

        ->paginate(6);

        return view('pets.index', compact('pets'));
    }

    public function myPets()
    {
        $pets = Pet::where('user_id', auth()->user()->id)->paginate(6);
        return view('pets.indexMypets', compact('pets'));
    }
}
