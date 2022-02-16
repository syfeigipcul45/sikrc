<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pelatihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tema_id');
            $table->foreign('tema_id')->references('id')->on('tema_pelatihans')->onDelete('cascade');
            $table->string('lokasi_pelatihan')->nullable();
            $table->date('waktu_pelatihan')->nullable();
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
        Schema::dropIfExists('jadwal_pelatihans');
    }
}
