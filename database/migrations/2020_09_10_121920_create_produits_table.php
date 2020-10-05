<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->unique();
            $table->double('quantite');
            $table->double('prix');
            $table->string('image');
            $table->string('description');
            $table->bigInteger('categorie_id')->unsigned();
            
            $table->foreign('categorie_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concerner', function(Blueprint $table) {
			$table->dropForeign('produits_categorie_id_foreign');
		});
        Schema::dropIfExists('produits');
    }
}
