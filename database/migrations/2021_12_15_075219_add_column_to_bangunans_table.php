<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToBangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bangunans', function (Blueprint $table) {
            $table->unsignedFloat('luas_lantai_dasar', 15, 2)->nullable();
            $table->unsignedFloat('luas_lahan_tanah_perpetakan', 15, 2)->nullable();
            $table->unsignedFloat('luas_seluruh_lantai', 15, 2)->nullable();
            $table->unsignedFloat('luas_seluruh_ruang_terbuka', 15, 2)->nullable();
            $table->unsignedFloat('luas_tapak_basement', 15, 2)->nullable();
            $table->unsignedFloat('lt_proyeksi', 15, 2)->nullable();
            $table->unsignedFloat('luas_lahan_terbuka', 15, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bangunans', function (Blueprint $table) {
            //
        });
    }
}
