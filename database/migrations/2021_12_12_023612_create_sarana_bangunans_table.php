<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaranaBangunansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarana_bangunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bangunan_id')->constrained('bangunans');
            $table->string('kondisi_air')->nullable();
            $table->text('keterangan_air')->nullable();
            $table->string('kondisi_air_hujan')->nullable();
            $table->text('keterangan_air_hujan')->nullable();
            $table->string('kondisi_air_kotor')->nullable();
            $table->string('keterangan_air_kotor')->nullable();
            $table->string('kondisi_pembuangan')->nullable();
            $table->text('keterangan_pembuangan')->nullable();
            $table->string('pl_septictank')->nullable();
            $table->string('kondisi_septictank')->nullable();
            $table->string('keterangan_septictank')->nullable();
            $table->text('pln_listrik')->nullable();
            $table->string('generator_listrik')->nullable();
            $table->string('kondisi_listrik')->nullable();
            $table->text('keterangan_listrik')->nullable();
            $table->string('jenis_udara')->nullable();
            $table->string('kondisi_udara')->nullable();
            $table->text('keterangan_udara')->nullable();
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
        Schema::dropIfExists('sarana_bangunans');
    }
}
