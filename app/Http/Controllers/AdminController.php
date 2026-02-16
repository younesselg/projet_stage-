<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adherent;

class AdminController extends Controller
{
    /**
     * Display a listing of the adherents.
     */
    public function index()
    {
        $adherents = Adherent::latest()->get();
        return view('admin.adherents.index', compact('adherents'));
    }

    /**
     * Display the specified adherent.
     */
    public function show(Adherent $adherent)
    {
        return view('admin.adherents.show', compact('adherent'));
    }

    /**
     * Show the form for editing the specified adherent.
     */
    public function edit(Adherent $adherent)
    {
        return view('admin.adherents.edit', compact('adherent'));
    }

    /**
     * Update the specified adherent in storage.
     */
    public function update(Request $request, Adherent $adherent)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20|unique:adherents,cin,' . $adherent->id,
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:500',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:adherents,email,' . $adherent->id,
            'sport' => 'required|string|max:50',
            'niveau' => 'required|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($adherent->photo) {
                $oldPhotoPath = str_replace('storage/', 'public/', $adherent->photo);
                if (\Storage::exists($oldPhotoPath)) {
                    \Storage::delete($oldPhotoPath);
                }
            }
            
            $path = $request->file('photo')->store('public/photos');
            $validatedData['photo'] = str_replace('public/', 'storage/', $path);
        }

        $adherent->update($validatedData);

        return redirect()->route('admin.adherents.index')
                         ->with('success', 'Adhérent mis à jour avec succès!');
    }

    /**
     * Remove the specified adherent from storage.
     */
    public function destroy(Adherent $adherent)
    {
        // Delete photo if exists
        if ($adherent->photo) {
            $photoPath = str_replace('storage/', 'public/', $adherent->photo);
            if (\Storage::exists($photoPath)) {
                \Storage::delete($photoPath);
            }
        }

        $adherent->delete();

        return redirect()->route('admin.adherents.index')
                         ->with('success', 'Adhérent supprimé avec succès!');
    }
}