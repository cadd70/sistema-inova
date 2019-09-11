<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlteraTabelaDadosContratoMotivoDevolicaoLiquidacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TBL_EST_CONTRATACAO_CONFORMIDADE_CONTRATO', function($table) {
            $table->text('motivoDevolucaoLiquidacao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TBL_EST_CONTRATACAO_CONFORMIDADE_CONTRATO', function($table) {
            $table->dropColumn('motivoDevolucaoLiquidacao');
        });
    }
}
