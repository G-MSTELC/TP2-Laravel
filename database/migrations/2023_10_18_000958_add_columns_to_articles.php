<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToArticles extends Migration
{
    public function up()
    {
       // Schema::table('articles', function (Blueprint $table) {
           // $table->string('title_en')->after('title_fr');
           // $table->text('content_en')->after('content_fr');
       // });
    }

    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'content_en']);
        });
    }
}
