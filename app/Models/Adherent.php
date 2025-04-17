<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'cin',
        'date_naissance',
        'adresse',
        'telephone',
        'email',
        'sport',
        'numero_appogee',
        'photo'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_naissance' => 'date',
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->prenom} {$this->nom}";
    }

    /**
     * Get the photo URL.
     *
     * @return string
     */
    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset($this->photo) : asset('images/default-avatar.png');
    }
}