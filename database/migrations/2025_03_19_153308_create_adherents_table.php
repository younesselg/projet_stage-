<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adherents', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin')->unique()->after('id');
            $table->date('date_naissance');
            $table->string('adresse');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('sport');
            $table->string('niveau');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adherents');
        Schema::table('adherents', function (Blueprint $table) {
            $table->dropColumn('cin');
        });
    }
};
