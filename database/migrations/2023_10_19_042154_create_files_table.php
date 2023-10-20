<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('path'); // Ajoutez la colonne "path" pour stocker le chemin du fichier
            $table->string('title_en'); // Ajoutez la colonne "title_en" pour le titre en anglais
            $table->string('title_fr'); // Ajoutez la colonne "title_fr" pour le titre en français
            $table->unsignedBigInteger('user_id'); // Ajoutez une colonne pour la clé étrangère de l'utilisateur

            $table->foreign('user_id')->references('id')->on('users'); // Définissez la relation avec la table "users"

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('files');
    }
}
