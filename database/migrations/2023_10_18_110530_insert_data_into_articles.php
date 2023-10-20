<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // N'oubliez pas d'importer la classe DB

class InsertDataIntoArticles extends Migration
{
    public function up()
    {
        // Insérez vos données dans la table 'articles' ici
        DB::table('articles')->insert([
            'title_en' => 'Title of the article',
            'content_en' => 'Article content',
            'title_fr' => 'Titre de l\'article',
            'content_fr' => 'Contenu de l\'article',
            'etudiant_id' => 1, // Remplacez par l'ID de l'étudiant
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        // Si vous souhaitez annuler l'opération, vous pouvez supprimer les données ici.
        DB::table('articles')->where('etudiant_id', 1)->delete(); // Supprimez l'enregistrement inséré
    }
}
