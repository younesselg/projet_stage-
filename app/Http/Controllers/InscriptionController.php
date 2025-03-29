<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adherent;

class InscriptionController extends Controller
{
    public function create()
    {
        return view('inscription');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:adherents,email',
            'telephone' => 'required|string|max:20',
            'branche' => 'required|string',
            'sport' => 'required|string',
        ]);

        Adherent::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'branche' => $request->branche,
            'sport' => $request->sport,
        ]);

        return redirect()->route('inscription')->with('success', 'Inscription réussie !');
    }
}
