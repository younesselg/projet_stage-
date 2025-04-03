<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adherent;

class InscriptionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'cin' => 'required|string|max:20|unique:adherents',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:500',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:adherents',
            'sport' => 'required|string|max:50',
            'niveau' => 'required|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'conditions' => 'accepted'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/photos');
            $validatedData['photo'] = str_replace('public/', 'storage/', $path);
        }

        Adherent::create($validatedData);
        return redirect()->route('inscription')
                         ->with('success', 'Votre inscription a été enregistrée avec succès!');
    }
    public function index()
    {
        $adherents = Adherent::all();
        return view('admin.adherents.index', compact('adherents'));
    }
}
