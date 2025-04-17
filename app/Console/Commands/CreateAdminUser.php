<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {email?} {password?} {nom?} {prenom?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crée un utilisateur administrateur par défaut';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email') ?? $this->ask('Quelle est l\'adresse email de l\'administrateur?', 'admin@example.com');
        $password = $this->argument('password') ?? $this->secret('Quel est le mot de passe de l\'administrateur?');
        $nom = $this->argument('nom') ?? $this->ask('Quel est le nom de l\'administrateur?', 'Admin');
        $prenom = $this->argument('prenom') ?? $this->ask('Quel est le prénom de l\'administrateur?', 'Super');

        // Vérifier si l'administrateur existe déjà
        if (Admin::where('email', $email)->exists()) {
            $this->error('Un administrateur avec cet email existe déjà.');
            return 1;
        }

        // Créer l'administrateur
        Admin::create([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('Administrateur créé avec succès!');
        $this->info('Email: ' . $email);
        $this->info('Mot de passe: ' . $password);

        return 0;
    }
} 