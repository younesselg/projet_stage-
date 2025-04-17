<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdherentController extends Controller
{
    /**
     * Afficher la liste des adhérents
     */
    public function index()
    {
        $adherents = Adherent::latest()->paginate(10);
        return view('admin.adherents.index', compact('adherents'));
    }

    /**
     * Afficher le formulaire de modification d'un adhérent
     */
    public function edit(Adherent $adherent)
    {
        return view('admin.adherents.edit', compact('adherent'));
    }

    /**
     * Mettre à jour un adhérent
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
            'numero_appogee' => 'required|string|max:20|unique:adherents,numero_appogee,' . $adherent->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($adherent->photo) {
                Storage::delete(str_replace('storage/', 'public/', $adherent->photo));
            }
            
            // Stocker la nouvelle photo
            $path = $request->file('photo')->store('public/photos');
            $validatedData['photo'] = str_replace('public/', 'storage/', $path);
        }

        $adherent->update($validatedData);
        
        return redirect()->route('adherents.index')
                         ->with('success', 'L\'adhérent a été mis à jour avec succès!');
    }

    /**
     * Supprimer un adhérent
     */
    public function destroy(Adherent $adherent)
    {
        // Supprimer la photo si elle existe
        if ($adherent->photo) {
            Storage::delete(str_replace('storage/', 'public/', $adherent->photo));
        }
        
        $adherent->delete();
        
        return redirect()->route('adherents.index')
                         ->with('success', 'L\'adhérent a été supprimé avec succès!');
    }
} 