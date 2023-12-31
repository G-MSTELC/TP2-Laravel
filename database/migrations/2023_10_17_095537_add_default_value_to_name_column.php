<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToNameColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //  Schema::table('users', function (Blueprint $table) {
           // $table->string('name')->default(''); // La valeur par défaut est définie ici
       // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->default('')->change(); // Ajoutez cette ligne pour annuler la migration
        });
    }
}
