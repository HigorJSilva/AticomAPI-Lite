<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 140);
            $table->string('certificado', 240)->nullable();
            $table->foreignId('modalidadeId');
            $table->foreignId('referenciaId')->index('atividades_referenciaId_idx');
            $table->boolean('presencial');
            $table->integer('horasCertificado');
            $table->integer('horasConsideradas');
            $table->string('feedback', 240)->nullable();
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
        Schema::dropIfExists('atividades');
    }
}
