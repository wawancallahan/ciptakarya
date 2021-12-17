<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumn2ToBangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bangunans', function (Blueprint $table) {
            $table->string('rekomendasi')->nullable();
            $table->string('klasifikasi')->nullable();
            $table->text('catatan')->nullable();
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
