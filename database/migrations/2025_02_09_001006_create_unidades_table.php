<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Verifica se a tabela 'unidades' já existe
        if (!Schema::hasTable('unidades')) {
            Schema::create('unidades', function (Blueprint $table) {
                $table->id();
                $table->string('unidade_medida', 5); // cm, kg, mts, mm
                $table->string('unidade_descricao', 30);
                $table->timestamps();
            });
        }

        // Adicionando relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // Adicionando relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remover relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //remover fk
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //[nome tabela]_[nome coluna]_[foreign]
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        //remover relacionamento com a tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            //remover fk
            $table->dropForeign('produtos_unidade_id_foreign'); //[nome tabela]_[nome coluna]_[foreign]
            //remover a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
};
