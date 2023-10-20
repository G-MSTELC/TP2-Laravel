<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Ajout de l'importation

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'phone',
        'email',
        'date_de_naissance',
        'ville_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
