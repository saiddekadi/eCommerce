<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id')->unsigned();

            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients')
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
        Schema::table('commandes', function(Blueprint $table) {
			$table->dropForeign('commandes_client_id_foreign');
		});

        Schema::dropIfExists('commandes');
    }
}
