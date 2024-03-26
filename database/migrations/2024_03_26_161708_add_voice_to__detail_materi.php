<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_materis', function (Blueprint $table) {
            //
            $table->text('voice')->default('1711469766_Sistem_Pencernaan_Manusia__Proses_Pencernaan_Pada_Tubuh_Manusia.mp3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_detail_materi', function (Blueprint $table) {
            //
        });
    }
};
