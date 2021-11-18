<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('atividades', function (Blueprint $table) {
            $table->foreign('referenciaId', 'atividades_referenciaId_foreign')
                ->references('id')
                ->on('referencias')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
                $table->foreign('modalidadeId', 'atividades_modalidadeId_foreign')
                ->references('id')
                ->on('modalidades')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('atividades', function (Blueprint $table) {
            $table->dropForeign('atividades_referenciaId_foreign');

        });
    }
}
