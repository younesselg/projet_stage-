<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message' => 'required'
        ]);

        $data = [
            'nom' => $request->nom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'message' => $request->message
        ];

        try {
            Mail::send('emails.contact', $data, function($message) use ($data) {
                $message->to('younesselgraoui2004@gmail.com')
                        ->subject('Nouveau message de contact - ' . $data['nom']);
            });

            return back()->with('success', 'Votre message a été envoyé avec succès!');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.');
        }
    }
} 