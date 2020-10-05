<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcernerTable extends Migration
{
    public function up()
    {
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->bigInteger('produit_id')->unsigned();
            $table->bigInteger('commande_id')->unsigned();
            $table->integer('quantite');

            $table->foreign('produit_id')
                  ->references('id')
                  ->on('produits')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('commande_id')
                  ->references('id')
                  ->on('commandes')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            
            $table->primary(['produit_id', 'commande_id']);

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
        Schema::table('commande_produit', function(Blueprint $table) {
			$table->dropForeign('concerner_produit_id_foreign');
			$table->dropForeign('concerner_commande_id_foreign');
		});

        Schema::dropIfExists('commande_produit');
    }
}
