<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiptakaryasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciptakaryas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bangunan_id')->constrained('bangunans');
            $table->string('jenis')->nullable();
            $table->string('tipe')->nullable();
            $table->unsignedFloat('lebar', 15, 2)->nullable();
            $table->unsignedFloat('pagar_depan', 15, 2)->nullable();
            $table->unsignedFloat('pagar_belakang', 15, 2)->nullable();
            $table->unsignedFloat('pagar_samping', 15, 2)->nullable();
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
        Schema::dropIfExists('ciptakaryas');
    }
}
