<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Importez la classe DB

class Ville extends Model
{
    use HasFactory;

    // ...

    // Méthode pour supprimer toutes les lignes de la table 'villes'
    public static function truncateTable()
    {
        DB::table('villes')->truncate();
    }
}
