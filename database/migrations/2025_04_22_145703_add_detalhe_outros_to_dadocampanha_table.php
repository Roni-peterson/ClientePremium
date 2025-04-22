<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('dadocampanha', function (Blueprint $table) {
            $table->string('detalhe_outros', 50)->nullable()->after('faixa_etaria_bebe');
        });
    }

    public function down()
    {
        Schema::table('dadocampanha', function (Blueprint $table) {
            $table->dropColumn('detalhe_outros');
        });
    }
};
